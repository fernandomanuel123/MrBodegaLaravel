@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="container">
<form>
<h3>Registrar Boleta</h3>
<div className="form-group">
                        <label>seleccionar usuario</label>
                        <br>
                        <input type="text" id= "nombre" className="form-control" placeholder="Nombre" data-toggle="modal" data-target="#product" />
                </div> 

                         <div class="mb-3">
                         <label for="apellido" class="form-label">Fecha Nacimiento</label>
                         <input type="date" class="form-control" name="fecha" id="fecha">
        </div>               
</form>

<div class="modal fade" id="product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Escoger usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Codigo</th>
                                        <th scope="col">Nombres</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Telefono</th>
                                    </tr>
                                </thead>
                                <tbody >   @foreach($ArrayUsuarios as $usuario)                            
                                            <tr class="table-tr" data-nombre="{{$usuario['nombre']}}" >
                                                <td >{{$usuario['id']}}</td>
                                                <td >{{$usuario['nombre']}}</td>
                                                <td>{{$usuario['correo']}}</td>
                                                <td>{{$usuario['telefono']}}</td>
                                            </tr>
                                            @endforeach
                                
                                </tbody>
      </table>
</div>


<script>
$(function() {
  $('table.table').on("click", "tr.table-tr", function() {
    $("#nombre").val() = $(this).data("nombre");   
  });
});
</script>
@endsection