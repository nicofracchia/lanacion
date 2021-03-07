<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Vehiculos;

class VehiculosTest extends TestCase
{
    use RefreshDatabase;

    // CHECK STATUS RUTAS GET
    public function test_status_ruta_listado_completo_de_vehiculos_desde_SWAPI()
    {
        $this->get('/api/vehiculos')->assertOk();
    }

    public function test_status_ruta_detalle_completo_de_vehiculos_desde_SWAPI()
    {
        $ruta = '/api/vehiculos/'.$this->id_swapi_valido_para_vehiculo();
        $this->get($ruta)->assertOk();
    }

    public function test_status_ruta_listado_completo_de_vehiculos_en_el_inventario()
    {
        $this->get('/api/vehiculos/inventario')->assertOk();
    }

    public function test_status_ruta_listado_completo_de_vehiculos_en_el_inventario_busqueda()
    {
        $ruta = '/api/vehiculos/inventario/x';
        $this->get($ruta)->assertOk();
    }



    // TEST VEHICULOS BY ID SWAPI
    public function test_get_vehiculos_by_id_SWAPI(){
        $this->withoutExceptionHandling();

        $id = $this->id_swapi_valido_para_vehiculo();

        $response = $this->get('/api/vehiculos/'.$id);

        $response->assertJsonStructure(["name", "model", "manufacturer", "url"]);

        $response->assertJson([
            'url' => "http://swapi.dev/api/vehicles/".$id."/"
        ]);

        $response->assertOk();
    }

    public function test_get_vehiculos_by_id_SWAPI__error_id_vehiculo_inexistente(){
        $this->withoutExceptionHandling();

        $id = $this->id_swapi_invalido_para_vehiculo();

        $response = $this->get('/api/vehiculos/'.$id);

        $response->assertJsonStructure(["error", "errorMessage", "params"]);

        $response->assertJson([
            "error" => "ID"
        ]);

        $response->assertOk();
    }

    // TEST VEHICULOS BY BUSQUEDA EN INVENTARIO
    public function test_buscar_vehiculos_en_inventario_por_nombre_modelo_fabricante(){
        $ids = $this->id_swapi_valido_para_vehiculo(true);

        foreach($ids as $id){
            $this->insertar_vehiculo_en_inventario($id);
        }

        $this->assertCount(3, Vehiculos::all());

        $response1 = $this->get('/api/vehiculos/inventario/sand');
        $response1->assertJsonStructure([['id_swapi', 'nombre','modelo', 'fabricante', 'unidades']]);
        $response1->assertJsonCount(1);
        $response1->assertOk();

        $response2 = $this->get('/api/vehiculos/inventario/skyhopper');
        $response2->assertJsonStructure([['id_swapi', 'nombre','modelo', 'fabricante', 'unidades']]);
        $response2->assertJsonCount(1);
        $response2->assertOk();

        $response3 = $this->get('/api/vehiculos/inventario/SoroSuub');
        $response3->assertJsonStructure([['id_swapi', 'nombre','modelo', 'fabricante', 'unidades']]);
        $response3->assertJsonCount(1);
        $response3->assertOk();
    }

    public function test_buscar_vehiculos_en_inventario_por_nombre_modelo_fabricante__error_sin_resultados(){
        $response = $this->get('/api/vehiculos/inventario/sin resultados');

        $response->assertJsonStructure(["error", "errorMessage", "params"]);

        $response->assertJson(['error' => 'Sin resultados']);

        $response->assertOk();
    }

    // TESTS INGRESO
    public function test_agregar_nuevo_vehiculo_al_inventario()
    {
        $this->withoutExceptionHandling();

        $id = $this->id_swapi_valido_para_vehiculo();

        $response = $this->insertar_vehiculo_en_inventario($id);

        $response->assertJsonStructure(['id_swapi', 'nombre','modelo', 'fabricante', 'unidades']);

        $response->assertJson([
            'id_swapi' => $this->id_swapi_valido_para_vehiculo(),
            'unidades' => 100
        ]);

        $response->assertOk();

        $this->assertCount(1, Vehiculos::all());
    }

    public function test_agregar_nuevo_vehiculo_al_inventario__error_no_existe_en_SWAPI(){
        $this->withoutExceptionHandling();

        $id = $this->id_swapi_invalido_para_vehiculo();

        $response = $this->insertar_vehiculo_en_inventario($id);

        $response->assertJsonStructure(["error", "errorMessage", "params"]);

        $response->assertJson(['error' => 'ID']);

        $this->assertCount(0, Vehiculos::all());
    }

    public function test_agregar_nuevo_vehiculo_al_inventario__error_ya_existe_en_el_inventario(){
        $this->withoutExceptionHandling();

        $id = $this->id_swapi_valido_para_vehiculo();

        $this->insertar_vehiculo_en_inventario($id);

        $response = $this->insertar_vehiculo_en_inventario($id);

        $response->assertJsonStructure(["error", "errorMessage", "params"]);

        $response->assertJson(['error' => 'Vehículo existente']);

        $this->assertCount(1, Vehiculos::all());
    }

    // TESTS AGREGAR UNIDADES AL INVENTARIO
    public function test_agregar_unidades_a_vehiculo_en_inventario(){
        $this->withoutExceptionHandling();

        $id = $this->id_swapi_valido_para_vehiculo();

        $this->insertar_vehiculo_en_inventario($id, 100);

        $this->assertCount(1, Vehiculos::all());

        $response = $this->patch('api/vehiculos/inventario/increment',[
            'id_swapi' => $id,
            'unidades' => 50
        ]);

        $response->assertJsonStructure(["id_swapi", "nombre", "modelo", "fabricante", "unidades", "increment"]);

        $response->assertJson([
            'id_swapi' => $id,
            'unidades' => 150,
            'increment' => 50
        ]);

        $response->assertOk();
    }
    public function test_agregar_unidades_a_vehiculo_en_inventario__error_vehiculo_sin_registrar(){
        $this->withoutExceptionHandling();

        $id = $this->id_swapi_valido_para_vehiculo();

        $response = $this->patch('api/vehiculos/inventario/increment',[
            'id_swapi' => $id,
            'unidades' => 50
        ]);

        $response->assertJsonStructure(["error", "errorMessage", "params"]);

        $response->assertJson([
            "error" => "Vehiculo inexistente"
        ]);

        $response->assertOk();
    }

    // TESTS RESTAR UNIDADES AL INVENTARIO
    public function test_restar_unidades_a_vehiculo_en_inventario(){
        $this->withoutExceptionHandling();

        $id = $this->id_swapi_valido_para_vehiculo();

        $this->insertar_vehiculo_en_inventario($id, 100);

        $this->assertCount(1, Vehiculos::all());

        $response = $this->patch('api/vehiculos/inventario/decrement',[
            'id_swapi' => $id,
            'unidades' => 50
        ]);

        $response->assertJsonStructure(["id_swapi", "nombre", "modelo", "fabricante", "unidades", "decrement"]);

        $response->assertJson([
            'id_swapi' => $id,
            'unidades' => 50,
            'decrement' => 50
        ]);

        $response->assertOk();
    }
    public function test_restar_unidades_a_vehiculo_en_inventario__error_vehiculo_sin_registrar(){
        $this->withoutExceptionHandling();

        $id = $this->id_swapi_valido_para_vehiculo();

        $response = $this->patch('api/vehiculos/inventario/decrement',[
            'id_swapi' => $id,
            'unidades' => 50
        ]);

        $response->assertJsonStructure(["error", "errorMessage", "params"]);

        $response->assertJson([
            "error" => "Vehiculo inexistente"
        ]);

        $response->assertOk();
    }

    // TESTS MODIFICAR UNIDADES AL INVENTARIO
    public function test_modificar_unidades_a_vehiculo_en_inventario(){
        $this->withoutExceptionHandling();

        $id = $this->id_swapi_valido_para_vehiculo();

        $this->insertar_vehiculo_en_inventario($id, 100);

        $this->assertCount(1, Vehiculos::all());

        $response = $this->patch('api/vehiculos/inventario/modify',[
            'id_swapi' => $id,
            'unidades' => 200
        ]);

        $response->assertJsonStructure(["id_swapi", "nombre", "modelo", "fabricante", "unidades", "cantidadAnterior"]);

        $response->assertJson([
            'id_swapi' => $id,
            'unidades' => 200,
            'cantidadAnterior' => 100
        ]);

        $response->assertOk();
    }
    public function test_modificar_unidades_a_vehiculo_en_inventario__error_vehiculo_sin_registrar(){
        $this->withoutExceptionHandling();

        $id = $this->id_swapi_valido_para_vehiculo();

        $response = $this->patch('api/vehiculos/inventario/modify',[
            'id_swapi' => $id,
            'unidades' => 200
        ]);

        $response->assertJsonStructure(["error", "errorMessage", "params"]);

        $response->assertJson([
            "error" => "Vehículo inexistente"
        ]);

        $response->assertOk();
    }

    // VALORES PARA PRUEBAS
    public function id_swapi_valido_para_vehiculo($varios = false){
        return ($varios) ? Array(4, 6, 7) : 4;
    }

    public function id_swapi_invalido_para_vehiculo(){
        return 152;
    }

    public function insertar_vehiculo_en_inventario($id, $unidades = 100){
        $response = $this->post('api/vehiculos/inventario/new',[
            'id_swapi' => $id,
            'unidades' => $unidades
        ]);

        return $response;
    }
}
