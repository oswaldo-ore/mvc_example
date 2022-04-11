<?php
require_once 'models/generoModel.php';
class GeneroView
{
    private $generoModel;
    private $generos;
    public $message;

    public function __construct()
    {
        $this->generoModel = new GeneroModel();
        $this->message = "";
        $this->generos = [];
    }

    function listar()
    {
        $this->generos =  $this->generoModel->getGeneros();
        $this->render();
    }

    function render()
    {
        require 'views/html/genero/index.php';
    }
}
