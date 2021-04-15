<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UsuarioDetailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function loadView($id)
    {
        $usuario = HTTP::get("http://localhost:5000/api/Usuario/$id" );
        
        return view('detail-usuario')->with('usuario', $usuario);
    }
}
