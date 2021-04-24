
@extends('inc.header')
@section('content')


<div class="container">
<td><button class="btn btn-primary" id ="btn-agregar" type="button" data-toggle="modal" data-target="#product"> agregar</button></td>
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
                    <td><button class="btn btn-primary" id="btn-edit" type="button" data-toggle="modal" data-target="#producto" data-id="{{ $product['id'] }}" data-nombre="{{ $product['nombre'] }}" data-descripcion="{{ $product['descripcion'] }}"
                    data-precio="{{ $product['precio'] }}" data-categoria="{{ $product['categoriaId'] }}" data-estado="{{ $product['estado'] }}" data-stock="{{ $product['stock'] }}">Editar</button></td>             
                </tr>
            @endforeach   
            </tbody>
        </table>

    </div>
</div>

<div class="modal fade" id="product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
     <div class="form-group">
         <label>Nombre</label>
         <input type="text" class="form-control" id="add_nombre" name="add_nombre" required>
     </div>
     <div class="form-group">
        <label >Descripcion</label>
        <input type="text" class="form-control" id="add_descripcion" name="add_descripcion" required >
    </div>
    <div class="form-group">
        <label>Precio</label>
        <input type="number" class="form-control" id="add_precio"  name="add_precio"  required > 
    </div> 
    <div class="form-group">
        <label>Categoria</label>
        <input type="number" class="form-control" id="add_categoria" name="add_categoria" required >
    </div>      
    <div class="form-group">
        <label>Stock</label>
        <input type="number" class="form-control" id="add_stock" name="add_stock"  required >
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="btn-grabar" class="btn btn-primary">Save changes</button>
     </div> 
  </form>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="producto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
 
    <form method="POST" action="productos">
    @method('PUT')
    @csrf     
     <div class="form-group">
         <label>Nombre</label>
         <input type="text" class="form-control" id="nombre" name="nombre" required >         
         <input type="hidden" class="form-control" id="id" name="id" >               
     </div>
     <div class="form-group">
        <label >Descripcion</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion" required>
     </div>
     <div class="form-group">
        <label>Precio</label>
        <input type="number" class="form-control" name="precio" id="precio" required >
    </div>
    <div class="form-group">
        <label >Categoria</label>
        <input type="number" class="form-control" id="categoria" name="categoria" required>
     </div>
     <div class="form-group">
        <label >Estado</label>
        <input type="text" class="form-control" id="estado" name="estado" required>
     </div>       
    <div class="form-group">
        <label>Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" required>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id ="btn-actualizar" class="btn btn-primary">Save changes</button>
     </div>     
  </form>

      </div>
    </div>
  </div>
</div>

<script>
$('#producto').on('shown.bs.modal', function(e) {
  var link = $(e.relatedTarget),
    modal = $(this),
    id = link.data("id"),
    nombre = link.data("nombre"),
    descripcion = link.data("descripcion"),
    precio = link.data("precio"),
    categoria = link.data("categoria"),
    estado = link.data("estado"),
    stock = link.data("stock");
    modal.find("#id").val(id);
  modal.find("#nombre").val(nombre);
  modal.find("#descripcion").val(descripcion);
  modal.find("#precio").val(precio);
  modal.find("#categoria").val(categoria);
  modal.find("#estado").val(estado);
  modal.find("#stock").val(stock);
});
</script>

@endsection






