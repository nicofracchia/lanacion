# INSTALACIÓN

##### Clonar repositorio
    git clone https://github.com/nicofracchia/lanacion.git
    
##### Ingresar al proyecto
    cd lanacion
    
##### Instalar dependencias de Composer
    composer install
    
##### Crear las bases de datos: "lanacion" y "lanacion_testing"
    Character Set: utf8mb4 -- UTF-8 Unicode
    Collation: utf8mb4_general_ci
    
##### Crear archivo .env
    rename .env.example .env
    
##### Configurar los datos de conexión en .env
    Agregar la variable DB_TEST_DATABASE=lanacion_testing
    
##### Ejecutar migraciones para la base de datos
    php artisan migrate
    
##### Modificar el archivo phpunit.xml para la base de datos de testing
    <?xml version="1.0" encoding="UTF-8"?>
    <phpunit ... >
        <testsuites>
            ...
        </testsuites>
        <coverage processUncoveredFiles="true">
            ...
        </coverage>
        <php>
            ...
            <server name="DB_CONNECTION" value="mysql_testing"/>
            <server name="DB_DATABASE" value=":memory:"/>
        </php>
    </phpunit>


# DOCUMENTACIÓN

## Índice

<details>
<summary>
    <strong> Naves </strong>
</summary>

<ul>
<li><a href="#obtener-todas-las-naves-de-swapi"> Obtener todas las naves de SWAPI</a></li>
<li><a href="#obtener-detalle-de-una-nave-en-swapi"> Obtener detalle de una nave en SWAPI</a></li>
<li><a href="#obtener-todas-las-naves-registradas-en-el-inventario"> Obtener todas las naves registradas en el inventario</a></li>
<li><a href="#agregar-nave-al-inventario"> Agregar nave al inventario</a></li>
<li><a href="http://algo.com"> Incrementar en X unidades el numero de una nave específica</a></li>
<li><a href="http://algo.com"> Disminuir en X unidades el numero de una nave específica</a></li>
<li><a href="http://algo.com"> Establecer el total de unidades de una nave específica</a></li>
<li><a href="http://algo.com"> Buscar naves en el inventario</a></li>
</ul>
    
</details>

<details>
<summary>
    <strong> Vehículos </strong>
</summary>

<ul>
<li><a href="http://algo.com"> Obtener todos los vehículos de SWAPI</a></li>
<li><a href="http://algo.com"> Obtener detalle de un vehículo en SWAPI</a></li>
<li><a href="http://algo.com"> Obtener todos los vehículos registradas en el inventario</a></li>
<li><a href="http://algo.com"> Agregar vehículos al inventario</a></li>
<li><a href="http://algo.com"> Incrementar en X unidades el numero de un vehículos específico</a></li>
<li><a href="http://algo.com"> Disminuir en X unidades el numero de un vehículos específico</a></li>
<li><a href="http://algo.com"> Establecer el total de unidades de un vehículos específico</a></li>
<li><a href="http://algo.com"> Buscar vehículos en el inventario</a></li>
</ul>
    
</details>

<details>
<summary>
    <strong> Testeo para naves </strong>
</summary>

<ul>
<li><a href="http://algo.com"> test_status_ruta_listado_completo_de_naves_desde_SWAPI</a></li>
<li><a href="http://algo.com"> test_status_ruta_detalle_completo_de_naves_desde_SWAPI</a></li>
<li><a href="http://algo.com"> test_status_ruta_listado_completo_de_naves_en_el_inventario</a></li>
<li><a href="http://algo.com"> test_status_ruta_listado_completo_de_naves_en_el_inventario_busqueda</a></li>
<li><a href="http://algo.com"> test_get_naves_by_id_SWAPI</a></li>
<li><a href="http://algo.com"> test_get_naves_by_id_SWAPI__error_id_nave_inexistente</a></li>
<li><a href="http://algo.com"> test_buscar_naves_en_inventario_por_nombre_modelo_fabricante</a></li>
<li><a href="http://algo.com"> test_buscar_naves_en_inventario_por_nombre_modelo_fabricante__error_sin_resultados</a></li>
<li><a href="http://algo.com"> test_agregar_nueva_nave_al_inventario</a></li>
<li><a href="http://algo.com"> test_agregar_nueva_nave_al_inventario__error_no_existe_en_SWAPI</a></li>
<li><a href="http://algo.com"> test_agregar_nueva_nave_al_inventario__error_ya_existe_en_el_inventario</a></li>
<li><a href="http://algo.com"> test_agregar_unidades_a_nave_en_inventario</a></li>
<li><a href="http://algo.com"> test_agregar_unidades_a_nave_en_inventario__error_nave_sin_registrar</a></li>
<li><a href="http://algo.com"> test_restar_unidades_a_nave_en_inventario</a></li>
<li><a href="http://algo.com"> test_restar_unidades_a_nave_en_inventario__error_nave_sin_registrar</a></li>
<li><a href="http://algo.com"> test_modificar_unidades_a_nave_en_inventario</a></li>
<li><a href="http://algo.com"> test_modificar_unidades_a_nave_en_inventario__error_nave_sin_registrar</a></li>
</ul>
    
</details>

## Naves

### Obtener todas las naves de SWAPI
###### Ruta: /api/naves/ 
###### Method: GET
<p>Devuelve un array con los datos basicos de todas las naves en SWAPI.</p>

```
[
    {
        "id": "2",
        "nombre": "CR90 corvette",
        "modelo": "CR90 corvette",
        "fabricante": "Corellian Engineering Corporation"
    },
    {
        "id": "3",
        "nombre": "Star Destroyer",
        "modelo": "Imperial I-class Star Destroyer",
        "fabricante": "Kuat Drive Yards"
    },
    ...
]
```


### Obtener detalle de una nave en SWAPI
###### Ruta: /api/naves/{id}
###### Method: GET
<p>Devuelve un objeto con el detalle completo de la nave SWAPI.</p>

```
Ejemplo: /api/naves/12

{
    "name": "X-wing",
    "model": "T-65 X-wing",
    "manufacturer": "Incom Corporation",
    "cost_in_credits": "149999",
    "length": "12.5",
    "max_atmosphering_speed": "1050",
    "crew": "1",
    "passengers": "0",
    "cargo_capacity": "110",
    "consumables": "1 week",
    "hyperdrive_rating": "1.0",
    "MGLT": "100",
    "starship_class": "Starfighter",
    "pilots": [
        "http://swapi.dev/api/people/1/",
        "http://swapi.dev/api/people/9/",
        "http://swapi.dev/api/people/18/",
        "http://swapi.dev/api/people/19/"
    ],
    "films": [
        "http://swapi.dev/api/films/1/",
        "http://swapi.dev/api/films/2/",
        "http://swapi.dev/api/films/3/"
    ],
    "created": "2014-12-12T11:19:05.340000Z",
    "edited": "2014-12-20T21:23:49.886000Z",
    "url": "http://swapi.dev/api/starships/12/"
}
```


### Obtener todas las naves registradas en el inventario
###### Ruta: /api/naves/inventario
###### Method: GET
<p>Devuelve un array con las unidades y otros datos básicos de las naves registradas en el inventario.</p>

```
[
    {
        "id": 1,
        "id_swapi": 40,
        "nombre": "Naboo Royal Starship",
        "modelo": "J-type 327 Nubian royal starship",
        "fabricante": "Theed Palace Space Vessel Engineering Corps, Nubia Star Drives",
        "unidades": 150,
        "created_at": "2021-03-05 18:48:48",
        "updated_at": null
    },
    ...
]
```


### Agregar nave al inventario
###### Ruta: /api/naves/inventario/new
###### Method: POST
<p>Crea la nave en el inventario y devuelve un objeto con los datos basicos de la nave ingresada</p>

```
Request:
{
    "id_swapi": entero|requerido,
    "unidades": entero|opcional
}

Return OK (ejemplo):
{
    "id_swapi": 12,
    "nombre": "X-wing",
    "modelo": "T-65 X-wing",
    "fabricante": "Incom Corporation",
    "unidades": 150
}

Return ERROR (ejemplo):
{
    "error": "Nave existente",
    "errorMessage": "La nave ya se encuentra en el inventario, puede sumar, restar o modificar las unidades.",
    "params": {
        "id": 12,
        "unidades": 150
    }
}
```
