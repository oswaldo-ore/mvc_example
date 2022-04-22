<?php

require_once 'models/db.php';
require_once 'models/detalleAlquilaModel.php';

class NotaAlquilaModel
{
    private $connection;
    private $detalleAlquilaModel;
    public function __construct()
    {
        $this->detalleAlquilaModel = new DetalleAlquilaModel();
    }

    private function getConnection()
    {
        $dbObj = new Db();
        $this->connection = $dbObj->connection;
    }

    public function save($nro, $direccion, $dias, $listaPeliculaId)
    {
        $this->getConnection();
        $date = date("Y-m-d");
        try {
            $sql = "insert into notasalquila(nro,fecha,direccion,dias) values(:nro,:fecha,:direccion,:dias);";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":nro", $nro);
            $stmt->bindParam(":fecha", $date);
            $stmt->bindParam(":direccion", $direccion);
            $stmt->bindParam(":dias", $dias);
            $stmt->execute();
            foreach ($listaPeliculaId as $key => $pelicula) {
                $result = $this->detalleAlquilaModel->save($nro, $pelicula["pelicula_id"]);
            }
            return "Nota de alquiler guardado correctamente";
        } catch (\Throwable $th) {
            echo $th;
            return "Ocurrió un error";
        }
    }
    public function getNotaAlquiler($nro)
    {
        $this->getConnection();
        try {
            $sql = "select * from notasalquila where nro=:nro";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":nro", $nro);
            $stmt->execute();
            $nota = $stmt->fetchAll();
            $nota[0]["detalleAlquila"] = $this->detalleAlquilaModel->getDetalleAlquila($nro);
            return $nota;
        } catch (\Throwable $th) {
            echo $th;
            return [];
        }
    }

    public function getAll()
    {
        $this->getConnection();
        try {
            $sql = "select * from notasalquila";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $notasAlquila = $stmt->fetchAll();
            for ($i = 0; $i < count($notasAlquila); $i++) {
                $notasAlquila[$i]["detalleAlquila"] = $this->detalleAlquilaModel->getDetalleAlquila($notasAlquila[$i]["nro"]);
            }
            return $notasAlquila;
        } catch (\Throwable $th) {
            echo $th;
            return [];
        }
    }

    public function delete($nro)
    {
        try {
            $this->getConnection();
            $sql = "delete from notasalquila where nro=:nro";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':nro', $nro);
            $stmt->execute();
            return "Nota alquiler eliminado con éxito";
        } catch (\Throwable $th) {
            return "Ocurrió un error";
        }
    }
}
