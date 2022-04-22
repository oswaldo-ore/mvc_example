<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar pelicula</title>
</head>

<body>
    <?php require 'views/html/utils/header.php' ?>



    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="10000">
        <div class="toast-header">
            <img src="" class="rounded mr-2" alt="">
            <strong class="mr-auto">Mensaje</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <?php echo $this->message; ?>
        </div>
    </div>
    <div class="main">
        <?php echo $this->message; ?>
        <div class="container">
            <div class="row justify-content-center mt-4 mb-4">
                <div class="col-md-6 ">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Registrar Nota Alquiler
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="/mvc/notaAlquila/guardar" method="post">
                                <div class="form-group mb-3">
                                    <label class="form-label"> Nro: </label>
                                    <input type="text" id="nro" class="form-control" name="nro" autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label"> Dirección: </label>
                                    <input type="text" id="direccion" class="form-control" name="direccion" autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label"> Días: </label>
                                    <input type="text" id="dias" class="form-control" name="dias" autocomplete="off">
                                </div>
                                <div class="form-group mb-3" id="detalles">
                                </div>
                                <div class="form-group mb-3">
                                    <h4 class="card-title"> Lista de Peliculas </h4>
                                    <table class="table table-hover">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Titulo</th>
                                                <th>Duración</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($this->peliculas as $row => $pelicula) { ?>
                                                <tr id="<?php echo $row ?>">
                                                    <td><?php echo $pelicula["codigo"] ?></td>
                                                    <td><?php echo $pelicula["titulo"] ?></td>
                                                    <td><?php echo $pelicula["duracion"] ?></td>
                                                    <td><a class="btn btn-primary" onclick="agregarCarrito(<?php echo $row ?>)">Agregar</a></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="form-group mb-3">
                                    <button class="btn btn-primary btn-sm" type="submit"> guardar</button>
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#verModal">
                                        Ver
                                    </button>
                                </div>
                            </form>
                            <div class="modal fade" id="verModal" tabindex="-1" aria-labelledby="verModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ver Nota Alquiler</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="/mvc/notaAlquila/ver" method="post">
                                            <div class="modal-body">
                                                <div class="form-group mb-3">
                                                    <label class="form-label"> Ingrese el codigo del alquiler: </label>
                                                    <input type="text" id="nro" class="form-control" name="nro" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Ver</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Lista de alquiler</div>
                        </div>
                        <div class="card-body">
                            <table class="table" id="lista-alquiler">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Código</th>
                                        <th scope="col">Titulo</th>
                                        <th scope="col">Duracion</th>
                                        <th scope="col">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody id="table-body">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <th>Nro</th>
                        <th>Fecha</th>
                        <th>Direccion</th>
                        <th>Dias</th>
                        <th>Acción</th>
                    </thead>
                    <tbody>
                        <?php foreach ($this->notasAlquiler as $key => $notaAlquiler) { ?>
                            <tr>
                                <td><?php echo $notaAlquiler["nro"] ?></td>
                                <td><?php echo $notaAlquiler["fecha"] ?> </td>
                                <td><?php echo $notaAlquiler["direccion"] ?></td>
                                <td><?php echo $notaAlquiler["dias"] ?></td>
                                <td>
                                    <a type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#verMasModal<?php echo $notaAlquiler['nro'] ?>"> ver mas
                                    </a>
                                    <a type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminarNotaModal<?php echo $notaAlquiler['nro'] ?>"> eliminar
                                    </a>
                                    <div class="modal fade" id="verMasModal<?php echo $notaAlquiler['nro'] ?>" tabindex="-1" aria-labelledby="verMasModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ver Detalles</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="/mvc/pelicula/modificar" method="post">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label"> Nro: </label>
                                                                    <input type="text" class="form-control form-control-sm" value="<?php echo $notaAlquiler['nro'] ?>" name="nro" readonly autocomplete="off">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label"> Fecha: </label>
                                                                    <input type="text" class="form-control form-control-sm" value="<?php echo $notaAlquiler['fecha'] ?>" name="fecha" readonly autocomplete="off">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label"> Direccion: </label>
                                                                    <input type="text" class="form-control form-control-sm" value="<?php echo $notaAlquiler['direccion'] ?>" name="direccion" readonly autocomplete="off">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label"> Dias: </label>
                                                                    <input type="text" class="form-control form-control-sm" value="<?php echo $notaAlquiler['dias'] ?>" name="dias" readonly autocomplete="off">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <table class="table table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <td>id</td>
                                                                            <td>pelicula_id</td>
                                                                            <td>nota_nro</td>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php foreach ($notaAlquiler["detalleAlquila"] as $key => $detalle) { ?>
                                                                            <tr>
                                                                                <td><?php echo $detalle["id"] ?> </td>
                                                                                <td><?php echo $detalle["pelicula_cod"] ?> </td>
                                                                                <td><?php echo $detalle["notaalquila_nro"] ?> </td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="eliminarNotaModal<?php echo $notaAlquiler['nro'] ?>" tabindex="-1" aria-labelledby="eliminarNotaModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar nota</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Estas seguro que desea eliminar la nota de alquiler?</p>
                                                </div>
                                                <form action="/mvc/notaAlquila/eliminar" method="post">
                                                    <div class="modal-footer">
                                                        <input type="hidden" id="nro" name="nro" value="<?php echo $notaAlquiler['nro'] ?>">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                        <button type="submit" class="btn btn-primary">Si</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <!--Modal ver mas-->
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php require 'views/html/utils/footer.php' ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script>
        function agregarCarrito(index) {
            var pelicula = document.getElementById(index);
            codigo = pelicula.getElementsByTagName("td")[0].innerHTML;
            titulo = pelicula.getElementsByTagName("td")[1].innerHTML;
            duracion = pelicula.getElementsByTagName("td")[2].innerHTML;
            accion = "hola";
            row = '<tr><td>' + codigo + '</td> <td>' + titulo + '</td> <td>' + duracion + '</td> <td>' + accion + '</td> </tr>';
            $("#lista-alquiler").append(row);
            inputForm = '<input type="hidden" name="detalleAlquila[]" value="' + codigo + '">';
            $("#detalles").append(inputForm);
        }
    </script>
</body>

</html>