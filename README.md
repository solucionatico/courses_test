# COURSES TEST

Presentación de la prueba de conocimientos en PHP

## Instalación

```sh
git clone git@github.com:solucionatico/courses_test.git
cd courses_test
composer install
```

### Configuración
Edite el archivo `/config/database.php` para agregar la información de su base de datos.

### Importación
Cree la base de datos en su entorno local y ejecute el siguiente comando
```sh
php main.php install
```

## Uso
```sh
php main.php search <término>
```

`término` es el texto que se utilizará para encontrar Clases y Exámenes en la base de datos (según su nombre). La búsqueda se realizará por los tres primeras letras del `término`.
