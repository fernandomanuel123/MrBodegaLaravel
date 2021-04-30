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

        $productos = HTTP::get('http://localhost:5000/api/Producto');
        $ArrayProductos = $productos->json();        
        return view('add-boleta',compact('ArrayUsuarios','ArrayProductos'));     
    }

    public function agregarboleta(Request $req){
        //dd($req->all());
        $boletas = HTTP::post('http://localhost:5000/api/Boleta',$req->except("_token"));


        return redirect()->action(array(self::class,'index'));                
    }

    public function editarboleta(Request $req, $boleta_id){
        //dd($req->all());
        $boleta = HTTP::get('http://localhost:5000/api/Boleta/'.$boleta_id,$req->except("_token"));
        $ArrayBoleta = $boleta->json();
        return($ArrayBoleta);
        $usuarios = HTTP::get('http://localhost:5000/api/Usuario');
        $ArrayUsuarios = $usuarios->json();

        $productos = HTTP::get('http://localhost:5000/api/Producto');
        $ArrayProductos = $productos->json(); 
        return view('editar-boleta',compact('ArrayUsuarios','ArrayProductos','ArrayBoleta'));               
    }
   


}