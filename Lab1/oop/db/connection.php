<?php

namespace db;

use PDO;
use PDOException;
class ConnectDB
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    public $db_name;
    public $conn;
    public $success;
    public $message;
    public function __construct($dbname = "lab4")
    {
        $this->db_name = $dbname;
        $this->connectDB();
    }
    public function connectDB()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->db_name", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->success = true;
            $this->message = "DB connected successfully";
        } catch (PDOException $e) {
            $this->success = false;
            $this->message = "Creating DB failed: " . $e->getMessage();
        }
    }

 
}




