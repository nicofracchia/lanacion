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
            $return = [
                'error' => 'ID',
                'errorMessage' => 'El ID de la nave a ingresar debe ser un número entero.'
            ];
            return json_encode($return);
        }
        
        $ruta = "https://swapi.dev/api/starships/".$id."/";
        $response = Http::get($ruta);
        if(isset($response['detail']) and $response['detail'] == "Not found"){
            $return = [
                'error' => 'ID',
                'errorMessage' => 'No se pudo encontrar una nave relacionada al ID ingresado.'
            ];
            return json_encode($return);
        }

        return $response;
    }

    public function getNavesByPagina($ruta = 0){
        $ruta = ($ruta !== 0) ? $ruta : 'http://swapi.dev/api/starships/';
        $response = Http::get($ruta);
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

    public function getInventario(){
        $naves = new Naves;

        return $naves->getInventario();
    }

    public function increment(Request $request, Naves $naves){
        $naveBD = $naves->findBySwapiId($request->id);
        
        if($naveBD !== null){
            $params = [
                "id_swapi" => $request->id,
                "nombre" => $naveBD->nombre,
                "modelo" => $naveBD->modelo,
                "fabricante" => $naveBD->fabricante,
                "unidades" => $naveBD->unidades + $request->unidades,
                "increment" => $request->unidades
            ];
            $naves->incrementInventario($params); 
            $return = $params;
        }else{
            $return['error'] = "Nave inexistente";
            $return['errorMessage'] = "Debe registrar la nave en el inventario para agregar unidades.";
        }

        return $return;
    }

    public function decrement(Request $request, Naves $naves){
        $naveBD = $naves->findBySwapiId($request->id);
        
        if($naveBD !== null){
            $params = [
                "id_swapi" => $request->id,
                "nombre" => $naveBD->nombre,
                "modelo" => $naveBD->modelo,
                "fabricante" => $naveBD->fabricante,
                "unidades" => $naveBD->unidades - $request->unidades,
                "decrement" => $request->unidades
            ];
            $naves->decrementInventario($params); 
            $return = $params;
        }else{
            $return['error'] = "Nave inexistente";
            $return['errorMessage'] = "Debe registrar la nave en el inventario para restar unidades.";
        }

        return $return;
    }

    public function modify(Request $request, Naves $naves){
        $naveBD = $naves->findBySwapiId($request->id);
        
        if($naveBD !== null){
            $params = [
                "id_swapi" => $request->id,
                "nombre" => $naveBD->nombre,
                "modelo" => $naveBD->modelo,
                "fabricante" => $naveBD->fabricante,
                "unidades" => $request->unidades,
                "cantidadAnterior" => $naveBD->unidades
            ];
            $naves->updateInventario($params); 
            $return = $params;
        }else{
            $return['error'] = "Nave inexistente";
            $return['errorMessage'] = "Debe registrar la nave en el inventario para modificar las unidades.";
        }

        return $return;
    }

    public function getDetallesById($id){
        return $this->getNaveById(intval($id));
    }

    public function findByKeyword($id){
        $return['busqueda'] = $busqueda;

        return $return;
    }

    public function new(Request $request, Naves $naves){
        $id = $request->id;
        $unidades = (isset($request->unidades)) ? $request->unidades : 0;
        $nave = json_decode($this->getNaveById($id));
        $return['id_swapi'] = $id;
        $return['unidades'] = $unidades;

        // Si la nave existe en SWAPI reviso que no exista en la tabla local
        if(!isset($nave->error)){
            $naveBD = $naves->findBySwapiId($id);
            
            // Si la nave no existe en la tabla local la agrego con las unidades ingresadas
            if($naveBD === null){
                $params = [
                    "id_swapi" => $id,
                    "nombre" => $nave->name,
                    "modelo" => $nave->model,
                    "fabricante" => $nave->manufacturer,
                    "unidades" => $unidades
                ];
                $insert = $naves->insertInventario($params); 
                $return = $params;
            }else{
                $return['error'] = "Nave existente";
                $return['errorMessage'] = "La nave ya se encuentra en el inventario, puede sumar, restar o modificar las unidades.";
            }
        }else{
            $return['error'] = $nave->error;
            $return['errorMessage'] = $nave->errorMessage;
        }

        return $return;
    }
}