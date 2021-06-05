<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;
use App\Form;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Illuminate\Validation\Rules\Exists;
use Mockery\Undefined;
use Psr\Http\Message\ResponseInterface;

use function PHPUnit\Framework\isEmpty;

class AdmUsuarioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function importfile(Request $request)
    {
        $usuarios = HTTP::get('http://localhost:5000/api/Usuario');
        $ArrayUsuarios = $usuarios->json();
        return view('adm-usuario')->with('ArrayUsuarios', $ArrayUsuarios);
      
    }


    public function acceder(Request $request)
    {


        $token = null;
        $email = $request->input('email');
        $password = $request->input('password');

        $data = Http::post('http://localhost:5000/api/Usuario/authenticate', [
            'correo' => $email,
            'Password' => $password
        ]);


        //Storage::disk('local')->get('token');
        //Storage::disk('local')->put('token', $data['token']);

        if (!$data->failed()) {
            $usuarios = HTTP::get('http://localhost:5000/api/Usuario');
            $ArrayUsuarios = $usuarios->json();
            return view('adm-usuario')->with('ArrayUsuarios', $ArrayUsuarios);
        } else {
            $msg = "Usuario o contraseña incorrecta";
            return view("login")->with('msg', $msg);
        }
    }

    public function index()
    {
        $usuarios = HTTP::get('http://localhost:5000/api/Usuario');
        $ArrayUsuarios = $usuarios->json();
        return view('adm-usuario')->with('ArrayUsuarios', $ArrayUsuarios);
    }
}
