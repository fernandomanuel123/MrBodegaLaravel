@extends('inc.header')

@section('content')



<div class="container">

    <h2>Listado de usuarios</h2>
    <div class="mb-3">

        <form class="mb-3" action="/save-usuario" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Registrar usuario</button>
        </form>


        <form action="/adm-usuario" method="POST">
            <input id="fileUpload" name="fileUpload" type="file" id="formFile">
            <input class="ml-5" type="submit" name="upload" />
        </form>


    </div>

    <div class="row justify-content-center">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Codigo de cliente</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
           
                @foreach($ArrayUsuarios as $usuario)
                <tr>
                    <td>{{$usuario['id']}}</td>
                    <td>{{$usuario['nombre']}}</td> 
                    <td>{{$usuario['apellido']}}</td>
                    <td>{{$usuario['correo']}}</td>
                    <td>{{$usuario['telefono']}}</td>
                    <td>{{$usuario['dni']}}</td>

                    <td>
                    <form action="/detalle-usuario/{{$usuario['id']}}" method="POST">
                    @csrf
                    <button class="btn btn-primary" type="submit">Editar</button>
                    </form>

                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>

    </div>
</div>
@endsection