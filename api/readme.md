# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/lumen-framework/v/unstable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](http://lumen.laravel.com/docs).

## How To use

## Log in

To authenticate log in send a post method to http://pruebas.evolucionmarketing.com/anuncios/api/login
must send a json including email and password example:

{
"email": "test@test.com",
"password": "test"
}


## Register

Register is still in the works, you can create a new user by sending a post method to http://pruebas.evolucionmarketing.com/anuncios/api/registro
it still does not validate if the information sent already exist Json must contain email, password and name example:

{
"email": "test@test.com",
"password": "test"
"nombre": "fulanito"
}


## Advertisement

To get all Ad's just use a get method with http://pruebas.evolucionmarketing.com/anuncios/api/anuncios
you will a recieve a Json like this:

{
  "id":1,"
  titulo":"Hamburguesas",
  "contenido":"Hamburguesas2X1",
  "imagen":"https:\/\/logodownload.org\/wp-content\/uploads\/2015\/02\/Burger-king-logo-5.png",
  "categoria":"comida",
  "id_usuario":1,
  "created_at":"2017-03-03 23:39:05",
  "updated_at":"2017-03-03 23:39:05"
}

## Create Advertisement

You can create a new advertisement by sending a post method to http://pruebas.evolucionmarketing.com/anuncios/api/add/anuncio
using a form:


  titulo: "jksnjsdn" type = "text"
  contenido: "skdjksdj" type = "text"
  categoria: "comida" type = "text"
  "id_usuario": 1 type = "text"
  "imagen":"object" type = "file"



## Get ad by Id

You can que an advertisement by id by sending a get method to
http://pruebas.evolucionmarketing.com/anuncios/api/anuncio/{id}
you will be listed with a single advertisement.

## Categories

You can list all the categories available by using a get method
http://pruebas.evolucionmarketing.com/anuncios/api/get/categorias
you will get a result something like this
{
"id": 1,
"titulo": "tacos",
"descripcion": "esta categoria incluye todo anuncio que sea relacionado a tacos",
"imagen": "image.png",
"created_at": "2017-03-07 18:13:10",
"updated_at": "2017-03-07 18:13:10"
}

you can add a new category by posting to
http://pruebas.evolucionmarketing.com/anuncios/api/add/categoria
information required
{
"titulo": "tacos",
"descripcion": "esta categoria incluye todo anuncio que sea relacionado a tacos",
"imagen": "image.png",
}



## Filter

You can filter the advertisment's by consuming a get method  http://pruebas.evolucionmarketing.com/anuncios/api/categoria/{categoria}
"{categoria}" is where you place the name of the category you want to sort by
you will recieve a json with all ads that have the catogory you selected

you can also update your advertisment by sending a put method to http://pruebas.evolucionmarketing.com/anuncios/api/update/{id}
where "{id}" is the id of the advertisment you want to update it is necesary to send
a json something like this:

{
  "categoria":"tacos",
}


## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
