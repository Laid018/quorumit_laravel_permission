# Requerimientos 
* Puerto **80** ni **3006** libres. Es decir no se puede tener otro webserver levantado al momento de inicializar la instalacion. (De ser necesario, se puede cambiar en el ``docker-compose.yml`` al puerto mapeado deseado)
* Bajar cualquier docker de la versión previa instalados con ``docker compose down``, dentro de la carpeta del proyecto

# Instalación de Docker 
1. Docker Desktop
    * [Instalación Ubuntu](https://docs.docker.com/engine/install/ubuntu/)
    * [Instalación Fedora](https://docs.docker.com/engine/install/fedora/)
    * [Instalación Docker Desktop Windows](https://docs.docker.com/desktop/windows/install/)
2. Docker Compose
    * [Instalación General](https://docs.docker.com/compose/install/)

# Instalación de la app
```bash
git clone git@github.com:Laid018/quorumite_laravel.git
cd quorumite_laravel
```

# Uso con docker
Ingresar a la terminal y ejectuar ``docker-compose up -d --build``, para correr la aplicación con docker.
Solo es necesario ingresar a la carpeta del proyecto y ejecutar ``docker compose up -d`` para levantar los servicios. Y se baja los servicios con ``docker compose down``.

# Uso de manera local
Ingresar a la terminal y ejectuar los siguietes comandos, para correr la aplicación sin problemas.
``composer install``
``npm install``

Para la base de datos se debe crear la base de datos en mysql.
Nombre de la base de datos: ``quorumitdb_laravel``
Una vez creada la base de datos correr las migraciones
``php artisan migrate --seed``

Para correr la app ejecutar
``php artisan serve``
``npm run dev``


# URLs para ingresar:

* APP [http://localhost](http://localhost/rrhh)

* Verificar que el navegador no haya cambiado el protocolo HTTP por HTTPS (De ser así se debe desactivar en los ajustes del navegador para que no lo haga)

# Datos Base de Datos
host: **127.0.0.1**

db: **quorumitdb_laravel**

user: **root**

pass: **admin**

docker exec -it Database ALTER USER 'root'@'localhost' IDENTIFIED BY 'admin';

Muestra los contenedores funcionando:
```bash
docker compose ps
```

para compilar **assets** vite.js:
```bash
docker exec -it app npm run build
```

para correr en local **assets** vite.js:
```bash
docker exec -it app npm run dev
```