@extends('inc.header')

@section('content')



<div class="container">

    <h2>Registrar usuario</h2>
    <form action="/guardar-usuario" method="POST">
        @csrf
        <button id="btn-guardar" type="submit" class="btn btn-primary">Guardar</button>

        <div class="mb-3">
            <div class="form-group">
                <label for="gender">
                    Seleccione su genero:
                </label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="gender" id="masculino" value="0">
                    <label id="masculino" for="masculino" class="form-check-label">
                        Masculino
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="gender" id="femenino" value="1">
                    <label id="femenino" for="femenino" class="form-check-label">
                        Femenino
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="gender" id="incognito" value="2">
                    <label id="incognito" for="incognito" class="form-check-label">
                        Incognito
                    </label>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombres</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre">
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Apellidos</label>
            <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingrese su apellido">
        </div>

        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="text" class="form-control" name="correo" id="correo" placeholder="Ejem: abc@gmail.com">
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Fecha Nacimiento</label>
            <input type="date" class="form-control" name="fecha" id="fecha">
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Telefono</label>
            <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Ingrese nro. telefonico">
        </div>

        <div class="mb-3">
            <label for="dni" class="form-label">DNI</label>
            <input type="number" class="form-control" name="dni" id="dni" placeholder="Ingrese nro. DNI">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Ingrese contraseña">
        </div>

        <div class="mb-3">
            <label for="confirm-password" class="form-label">Confirmar Contraseña</label>
            <input type="password" class="form-control" name="confirm-password" id="confirm-password" placeholder="Ingrese contraseña nuevamente">
        </div>
    </form>
</div>
@endsection