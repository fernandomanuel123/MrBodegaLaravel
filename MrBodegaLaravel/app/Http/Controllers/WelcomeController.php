<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      
    }

    
    public function index()
    {
        $usuarios = HTTP::get('http://localhost:5000/api/Producto');
        $ArrayUsuarios = $usuarios->json();
        return view('welcome')->with('ArrayUsuarios', $ArrayUsuarios);
       
    }
}
