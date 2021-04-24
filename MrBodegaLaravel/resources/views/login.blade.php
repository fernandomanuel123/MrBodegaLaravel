@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Autenticacion') }}</div>

                <div class="card-body">
                    <form method="POST" action="adm-usuario">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Direccion E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                               
                            </div>
                        </div>

                

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
<<<<<<< HEAD
                                <button type="submit" id = "btn-ingresar"class="btn btn-primary">
=======
                                <button type="submit" id="btn-ingresar" class="btn btn-primary">
>>>>>>> 4e1c95004dfe9dbc59993dc3c1cca4fe0cfacdc9
                                    {{ __('Ingresar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
