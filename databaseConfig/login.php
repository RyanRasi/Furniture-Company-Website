<?php
session_start();
// include database and object files
include_once './database.php';
include_once './user.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare user object
$user = new User($db);
// set ID property of user to be edited
$user->phoneNumber = isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : die();
$user->password = isset($_POST['password']) ? $_POST['password'] : die();
// read the details of user to be edited
$stmt = $user->login();
if($stmt->rowCount() > 0){
 // get retrieved row
 $row = $stmt->fetch(PDO::FETCH_ASSOC);
 // Set User session variables
 $_SESSION['name'] = $row['name'];
 $_SESSION['emailID'] = $row['emailID'];
 $_SESSION['phoneNumber'] = $row['phoneNumber'];
 //Manager logged in?
 $_SESSION['admin'] = $row['admin'];
 // User Logged In?
 $_SESSION['loggedIn'] = TRUE;
 // User login error?
 $_SESSION['loginError'] = NULL;
 $_SESSION['signupError'] = NULL;
 // create array
 $user_arr=array(
 "status" => true,
 "message" => "Successfully Login!",
 "id" => $row['id'],
 "name" => $row['name'],
 "emailID" => $row['emailID'],
 "phoneNumber" => $row['phoneNumber']
 );
 header("Location: ../userDashboard.php");
 exit();
}
else{
 // User login error?
 $_SESSION['loginError'] = 'TRUE';
 $user_arr=array(
 "status" => false,
 "message" => "Invalid phoneNumber or Password!",
 );
 header("Location: ../userLogin.php");
 exit();
}
// make it json format
print_r(json_encode($user_arr));
?> 
