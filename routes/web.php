<?php


use App\Categoria;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   
});
//Ruta de prueba
/*Route::get('prueba', function () {
   //definir un arreglo
   $estudiantes=[
    "Ana",
    "Jorge",
    "Maria"
   ];
   echo "<pre>";
   var_dump($estudiantes);
   echo "</pre>";
});
//Al interior de la ruta solo se reconocen variables declaradas o utilizadas en la misma
Route::get('paises', function () {
    $paises = [
        "Colombia" => [
            "Capital" => "Bogotà",
            "Moneda" => "Peso",
            "Poblacion" => 55,
            "Ciudades" => [
                "Cali","Medellin","Barranquilla"
            ]
        ],
        "Ecuador" => [
            "Capital" => "Quito",
            "Moneda" => "Dolar",
            "Poblacion" => 10,
            "Ciudades" => [
                "Guayaquil","Manta","Pichincha"
            ]
        ],
        "Brazil"=> [
            "Capital" => "Brazilia",
            "Moneda" => "Real",
            "Poblacion" => 220,
            "Ciudades" => [
                "Santos","Sao Paulo","Bahia"
            ]
        ],
    ];
    //Pasar el arreglo de paises a una vista
    return view ("paises") ->with ("paises",$paises);
});*/
//controlador y accion se separan por @
    //ruta de controlador DB
    Route::get("categorias", "CategoriaController@index");
        //Seleccionar datos a traves del modelo
        //Ruta para mostrar el formulario para crear categoria
    Route::get("categorias/create", "CategoriaController@create");  
    //Ruta para guardar la nueva categoria en BD
    Route::post("categorias/store","CategoriaController@store");
    //Ruta para mostarr el formulario para actualizar (cambiar nombre) categoria
    Route::get ("categorias/edit/{idcategoria}","CategoriaController@edit");
    //Ruta para guardar cambios de categoria
    Route::post("categorias/update","CategoriaController@update");
  