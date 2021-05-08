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

    public function index_addboleta() {
        $usuarios = HTTP::get('http://localhost:5000/api/Usuario');
        $ArrayUsuarios = $usuarios->json();

        $productos = HTTP::get('http://localhost:5000/api/Producto');
        $ArrayProductos = $productos->json();        
        return view('add-boleta',compact('ArrayUsuarios','ArrayProductos'));     
    }

    public function agregarboleta(Request $req){
       
       $data = HTTP::post('http://localhost:5000/api/Boleta',$req->except("_token"));
    
       $boletas = HTTP::get('http://localhost:5000/api/Boleta');
        $ArrayBoletas = $boletas->json();
        $msg = "Creacion con exito";
        return view('boletas',compact('ArrayBoletas'))->with('msg', $msg); 
                       
    }

    public function index_editarboleta(Request $req, $boleta_id){
        
        $boleta = HTTP::get('http://localhost:5000/api/Boleta/'.$boleta_id);
        $ArrayBoleta = $boleta->json();        
        //dd($ArrayBoleta);
        $usuario = HTTP::get('http://localhost:5000/api/Usuario/'.$ArrayBoleta['usuarioId']);
        $Usuariotraido = $usuario->json();               
        
        $usuarios = HTTP::get('http://localhost:5000/api/Usuario');
        $ArrayUsuarios = $usuarios->json();

        $productos = HTTP::get('http://localhost:5000/api/Producto');
        $ArrayProductos = $productos->json();
        
        $productostraidos =[];       
        
        foreach ($ArrayBoleta['detalleBoleta'] as $product ) {
            $producto = HTTP::get('http://localhost:5000/api/Producto/'.$product['productoId']);            
            $add_producto = $producto->json(); 
            $add_producto["cantidad"] = $product["cantidad"];
            $add_producto["id_registro"] = $product["id"];
            array_push($productostraidos, $add_producto);
           
            }  
        
        $fecha = date('Y-m-d', strtotime($ArrayBoleta['fecha']));        
        return view('editar-boleta',compact('ArrayUsuarios','ArrayProductos','ArrayBoleta','Usuariotraido','productostraidos','fecha','boleta_id'));               
    }

    public function editarboleta(Request $req,$boleta_id){
        $data = $req->except("_token");
        $data["id"] = $boleta_id;
       
        $boleta = HTTP::put('http://localhost:5000/api/Boleta',$data);
       
        $boletas = HTTP::get('http://localhost:5000/api/Boleta');
        $ArrayBoletas = $boletas->json();
        $msg = "Actualizacion con exito";
        return view('boletas',compact('ArrayBoletas'))->with('msg', $msg);              
    }

    
   


}