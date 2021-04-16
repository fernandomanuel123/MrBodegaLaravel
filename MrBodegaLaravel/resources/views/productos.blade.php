@extends('inc.header')

@section('content')

<div class="container">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Agregar producto
</button>
    <div class="row justify-content-center">        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Precio</th>                    
                    <th scope="col">Stock</th>
                    <th scope="col">Opciones</th>                
                </tr>
            </thead>
            <tbody>
            @foreach($ArrayProductos as $product)
                <tr>
                    <td>{{$product['nombre']}}</td>
                    <td>{{$product['descripcion']}}</td>
                    <td>{{$product['precio']}}</td>                   
                    <td>{{$product['stock']}}</td>                    
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#product-model-{{ $product['id'] }}">Edit</button></td>            
                </tr>
            @endforeach   
</tbody>
        </table>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
  <form method="POST" action="productos">
  @csrf
  @foreach($ArrayProductos as $product)
<div class="model" id="product-model-{{ $product['id'] }}">
    <form method="PUT" action="productos">
    @csrf     
     <div class="form-group">
         <label>Name</label>
         <input type="text" class="form-control" id="nombre" name="name" required value="{{ $product['nombre'] }}">
     </div>
     <div class="form-group">
        <label >Descripcion</label>
        <input type="text" class="form-control" id="description" name="description" required value="{{ $product['descripcion'] }}">
    </div>
    <div class="form-group">
        <label>price</label>
        <input id="price" type="number" class="form-control" name="price" required value="{{ $product['precio'] }}">
    </div>         
    <div class="form-group">
        <label>Stock</label>
        <input id="stock" type="number" class="form-control" name="stock" required  value="{{ $product['stock'] }}">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
     </div> 
  </form>
</div>
@endforeach
  </form>
     


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

@endsection

