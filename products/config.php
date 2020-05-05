<?php

class Database{ 

    // get the database connection     
    public function getConnection(){       
        include_once '../databaseConfig/credentials.php';    
        $this->conn = null;           
        try{             
            $this->conn = new PDO("mysql:host=" . $host . ";dbname=" . $dbname, $username, $password);           
            $this->conn->exec("set names utf8"); 
    //echo "Connected!"         
        } catch (PDOException $exception) {            
            echo "Connection error: " . $exception->getMessage();         
        }           
    return $this->conn;     
    }
} 
?>