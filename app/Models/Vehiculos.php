<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class Vehiculos extends Model
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
        $inventario = DB::table('vehiculos')->get();
        return $inventario;
    }

    public function getByIdSwapi($id){
        $ruta = "https://swapi.dev/api/vehicles/".$id."/";
        $response = Http::get($ruta);

        return $response;
    }

    public function getVehiculosByPaginaSWAPI($ruta){
        return Http::get($ruta);
    }

    public function findBySwapiIdInventario($id = 0){
        $vehiculo = DB::table('vehiculos')->get()->where('id_swapi', $id)->first();
        return $vehiculo;
    }

    public function findVehiculoByBusquedaInventario($busqueda){
        $vehiculo = DB::table('vehiculos')->select('id_swapi','nombre','modelo','fabricante','unidades')
                ->where('nombre', 'LIKE', '%'.$busqueda.'%')
                ->orWhere('modelo', 'LIKE', '%'.$busqueda.'%')
                ->orWhere('fabricante', 'LIKE', '%'.$busqueda.'%')
                ->get();

        return $vehiculo;
    }

    public function insertInventario($params){
        $id = DB::table('vehiculos')->insertGetId([
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
        DB::table('vehiculos')
            ->where('id_swapi', $params['id_swapi'])
            ->increment('unidades', $params['increment']);
    }

    public function decrementInventario($params){
        DB::table('vehiculos')
            ->where('id_swapi', $params['id_swapi'])
            ->decrement('unidades', $params['decrement']);
    }

    public function updateInventario($params){
        DB::table('vehiculos')
            ->where('id_swapi', $params['id_swapi'])
            ->update(['unidades' => $params['unidades']]);
    }
}
