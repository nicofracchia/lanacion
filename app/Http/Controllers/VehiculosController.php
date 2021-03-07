<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculos;


class VehiculosController extends Controller
{

    public function index()
    {
        $allVehiculos = $this->getAllVehiculos();
        return $allVehiculos;
    }

    public function getVehiculoById($id){
        if($id === 0 or !is_int($id)){
            return $this->returnError('ID', 'El ID del vehiculo a ingresar debe ser un número entero.', ['id' => $id]);
        }

        $vehiculos = new Vehiculos;
        $response = $vehiculos->getByIdSwapi($id);

        if(isset($response['detail']) and $response['detail'] == "Not found"){
            return $this->returnError('ID', 'No se pudo encontrar un vehiculo relacionado al ID ingresado.', ['id' => $id]);
        }

        return $response;
    }

    public function getVehiculosByPagina($ruta = 0){
        $ruta = ($ruta !== 0) ? $ruta : 'http://swapi.dev/api/vehicles/';

        $vehiculos = new Vehiculos;
        $response = $vehiculos->getVehiculosByPaginaSWAPI($ruta);

        return $response;
    }

    public function getAllVehiculos(){
        $allVehiculos = Array();
        $next = 'http://swapi.dev/api/vehicles/';
        $i = 0;
        while($next !== null){
            $resultadosPagina = $this->getVehiculosByPagina($next);
            $p = json_decode($resultadosPagina);
            foreach($p->results as $r){
                $id = explode('/', $r->url);
                $allVehiculos[$i]['id'] = $id[5];
                $allVehiculos[$i]['nombre'] = $r->name;
                $allVehiculos[$i]['modelo'] = $r->model;
                $allVehiculos[$i]['fabricante'] = $r->manufacturer;
                $i++;
            }
            $next = $p->next;
        }

        return $allVehiculos;
    }

    public function getInventario(Vehiculos $vehiculos){
        return $vehiculos->getInventario();
    }

    public function increment(Request $request, Vehiculos $vehiculos){
        $id = $request->id_swapi;

        $vehiculoBD = $vehiculos->findBySwapiIdInventario($id);

        if($vehiculoBD === null)
            return $this->returnError('Vehiculo inexistente', 'Debe registrar el vehículo en el inventario para agregar unidades.', ['id_swapi' => $id]);


        $params = [
            "id_swapi" => $request->id_swapi,
            "nombre" => $vehiculoBD->nombre,
            "modelo" => $vehiculoBD->modelo,
            "fabricante" => $vehiculoBD->fabricante,
            "unidades" => $vehiculoBD->unidades + $request->unidades,
            "increment" => $request->unidades
        ];
        $vehiculos->incrementInventario($params);
        return $params;
    }

    public function decrement(Request $request, Vehiculos $vehiculos){
        $id = $request->id_swapi;

        $vehiculoBD = $vehiculos->findBySwapiIdInventario($id);

        if($vehiculoBD === null)
            return $this->returnError('Vehiculo inexistente', 'Debe registrar el vehículo en el inventario para restar unidades.', ['id_swapi' => $id]);

        $params = [
            "id_swapi" => $request->id_swapi,
            "nombre" => $vehiculoBD->nombre,
            "modelo" => $vehiculoBD->modelo,
            "fabricante" => $vehiculoBD->fabricante,
            "unidades" => $vehiculoBD->unidades - $request->unidades,
            "decrement" => $request->unidades
        ];
        $vehiculos->decrementInventario($params);
        return $params;
    }

    public function modify(Request $request, Vehiculos $vehiculos){
        $id = $request->id_swapi;

        $vehiculoBD = $vehiculos->findBySwapiIdInventario($id);

        if($vehiculoBD === null)
            return $this->returnError('Vehículo inexistente', 'Debe registrar el vehículo en el inventario para restar unidades.', ['id_swapi' => $id]);

        $params = [
            "id_swapi" => $request->id_swapi,
            "nombre" => $vehiculoBD->nombre,
            "modelo" => $vehiculoBD->modelo,
            "fabricante" => $vehiculoBD->fabricante,
            "unidades" => $request->unidades,
            "cantidadAnterior" => $vehiculoBD->unidades
        ];
        $vehiculos->updateInventario($params);
        return $params;
    }

    public function getDetallesById($id){
        return $this->getVehiculoById(intval($id));
    }

    public function findByKeyword($busqueda, Vehiculos $vehiculos){
        $vehiculo = $vehiculos->findVehiculoByBusquedaInventario($busqueda);
        $vehiculo = json_decode($vehiculo);

        if(count($vehiculo) == 0)
            $vehiculo = $this->returnError('Sin resultados', 'No se encontraron vehículos para esa búsqueda.', ['busqueda' => $busqueda]);

        return $vehiculo;
    }

    public function new(Request $request, Vehiculos $vehiculos){
        $id = $request->id_swapi;
        $unidades = (isset($request->unidades)) ? $request->unidades : 0;
        $vehiculo = json_decode($this->getVehiculoById($id));

        // Verifica que el vehículo exista en SWAPI.
        if(isset($vehiculo->error))
            return json_encode($vehiculo);

        // Verifica que el vehículo NO este cargado en la base de datos.
        $vehiculoBD = $vehiculos->findBySwapiIdInventario($id);
        if($vehiculoBD !== null)
            return $this->returnError('Vehículo existente', 'El vehículo ya se encuentra en el inventario, puede sumar, restar o modificar las unidades.', ['id' => $id, 'unidades' => $unidades]);

        // Si existe en SWAPI y NO esta registrado en la bd lo agrega.
        $params = [
            "id_swapi" => $id,
            "nombre" => $vehiculo->name,
            "modelo" => $vehiculo->model,
            "fabricante" => $vehiculo->manufacturer,
            "unidades" => $unidades
        ];
        $vehiculos->insertInventario($params);
        return json_encode($params);
    }
}
