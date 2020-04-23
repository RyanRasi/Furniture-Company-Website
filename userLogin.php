<?php
session_start();
if (isset($_SESSION['loggedIn'])) {
  header("Location: userDashboard.php");
  exit();
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="./styles/base.css" />
  <link rel="stylesheet" href="./styles/login.css">
  <title>Furniture Emporium - Login</title>
  <meta name="description" content="User Login Page!">
  <meta name="keywords" content="Login, Signin">
</head>

<body>
  <?php include "./components/navbar.php"; ?>

  <form action="./databaseConfig/login.php" method="POST">
  <?php
 if (isset($_SESSION['loginError'])) {
   echo '<h4>Error - Invalid credentials were submitted!</h4>';
}
  ?>
   Enter your Phone Number:<br />
   <input type="text" name="phoneNumber" />
   <br />
   Enter your Password:<br />
   <input type="password" name="password" />
   <br />
   <input type="submit" value="Login" />
  </form>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>