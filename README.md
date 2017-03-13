# userProject

Proyecto en PHP Laravel que permite registrar, listar, editar y eliminar usuarios. Tiene dos niveles: administrador y usuario. El administrador puede registrar, modificar y eliminar usuarios. El usuario sólo puede modificar su perfil.

## Instalación

### Usando php artisan serve

#### Precondiciones
- Tener instalado PHP
- Tener instalado composer
- (opcional) Tener instalado homestead
- (opcional) Tener instalado mysql 
- Cada comando php artisan / composer debe ejecutarse dentro de la carpeta donde se descarga el proyecto

#### Instrucciones

1. Descargar el proyecto de git hub:
	git clone https://github.com/danielcasique/userProject.git 

2. Ir a la carpeta del proyecto

3. Actualizar las dependecias con el comando composer

composer update

4. En la carpeta userProject se encuentra el archivo .env.example, abrir este archivo y modificar los siguientes parámetros

	DB_CONNECTION=pgsql          => Driver de conexión para posgresql
	DB_HOST=127.0.0.1            => IP de conexión donde esta el servidor de mysql
	DB_PORT=3306                 => Puerto de conexión
	DB_DATABASE=usertest    => Nombre de la base de datos
	DB_USERNAME=postgres          => Usuario de conexión
	DB_PASSWORD='postgres'     => Contraseña de conexión

	Realizar los cambios y guardar en la raíz del proyecto como .env

5. Abrir el archivo database.php que se encuentra en userProject/config/ y modificar el siguiente parámetro:

	'default' => env('DB_CONNECTION', 'pgsql'),   ==> Por pgsql, por defecto esta en mysql

6. Crear la base de datos en el servidor de postgresql indicado en el parámetro DB_DATABASE, la creación puede realizarse a través de un cliente como pgadmin

7. Crear las tablas en la base de datos con el siguiente comando:

	php artisan migrate

8. Crear los usuarios iniciales 

	php artisan db:seed

	Esto crea los usuarios admin e invitado, las contraseñas de ambos es 123, para ingresar los usuarios admin@test.com e invitado@test.com

9. Ejecutar el servidor
	php artisan dev

	Si se presente el siguente error:
	"The only supported ciphers are AES-128-CBC and AES-256-CBC with the correct key lengths."
	Ejecutar los comandos:
	php artisan key:generate
	php artisan config:clear

### Usando Homestead

#### Precondicones

1. Importante tener configurado homestead

#### Instrucciones

1. Descargar el proyecto de git hub en la carpeta Code definida en la configuración de homestead:
	git clone https://github.com/danielcasique/userProject.git 

2. Ir a la carpeta del proyecto

3. Actualizar las dependecias con el comando composer

	composer update

4. En la carpeta userProject se encuentra el archivo .env.example, abrir este archivo y modificar los siguientes parámetros

	DB_CONNECTION=mysql          => Driver de conexión para mysql
	DB_HOST=127.0.0.1            => IP de conexión donde esta el servidor de mysql
	DB_PORT=3306                 => Puerto de conexión
	DB_DATABASE=usertest    => Nombre de la base de datos
	DB_USERNAME=postgres          => Usuario de conexión
	DB_PASSWORD='postgres'     => Contraseña de conexión

	Realizar los cambios y guardar en la raíz del proyecto como .env

5. Abrir el archivo database.php que se encuentra en userProject/config/ y modificar el siguiente parámetro:

	'default' => env('DB_CONNECTION', 'mysql'),   ==> Por pgsql, por defecto esta en mysql

6. Crear la base de datos en el servidor de postgresql indicado en el parámetro DB_DATABASE, la creación puede realizarse a través de un cliente como PhpMyAdmin ó MySQL Workbench

7. Iniciar la maquina de homestead, estando sobre el directorio donde estan los archivos de homestead, ejecutar el siguiente comando:
	vagrant up

8. Conectarse por sshu a Homestead
	vagrant ssh 

9. En la maquina de homestead, ir al directorio donde se encuentra el proyecto
	9.1. Crear las tablas en la base de datos con el siguiente comando:
			php artisan migrate 
	9.2. Crear los usuarios iniciales	
			php artisan db:seed
			Esto crea los usuarios admin e invitado, las contraseñas de ambos es 123, para ingresar los usuarios admin@test.com e invitado@test.com

10. Acceder a la app a través de la dirección http://192.168.10.10 (configuración por defecto homestead)

	Si se presente el siguente error:
	"The only supported ciphers are AES-128-CBC and AES-256-CBC with the correct key lengths."
	Ejecutar los comandos:
	php artisan key:generate
	php artisan config:clear

## Configuración para enviar correo
1. Abrir el archivo userProject/.env y editar los siguientes parámetros

	MAIL_DRIVER=smtp                   => driver de conexión
	MAIL_HOST=mail.gmail.com           => servidor de correo
	MAIL_PORT=587                      => Puerto de conexión
	MAIL_USERNAME=corre@gmail.com      => Usuario de conexión al servidor de correo
	MAIL_PASSWORD=contraseña           => Contraseña del usuario
	MAIL_ENCRYPTION=tls
 
2. Por defecto la configuración de la app esta hecha para que funcione con gmail pero si desea cambiar el servidor de correo se debe modificar en el archivo userProject/conf/mail.php los siguiente parámetros:
	'host' => env('MAIL_HOST', 'ssl://smtp.gmail.com'),            => Dirección del servidor de correo
	'port' => env('MAIL_PORT', 465),                               => Puerto del serivdor de correo
	'address' => env('MAIL_FROM_ADDRESS', 'usuario@gmail.com'),    => Direccion de correo del remitente
	'name' => env('MAIL_FROM_NAME', 'Nombre del usuario'),         => Nombre del remitente
