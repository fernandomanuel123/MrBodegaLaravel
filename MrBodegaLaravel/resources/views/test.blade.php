@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">       
		<div>asd</div>  

        <form method="POST" action="test">
            @csrf
        <input id="nombre" type="text" class="form-control" 
        name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

        <input id="descripcion" type="text" class="form-control" 
        name="descripcion"  required  >

        <input id="precio" type="number" class="form-control" 
        name="precio"  required >

        <input id="stock" type="number" class="form-control" 
        name="stock"  required >

        <button type="submit" class="btn btn-primary">
                                    {{ __('Ingresar') }}
        </button>
        </form>
        </div>
    </div>
</div>
@endsection
