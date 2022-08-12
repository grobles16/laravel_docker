# Laravel - Docker

## Instalación
Despues de crear tu proyecto laravel debes hacer unos ajustes primero
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
5. Despues de ejecutar el paso 3 nuestros contenedores ya se encuentran activos, pero aún necesitamos ejecutar un par de comandos para terminar de configurar nuestra aplicación. Puede usar el docker-compose execcomando para ejecutar comandos en los contenedores de servicios, como ls -lpara mostrar información detallada sobre los archivos en el directorio de nuestra aplicación:
```bash
  docker-compose exec app ls -l
```
