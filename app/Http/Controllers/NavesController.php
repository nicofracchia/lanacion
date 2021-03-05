<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Naves;


class NavesController extends Controller
{

    public function index()
    {
        $allNaves = $this->getAllNaves();
        return $allNaves;
    }

    public function getNaveById($id){
        if($id === 0 or !is_int($id)){
            return $this->returnError('ID', 'El ID de la nave a ingresar debe ser un número entero.', ['id' => $id]);
        }

        $naves = new Naves;
        $response = $naves->getByIdSwapi($id);

        if(isset($response['detail']) and $response['detail'] == "Not found"){
            return $this->returnError('ID', 'No se pudo encontrar una nave relacionada al ID ingresado.', ['id' => $id]);
        }

        return $response;
    }

    public function getNavesByPagina($ruta = 0){
        $ruta = ($ruta !== 0) ? $ruta : 'http://swapi.dev/api/starships/';

        $naves = new Naves;
        $response = $naves->getNavesByPaginaSWAPI($ruta);

        return $response;
    }

    public function getAllNaves(){
        $allNaves = Array();
        $next = 'http://swapi.dev/api/starships/';
        $i = 0;
        while($next !== null){
            $resultadosPagina = $this->getNavesByPagina($next);
            $p = json_decode($resultadosPagina);
            foreach($p->results as $r){
                $id = explode('/', $r->url);
                $allNaves[$i]['id'] = $id[5];
                $allNaves[$i]['nombre'] = $r->name;
                $allNaves[$i]['modelo'] = $r->model;
                $allNaves[$i]['fabricante'] = $r->manufacturer;
                $i++;
            }
            $next = $p->next;
        }

        return $allNaves;
    }

    public function getInventario(Naves $naves){
        return $naves->getInventario();
    }

    public function increment(Request $request, Naves $naves){
        $id = $request->id_swapi;

        $naveBD = $naves->findBySwapiIdInventario($id);

        if($naveBD === null)
            return $this->returnError('Nave inexistente', 'Debe registrar la nave en el inventario para agregar unidades.', ['id_swapi' => $id]);


        $params = [
            "id_swapi" => $request->id_swapi,
            "nombre" => $naveBD->nombre,
            "modelo" => $naveBD->modelo,
            "fabricante" => $naveBD->fabricante,
            "unidades" => $naveBD->unidades + $request->unidades,
            "increment" => $request->unidades
        ];
        $naves->incrementInventario($params);
        return $params;
    }

    public function decrement(Request $request, Naves $naves){
        $id = $request->id_swapi;

        $naveBD = $naves->findBySwapiIdInventario($id);

        if($naveBD === null)
            return $this->returnError('Nave inexistente', 'Debe registrar la nave en el inventario para restar unidades.', ['id_swapi' => $id]);

        $params = [
            "id_swapi" => $request->id_swapi,
            "nombre" => $naveBD->nombre,
            "modelo" => $naveBD->modelo,
            "fabricante" => $naveBD->fabricante,
            "unidades" => $naveBD->unidades - $request->unidades,
            "decrement" => $request->unidades
        ];
        $naves->decrementInventario($params);
        return $params;
    }

    public function modify(Request $request, Naves $naves){
        $id = $request->id_swapi;

        $naveBD = $naves->findBySwapiIdInventario($id);

        if($naveBD === null)
            return $this->returnError('Nave inexistente', 'Debe registrar la nave en el inventario para restar unidades.', ['id_swapi' => $id]);

        $params = [
            "id_swapi" => $request->id_swapi,
            "nombre" => $naveBD->nombre,
            "modelo" => $naveBD->modelo,
            "fabricante" => $naveBD->fabricante,
            "unidades" => $request->unidades,
            "cantidadAnterior" => $naveBD->unidades
        ];
        $naves->updateInventario($params);
        return $params;
    }

    public function getDetallesById($id){
        return $this->getNaveById(intval($id));
    }

    public function findByKeyword($busqueda, Naves $naves){
        $nave = $naves->findNaveByBusquedaInventario($busqueda);
        $nave = json_decode($nave);

        if(count($nave) == 0)
            $nave = $this->returnError('Sin resultados', 'No se encontraron naves para esa búsqueda.', ['busqueda' => $busqueda]);

        return $nave;
    }

    public function new(Request $request, Naves $naves){
        $id = $request->id_swapi;
        $unidades = (isset($request->unidades)) ? $request->unidades : 0;
        $nave = json_decode($this->getNaveById($id));

        // Verifica que la nave exista en SWAPI.
        if(isset($nave->error))
            return json_encode($nave);

        // Verifica que la nave NO este cargada en la base de datos.
        $naveBD = $naves->findBySwapiIdInventario($id);
        if($naveBD !== null)
            return $this->returnError('Nave existente', 'La nave ya se encuentra en el inventario, puede sumar, restar o modificar las unidades.', ['id' => $id, 'unidades' => $unidades]);

        // Si existe en SWAPI y NO esta registrada en la bd la agrega.
        $params = [
            "id_swapi" => $id,
            "nombre" => $nave->name,
            "modelo" => $nave->model,
            "fabricante" => $nave->manufacturer, "unidades" => $unidades
        ];
        $naves->insertInventario($params);
        return json_encode($params);
    }
}
