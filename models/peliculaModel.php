<?php

require_once 'models/db.php';

class PeliculaModel
{
    /*private $codigo;
    private $titulo;
    private $duracion;*/

    private $connection;

    public function __construct()
    {
    }

    private function getConnection()
    {
        $dbObj = new Db();
        $this->connection = $dbObj->connection;
    }

    public function getPeliculas()
    {
        try {
            $this->getConnection();
            $sql = "select * from peliculas ";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            return [];
        }
    }

    public function save($codigo, $titulo, $duracion, $genero_id)
    {
        try {
            $this->getConnection();
            $sql = "insert into peliculas(codigo,titulo,duracion,genero_id) values(:codigo,:titulo,:duracion,:genero_id)";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':codigo', $codigo);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':duracion', $duracion);
            $stmt->bindParam(':genero_id', $genero_id);
            $stmt->execute();
            return "Película guardado con éxito";
        } catch (\Throwable $th) {
            return "Ocurrió un error";
        }
    }

    public function update($titulo, $duracion, $genero_id, $codigo)
    {
        try {
            $this->getConnection();
            $sql = "update peliculas set titulo=:titulo, duracion=:duracion, genero_id=:genero_id where codigo=:codigo";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':codigo', $codigo);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':duracion', $duracion);
            $stmt->bindParam(':genero_id', $genero_id);
            $stmt->execute();
            return "Película actualizado con éxito";
        } catch (\Throwable $th) {
            var_dump($th->getMessage());
            return "Ocurrió un error";
        }
    }

    public function delete($id)
    {
        try {
            $this->getConnection();
            $sql = "delete from peliculas where codigo=:codigo";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':codigo', $id);
            $stmt->execute();
            return "Película eliminado con éxito";
        } catch (\Throwable $th) {
            return "Ocurrió un error";
        }
    }
}
