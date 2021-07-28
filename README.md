# DOCUMENTATION

## Index

<details>
<summary>
    <strong> Installation </strong>
</summary>

<ul>
<li><a href="#clonar-repositorio"> Clone the repository</a></li>
<li><a href="#ingresar-al-proyecto"> Get into the project</a></li>
<li><a href="#instalar-dependencias-de-composer"> Install Composer dependencies</a></li>
<li><a href="#crear-las-bases-de-datos-lanacion-y-lanacion_testing"> Create the databases: "lanacion" and "lanacion_testing"</a></li>
<li><a href="#crear-archivo-env"> Create the file .env</a></li>
<li><a href="#configurar-los-datos-de-conexión-en-env"> Configure connection data on the .env file</a></li>
<li><a href="#ejecutar-migraciones-para-la-base-de-datos"> Execute database migrations</a></li>
<li><a href="#modificar-el-archivo-phpunitxml-para-la-base-de-datos-de-testing"> Edit the file phpunit.xml for the testing database</a></li>
</ul>
    
</details>

<details>
<summary>
    <strong> Ships </strong>
</summary>

<ul>
<li><a href="#obtener-todas-las-naves-de-swapi"> Get all ships from SWAPI</a></li>
<li><a href="#obtener-detalle-de-una-nave-en-swapi"> Get details for one sihp from SWAPI</a></li>
<li><a href="#obtener-todas-las-naves-registradas-en-el-inventario"> Get all registered ships at the inventory</a></li>
<li><a href="#agregar-nave-al-inventario"> Add ship to the inventory</a></li>
<li><a href="#incrementar-en-x-unidades-el-total-de-una-nave-específica"> Increase the total of a specific ship by X units </a></li>
<li><a href="#disminuir-en-x-unidades-el-numero-de-una-nave-específica"> Decrease the total of a specific ship by X units</a></li>
<li><a href="#establecer-el-total-de-unidades-de-una-nave-específica"> Set the total units of a specific ship</a></li>
<li><a href="#buscar-naves-en-el-inventario"> Search ships in inventory</a></li>
</ul>
    
</details>

<details>
<summary>
    <strong> Vehícles </strong>
</summary>

<ul>
<li><a href="#obtener-todos-los-vehículos-de-swapi"> Get all vehicles from SWAPI</a></li>
<li><a href="#obtener-detalle-de-un-vehículo-en-swapi"> Get details for one vehicle from SWAPI</a></li>
<li><a href="#obtener-todos-los-vehículos-registrados-en-el-inventario"> Get all registered vehicles at the inventory</a></li>
<li><a href="#agregar-vehículo-al-inventario"> Add vehicle to the inventory</a></li>
<li><a href="#incrementar-en-x-unidades-el-total-de-un-vehículo-específico"> Increase the total of a specific vehicle by X units</a></li>
<li><a href="#disminuir-en-x-unidades-el-numero-de-un-vehículo-específico"> Decrease the total of a specific vehicle by X units</a></li>
<li><a href="#establecer-el-total-de-unidades-de-un-vehículo-específico"> Set the total units of a specific vehicle</a></li>
<li><a href="#buscar-vehículos-en-el-inventario"> Search vehicles in inventory</a></li>
</ul>
    
</details>

<details>
<summary>
    <strong> Testing ships </strong>
</summary>

<ul>
<li><a href="#test_status_ruta_listado_completo_de_naves_desde_swapi"> test_status_ruta_listado_completo_de_naves_desde_SWAPI</a></li>
<li><a href="#test_status_ruta_detalle_completo_de_naves_desde_swapi"> test_status_ruta_detalle_completo_de_naves_desde_SWAPI</a></li>
<li><a href="#test_status_ruta_listado_completo_de_naves_en_el_inventario"> test_status_ruta_listado_completo_de_naves_en_el_inventario</a></li>
<li><a href="#test_status_ruta_listado_completo_de_naves_en_el_inventario_busqueda"> test_status_ruta_listado_completo_de_naves_en_el_inventario_busqueda</a></li>
<li><a href="#test_get_naves_by_id_swapi"> test_get_naves_by_id_SWAPI</a></li>
<li><a href="#test_get_naves_by_id_swapi__error_id_nave_inexistente"> test_get_naves_by_id_SWAPI__error_id_nave_inexistente</a></li>
<li><a href="#test_buscar_naves_en_inventario_por_nombre_modelo_fabricante"> test_buscar_naves_en_inventario_por_nombre_modelo_fabricante</a></li>
<li><a href="#test_buscar_naves_en_inventario_por_nombre_modelo_fabricante__error_sin_resultados"> test_buscar_naves_en_inventario_por_nombre_modelo_fabricante__error_sin_resultados</a></li>
<li><a href="#test_agregar_nueva_nave_al_inventario"> test_agregar_nueva_nave_al_inventario</a></li>
<li><a href="#test_agregar_nueva_nave_al_inventario__error_no_existe_en_swapi"> test_agregar_nueva_nave_al_inventario__error_no_existe_en_SWAPI</a></li>
<li><a href="#test_agregar_nueva_nave_al_inventario__error_ya_existe_en_el_inventario"> test_agregar_nueva_nave_al_inventario__error_ya_existe_en_el_inventario</a></li>
<li><a href="#test_agregar_unidades_a_nave_en_inventario"> test_agregar_unidades_a_nave_en_inventario</a></li>
<li><a href="#test_agregar_unidades_a_nave_en_inventario__error_nave_sin_registrar"> test_agregar_unidades_a_nave_en_inventario__error_nave_sin_registrar</a></li>
<li><a href="#test_restar_unidades_a_nave_en_inventario"> test_restar_unidades_a_nave_en_inventario</a></li>
<li><a href="#test_restar_unidades_a_nave_en_inventario__error_nave_sin_registrar"> test_restar_unidades_a_nave_en_inventario__error_nave_sin_registrar</a></li>
<li><a href="#test_modificar_unidades_a_nave_en_inventario"> test_modificar_unidades_a_nave_en_inventario</a></li>
<li><a href="#test_modificar_unidades_a_nave_en_inventario__error_nave_sin_registrar"> test_modificar_unidades_a_nave_en_inventario__error_nave_sin_registrar</a></li>
</ul>
    
</details>

<details>
<summary>
    <strong> Testing vehicles </strong>
</summary>

<ul>
<li><a href="#test_status_ruta_listado_completo_de_vehiculos_desde_SWAPI">test_status_ruta_listado_completo_de_vehiculos_desde_SWAPI</a></li>
<li><a href="#test_status_ruta_detalle_completo_de_vehiculos_desde_SWAPI">test_status_ruta_detalle_completo_de_vehiculos_desde_SWAPI</a></li>
<li><a href="#test_status_ruta_listado_completo_de_vehiculos_en_el_inventario">test_status_ruta_listado_completo_de_vehiculos_en_el_inventario</a></li>
<li><a href="#test_status_ruta_listado_completo_de_vehiculos_en_el_inventario_busqueda">test_status_ruta_listado_completo_de_vehiculos_en_el_inventario_busqueda</a></li>
<li><a href="#test_get_vehiculos_by_id_SWAPI">test_get_vehiculos_by_id_SWAPI</a></li>
<li><a href="#test_get_vehiculos_by_id_SWAPI__error_id_vehiculo_inexistente">test_get_vehiculos_by_id_SWAPI__error_id_vehiculo_inexistente</a></li>
<li><a href="#test_buscar_vehiculos_en_inventario_por_nombre_modelo_fabricante">test_buscar_vehiculos_en_inventario_por_nombre_modelo_fabricante</a></li>
<li><a href="#test_buscar_vehiculos_en_inventario_por_nombre_modelo_fabricante__error_sin_resultados">test_buscar_vehiculos_en_inventario_por_nombre_modelo_fabricante__error_sin_resultados</a></li>
<li><a href="#test_agregar_nuevo_vehiculo_al_inventario">test_agregar_nuevo_vehiculo_al_inventario</a></li>
<li><a href="#test_agregar_nuevo_vehiculo_al_inventario__error_no_existe_en_SWAPI">test_agregar_nuevo_vehiculo_al_inventario__error_no_existe_en_SWAPI</a></li>
<li><a href="#test_agregar_nuevo_vehiculo_al_inventario__error_ya_existe_en_el_inventario">test_agregar_nuevo_vehiculo_al_inventario__error_ya_existe_en_el_inventario</a></li>
<li><a href="#test_agregar_unidades_a_vehiculo_en_inventario">test_agregar_unidades_a_vehiculo_en_inventario</a></li>
<li><a href="#test_agregar_unidades_a_vehiculo_en_inventario__error_vehiculo_sin_registrar">test_agregar_unidades_a_vehiculo_en_inventario__error_vehiculo_sin_registrar</a></li>
<li><a href="#test_restar_unidades_a_vehiculo_en_inventario">test_restar_unidades_a_vehiculo_en_inventario</a></li>
<li><a href="#test_restar_unidades_a_vehiculo_en_inventario__error_vehiculo_sin_registrar">test_restar_unidades_a_vehiculo_en_inventario__error_vehiculo_sin_registrar</a></li>
<li><a href="#test_modificar_unidades_a_vehiculo_en_inventario">test_modificar_unidades_a_vehiculo_en_inventario</a></li>
<li><a href="#test_modificar_unidades_a_vehiculo_en_inventario__error_vehiculo_sin_registrar">test_modificar_unidades_a_vehiculo_en_inventario__error_vehiculo_sin_registrar</a></li>
</ul>
    
</details>

## Installation

##### Clone the repository
    git clone https://github.com/nicofracchia/lanacion.git
    
##### Enter the project
    cd lanacion
    
##### Install Composer dependencies
    composer install
    
##### Create the databases: "lanacion" and "lanacion_testing"
    Character Set: utf8mb4 -- UTF-8 Unicode
    Collation: utf8mb4_general_ci
    
##### Create the file .env
    rename .env.example .env
    
##### Configure connection data on the .env file
    Database connection data:
    DB_CONNECTION=mysql
    DB_HOST=XXXXX
    DB_PORT=XXXXX
    DB_DATABASE=lanacion
    DB_USERNAME=XXXXX
    DB_PASSWORD=XXXXX
    
    Database connection data for unit testing:
    DB_TEST_CONNECTION=mysql_testing
    DB_TEST_HOST=XXXXX
    DB_TEST_PORT=XXXXX
    DB_TEST_TEST_DATABASE=lanacion_testing
    DB_TEST_USERNAME=XXXXX
    DB_TEST_PASSWORD=XXXXX
    
##### Execute database migrations
    php artisan migrate
    
##### Edit the file phpunit.xml for the testing database
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

## Ships

### Get all ships from SWAPI
###### Route: /api/naves/ 
###### Method: GET
<p>Returns an array with the basic data of all ships in SWAPI.</p>
Return:

```
[
    {
        "id": "2",
        "name": "CR90 corvette",
        "model": "CR90 corvette",
        "manufacturer": "Corellian Engineering Corporation"
    },
    {
        "id": "3",
        "name": "Star Destroyer",
        "model": "Imperial I-class Star Destroyer",
        "manufacturer": "Kuat Drive Yards"
    },
    ...
]
```


### Get details for one sihp from SWAPI
###### Route: /api/naves/{id}
###### Method: GET
<p>Returns an object with the complete detail of the SWAPI ship.</p>
Return (example: /api/naves/12):

```
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


### Get all registered ships at the inventory
###### Route: /api/naves/inventario
###### Method: GET
<p>Returns an array with the units and other basic data of the ships registered in the inventory.</p>
Return:

```
[
    {
        "id": 1,
        "id_swapi": 40,
        "name": "Naboo Royal Starship",
        "model": "J-type 327 Nubian royal starship",
        "manufacturer": "Theed Palace Space Vessel Engineering Corps, Nubia Star Drives",
        "units": 150,
        "created_at": "2021-03-05 18:48:48",
        "updated_at": null
    },
    ...
]
```


### Add ship to the inventory
###### Route: /api/naves/inventario/new
###### Method: POST
<p>Creates the ship in the inventory and return an object with the basic data of the entered ship.</p>
Request:

```
{
    "id_swapi": integer|required,
    "unidades": integer|optional
}
```

Return OK (Example):

```
{
    "id_swapi": 12,
    "name": "X-wing",
    "model": "T-65 X-wing",
    "manufacturer": "Incom Corporation",
    "units": 150
}
```

Return ERROR (Example):

```
{
    "error": "Existing ship",
    "errorMessage": "The ship is already in the inventory, you can add, subtract or modify the units.",
    "params": {
        "id": 12,
        "units": 150
    }
}
```


### Increase the total of a specific ship by X units
###### Route: /api/naves/inventario/increment
###### Method: PATCH
<p>Add X units in the total amount of the registered ship and return one object with the basic data of that ship and the sum added.</p>
Request:

```
{
    "id_swapi": integer|required,
    "unidades": integer|required
}
```

Return OK (Example):

```
{
    "id_swapi": 40,
    "name": "Naboo Royal Starship",
    "model": "J-type 327 Nubian royal starship",
    "manufacturer": "Theed Palace Space Vessel Engineering Corps, Nubia Star Drives",
    "units": 200,
    "increment": 50
}
```


### Decrease the total of a specific ship by X units
###### route: /api/naves/inventario/decrement
###### Method: PATCH
<p>Subtract X units from the total amount of the registered ship and return one object with the basic data of that ship and the amount subtracted.</p>
Request:

```
{
    "id_swapi": integer|required,
    "unidades": integer|required
}
```

Return OK (Example):

```
{
    "id_swapi": 40,
    "name": "Naboo Royal Starship",
    "model": "J-type 327 Nubian royal starship",
    "manufacturer": "Theed Palace Space Vessel Engineering Corps, Nubia Star Drives",
    "units": 190,
    "decrement": 10
}
```


### Set the total units of a specific ship
###### Route: /api/naves/inventario/modify
###### Method: PATCH
<p>Modifies the total amount of units of the registered ship and returns one object with the basic data of that ship and the previous quantity.</p>
Request:

```
{
    "id_swapi": integer|required,
    "unidades": integer|required
}
```

Return OK (Example):

```
{
    "id_swapi": 40,
    "name": "Naboo Royal Starship",
    "model": "J-type 327 Nubian royal starship",
    "manufacturer": "Theed Palace Space Vessel Engineering Corps, Nubia Star Drives",
    "units": 250,
    "previousAmount": 190
}
```


### Search ships in inventory
###### Route: /api/naves/inventario/{busqueda}
###### Method: GET
<p>It searches for the ship in the inventory by the fields "name", "model", "manufacturer" and returns an array with the matching ships.</p>

Return OK (Example):

```
[
    {
        "id_swapi": 40,
        "name": "Naboo Royal Starship",
        "model": "J-type 327 Nubian royal starship",
        "manufacturer": "Theed Palace Space Vessel Engineering Corps, Nubia Star Drives",
        "units": 250
    },
    {
        "id_swapi": 9,
        "name": "Death Star",
        "model": "DS-1 Orbital Battle Station",
        "manufacturer": "Imperial Department of Military Research, Sienar Fleet Systems",
        "units": 150
    },
    {
        "id_swapi": 15,
        "name": "Executor",
        "model": "Executor-class star dreadnought",
        "manufacturer": "Kuat Drive Yards, Fondor Shipyards",
        "units": 150
    },
    ...
]
```

Return ERROR (Example):

```
{
    "error": "no results",
    "errorMessage": "No ships found for this search.",
    "params": {
        "busqueda": "xxx"
    }
}
```

## Vehicles

### Get all vehicles from SWAPI
###### Route: /api/vehiculos/ 
###### Method: GET
<p>Returns an array with the basic data of all the vehicles in SWAPI.</p>
Return:

```
[
    {
        "id": "4",
        "name": "Sand Crawler",
        "model": "Digger Crawler",
        "manufacturer": "Corellia Mining Corporation"
    },
    {
        "id": "6",
        "name": "T-16 skyhopper",
        "model": "T-16 skyhopper",
        "manufacturer": "Incom Corporation"
    },
    ...
]
```


### Get details for one vehicle from SWAPI
###### route: /api/vehículos/{id}
###### Method: GET
<p>Returns an object with the complete SWAPI vehicle detail.</p>
Return (Example: /api/vehiculos/4):

```
{
    "name": "Sand Crawler",
    "model": "Digger Crawler",
    "manufacturer": "Corellia Mining Corporation",
    "cost_in_credits": "150000",
    "length": "36.8 ",
    "max_atmosphering_speed": "30",
    "crew": "46",
    "passengers": "30",
    "cargo_capacity": "50000",
    "consumables": "2 months",
    "vehicle_class": "wheeled",
    "pilots": [],
    "films": [
        "http://swapi.dev/api/films/1/",
        "http://swapi.dev/api/films/5/"
    ],
    "created": "2014-12-10T15:36:25.724000Z",
    "edited": "2014-12-20T21:30:21.661000Z",
    "url": "http://swapi.dev/api/vehicles/4/"
}
```


### Get all registered vehicles at the inventory
###### Route: /api/vehiculos/inventario
###### Method: GET
<p>Returns an array with the units and other basic data of the vehicles registered in the inventory.</p>
Return:

```
[
    {
        "id": 1,
        "id_swapi": 4,
        "name": "Sand Crawler",
        "model": "Digger Crawler",
        "manufacturer": "Corellia Mining Corporation",
        "units": 250,
        "created_at": "2021-03-06 21:15:16",
        "updated_at": null
    },
    ...
]
```


### Add vehicle to the inventory
###### Route: /api/vehiculos/inventario/new
###### Method: POST
<p>Creates the vehicle in the inventory and returns an object with the basic data of the entered vehicle.</p>
Request:

```
{
    "id_swapi": integer|required,
    "unidades": integer|optional
}
```

Return OK (Example):

```
{
    "id_swapi": 20,
    "name": "Storm IV Twin-Pod cloud car",
    "model": "Storm IV Twin-Pod",
    "manufacturer": "Bespin Motors",
    "units": 100
}
```

Return ERROR (Example):

```
{
    "error": "Existing vehicle",
    "errorMessage": "The vehicle is already in the inventory, you can add, subtract or modify the units.",
    "params": {
        "id": 4,
        "units": 100
    }
}
```


### Increase the total of a specific vehicle by X units
###### Route: /api/vehiculos/inventario/increment
###### Method: PATCH
<p>It adds X units in the total amount of the registered vehicle and returns an object with the basic data of that vehicle and the summed amount.</p>
Request:

```
{
    "id_swapi": integer|required,
    "unidades": integer|required
}
```

Return OK (Ejemplo):

```
{
    "id_swapi": 20,
    "name": "Storm IV Twin-Pod cloud car",
    "model": "Storm IV Twin-Pod",
    "manufacturer": "Bespin Motors",
    "units": 200,
    "increment": 100
}
```


### Decrease the total of a specific vehicle by X units
###### Route: /api/vehiculos/inventario/decrement
###### Method: PATCH
<p>Subtract X units from the total amount of the registered vehicle and returns an object with the basic data of that vehicle and the subtracted quantity</p>
Request:

```
{
    "id_swapi": integer|required,
    "unidades": integer|required
}
```

Return OK (Example):

```
{
    "id_swapi": 20,
    "name": "Storm IV Twin-Pod cloud car",
    "model": "Storm IV Twin-Pod",
    "manufacturer": "Bespin Motors",
    "units": 150,
    "decrement": 50
}
```


### Set the total units of a specific vehicle
###### Route: /api/vehiculo/inventario/modify
###### Method: PATCH
<p>Edits the total number of units of the registered vehicle and returns an object with the basic data of that vehicle and the previous quantity.</p>
Request:

```
{
    "id_swapi": integer|required,
    "unidades": integer|required
}
```

Return OK (Ejemplo):

```
{
    "id_swapi": 20,
    "name": "Storm IV Twin-Pod cloud car",
    "model": "Storm IV Twin-Pod",
    "manufacturer": "Bespin Motors",
    "units": 100,
    "previousAmount": 150
}
```


### Search vehicles in inventory
###### Route: /api/vehiculos/inventario/{busqueda}
###### Method: GET
<p>Searches for the vehicle in the inventory by the fields "name", "model", "manufacturer" and returns an array with the matching vehicles.</p>

Return OK (Example):

```
[
    {
        "id_swapi": 4,
        "name": "Sand Crawler",
        "model": "Digger Crawler",
        "manufacturer": "Corellia Mining Corporation",
        "units": 250
    },
    ...
]
```

Return ERROR (Ejemplo):

```
{
    "error": "No results",
    "errorMessage": "No vehicles were found for this search.",
    "params": {
        "busqueda": "xxx"
    }
}
```

## Testing naves

### test_status_ruta_listado_completo_de_naves_desde_SWAPI
###### Comando: vendor\bin\phpunit --filter test_status_ruta_listado_completo_de_naves_desde_SWAPI
### test_status_ruta_detalle_completo_de_naves_desde_SWAPI
###### Comando: vendor\bin\phpunit --filter test_status_ruta_detalle_completo_de_naves_desde_SWAPI
### test_status_ruta_listado_completo_de_naves_en_el_inventario
###### Comando: vendor\bin\phpunit --filter test_status_ruta_listado_completo_de_naves_en_el_inventario
### test_status_ruta_listado_completo_de_naves_en_el_inventario_busqueda
###### Comando: vendor\bin\phpunit --filter test_status_ruta_listado_completo_de_naves_en_el_inventario_busqueda
### test_get_naves_by_id_SWAPI
###### Comando: vendor\bin\phpunit --filter test_get_naves_by_id_SWAPI
### test_get_naves_by_id_SWAPI__error_id_nave_inexistente
###### Comando: vendor\bin\phpunit --filter test_get_naves_by_id_SWAPI__error_id_nave_inexistente
### test_buscar_naves_en_inventario_por_nombre_modelo_fabricante
###### Comando: vendor\bin\phpunit --filter test_buscar_naves_en_inventario_por_nombre_modelo_fabricante
### test_buscar_naves_en_inventario_por_nombre_modelo_fabricante__error_sin_resultados
###### Comando: vendor\bin\phpunit --filter test_buscar_naves_en_inventario_por_nombre_modelo_fabricante__error_sin_resultados
### test_agregar_nueva_nave_al_inventario
###### Comando: vendor\bin\phpunit --filter test_agregar_nueva_nave_al_inventario
### test_agregar_nueva_nave_al_inventario__error_no_existe_en_SWAPI
###### Comando: vendor\bin\phpunit --filter test_agregar_nueva_nave_al_inventario__error_no_existe_en_SWAPI
### test_agregar_nueva_nave_al_inventario__error_ya_existe_en_el_inventario
###### Comando: vendor\bin\phpunit --filter test_agregar_nueva_nave_al_inventario__error_ya_existe_en_el_inventario
### test_agregar_unidades_a_nave_en_inventario
###### Comando: vendor\bin\phpunit --filter test_agregar_unidades_a_nave_en_inventario
### test_agregar_unidades_a_nave_en_inventario__error_nave_sin_registrar
###### Comando: vendor\bin\phpunit --filter test_agregar_unidades_a_nave_en_inventario__error_nave_sin_registrar
### test_restar_unidades_a_nave_en_inventario
###### Comando: vendor\bin\phpunit --filter test_restar_unidades_a_nave_en_inventario
### test_restar_unidades_a_nave_en_inventario__error_nave_sin_registrar
###### Comando: vendor\bin\phpunit --filter test_restar_unidades_a_nave_en_inventario__error_nave_sin_registrar
### test_modificar_unidades_a_nave_en_inventario
###### Comando: vendor\bin\phpunit --filter test_modificar_unidades_a_nave_en_inventario
### test_modificar_unidades_a_nave_en_inventario__error_nave_sin_registrar
###### Comando: vendor\bin\phpunit --filter test_modificar_unidades_a_nave_en_inventario__error_nave_sin_registrar

## Testing vehículos

### test_status_ruta_listado_completo_de_vehiculos_desde_SWAPI
###### Comando: vendor\bin\phpunit --filter test_status_ruta_listado_completo_de_vehiculos_desde_SWAPI
### test_status_ruta_detalle_completo_de_vehiculos_desde_SWAPI
###### Comando: vendor\bin\phpunit --filter test_status_ruta_detalle_completo_de_vehiculos_desde_SWAPI
### test_status_ruta_listado_completo_de_vehiculos_en_el_inventario
###### Comando: vendor\bin\phpunit --filter test_status_ruta_listado_completo_de_vehiculos_en_el_inventario
### test_status_ruta_listado_completo_de_vehiculos_en_el_inventario_busqueda
###### Comando: vendor\bin\phpunit --filter test_status_ruta_listado_completo_de_vehiculos_en_el_inventario_busqueda
### test_get_vehiculos_by_id_SWAPI
###### Comando: vendor\bin\phpunit --filter test_get_vehiculos_by_id_SWAPI
### test_get_vehiculos_by_id_SWAPI__error_id_vehiculo_inexistente
###### Comando: vendor\bin\phpunit --filter test_get_vehiculos_by_id_SWAPI__error_id_vehiculo_inexistente
### test_buscar_vehiculos_en_inventario_por_nombre_modelo_fabricante
###### Comando: vendor\bin\phpunit --filter test_buscar_vehiculos_en_inventario_por_nombre_modelo_fabricante
### test_buscar_vehiculos_en_inventario_por_nombre_modelo_fabricante__error_sin_resultados
###### Comando: vendor\bin\phpunit --filter test_buscar_vehiculos_en_inventario_por_nombre_modelo_fabricante__error_sin_resultados
### test_agregar_nuevo_vehiculo_al_inventario
###### Comando: vendor\bin\phpunit --filter test_agregar_nuevo_vehiculo_al_inventario
### test_agregar_nuevo_vehiculo_al_inventario__error_no_existe_en_SWAPI
###### Comando: vendor\bin\phpunit --filter test_agregar_nuevo_vehiculo_al_inventario__error_no_existe_en_SWAPI
### test_agregar_nuevo_vehiculo_al_inventario__error_ya_existe_en_el_inventario
###### Comando: vendor\bin\phpunit --filter test_agregar_nuevo_vehiculo_al_inventario__error_ya_existe_en_el_inventario
### test_agregar_unidades_a_vehiculo_en_inventario
###### Comando: vendor\bin\phpunit --filter test_agregar_unidades_a_vehiculo_en_inventario
### test_agregar_unidades_a_vehiculo_en_inventario__error_vehiculo_sin_registrar
###### Comando: vendor\bin\phpunit --filter test_agregar_unidades_a_vehiculo_en_inventario__error_vehiculo_sin_registrar
### test_restar_unidades_a_vehiculo_en_inventario
###### Comando: vendor\bin\phpunit --filter test_restar_unidades_a_vehiculo_en_inventario
### test_restar_unidades_a_vehiculo_en_inventario__error_vehiculo_sin_registrar
###### Comando: vendor\bin\phpunit --filter test_restar_unidades_a_vehiculo_en_inventario__error_vehiculo_sin_registrar
### test_modificar_unidades_a_vehiculo_en_inventario
###### Comando: vendor\bin\phpunit --filter test_modificar_unidades_a_vehiculo_en_inventario
### test_modificar_unidades_a_vehiculo_en_inventario__error_vehiculo_sin_registrar
###### Comando: vendor\bin\phpunit --filter test_modificar_unidades_a_vehiculo_en_inventario__error_vehiculo_sin_registrar
