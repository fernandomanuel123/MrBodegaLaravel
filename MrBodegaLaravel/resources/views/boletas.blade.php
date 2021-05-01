@extends('inc.header')

@section('content')

<div class="container">
 <button id= "btn-agregar" type="button" class="btn btn-primary" onClick="location.href = '{{ url('boletas/add-boleta') }}'">Agregar boleta</button>
 <br/>
    <div class="row justify-content-center">        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Total</th>                                  
                </tr>
            </thead>
            <tbody>
            @foreach($ArrayBoletas as $boleta)
                <tr>
                    <td>{{$boleta['id']}}</td>
                    <td>{{$boleta['fecha']}}</td>
                    <td>{{$boleta['direccion']}}</td>
                    <td>{{$boleta['total']}}</td>                
                    <td><a class="btn btn-primary" href="/boletas/editar-boleta/{{$boleta['id']}}">Editar</a></td>            
                </tr>
                @endforeach   
            </tbody>
        </table>

    </div>
</div>
     


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

@endsection

