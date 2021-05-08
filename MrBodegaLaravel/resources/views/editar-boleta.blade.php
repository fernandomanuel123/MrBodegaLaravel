@extends('layouts.app')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<div class="container">
<form id= "formulario" method = "POST" action="/boletas/editar-boleta/{{$boleta_id}}">
@method('PUT')
@csrf
<h3>Editar Boleta</h3>
<div className="form-group">
                        <label>seleccionar usuario</label>
                        <br>
                        <input type="text" id= "unombre" className="form-control" value= "{{($Usuariotraido['nombre'])}}" data-toggle="modal" data-target="#usuario" />
                        <input name= "UsuarioId" type = "hidden" id = "UsuarioId" value = "{{($Usuariotraido['id'])}}" />
                </div> 

                         <div class="mb-3">
                         <label  class="form-label">Fecha</label>
                         <input  id= "l-fecha" type="date" class="form-control" name="Fecha" value = "{{$fecha}}">
                         </div>  
                         <div class="form-group">
                         <label >Dirección</label>
                         <input type="text" class="form-control" id="Direccion" name="Direccion" required value = "{{$ArrayBoleta['direccion']}}">
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
            <td><button type= "submit" id="btn-grabar" class="btn btn-primary">Save changes</button></td>
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
   
<script>
$(function() {  

    var arregloProductos = @json($productostraidos);
  $('#detalleproducto').on('input','input.cantidad',function(e){
      var total = $(this).val()* $(this).data("precio");
      console.log(total)
    $(this).closest('tr').find('.subtotal').text(total)

  })
  /*$('table#tableproduct').on("click", "tr.table-tr", function() {

    arregloProductos.push({
        precio: $(this).data("precio"),
        nombre: $(this).data("pnombre"),
        total: $(this).data("precio"),
        id : $(this).data("id")
    })

   
    $('#detalleproducto').empty()
    */
    $.each(arregloProductos, function(index,producto){
    producto.total = producto.cantidad*producto.precio
    let fila = `<tr>
                    
                    <td><input type= "hidden" name = "DetalleBoleta[${index}][id]" value= "${producto.id_registro}"/>
                    <input type= "hidden" name = "DetalleBoleta[${index}][ProductoId]" value= "${producto.id}"/>${producto.nombre}</td>
                    <td><input type="number" name = "DetalleBoleta[${index}][Cantidad]" min="1" value ="${producto.cantidad}" class="form-control cantidad" data-precio = "${producto.precio}" data-id = "${producto.id}"></td>                    
                    <td >${producto.precio}</td>
                    <td class= "subtotal" >${producto.total}</td>
                </tr>`
        $('#detalleproducto').append(fila)

    })
    
    
   //$('#product').modal('toggle');   
 
  //});   
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