<?php
class Connection
{
    private $driver = "mysql";
    private $host = "localhost";
    private $user = "delfin";
    private $pass = 'avw*xQP5p229';
    private $dbName = "phppuro";
    private $charset = "utf8";

    protected function conexion()
    {
        try {
            $pdo = new PDO("{$this->driver}:host={$this->host};dbname={$this->dbName};charset={$this->charset}", $this->user, $this->pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die('[' . $e->getCode() . '] ' . $e->getMessage());
        }
    }
}