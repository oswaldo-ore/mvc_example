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
            <div class="row justify-content-center mt-4">
                <div class="col-md-6 ">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                ver nota de alquiler
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="#" method="post">
                                <div class="form-group mb-3">
                                    <label class="form-label"> Nro: </label>
                                    <input type="text" id="nro" class="form-control" name="nro" value="<?php echo $notaAlquiler["nro"] ?>" readonly autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label"> Dirección: </label>
                                    <input type="text" id="direccion" class="form-control" name="direccion" value="<?php echo $notaAlquiler["direccion"] ?>" readonly autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label"> Días: </label>
                                    <input type="text" id="dias" class="form-control" name="dias" value="<?php echo $notaAlquiler["dias"] ?>" readonly autocomplete="off">
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
                                    <button class="btn btn-primary btn-sm" type="submit"> actualizar</button>
                                </div>
                            </form>
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