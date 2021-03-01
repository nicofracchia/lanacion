<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class NavesController extends Controller
{
    
    public function index()
    {
        $allNaves = $this->getAllNaves();
        return $allNaves;
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

    public function add($id, $cantidad){
        $return['id'] = $id;
        $return['cantidad'] = $cantidad;

        return $return;
    }

    public function substract($id, $cantidad){
        $return['id'] = $id;
        $return['cantidad'] = $cantidad;

        return $return;
    }

    public function modify($id, $cantidad){
        $return['id'] = $id;
        $return['cantidad'] = $cantidad;

        return $return;
    }

    public function getDetallesById($id){
        $return['id'] = $id;

        return $return;
    }

    public function findByKeyword($id){
        $return['busqueda'] = $busqueda;

        return $return;
    }

    public function new($id, $cantidad){
        $return['id'] = $id;
        $return['cantidad'] = $cantidad;

        return $return;
    }





}