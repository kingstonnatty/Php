<?php

namespace db;

use db\ConnectDB;
use PDO;
use PDOException;

require 'connection.php';

class MigrateDB extends ConnectDB
{
    public function createTables()
    {
        if ($this->success) {
            try {
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // table 1 
                $tabl1 = "CREATE TABLE users (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(30) NOT NULL,
                password VARCHAR(30) NOT NULL,
                email VARCHAR(50),
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";
                $this->conn->exec($tabl1);

                // table 2
                $tabl1 = "CREATE TABLE products (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(30) NOT NULL,
                price FLOAT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";
                $this->conn->exec($tabl1);

                $this->message = "Tables created successfully";
            } catch (PDOException $e) {
                $this->success = false;
                $this->message = "Creating DB failed: " . $e->getMessage();
            }
        }
    }
}
