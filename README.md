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

### Índice

<details>
<summary>
    <strong> Naves </strong>
</summary>

<ul>
<li><a href="#obtener-todas-las-naves-de-swapi"> Obtener todas las naves de SWAPI</a></li>
<li><a href="http://algo.com"> Obtener detalle de una nave en SWAPI</a></li>
<li><a href="http://algo.com"> Obtener todas las naves registradas en el inventario</a></li>
<li><a href="http://algo.com"> Agregar nave al inventario</a></li>
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

### Naves
##### Obtener todas las naves de SWAPI
###### Ruta: /api/naves/ 
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
