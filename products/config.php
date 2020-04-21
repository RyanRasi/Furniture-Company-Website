<?php
class Database{ 
    private $dbhost_name = "localhost"; 
    private $database = "17010485";
    private $username = "root";
    private $password = "";
    public $conn;

    // get the database connection     
    public function getConnection(){           
        $this->conn = null;           
        try{             
            $this->conn = new PDO("mysql:host=" . $this->dbhost_name . ";dbname=" . $this->database, $this->username, $this->password);             
            $this->conn->exec("set names utf8"); 
    //echo "Connected!"         
        } catch (PDOException $exception) {            
            echo "Connection error: " . $exception->getMessage();         
        }           
    return $this->conn;     
    }
} 
?>