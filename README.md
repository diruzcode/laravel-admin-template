# Laravel Admin Panel

[![N|Solid](https://camo.githubusercontent.com/5ceadc94fd40688144b193fd8ece2b805d79ca9b/68747470733a2f2f6c61726176656c2e636f6d2f6173736574732f696d672f636f6d706f6e656e74732f6c6f676f2d6c61726176656c2e737667)](https://laravel.com/)[![N|Solid](https://c.disquscdn.com/uploads/users/7757/9394/avatar92.jpg?1549409473)](https://github.com/BlackrockDigital/startbootstrap-sb-admin-2)

Siempre es un problema el no tener por donde comenzar hay tantos paneles de administración con mucho codigo Espagueti por todos lados, mezclas de jquery etc.....

Este admin panel esta hecho para facilitar la vida a quienes quieran comenzar con el hermoso framework de laravel :heart: usando como base de front lo que nos entregan en https://startbootstrap.com/themes/sb-admin-2/ Se mantendra actualizado con la ultima versión de laravel y contendra ejemplo de usos de variadas librerias.

El panel de administración cuenta con lo siguiente :


### Packages



| package | README |
| ------ | ------ |
| Permisos y Roles - laravel-permission | [GitHub](https://github.com/spatie/laravel-permission) |
| Validación de formularios - laravel-jsvalidation | [GitHub](https://github.com/proengsoft/laravel-jsvalidation)


### Package NPM



| package | README |
| ------ | ------ |
| @fortawesome/fontawesome-free | [Package](https://www.npmjs.com/package/@fortawesome/fontawesome-free) |
| datatables.net | [Package](https://www.npmjs.com/package/datatables.net)
| datatables.net-bs | [Package](https://www.npmjs.com/package/datatables.net-bs)
| datatables.net-responsive | [Package](https://www.npmjs.com/package/datatables.net-responsive)
| datatables.net-responsive-bs | [Package](https://www.npmjs.com/package/datatables.net-responsive-bs)
| daterangepicker | [Package](https://www.npmjs.com/package/daterangepicker)
| moment | [Package](https://www.npmjs.com/package/moment)
| select2 | [Package](https://www.npmjs.com/package/select2)
| select2-bootstrap-theme | [Package](https://www.npmjs.com/package/select2-bootstrap-theme)
| switchery | [Package](https://www.npmjs.com/package/switchery)
| sweetalert2 | [Package](https://www.npmjs.com/package/sweetalert2)



### Instalación

Requisitos previos  :

PHP 7.2 >
[Laravel](https://laravel.com/)
[NodeJs o NPM](https://nodejs.org/es/)
[Composer](https://getcomposer.org/)

Install the dependencies and devDependencies and start the server.

```sh
$ git clone https://github.com/DiruzCode/laravel-admin
$ cd laravel-admin
$ npm install
$ composer install
```

Configurar Laravel-mix ...

```sh
$ npm run dev
```
Configurar .env ...

```sh
$ cp .env.example .env
$ php artisan key:generate
```

Base de datos ...

```sh
$ php artisan migrate --seed
```


Arranca Laravel, puedes usar diferentes formas

```sh
$ php artisan serve
$ php artisan serve --port=port
$ php artisan serve --host=myhost --port=port
```
Por defecto correra en la siguiente ip
```sh
127.0.0.1:8000
```

### Desarrolladores

Quieren contribuir? Genial! son libres de hacerlo :D
