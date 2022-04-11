<?php
require_once 'models/peliculaModel.php';
require_once 'views/pelicula-view.php';
class PeliculaController
{

    private  $peliculaModel;
    public $peliculaView;

    public function __construct()
    {
        $this->peliculaModel = new PeliculaModel();
        $this->peliculaView = new PeliculaView();
    }

    function listar()
    {
        $this->peliculaView->listar();
    }

    function guardar()
    {
        $codigo = $_POST['codigo'];
        $titulo = $_POST['titulo'];
        $duracion = $_POST['duracion'];
        $genero_id = $_POST['genero_id'];
        $this->peliculaView->message = $this->peliculaModel->save($codigo, $titulo, $duracion, $genero_id);
        $this->peliculaView->listar();
    }

    function modificar()
    {
        $codigo = $_POST['codigo'];
        $titulo = $_POST['titulo'];
        $duracion = $_POST['duracion'];
        $genero_id = $_POST['genero_id'];
        $this->peliculaView->message = $this->peliculaModel->update($titulo, $duracion, $genero_id, $codigo);
        $this->listar();
    }

    function eliminar()
    {
        $codigo = $_GET["codigo"];
        $this->peliculaView->message = $this->peliculaModel->delete($codigo);
        $this->listar();
    }
}
