<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BoletasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      
    }   
    
    public function index() {

        $boletas = HTTP::get('http://localhost:5000/api/Boleta');
        $ArrayBoletas = $boletas->json();
        return view('boletas',compact('ArrayBoletas'));     
    }

    public function test() {
        $usuarios = HTTP::get('http://localhost:5000/api/Usuario');
        $ArrayUsuarios = $usuarios->json();

       
        return view('add-boleta',compact('ArrayUsuarios'));     
    }

    public function enviarboletas(Request $req) {

        $nombre = $req->input('nombre');
        $descripcion = $req->input('descripcion');
        
        $precio =  $req->input('precio');
        $categoriaid = $req->input('categoria');        
        $stock =  $req->input('stock');
       
        $data = Http::post('http://localhost:5000/api/Producto', [
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'precio' => $precio,
            'categoriaId' => $categoriaid,
            'estado' => 'valido',
            'stock' => $stock,            
        ]);   
        
        $boletas = HTTP::get('http://localhost:5000/api/Boleta');
        $ArrayBoletas = $boletas->json();
        return view('boletas',compact('ArrayBoletas'));
    }


}
