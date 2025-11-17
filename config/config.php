<?php
class Config {
    private $servername = "localhost";
    private $username   = "root";
    private $password   = "";
    private $dbname     = "lecturers_db";
    public  $conn;

    public function __construct() {
        $this->conn = new mysqli(
            $this->servername, 
            $this->username, 
            $this->password, 
            $this->dbname
        );

        if ($this->conn->connect_error) {
            die("Database connection failed: " . $this->conn->connect_error);
        }
        else{
          
        }
    }
}