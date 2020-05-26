<?php

namespace App\Http\Controllers;
Use App\Categoria;
Use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    //Los controladores se componen de acciones acciones=metodos
    //Pueden tener cualquier nombre pero evitar mayúsculas siempre tiene que ser públicos
    public function index(){
        //Dentro de la accion van las instrucciones a ejecutar
        //seleccionar datos a traves del model
        //$categorias= Categoria::all();
        $categorias= Categoria::paginate(5);
        //invocar una vista e ingresar a la vista el listado de categorias
        return view("categorias.index")->with("categorias",$categorias);
   
   
    }
    public function create(){
        return view ("categorias.new");
    }
    //Accion store:guardar la categoria que viene desde el formulario
    public function store(){
        //validar datos
        //reglas de validacion para los campos en el formulario 
        $reglas =[
            "nombre" =>["required","alpha","min:4","unique:category,name"] 
        ];
        //para que los mensajes salgan es español
        $mensajes =[
            "required" => "Campo Obligatorio",
            "alpha"  => "Solo letras",
            "min" => "Solo categorias de :min caracteres",
            "unique" => "Categoria repetida"
        ];
        //aplicar la validacion
        $validador = Validator::make($_POST,$reglas,$mensajes);
        //con los datos a validar y as reglas hacer comparacion de reglas
       if($validador->fails()){
           //la validacion fallo? redirigir al formulario con los mensajes de error
           return redirect("categorias/create") ->withErrors($validador)->withInput();
    }else {
        //la validacion no falla?
        //crear mi objeto categoria
        $categoria = new Categoria;
        //Asignarle nombre
        $categoria->name=$_POST["nombre"];
        //guardar
        $categoria->save();
        //echo "categoria gardada"; ahora en vez de un echo vamos a usar un letrareo de exito:por medio de un redireccionamiento
        return redirect('categorias/create')->with("exito","categoria registrada");
    }
        //$_POST:Es un arreglo unidimensional incorporado en php en donde quedan almacenados los datos de un formulario
        //var_dump($_POST);
    } 
    //mostrar el formulario de actualizar
    public function edit($idcategoria){
        //selecionar la categoria que tenga ese id
        $categoria = Categoria::find($idcategoria);
       //llevar los datos de la categoria a la vista de la edición
       return view ('categorias.edit')->with ("categoria",$categoria);
    }
    //guarda la categoria actualizada 
    public function update(){
        //seleccionar categoria a editar
        $categoria=Categoria::find($_POST["id"]);
        //actualizar atributos
        $categoria->name = $_POST["categoria"];
        //guardar cambios
        $categoria->save();
        echo "cambios guardar";
    }
}
