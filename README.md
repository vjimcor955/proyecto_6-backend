<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Backend Laravel y MySQL - Music App

> [!WARNING]
> Esta documentación es para Linux, para hacerlo desde Windows debes instalar el WSL (Windows Subsystem for Linux) y configurar el Docker Desktop para que lo use.

Como ejecutar el proyecto en local tras clonar el repositorio:

## 1. Copiar el archivo .env.example en .env

```
cp .env.example .env
```

## 2. Ejecutar el siguiente comando

```
bash
docker run --rm \
-u "$(id -u):$(id -g)" \
-v "$(pwd):/var/www/html" \
-w /var/www/html \
laravelsail/php83-composer:latest \
composer install --ignore-platform-reqs
```

## 3. Ejecutar el proyecto

```
./vendor/bin/sail up
```
## 4. Generar la key

```
php artisan key:generate
```

## 5. Hacer las migraciones

```
php artisan migrate:fresh --seed
```

<br>

Tras completar estos pasos, si no hay ningun error, PhpMyAdmin se estará ejecutando en *[localhost:8001](http://localhost:8001/index.php)* y la aplicación de laravel a la que haremos las peticiones en *localhost:80*

Hecho por Víctor Jiménez Corada 2º DAW A