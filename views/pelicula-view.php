<?php
require_once 'models/peliculaModel.php';
require_once 'models/generoModel.php';

class PeliculaView
{
    private $peliculaModel;
    private $peliculas;
    public $message;
    private $genero;
    private $generos;

    public function __construct()
    {
        $this->peliculaModel = new PeliculaModel();
        $this->message = "";
        $this->peliculas = [];
        $this->genero = new GeneroModel();
        $this->generos = $this->genero->getGeneros();
    }

    function listar()
    {
        $this->peliculas =  $this->peliculaModel->getPeliculas();
        $this->render();
    }

    function render()
    {
        require 'views/html/peliculas/index.php';
    }
}
