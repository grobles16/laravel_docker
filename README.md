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

1. Edit the .env file assign the name of the DB, user, password
```bash
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=laravel
```
2. Once the changes have been made in the .env file, execute the following command, this will allow us to create our containers:
```bash
docker-compose build app
```
3. Turn on the containers and the network:
```bash
docker-compose up -d
```
4. To display information about the status of active services, run:
```bash
docker-compose ps
```
5. After executing step 3 our containers are already up, but we still need to run a couple of commands to finish configuring our application. You can use the docker-compose exec command to run commands on service containers, such as ls -l to display detailed information about the files in our application directory:
```bash
docker-compose exec app ls -l
```
6. If necessary, run the following command to assign permissions to our project
```bash
docker-compose exec app chown -R www-data: /var/www
```
7. Ahora ejecutamos composer install para instalar las dependencias de la aplicación:
```bash
docker-compose exec app rm -rf vendor composer.lock
docker-compose exec app composer install
```
8. Generar una clave de aplicación única
```bash
docker-compose exec app php artisan key:generate
```
## Optional information
* If you want to pause your Docker Compose environment while maintaining the state of all your services, run:
```bash
docker-compose pause
```
* Resume services
```bash
docker-compose unpause
```
* To shut down the Docker environment
```bash
docker-compose down
```
