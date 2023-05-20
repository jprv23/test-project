# Prueba Técnica  
Este proyecto fue realizado con fines laborales. Se utilizó el lenguaje [PHP](https://es.wikipedia.org/wiki/PHP "PHP") y el framework [Laravel](https://laravel.com/ "Laravel")
## Vista Previa
### Inicio
![](http://jjrsoftevolution.com/image1.png)
### Registrar Producto
![](http://jjrsoftevolution.com/image2.png)

------------


## Instalación
#### Paso 1:
- **1 forma** Dar click en Code y luego en Download ZIP.
- **2 forma** Crear una carpeta e ingresar a la consola y ejecutar

`git clone https://github.com/jprv23/test-project.git`

#### Paso 2:
- Copiar el **.env.example** y renombrar la copia como **.env**

#### Paso 3:
- Es obligatorio tener previamente instalado [composer](https://getcomposer.org "composer"). Ejecutar el siguiente comando para descargar las dependencias del proyecto

` composer update`

#### Paso 4:
- Crear una base de datos con el nombre **test** . En caso de crear con otro nombre configurar en el **.env**. Luego ejecutamos

` php artisan migrate:fresh --seed`

Este comando creará las tablas en la base de datos y ejecutará un seeder, el cuál registrará un usuario por defecto para ingresar al sistema.

#### Paso 5:
- Ejecutar el siguiente comando para levantar el proyecto

`php artisan serve`

- Podemos visualizar el sistema ingresando a **http://127.0.0.1:8000**

**Credenciales Admin**  
admin@gmail.com  
123456789

------------


## Soporte
**PHP version:**  >=8.1  
**Laravel version:**  10

