<?php
require_once 'models/peliculaModel.php';
require_once 'models/notaAlquilaModel.php';
require_once 'models/peliculaModel.php';

class NotaAlquilaView
{
    private $peliculaModel;
    private $notaAlquilaModel;
    private $peliculas;
    private $notasAlquiler;
    public $message;

    public function __construct()
    {
        $this->peliculaModel = new PeliculaModel();
        $this->message = "";
        $this->peliculas = $this->peliculaModel->getPeliculas();
        $this->notaAlquilaModel = new NotaAlquilaModel();
        $this->notasAlquiler = [];
    }

    public function listar()
    {
        $this->notasAlquiler = $this->notaAlquilaModel->getAll();
        $this->render();
    }

    public function ver($nro)
    {
        $notaAlquiler = $this->notaAlquilaModel->getNotaAlquiler($nro)[0];
        require 'views/html/nota-alquila/detalle.php';
    }

    public function render()
    {
        require 'views/html/nota-alquila/index.php';
    }
}
