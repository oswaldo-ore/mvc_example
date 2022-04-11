<?php
require_once 'models/db.php';
class GeneroModel
{
    /*private $id;
    private $genero;*/

    private $connection;

    public function __construct()
    {
    }

    private function getConnection()
    {
        $dbObj = new Db();
        $this->connection = $dbObj->connection;
    }

    public function getGeneros()
    {
        try {
            $this->getConnection();
            $sql = "select * from generos";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            return [];
        }
    }

    public function save($nombre)
    {
        try {
            $this->getConnection();
            $sql = "insert into generos(nombre) values(:nombre)";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->execute();
            return "Género guardado con éxito";
        } catch (\Throwable $th) {
            return "Ocurrió un error";
        }
    }

    public function update($nombre, $id)
    {
        try {
            $this->getConnection();
            $sql = "update generos set nombre=:nombre where id=:id";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return "Género actualizado con éxito";
        } catch (\Throwable $th) {
            return "Ocurrió un error";
        }
    }

    public function delete($id)
    {
        try {
            $this->getConnection();
            $sql = "delete from generos where id=:id";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return "Género eliminado con éxito";
        } catch (\Throwable $th) {
            return "Ocurrió un error";
        }
    }
}
