# INSTALACIÓN

## Clonar repositorio
    git clone https://github.com/nicofracchia/lanacion.git
    
## Ingresar al proyecto
    cd lanacion
    
## Instalar dependencias de Composer
    composer install
    
## Crear las bases de datos: "lanacion" y "lanacion_testing"
    Character Set: utf8mb4 -- UTF-8 Unicode
    Collation: utf8mb4_general_ci
    
## Crear archivo .env
    rename .env.example .env
    
## Configurar los datos de conexión en .env
    Agregar la variable ** DB_TEST_DATABASE=lanacion_testing **
    
## Ejecutar migraciones para la base de datos
    php artisan migrate
    
## Modificar el archivo phpunit.xml para la base de datos de testing
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
