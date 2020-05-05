<?php
session_start();
include_once '../databaseConfig/credentials.php';
// Table name
$table_name = "orders";

$name = $_POST['name'];
$phoneNumber = $_POST['phoneNumber'];
$emailID = $_POST['emailID'];
$item = $_POST['item'];
$price = $_POST['price'];

// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO `orders` (`name`, `phoneNumber`, `emailID`, `item`, `price`) VALUES 
('$name', '$phoneNumber', '$emailID', '$item', '$price')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

$_SESSION['ordered'] = TRUE;

header("Location: ../products.php");
exit();

?>