@extends('inc.header')

@section('content')



<div class="container">

    <h2>Editar usuario</h2>
    <form action="/actualizar-usuario" method="POST">
        @csrf
        <button type="submit" id="btn-guardar" class="btn btn-primary">Guardar</button>

        <div class="mb-3">
            <div class="form-group">
                <label for="gender">
                    Seleccione su genero:
                </label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="gender" id="masculino" value="{{$usuario['genero']}}" {{$usuario['genero']== 0 ? 'checked' : '' }}>
                    <label for="masculino" class="form-check-label">
                        Masculino
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="gender" id="femenino" value="{{$usuario['genero']}}"  {{$usuario['genero']== 1 ? 'checked' : '' }}>
                    <label for="femenino" class="form-check-label">
                        Femenino
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="gender" id="incognito" value="{{$usuario['genero']}}"  {{$usuario['genero']== 2 ? 'checked' : '' }}>
                    <label for="incognito" class="form-check-label">
                        Incognito
                    </label>
                </div>
            </div>
        </div>

        <div class="mb-3" hidden>
            <label for="nombre" class="form-label">Id</label>
            <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese su nombre" value="{{$usuario['id']}}">
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
            <input type="date" class="form-control" name="fecha" id="fecha" value="{{$fechaNac}}">
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