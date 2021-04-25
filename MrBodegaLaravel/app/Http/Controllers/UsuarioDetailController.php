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
        $usuario = HTTP::get("http://localhost:5000/api/Usuario/$id");
        $fechaNac = date('Y-m-d', strtotime($usuario['fechaNacimiento']));

        return view('detail-usuario')->with('usuario', $usuario)->with('fechaNac', $fechaNac);
    }

    public function actualizarUsuario(Request $request)
    {
        $id = $request->input('id');
        $genero = $request->input('gender');
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $fechaNacimiento = $request->input('fecha');
        $correo = $request->input('correo');
        $telefono = $request->input('telefono');
        $dni = $request->input('dni');

        $data = Http::put('http://localhost:5000/api/Usuario', [
            'id' => $id,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'correo' => $correo,
            'telefono' => $telefono,
            'fechaNacimiento' => $fechaNacimiento,
            'genero' => $genero,
            'dni' => $dni
        ]);

        $usuarios = HTTP::get('http://localhost:5000/api/Usuario');
        $ArrayUsuarios = $usuarios->json();
        return redirect('adm-usuario')->with('ArrayUsuarios', $ArrayUsuarios);
    }
}
