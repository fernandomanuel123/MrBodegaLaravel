@extends('layouts.app')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<div class="container">
<form id= "formulario" method = "POST" action="/boletas/add-boleta">
@csrf
<h3>Registrar Boleta</h3>
<div className="form-group">
                        <label>seleccionar usuario</label>
                        <br>
                        <input type="text" id= "unombre" className="form-control" placeholder="Nombre" data-toggle="modal" data-target="#usuario" />
                        <input name= "UsuarioId" type = "hidden" id = "UsuarioId" />
                </div> 

                         <div class="mb-3">
                         <label  class="form-label">Fecha</label>
                         <input  id= "l-fecha" type="date" class="form-control" name="Fecha" >
                         </div>  
                         <div class="form-group">
                         <label >Dirección</label>
                         <input type="text" class="form-control" id="Direccion" name="Direccion" required>
                         </div>  

                         <h3>Detalles de los productos</h3>                           
                         <div class="container">
<td><button class="btn btn-primary" id ="btn-agregar" type="button" data-toggle="modal" data-target="#product"> agregar</button></td>
<br>
<br>
    <div class="row justify-content-center">     
      
        <table class="table">
            <thead>
            
                <tr>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>  
                    <th scope="col">Subtotal</th>                
                                 
                </tr>
            </thead>
            <tbody id= "detalleproducto">      
            
               
            </tbody>
            <tfoot>
            <tr>
            <td colspan = "3"></td>
            <td><button type= "submit" id="btn-grabar" class="btn btn-primary">Guardar</button></td>
            </tr>            
            </tfoot>
        </table>
        
       
    </div>
</div>       
</form>

<div class="modal fade" id="usuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Escoger usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table" id ="tableusuarios">
                                <thead>
                                    <tr>
                                        <th scope="col">Codigo</th>
                                        <th scope="col">Nombres</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Telefono</th>
                                    </tr>
                                </thead>
                                <tbody >   @foreach($ArrayUsuarios as $usuario)                            
                                            <tr class="table-tr" data-unombre="{{$usuario['nombre']}}" data-id="{{$usuario['id']}}">                                               
                                                <td >{{$usuario['id']}}</td>
                                                <td >{{$usuario['nombre']}}</td>
                                                <td>{{$usuario['correo']}}</td>
                                                <td>{{$usuario['telefono']}}</td>
                                            </tr>
                                            @endforeach
                                
                                </tbody>                           
     
      </table>
      <div class="modal-footer">
                                <button type="button" id = "btn-close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" id ="btn-actualizar" class="btn btn-primary">Save changes</button>
       </div>
       </div>
       </div>
       </div>
       </div>

  <div class="modal fade" id="product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Escoger producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      <table class="table" id ="tableproduct">
                                <thead>
                                    <tr id ="trproducto">
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Stock</th>                                        
                                    </tr>
                                </thead>
                                <tbody >   @foreach($ArrayProductos as $producto)                            
                                            <tr class="table-tr" id= "row_product" data-precio="{{$producto['precio']}}" data-pnombre = "{{$producto['nombre']}}" data-id= "{{$producto['id']}}" >
                                                <td >{{$producto['nombre']}}</td>
                                                <td >{{$producto['precio']}}</td>
                                                <td>{{$producto['stock']}}</td>                                                
                                            </tr>
                                            @endforeach
                                
                                </tbody>                               
     
    </table>
   
    </div> 
    </div> 
    </div> 
    </div>   
    
<script>
$(function() {  

    var arregloProductos = []
  $('#detalleproducto').on('input','input.cantidad',function(e){
      var total = $(this).val()* $(this).data("precio");
      console.log(total)
    $(this).closest('tr').find('.subtotal').text(total)

  })
  $('table#tableproduct').on("click", "tr.table-tr", function() {

    arregloProductos.push({
        precio: $(this).data("precio"),
        nombre: $(this).data("pnombre"),
        total: $(this).data("precio"),
        id : $(this).data("id")
    })

   
    $('#detalleproducto').empty()
    
    $.each(arregloProductos, function(index,producto){
    
    let fila = `<tr>
                    
                    <td><input type= "hidden" name = "DetalleBoleta[${index}][ProductoId]" value= "${producto.id}"/>${producto.nombre}</td>
                    <td><input type="number" name = "DetalleBoleta[${index}][Cantidad]" min="1" value ="1" class="form-control cantidad" data-precio = "${producto.precio}" data-id = "${producto.id}"></td>                    
                    <td >${producto.precio}</td>
                    <td class= "subtotal" >${producto.total}</td>
                </tr>`
        $('#detalleproducto').append(fila)

    })
    
    
   $('#product').modal('toggle');   
 
  });

});
</script>

<script>
$(function() {
  $('#tableusuarios').on("click", "tr.table-tr", function() {
   $("#unombre").val($(this).data("unombre")); 
   $("#UsuarioId").val($(this).data("id")); 
   $('#usuario').modal('toggle');

  }); 
});
</script>

@endsection