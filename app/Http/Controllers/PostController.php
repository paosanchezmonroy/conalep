<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return "Aqui se mostraran todos los post";
}
    public function create (){
        return " Aqui se muestrara un formulario para crear un post";
    }
    public function show ($post){
        return "Aqui se mostraran los datos del fomulario {$post}";
    }
}
