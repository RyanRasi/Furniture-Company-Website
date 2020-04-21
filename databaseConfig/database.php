<?php
class Database{

 // specify your own database credentials
 private $host = "localhost";
 //private $db_name = "PHPLearning";
 private $username = "root";
 private $password = "";
 private $dbname = "17010485";
 public $conn;

 // get the database connection
 public function getConnection(){

 $this->conn = null;

 try{
 $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
 $this->conn->exec("set names utf8"); 
  //echo "Connected!"
 }catch(PDOException $exception){
 echo "Connection error: " . $exception->getMessage();
 }

 return $this->conn;
 }
}
?>