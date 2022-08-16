# Laravel - Docker

## Install
After creating your laravel project you need to do some configuration first and have docker-compose installed
1. Install package
```bash
composer require grobles16/laravel-docker
```
2. To detect the routes file it is necessary to add the following code in config / app.php
```bash
'providers' => [
   Grobles16\LaravelDocker\LaravelDockerProvider::class,
],
```
3. Publish files in our root folder
```bash
php artisan vendor:publish --provider="Grobles16\LaravelDocker\LaravelDockerProvider" --tag=laravel-docker --force
```

## Docker settings

1. En tu archivo .env debes hacer asignar el nombre de la BD, usuario, contraseña
```bash
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=laravel
```
2. Una vez hecho los cambios en tu archivo .env, ejecuta el siguiente comando, este nos permitira crear nuestros contenedores:
```bash
docker-compose build app
```
3. Enciende los containers y la red:
```bash
docker-compose up -d
```
4. Para mostrar información sobre el estado de tus servicios activos, ejecuta:
```bash
docker-compose ps
```
5. Despues de ejecutar el paso 3 nuestros contenedores ya se encuentran activos, pero aún necesitamos ejecutar un par de comandos para terminar de configurar nuestra aplicación. Puede usar el docker-compose exec comando para ejecutar comandos en los contenedores de servicios, como ls -l para mostrar información detallada sobre los archivos en el directorio de nuestra aplicación:
```bash
docker-compose exec app ls -l
```
6. Ahora ejecutamos composer install para instalar las dependencias de la aplicación:
```bash
docker-compose exec app rm -rf vendor composer.lock
docker-compose exec app composer install
```
7. Generar una clave de aplicación única
```bash
docker-compose exec app php artisan key:generate
```
## Información opcional 
* Si desea pausar su entorno Docker Compose mientras mantiene el estado de todos sus servicios, ejecute:
```bash
docker-compose pause
```
* Renudar servicios
```bash
docker-compose unpause
```
* Para cerrar entorno Docker
```bash
docker-compose down
```
