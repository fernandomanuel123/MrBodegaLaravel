<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
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
    }

    
    public function getProductos(Request $req)
    {
        $nombre = $req->input('nombre');
        $descripcion = $req->input('descripcion');
        
        $precio = $req->input('precio');
        $stock = $req->input('stock');
       
        $data = Http::post('http://localhost:5000/api/Producto', [
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'precio' => $precio,
            'stock' => $stock,
            'categoriaId' => 1
        ]);

        
        
        return view('welcome');
    }
}
