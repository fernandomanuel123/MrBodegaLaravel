<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SaveUsuarioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        return view('save-usuario');
    }

    public function index()
    {

        return view('save-usuario');
    }

    public function saveUsuarioView() {
        return view('save-usuario');
    }



    public function guardarUsuario(Request $request)
    {

        $genero = $request->input('gender');
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $fechaNacimiento = $request->input('fecha');
        $correo = $request->input('correo');
        $telefono = $request->input('telefono');
        $dni = $request->input('dni');
        $password = $request->input('password');
        $confirmPassword = $request->input('confirm-password');

        if ($password == $confirmPassword) {
            $data = Http::post('http://localhost:5000/api/Usuario/Register', [
                'nombre' => $nombre,
                'apellido' => $apellido,
                'correo' => $correo,
                'telefono' => $telefono,
                'fechaNacimiento' => $fechaNacimiento,
                'genero' => $genero,
                'password' => $password,
                'dni' => $dni
            ]);


            if ($data == true) {
                $usuarios = HTTP::get('http://localhost:5000/api/Usuario');
                $ArrayUsuarios = $usuarios->json();
                return redirect('adm-usuario')->with('ArrayUsuarios', $ArrayUsuarios);
            } else {
                return "Error";
            }
        }
    }
}
