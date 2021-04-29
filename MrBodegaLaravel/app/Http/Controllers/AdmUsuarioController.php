<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;
use App\Form;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Psr\Http\Message\ResponseInterface;

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
        /*if ($request->hasFile('upload_file')) {
            $file = $request->file('upload_file');
            $name = $file->getClientOriginalName();
            $extension = $request->file('upload_file')->extension();

            //$data = Http::attach('files', $file, $name)->withHeaders(['responseType' => 'text'])->post('http://localhost:5000/api/FileUpload');
            $client = new Client();
            $promise = $client->requestAsync('POST', 'http://localhost:5000/api/FileUpload', [
                ['headers' => ['responseType' => 'text']],
                'multipart' => [
                    [
                        'name'     => 'files',
                        'contents' => $file,
                        'filename' => $name
                    ]
                ]
            ]);

            $promise->then(
                function (ResponseInterface $res) use ($name) {
                    Http::post("http://localhost:5000/api/Usuario/loadUsers/$name");
                }
            );

            $usuarios = HTTP::get('http://localhost:5000/api/Usuario');
            $ArrayUsuarios = $usuarios->json();
            return redirect('adm-usuario')->with('ArrayUsuarios', $ArrayUsuarios);
            

/*
            $client = new Client();

            $res = $client->post('http://localhost:5000/api/FileUpload',  [
                ['headers' => ['responseType' => 'text']],
                'multipart' => [
                    [
                        'name'     => 'files',
                        'contents' => $file,
                        'filename' => $name
                    ]
                ]
            ]);




            $promise = $client->postAsync('http://localhost:5000/api/FileUpload',  [
                ['headers' => ['responseType' => 'text']],
                'multipart' => [
                    [
                        'name'     => 'files',
                        'contents' => $file,
                        'filename' => $name
                    ]
                ]
            ])->then(function ($response) use ($name) {
                
               
                #$fileuploaded = Http::post("http://localhost:5000/api/Usuario/loadUsers/$name");
            });

            $response = $promise->wait();

            $usuarios = HTTP::get('http://localhost:5000/api/Usuario');
            $ArrayUsuarios = $usuarios->json();
            return redirect('adm-usuario')->with('ArrayUsuarios', $ArrayUsuarios);




            #$usersUploaded = Http::post("http://localhost:5000/api/Usuario/loadUsers/$name");




            //return $usersUploaded;
            /*if ($data) {
                if ($extension == 'txt') {
                    $usersUploaded = Http::post("http://localhost:5000/api/Usuario/LoadUsers/$name");
                } else if ($extension == 'xlsx') {
                    $usersUploaded = Http::post("http://localhost:5000/api/Usuario/loadUsersExcel/$name");
                } else {
                    return "Formato de archivo invalido";
                }

                /*if ($usersUploaded) {
                    $usuarios = HTTP::get('http://localhost:5000/api/Usuario');
                    $ArrayUsuarios = $usuarios->json();
                    return view('adm-usuario')->with('ArrayUsuarios', $ArrayUsuarios);
                } else {
                    return "Error :c";
                }
               
            } else {
                return "Error al subir archivo";
            }*/
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

        if ($data['token']) {
            $usuarios = HTTP::get('http://localhost:5000/api/Usuario');
            $ArrayUsuarios = $usuarios->json();
            return view('adm-usuario')->with('ArrayUsuarios', $ArrayUsuarios);
        } else {
            return "Credenciales incorrectas";
        }
    }

    public function index()
    {
        $usuarios = HTTP::get('http://localhost:5000/api/Usuario');
        $ArrayUsuarios = $usuarios->json();
        return view('adm-usuario')->with('ArrayUsuarios', $ArrayUsuarios);
    }
}
