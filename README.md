# DOCUMENTACIÓN

## Índice

<details>
<summary>
    <strong> Instalación </strong>
</summary>

<ul>
<li><a href="#clonar-repositorio"> Clonar repositorio</a></li>
<li><a href="#ingresar-al-proyecto"> Ingresar al proyecto</a></li>
<li><a href="#instalar-dependencias-de-composer"> Instalar dependencias de Composer</a></li>
<li><a href="#crear-las-bases-de-datos-lanacion-y-lanacion_testing"> Crear las bases de datos: "lanacion" y "lanacion_testing"</a></li>
<li><a href="#crear-archivo-env"> Crear archivo .env</a></li>
<li><a href="#configurar-los-datos-de-conexión-en-env"> Configurar los datos de conexión en .env</a></li>
<li><a href="#ejecutar-migraciones-para-la-base-de-datos"> Ejecutar migraciones para la base de datos</a></li>
<li><a href="#modificar-el-archivo-phpunitxml-para-la-base-de-datos-de-testing"> Modificar el archivo phpunit.xml para la base de datos de testing</a></li>
</ul>
    
</details>

<details>
<summary>
    <strong> Naves </strong>
</summary>

<ul>
<li><a href="#obtener-todas-las-naves-de-swapi"> Obtener todas las naves de SWAPI</a></li>
<li><a href="#obtener-detalle-de-una-nave-en-swapi"> Obtener detalle de una nave en SWAPI</a></li>
<li><a href="#obtener-todas-las-naves-registradas-en-el-inventario"> Obtener todas las naves registradas en el inventario</a></li>
<li><a href="#agregar-nave-al-inventario"> Agregar nave al inventario</a></li>
<li><a href="#incrementar-en-x-unidades-el-total-de-una-nave-específica"> Incrementar en X unidades el total de una nave específica</a></li>
<li><a href="#disminuir-en-x-unidades-el-numero-de-una-nave-específica"> Disminuir en X unidades el total de una nave específica</a></li>
<li><a href="#establecer-el-total-de-unidades-de-una-nave-específica"> Establecer el total de unidades de una nave específica</a></li>
<li><a href="#buscar-naves-en-el-inventario"> Buscar naves en el inventario</a></li>
</ul>
    
</details>

<details>
<summary>
    <strong> Vehículos </strong>
</summary>

<ul>
<li><a href="#obtener-todos-los-vehículos-de-swapi"> Obtener todos los vehículos de SWAPI</a></li>
<li><a href="#obtener-detalle-de-un-vehículo-en-swapi"> Obtener detalle de un vehículo en SWAPI</a></li>
<li><a href="#obtener-todos-los-vehículos-registrados-en-el-inventario"> Obtener todos los vehículos registrados en el inventario</a></li>
<li><a href="#agregar-vehículo-al-inventario"> Agregar vehículo al inventario</a></li>
<li><a href="#incrementar-en-x-unidades-el-total-de-un-vehículo-específico"> Incrementar en X unidades el total de un vehículo específico</a></li>
<li><a href="#disminuir-en-x-unidades-el-numero-de-un-vehículo-específico"> Disminuir en X unidades el numero de un vehículo específico</a></li>
<li><a href="#establecer-el-total-de-unidades-de-un-vehículo-específico"> Establecer el total de unidades de un vehículo específico</a></li>
<li><a href="#buscar-vehículos-en-el-inventario"> Buscar vehículos en el inventario</a></li>
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

## Instalación

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

## Naves

### Obtener todas las naves de SWAPI
###### Ruta: /api/naves/ 
###### Method: GET
<p>Devuelve un array con los datos basicos de todas las naves en SWAPI.</p>
Return:

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
Return (Ejemplo: /api/naves/12):

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


### Obtener todas las naves registradas en el inventario
###### Ruta: /api/naves/inventario
###### Method: GET
<p>Devuelve un array con las unidades y otros datos básicos de las naves registradas en el inventario.</p>
Return:

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
Request:

```
{
    "id_swapi": entero|requerido,
    "unidades": entero|opcional
}
```

Return OK (Ejemplo):

```
{
    "id_swapi": 12,
    "nombre": "X-wing",
    "modelo": "T-65 X-wing",
    "fabricante": "Incom Corporation",
    "unidades": 150
}
```

Return ERROR (Ejemplo):

```
{
    "error": "Nave existente",
    "errorMessage": "La nave ya se encuentra en el inventario, puede sumar, restar o modificar las unidades.",
    "params": {
        "id": 12,
        "unidades": 150
    }
}
```


### Incrementar en X unidades el total de una nave específica
###### Ruta: /api/naves/inventario/increment
###### Method: PATCH
<p>Suma X unidades en el total de la nave registrada y devuelve uno bjeto con los datos básicos de esa nave y la cantidad sumada</p>
Request:

```
{
    "id_swapi": entero|requerido,
    "unidades": entero|requerido
}
```

Return OK (Ejemplo):

```
{
    "id_swapi": 40,
    "nombre": "Naboo Royal Starship",
    "modelo": "J-type 327 Nubian royal starship",
    "fabricante": "Theed Palace Space Vessel Engineering Corps, Nubia Star Drives",
    "unidades": 200,
    "increment": 50
}
```


### Disminuir en X unidades el numero de una nave específica
###### Ruta: /api/naves/inventario/decrement
###### Method: PATCH
<p>Resta X unidades en el total de la nave registrada y devuelve uno bjeto con los datos básicos de esa nave y la cantidad restada</p>
Request:

```
{
    "id_swapi": entero|requerido,
    "unidades": entero|requerido
}
```

Return OK (Ejemplo):

```
{
    "id_swapi": 40,
    "nombre": "Naboo Royal Starship",
    "modelo": "J-type 327 Nubian royal starship",
    "fabricante": "Theed Palace Space Vessel Engineering Corps, Nubia Star Drives",
    "unidades": 190,
    "decrement": 10
}
```


### Establecer el total de unidades de una nave específica
###### Ruta: /api/naves/inventario/modify
###### Method: PATCH
<p>Modifica el total de unidades de la nave registrada y devuelve uno bjeto con los datos básicos de esa nave y la cantidad anterior</p>
Request:

```
{
    "id_swapi": entero|requerido,
    "unidades": entero|requerido
}
```

Return OK (Ejemplo):

```
{
    "id_swapi": 40,
    "nombre": "Naboo Royal Starship",
    "modelo": "J-type 327 Nubian royal starship",
    "fabricante": "Theed Palace Space Vessel Engineering Corps, Nubia Star Drives",
    "unidades": 250,
    "cantidadAnterior": 190
}
```


### Buscar naves en el inventario
###### Ruta: /api/naves/inventario/{busqueda}
###### Method: GET
<p>Busca la nave en el inventario por los campos "nombre", "modelo", "fabricante" y devuelve un array con las naves que coincidan.</p>

Return OK (Ejemplo):

```
[
    {
        "id_swapi": 40,
        "nombre": "Naboo Royal Starship",
        "modelo": "J-type 327 Nubian royal starship",
        "fabricante": "Theed Palace Space Vessel Engineering Corps, Nubia Star Drives",
        "unidades": 250
    },
    {
        "id_swapi": 9,
        "nombre": "Death Star",
        "modelo": "DS-1 Orbital Battle Station",
        "fabricante": "Imperial Department of Military Research, Sienar Fleet Systems",
        "unidades": 150
    },
    {
        "id_swapi": 15,
        "nombre": "Executor",
        "modelo": "Executor-class star dreadnought",
        "fabricante": "Kuat Drive Yards, Fondor Shipyards",
        "unidades": 150
    },
    ...
]
```

Return ERROR (Ejemplo):

```
{
    "error": "Sin resultados",
    "errorMessage": "No se encontraron naves para esa búsqueda.",
    "params": {
        "busqueda": "xxx"
    }
}
```

## Vehículos

### Obtener todos los vehículos de SWAPI
###### Ruta: /api/vehiculos/ 
###### Method: GET
<p>Devuelve un array con los datos básicos de todos los vehículos en SWAPI.</p>
Return:

```
[
    {
        "id": "4",
        "nombre": "Sand Crawler",
        "modelo": "Digger Crawler",
        "fabricante": "Corellia Mining Corporation"
    },
    {
        "id": "6",
        "nombre": "T-16 skyhopper",
        "modelo": "T-16 skyhopper",
        "fabricante": "Incom Corporation"
    },
    ...
]
```


### Obtener detalle de un vehículo en SWAPI
###### Ruta: /api/vehículos/{id}
###### Method: GET
<p>Devuelve un objeto con el detalle completo del vehículo SWAPI.</p>
Return (Ejemplo: /api/vehiculos/4):

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


### Obtener todos los vehículos registrados en el inventario
###### Ruta: /api/vehiculos/inventario
###### Method: GET
<p>Devuelve un array con las unidades y otros datos básicos de los vehículos registrados en el inventario.</p>
Return:

```
[
    {
        "id": 1,
        "id_swapi": 4,
        "nombre": "Sand Crawler",
        "modelo": "Digger Crawler",
        "fabricante": "Corellia Mining Corporation",
        "unidades": 250,
        "created_at": "2021-03-06 21:15:16",
        "updated_at": null
    },
    ...
]
```


### Agregar vehículo al inventario
###### Ruta: /api/vehiculos/inventario/new
###### Method: POST
<p>Crea el vehículo en el inventario y devuelve un objeto con los datos básicos del vehículo ingresado</p>
Request:

```
{
    "id_swapi": entero|requerido,
    "unidades": entero|opcional
}
```

Return OK (Ejemplo):

```
{
    "id_swapi": 20,
    "nombre": "Storm IV Twin-Pod cloud car",
    "modelo": "Storm IV Twin-Pod",
    "fabricante": "Bespin Motors",
    "unidades": 100
}
```

Return ERROR (Ejemplo):

```
{
    "error": "Vehículo existente",
    "errorMessage": "El vehículo ya se encuentra en el inventario, puede sumar, restar o modificar las unidades.",
    "params": {
        "id": 4,
        "unidades": 100
    }
}
```


### Incrementar en X unidades el total de un vehículo específico
###### Ruta: /api/vehiculos/inventario/increment
###### Method: PATCH
<p>Suma X unidades en el total del vehículo registrado y devuelve un objeto con los datos básicos de ese vehículo y la cantidad sumada</p>
Request:

```
{
    "id_swapi": entero|requerido,
    "unidades": entero|requerido
}
```

Return OK (Ejemplo):

```
{
    "id_swapi": 20,
    "nombre": "Storm IV Twin-Pod cloud car",
    "modelo": "Storm IV Twin-Pod",
    "fabricante": "Bespin Motors",
    "unidades": 200,
    "increment": 100
}
```


### Disminuir en X unidades el numero de un vehículo específico
###### Ruta: /api/vehiculos/inventario/decrement
###### Method: PATCH
<p>Resta X unidades en el total del vehículo registrado y devuelve un objeto con los datos básicos de ese vehículo y la cantidad restada</p>
Request:

```
{
    "id_swapi": entero|requerido,
    "unidades": entero|requerido
}
```

Return OK (Ejemplo):

```
{
    "id_swapi": 20,
    "nombre": "Storm IV Twin-Pod cloud car",
    "modelo": "Storm IV Twin-Pod",
    "fabricante": "Bespin Motors",
    "unidades": 150,
    "decrement": 50
}
```


### Establecer el total de unidades de un vehículo específico
###### Ruta: /api/vehiculo/inventario/modify
###### Method: PATCH
<p>Modifica el total de unidades del vehículo registrado y devuelve un objeto con los datos básicos de ese vehículo y la cantidad anterior</p>
Request:

```
{
    "id_swapi": entero|requerido,
    "unidades": entero|requerido
}
```

Return OK (Ejemplo):

```
{
    "id_swapi": 20,
    "nombre": "Storm IV Twin-Pod cloud car",
    "modelo": "Storm IV Twin-Pod",
    "fabricante": "Bespin Motors",
    "unidades": 100,
    "cantidadAnterior": 150
}
```


### Buscar vehículos en el inventario
###### Ruta: /api/vehiculos/inventario/{busqueda}
###### Method: GET
<p>Busca el vehículo en el inventario por los campos "nombre", "modelo", "fabricante" y devuelve un array con los vehículos que coincidan.</p>

Return OK (Ejemplo):

```
[
    {
        "id_swapi": 4,
        "nombre": "Sand Crawler",
        "modelo": "Digger Crawler",
        "fabricante": "Corellia Mining Corporation",
        "unidades": 250
    },
    ...
]
```

Return ERROR (Ejemplo):

```
{
    "error": "Sin resultados",
    "errorMessage": "No se encontraron vehículos para esa búsqueda.",
    "params": {
        "busqueda": "xxx"
    }
}
```
