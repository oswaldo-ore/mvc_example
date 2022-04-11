<?php

require_once 'config/config.php';
class Db
{
    private $host;
    private $db;
    private $user;
    private $pass;
    public  $connection;

    public function __construct()
    {
        $this->host = constant('DB_HOST');
        $this->db = constant('DB_NAME');
        $this->user = constant('DB_USER');
        $this->pass = constant('DB_PASS');

        try {
            $this->connection = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db, $this->user, $this->pass, array(
                PDO::ATTR_PERSISTENT => true
            ));
        } catch (PDOException $th) {
            var_dump($th);
            return $th->getMessage();
        }
    }
}
