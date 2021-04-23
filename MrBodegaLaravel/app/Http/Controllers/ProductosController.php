<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductosController extends Controller
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

        $productos = HTTP::get('http://localhost:5000/api/Producto');
        $ArrayProductos = $productos->json();
        return view('productos',compact('ArrayProductos'));     
    }

    public function test() {
       
        return view('test');     
    }

    public function enviarproductos(Request $req) {

        $nombre = $req->input('add_nombre');
        $descripcion = $req->input('add_descripcion');
        
        $precio =  $req->input('add_precio');
        $categoriaid = $req->input('add_categoria');        
        $stock =  $req->input('add_stock');       

        $data = Http::post('http://localhost:5000/api/Producto', [
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'precio' => $precio,
            'categoriaId' => $categoriaid,
            'estado' => 'valido',
            'stock' => $stock,            
        ]);   
        
        $productos = HTTP::get('http://localhost:5000/api/Producto');
        $ArrayProductos = $productos->json();
        return view('productos',compact('ArrayProductos'));
    }

    public function editarproductos(Request $req) {

        $id = $req->input('id');
        $nombre = $req->input('nombre');
        $descripcion = $req->input('descripcion');        
        $precio =  $req->input('precio');
        $categoriaid = $req->input('categoria');
        $estado = $req->input('estado');      
        $stock =  $req->input('stock');       

        $data = Http::put('http://localhost:5000/api/Producto', [
            'id' => $id,
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'precio' => $precio,
            'categoriaId' => $categoriaid,
            'estado' => $estado,
            'stock' => $stock,            
        ]);   
        
        $productos = HTTP::get('http://localhost:5000/api/Producto');
        $ArrayProductos = $productos->json();
        return view('productos',compact('ArrayProductos'));
    }


}
