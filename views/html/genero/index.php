<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Genero</title>
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
        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-md-6 ">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Registrar Genero
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="/mvc/genero/guardar" method="post">
                                <div class="form-group mb-3">
                                    <label class="form-label"> Nombre: </label>
                                    <input type="text" id="nombre" class="form-control" name="nombre" autocomplete="off">
                                </div>
                                <button type="submit" class="btn btn-primary">Guardar </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Lista de generos</div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">nombre</th>
                                        <th scope="col">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($this->generos as $row => $genero) { ?>
                                        <tr>
                                            <th scope="row"><?php echo $genero['id'] ?></th>
                                            <td scope="row"><?php echo $genero['nombre'] ?></td>
                                            <td scope="row">
                                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal<?php echo $genero['id'] ?>">
                                                    Editar
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#EliminarModal<?php echo $genero['id'] ?>">
                                                    Eliminar
                                                </button>

                                                <!-modal editar-->
                                                    <div class="modal fade" id="editarModal<?php echo $genero['id'] ?>" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Editar genero</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <form action="/mvc/genero/modificar" method="post">
                                                                    <div class="modal-body">
                                                                        <div class="form-group mb-3">
                                                                            <label class="form-label"> id: </label>
                                                                            <input type="text" id="genero_id" value="<?php echo $genero['id'] ?>" readonly class="form-control" name="genero_id" autocomplete="off">
                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            <label class="form-label"> Nombre: </label>
                                                                            <input type="text" id="nombre" value="<?php echo $genero['nombre'] ?>" class="form-control" name="nombre" autocomplete="off">
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
                                                    <div class="modal fade" id="EliminarModal<?php echo $genero['id'] ?>" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Editar genero</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Estas seguro de eliminar el genero <strong> <?php echo $genero['nombre'] ?> </strong> </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <a type="submit" href="/mvc/genero/eliminar?id=<?php echo $genero['id'] ?>" class="btn btn-primary">Eliminar </a>
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