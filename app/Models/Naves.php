<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class Naves extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_swapi',
        'nombre',
        'modelo',
        'fabricante',
        'unidades'
    ];

    public function getInventario(){
        $inventario = DB::table('naves')->get();
        return $inventario;
    }

    public function getByIdSwapi($id){
        $ruta = "https://swapi.dev/api/starships/".$id."/";
        $response = Http::get($ruta);

        return $response;
    }

    public function getNavesByPaginaSWAPI($ruta){
        return Http::get($ruta);
    }

    public function findBySwapiIdInventario($id = 0){
        $nave = DB::table('naves')->get()->where('id_swapi', $id)->first();
        return $nave;
    }

    public function findNaveByBusquedaInventario($busqueda){
        $nave = DB::table('naves')->select('id_swapi','nombre','modelo','fabricante','unidades')
                ->where('nombre', 'LIKE', '%'.$busqueda.'%')
                ->orWhere('modelo', 'LIKE', '%'.$busqueda.'%')
                ->orWhere('fabricante', 'LIKE', '%'.$busqueda.'%')
                ->get();

        return $nave;
    }

    public function insertInventario($params){
        $id = DB::table('naves')->insertGetId([
            'id_swapi' => $params['id_swapi'],
            'unidades' => $params['unidades'],
            'nombre' => $params['nombre'],
            'modelo' => $params['modelo'],
            'fabricante' => $params['fabricante'],
            'created_at' => date('Y-m-d H:i:s')
        ]);
        return $id;
    }

    public function incrementInventario($params){
        DB::table('naves')
            ->where('id_swapi', $params['id_swapi'])
            ->increment('unidades', $params['increment']);
    }

    public function decrementInventario($params){
        DB::table('naves')
            ->where('id_swapi', $params['id_swapi'])
            ->decrement('unidades', $params['decrement']);
    }

    public function updateInventario($params){
        DB::table('naves')
            ->where('id_swapi', $params['id_swapi'])
            ->update(['unidades' => $params['unidades']]);
    }
}
