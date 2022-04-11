<?php
require_once 'models/generoModel.php';
require_once 'views/genero-view.php';
class GeneroController
{
    private  $generoModel;
    public $generoView;

    public function __construct()
    {
        $this->generoModel = new GeneroModel();
        $this->generoView = new GeneroView();
    }

    function listar()
    {
        $this->generoView->listar();
    }

    function guardar()
    {
        $datos = (object)array();
        $datos->nombre = $_POST['nombre'];
        $this->generoView->message = $this->generoModel->save($datos->nombre);
        $this->generoView->listar();
        //$this->listar();
    }

    function modificar()
    {
        $datos = (object)array();
        $datos->nombre = $_POST['nombre'];
        $id = $_POST['genero_id'];
        $this->generoView->message = $this->generoModel->update($datos->nombre, $id);
        $this->listar();
    }

    function eliminar()
    {
        $id = $_GET["id"];
        $this->generoView->message = $this->generoModel->delete($id);
        $this->listar();
    }
}
