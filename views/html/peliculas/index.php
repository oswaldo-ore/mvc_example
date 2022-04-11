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
                                Registrar Pelicula
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="/mvc/pelicula/guardar" method="post">
                                <div class="form-group mb-3">
                                    <label class="form-label"> Código: </label>
                                    <input type="text" id="codigo" class="form-control" name="codigo" autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label"> Titulo: </label>
                                    <input type="text" id="titulo" class="form-control" name="titulo" autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label"> Duración: </label>
                                    <input type="text" id="duracion" class="form-control" name="duracion" autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label"> Género: </label>
                                    <select class="form-control" id="genero_id" name="genero_id">
                                        <?php foreach ($this->generos as $row => $genero) { ?>
                                            <option value="<?php echo $genero["id"] ?>"> <?php echo $genero["nombre"] ?> </option>
                                        <?php } ?>

                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Guardar </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Lista de Peliculas</div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Código</th>
                                        <th scope="col">Titulo</th>
                                        <th scope="col">Duracion</th>
                                        <th scope="col">Genero</th>
                                        <th scope="col">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($this->peliculas as $row => $pelicula) { ?>
                                        <tr>
                                            <th scope="row"><?php echo $pelicula['codigo'] ?></th>
                                            <td scope="row"><?php echo $pelicula['titulo'] ?></td>
                                            <th scope="row"><?php echo $pelicula['duracion'] ?></th>
                                            <td scope="row"><?php echo $pelicula['genero_id'] ?></td>
                                            <td scope="row">
                                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal<?php echo $pelicula['codigo'] ?>">
                                                    Editar
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#EliminarModal<?php echo $pelicula['codigo'] ?>">
                                                    Eliminar
                                                </button>

                                                <!-modal editar-->
                                                    <div class="modal fade" id="editarModal<?php echo $pelicula['codigo'] ?>" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Editar pelicula</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <form action="/mvc/pelicula/modificar" method="post">
                                                                    <div class="modal-body">
                                                                        <div class="form-group mb-3">
                                                                            <label class="form-label"> Código: </label>
                                                                            <input type="text" id="nombre" class="form-control" value="<?php echo $pelicula['codigo'] ?>" name="codigo" readonly autocomplete="off">
                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            <label class="form-label"> Titulo: </label>
                                                                            <input type="text" id="nombre" class="form-control" value="<?php echo $pelicula['titulo'] ?>" name="titulo" autocomplete="off">
                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            <label class="form-label"> Duración: </label>
                                                                            <input type="text" id="nombre" class="form-control" value="<?php echo $pelicula['duracion'] ?>" name="duracion" autocomplete="off">
                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            <label class="form-label"> Género: </label>
                                                                            <select class="form-control" id="genero_id" name="genero_id">
                                                                                <?php foreach ($this->generos as $row => $genero) { ?>
                                                                                    <option value="<?php echo $genero["id"] ?>" <?php echo $genero['id'] == $pelicula['genero_id'] ? "selected" : "" ?>>
                                                                                        <?php echo $genero["nombre"]  ?>
                                                                                    </option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- modal delete-->
                                                    <div class="modal fade" id="EliminarModal<?php echo $pelicula['codigo'] ?>" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Editar pelicula</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Estas seguro de eliminar el pelicula <strong> <?php echo $pelicula['titulo'] ?> </strong> </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <a type="submit" href="/mvc/pelicula/eliminar?codigo=<?php echo $pelicula['codigo'] ?>" class="btn btn-primary">Eliminar </a>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require 'views/html/utils/footer.php' ?>
    </div>

</body>

</html>