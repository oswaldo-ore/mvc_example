<?php

require_once 'models/db.php';

class DetalleAlquilaModel
{
    private $connection;
    public function __construct()
    {
    }

    private function getConnection()
    {
        $dbObj = new Db();
        $this->connection = $dbObj->connection;
    }

    public function save($nro, $pelicula_cod)
    {
        $sql = "insert into detallesalquila(notaalquila_nro,pelicula_cod)values(:notaalquila_nro,:pelicula_cod)";
        try {
            $this->getConnection();
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':notaalquila_nro', $nro);
            $stmt->bindParam(':pelicula_cod', $pelicula_cod);
            $stmt->execute();
            return "detalle guardado con éxito";
        } catch (\Throwable $th) {
            echo $th;
            return "Ocurrió un error";
        }
    }

    public function getDetalleAlquila($nro)
    {
        $this->getConnection();
        try {
            $sql = "select * from detallesalquila where notaalquila_nro=:notaalquila_nro";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":notaalquila_nro", $nro);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            echo $th;
            return [];
        }
    }
}
