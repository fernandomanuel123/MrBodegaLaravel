@extends('inc.header')

@section('content')



<div class="container">
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
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection