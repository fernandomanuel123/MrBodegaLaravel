@extends('inc.header')

@section('content')



<div class="container">

    <h2>Registrar usuario</h2>
    <form action="/guardar-usuario" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Guardar</button>

        <div class="mb-3">
            <div class="form-group">
                <label for="gender">
                    Seleccione su genero:
                </label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="genero" id="masculino" value="0">
                    <label for="masculino" class="form-check-label">
                        Masculino
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="genero" id="femenino" value="1">
                    <label for="femenino" class="form-check-label">
                        Femenino
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="genero" id="incognito" value="2">
                    <label for="incognito" class="form-check-label">
                        Incognito
                    </label>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombres</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre" value="{{$usuario['nombre']}}">
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Apellidos</label>
            <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingrese su apellido" value="{{$usuario['apellido']}}">
        </div>

        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="text" class="form-control" name="correo" id="correo" placeholder="Ejem: abc@gmail.com" value="{{$usuario['correo']}}">
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Fecha Nacimiento</label>
            <input type="date" class="form-control" name="fecha" id="fecha" data-value="{{$usuario['fechaNacimiento']}}">
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Telefono</label>
            <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Ingrese nro. telefonico" value="{{$usuario['telefono']}}">
        </div>

        <div class="mb-3">
            <label for="dni" class="form-label">DNI</label>
            <input type="number" class="form-control" name="dni" id="dni" placeholder="Ingrese nro. DNI" value="{{$usuario['dni']}}">
        </div>
    </form>
</div>
@endsection