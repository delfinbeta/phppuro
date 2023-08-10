<?php
require_once 'Connection.php';

class User extends Connection
{
    private $table = 'users';
    public $pdo;

    public function __construct()
    {
        $this->pdo = parent::conexion();
    }

    public function getAll()
    {
        try {
            $query = $this->pdo->prepare("SELECT * FROM $this->table");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die('[' . $e->getCode() . '] ' . $e->getMessage());
        }
    }

    public function getById(int $id)
    {
        try {
            $query = $this->pdo->prepare("SELECT * FROM $this->table WHERE id=?");
            $query->execute(array($id));
            return $query->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die('[' . $e->getCode() . '] ' . $e->getMessage());
        }
    }

    public function getByUsername(string $username)
    {
        try {
            $query = $this->pdo->prepare("SELECT * FROM $this->table WHERE username=?");
            $query->execute(array($username));
            return $query->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die('[' . $e->getCode() . '] ' . $e->getMessage());
        }
    }

    public function create($firstname, $lastname, $username, $password)
    {
        try {
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $query = $this->pdo->prepare("INSERT INTO $this->table (firstname, lastname, username, password) VALUES (?, ?, ?, ?)");
            $query->execute(array($firstname, $lastname, $username, $hash));
        } catch(PDOException $e) {
            die('[' . $e->getCode() . '] ' . $e->getMessage());
        }
    }
    
    public function update($id, $firstname, $lastname, $username, $admin, $password)
    {
        try {
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $query = $this->pdo->prepare("UPDATE $this->table SET firstname=?, lastname=?, username=?, admin=?, password=? WHERE id=?");
            $query->execute(array($firstname, $lastname, $username, $admin, $hash, $id));
        } catch(PDOException $e) {
            die('[' . $e->getCode() . '] ' . $e->getMessage());
        }
    }

    public function delete(int $id)
    {
        try {
            $query = $this->pdo->prepare("DELETE FROM $this->table WHERE id=?");
            $query->execute(array($id));
        } catch (PDOException $e) {
            die('[' . $e->getCode() . '] ' . $e->getMessage());
        }
    }
}