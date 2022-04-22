<?php
require_once 'models/notaAlquilaModel.php';
require_once 'views/notaAlquila-view.php';
class NotaAlquilaController
{
    private $notaAlquilaModel;
    private $notaAlquilaView;
    public function __construct()
    {
        $this->notaAlquilaModel = new NotaAlquilaModel();
        $this->notaAlquilaView = new NotaAlquilaView();
    }

    public function listar()
    {
        $this->notaAlquilaView->listar();
    }

    public function ver()
    {
        $nro = $_POST["nro"];
        $this->notaAlquilaView->ver($nro);
    }

    public function guardar()
    {
        $nro = $_POST["nro"];
        $direccion = $_POST["direccion"];
        $dias = $_POST["dias"];
        $listaPeliculaId = $_POST["detalleAlquila"];
        $this->notaAlquilaModel->save($nro, $direccion, $dias, $listaPeliculaId);
        $this->notaAlquilaView->listar();
    }

    public function eliminar()
    {
        $nro = $_POST["nro"];
        $this->notaAlquilaModel->delete($nro);
        $this->notaAlquilaView->listar();
    }
}
