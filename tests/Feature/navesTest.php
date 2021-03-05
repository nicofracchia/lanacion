<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Naves;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class navesTest extends TestCase
{
    use RefreshDatabase;

    // CHECK STATUS RUTAS GET
    public function test_status_ruta_listado_completo_de_naves_desde_SWAPI()
    {
        $this->get('/api/naves')->assertOk();
    }

    public function test_status_ruta_listado_completo_de_naves_en_el_inventario()
    {
        $this->get('/api/naves/inventario')->assertOk();
    }

    public function test_status_ruta_detalle_completo_de_naves_desde_SWAPI()
    {
        $ruta = '/api/naves/'.$this->id_swapi_valido_para_nave();
        $this->get($ruta)->assertOk();
    }


    // TESTS INGRESO
    public function test_agregar_nueva_nave_al_inventario()
    {
        $this->withoutExceptionHandling();

        $id = $this->id_swapi_valido_para_nave();

        $response = $this->insertar_nave_en_inventario($id);

        $response->assertJsonStructure(['id_swapi', 'nombre','modelo', 'fabricante', 'unidades']);

        $response->assertJson([
            'id_swapi' => $this->id_swapi_valido_para_nave(),
            'unidades' => 100
        ]);

        $response->assertOk();

        $this->assertCount(1, Naves::all());
    }

    public function test_agregar_nueva_nave_al_inventario__error_no_existe_en_SWAPI(){
        $this->withoutExceptionHandling();

        $id = $this->id_swapi_invalido_para_nave();

        $response = $this->insertar_nave_en_inventario($id);

        $response->assertJsonStructure(["error", "errorMessage", "params"]);

        $response->assertJson(['error' => 'ID']);

        $this->assertCount(0, Naves::all());
    }

    public function test_agregar_nueva_nave_al_inventario__error_ya_existe_en_el_inventario(){
        $this->withoutExceptionHandling();

        $id = $this->id_swapi_valido_para_nave();

        $this->insertar_nave_en_inventario($id);

        $response = $this->insertar_nave_en_inventario($id);

        $response->assertJsonStructure(["error", "errorMessage", "params"]);

        $response->assertJson(['error' => 'Nave existente']);

        $this->assertCount(1, Naves::all());
    }

    // TESTS AGREGAR UNIDADES AL INVENTARIO
    public function test_agregar_unidades_a_nave_en_inventario(){
        $this->withoutExceptionHandling();

        $id = $this->id_swapi_valido_para_nave();

        $this->insertar_nave_en_inventario($id, 100);

        $this->assertCount(1, Naves::all());

        $response = $this->patch('api/naves/inventario/increment',[
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
    public function test_agregar_unidades_a_nave_en_inventario__error_nave_sin_registrar(){
        $this->withoutExceptionHandling();

        $id = $this->id_swapi_valido_para_nave();

        $response = $this->patch('api/naves/inventario/increment',[
            'id_swapi' => $id,
            'unidades' => 50
        ]);

        $response->assertJsonStructure(["error", "errorMessage", "params"]);

        $response->assertJson([
            "error" => "Nave inexistente"
        ]);

        $response->assertOk();
    }

    // TESTS RESTAR UNIDADES AL INVENTARIO
    public function test_restar_unidades_a_nave_en_inventario(){
        $this->withoutExceptionHandling();

        $id = $this->id_swapi_valido_para_nave();

        $this->insertar_nave_en_inventario($id, 100);

        $this->assertCount(1, Naves::all());

        $response = $this->patch('api/naves/inventario/decrement',[
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
    public function test_restar_unidades_a_nave_en_inventario__error_nave_sin_registrar(){
        $this->withoutExceptionHandling();

        $id = $this->id_swapi_valido_para_nave();

        $response = $this->patch('api/naves/inventario/decrement',[
            'id_swapi' => $id,
            'unidades' => 50
        ]);

        $response->assertJsonStructure(["error", "errorMessage", "params"]);

        $response->assertJson([
            "error" => "Nave inexistente"
        ]);

        $response->assertOk();
    }

    // TESTS MODIFICAR UNIDADES AL INVENTARIO
    public function test_modificar_unidades_a_nave_en_inventario(){
        $this->withoutExceptionHandling();

        $id = $this->id_swapi_valido_para_nave();

        $this->insertar_nave_en_inventario($id, 100);

        $this->assertCount(1, Naves::all());

        $response = $this->patch('api/naves/inventario/modify',[
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
    public function test_modificar_unidades_a_nave_en_inventario__error_nave_sin_registrar(){
        $this->withoutExceptionHandling();

        $id = $this->id_swapi_valido_para_nave();

        $response = $this->patch('api/naves/inventario/modify',[
            'id_swapi' => $id,
            'unidades' => 200
        ]);

        $response->assertJsonStructure(["error", "errorMessage", "params"]);

        $response->assertJson([
            "error" => "Nave inexistente"
        ]);

        $response->assertOk();
    }

    // VALORES PARA PRUEBAS
    public function id_swapi_valido_para_nave(){
        return 15;
    }

    public function id_swapi_invalido_para_nave(){
        return 152;
    }

    public function insertar_nave_en_inventario($id, $unidades = 100){
        $response = $this->post('api/naves/inventario/new',[
            'id_swapi' => $id,
            'unidades' => $unidades
        ]);

        return $response;
    }
}
