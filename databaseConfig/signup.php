<?php
session_start();
// get database connection
include_once './database.php';

// instantiate user object
include_once './user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

// set user property values
$user->name = $_GET['name'];
$user->phoneNumber = $_GET['phoneNumber'];
$user->emailID = $_GET['emailID'];
$user->password = $_GET['password'];
$user->created = date('Y-m-d H:i:s');
/*
if(empty($user->phoneNumber))
 {
 echo("No user name");
 }
 else
 {
 echo("user name:" . $user->password);
 }
*/
// create the user
if($user->signup()){
 // Set User session variables
 $_SESSION['name'] = $user->name;
 $_SESSION['emailID'] = $user->emailID;
 $_SESSION['phoneNumber'] = $user->phoneNumber;
 $_SESSION['admin'] = $user->admin;
 // User Logged In?
 $_SESSION['loggedIn'] = TRUE;
 // User login error?
 $_SESSION['loginError'] = NULL;
 $_SESSION['signupError'] = NULL;
 $user_arr=array(
 "status" => true,
 "message" => "Successfully Signup!",
 "name" => $user->name,
 "id" => $user->id,
 "emailID" => $user->emailID,
 "phoneNumber" => $user->phoneNumber
 );
}
else{
 $_SESSION['signupError'] = 'TRUE';
 $user_arr=array(
 "status" => false,
 "message" => "phoneNumber already exists!"
 );
}
print_r(json_encode($user_arr)); 
?> 