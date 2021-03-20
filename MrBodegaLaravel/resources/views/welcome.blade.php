@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">       
		<div>Test</div>  
        @foreach($ArrayUsuarios as $usuario)
        <div class="col-md-6">
            <ul class = "list-group" mt-2>
            <li class = "list-group-item active">{{$usuario['nombre']}}</li>
            <li class = "list-group-item active">{{$usuario['descripcion']}}</li>
            <li class = "list-group-item active">{{$usuario['precio']}}</li>
            <li class = "list-group-item active">{{$usuario['categoriaId']}}</li>
            <li class = "list-group-item active">{{$usuario['stock']}}</li>
        </div>
        @endforeach
    </div>
</div>
@endsection
