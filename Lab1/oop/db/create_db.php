<?php

namespace db;

use PDO;
use PDOException;
class CreateDB
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    public $db_name;
    public $conn;
    public $success;
    public $message;
    public function __construct($dbname)
    {
        $this->db_name = $dbname;
        $this->createDB();
    }
    public function createDB()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;", $this->username, $this->password);

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE DATABASE $this->db_name";
            $this->conn->exec($sql);

            $this->success = true;
            $this->message = "DB created successfully";
        } catch (PDOException $e) {
            $this->success = false;
            $this->message = "Creating DB failed: " . $e->getMessage();
        }
    }

    public function __destruct()
    {
        $this->conn = NULL;
    }
 
}




