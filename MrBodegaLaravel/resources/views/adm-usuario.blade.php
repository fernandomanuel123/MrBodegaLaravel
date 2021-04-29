@extends('inc.header')

@section('content')



<div class="container">

    <h2>Listado de usuarios</h2>
    <div class="mb-3">

        <form class="mb-3" action="/save-usuario" method="POST">
            @csrf
            <button type="submit" id="btn-register" class="btn btn-primary">Registrar usuario</button>

            <button class="btn btn-primary dropdown-toggle ml-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Exportar archivo
            </button>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" id="exportpdf" href="#">Exportar PDF</a>
                <a class="dropdown-item" id="exportexcel" href="#">Exportar Excel</a>
            </div>
        </form>


        <form action="/importfile" id="formuploadajax" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="upload_file">Adjunte archivo</label>
            <input type="file" name="upload_file" id="upload_file">
            <button type="submit" class="btn btn-primary">Cargar usuarios</button>
        </form>



    </div>

    <div class="row justify-content-center">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Codigo de cliente</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach($ArrayUsuarios as $usuario)
                <tr>
                    <td>{{$usuario['id']}}</td>
                    <td>{{$usuario['nombre']}}</td>
                    <td>{{$usuario['apellido']}}</td>
                    <td>{{$usuario['correo']}}</td>
                    <td>{{$usuario['telefono']}}</td>
                    <td>{{$usuario['dni']}}</td>

                    <td>
                        <form action="/detalle-usuario/{{$usuario['id']}}" method="POST">
                            @csrf
                            <button class="btn btn-primary" type="submit">Editar</button>
                        </form>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
</div>


<script>
    $(function() {
        $("#formuploadajax").on("submit", function(e) {
            e.preventDefault();
            var f = $(this);
            var formData = new FormData();
            var filename = $('input[type=file]').val().replace(/C:\\fakepath\\/i, '');
            formData.append('files', $('input[type=file]')[0].files[0]);
            var filenameArray = filename.split('.');
            var ext = filenameArray[filenameArray.length - 1];

            if (ext == "txt") {
                $.ajax({
                    url: "http://localhost:5000/api/FileUpload",
                    type: "post",
                    data: formData,
                    dataType: "text",
                    contentType: false,
                    processData: false,
                    success: function() {
                        $.ajax({
                            url: "http://localhost:5000/api/Usuario/loadUsers/" + filename,
                            type: "post",
                            contentType: false,
                            processData: false,
                            success: function() {
                                location.reload();
                            },
                            error: function(xhr, textStatus, errorThrown) {
                                alert(textStatus);
                            }
                        })
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        alert(textStatus);
                    }
                })
            } else if (ext == "xlsx") {
                $.ajax({
                    url: "http://localhost:5000/api/FileUpload",
                    type: "post",
                    data: formData,
                    dataType: "text",
                    contentType: false,
                    processData: false,
                    success: function() {
                        $.ajax({
                            url: "http://localhost:5000/api/Usuario/loadUsersExcel/" + filename,
                            type: "post",
                            contentType: false,
                            processData: false,
                            success: function() {
                                location.reload();
                            },
                            error: function(xhr, textStatus, errorThrown) {
                                alert(textStatus);
                            }
                        })
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        alert(textStatus);
                    }
                })
            } else {
                alert("Error: Archivo invalido");
            }

        });
    });
</script>

<script>
    $(function() {
        $("#exportexcel").on("click", function(e) {
            $.ajax({
                url: "http://localhost:5000/api/Usuario/GetExcel/",
                type: "get",
                xhrFields: {

                    'responseType': 'blob'
                },
                dataType: 'binary',
                success: function(data) {
                    var blob = new Blob([data], {
                        type: 'application/vnd.ms-excel'
                    });
                    var downloadUrl = URL.createObjectURL(blob);
                    var a = document.createElement("a");
                    a.href = downloadUrl;
                    a.download = "usuarios.xlsx";
                    document.body.appendChild(a);
                    a.click();
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert(textStatus);
                }
            })
        });

    });
</script>

<script>
    $(function() {
        $("#exportpdf").on("click", function(e) {
            $.ajax({
                url: "http://localhost:5000/api/Usuario/getpdf/",
                method: 'GET',
                xhrFields: {

                    'responseType': 'blob'
                },
                dataType: 'binary',
                success: function(data) {
                    var a = document.createElement('a');
                    var url = window.URL.createObjectURL(data);
                    a.href = url;
                    a.download = 'usuarios.pdf';
                    a.click();
                    window.URL.revokeObjectURL(url);
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert(textStatus);
                }
            })
        });

    });
</script>
@endsection