<?php
class User{

 // database connection and table name
 private $conn;
 //private $table_name = "users";
 private $table_name = "users";

 // object properties
 public $id;
 public $name;
 public $phoneNumber;
 public $emailID;
 public $password;
 public $admin;
 public $created;

 // constructor with $db as database connection
 public function __construct($db){
 $this->conn = $db;
 }
 // signup user
 function signup(){

 if($this->isAlreadyExist()){
 return false;
 }
 // query to insert record
 $query = "INSERT INTO
 " . $this->table_name . "
 SET
 name=:name, phoneNumber=:phoneNumber, emailID=:emailID, password=:password, admin=:admin, created=:created";

 // prepare query
 $stmt = $this->conn->prepare($query);

 // sanitize
 $this->name=htmlspecialchars(strip_tags($this->name));
 $this->phoneNumber=htmlspecialchars(strip_tags($this->phoneNumber));
 $this->emailID=htmlspecialchars(strip_tags($this->emailID));
 $this->password=htmlspecialchars(strip_tags($this->password));
 $this->admin=htmlspecialchars(strip_tags($this->admin));
 $this->created=htmlspecialchars(strip_tags($this->created));
  // bind values
 $stmt->bindParam(":name", $this->name);
 $stmt->bindParam(":phoneNumber", $this->phoneNumber);
 $stmt->bindParam(":emailID", $this->emailID);
 $stmt->bindParam(":password", $this->password);
 $stmt->bindParam(":admin", $this->admin);
 $stmt->bindParam(":created", $this->created);

 // execute query
 if($stmt->execute()){
 $this->id = $this->conn->lastInsertId();
 return true;
 }

 return false;

 }
 // login user
 function login(){
 // select all query
 $query = "SELECT
 `id`, `name`, `phoneNumber`, `emailID`, `password`, `admin`, `created`
 FROM
 " . $this->table_name . "
 WHERE
 phoneNumber='".$this->phoneNumber."' AND password='".$this->password."'";
 // prepare query statement
 $stmt = $this->conn->prepare($query);
 // execute query
 $stmt->execute();
 return $stmt;
 }
 function isAlreadyExist(){
 $query = "SELECT *
 FROM
 " . $this->table_name . "
 WHERE
 phoneNumber='".$this->phoneNumber."'";
 // prepare query statement
 $stmt = $this->conn->prepare($query);
 // execute query
 $stmt->execute();
 if($stmt->rowCount() > 0){
 return true;
 }
 else{
 return false;
 }
 }
} 