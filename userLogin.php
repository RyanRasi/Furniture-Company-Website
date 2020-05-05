<?php
session_start();
$_SESSION['signupError'] = NULL;
if (isset($_SESSION['loggedIn'])) {
  header("Location: userDashboard.php");
  exit();
}
// If the user is logged in then they are redirected to the dashboard page
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
  <link rel="stylesheet" href="./styles/form.css">
  <title>Furniture Emporium - Login</title>
  <meta name="description" content="User Login Page!">
  <meta name="keywords" content="Login, Signin">
</head>

<body>
  <!-- Imports the Navbar -->
  <?php include "./components/navbar.php"; ?>

  <form action="./databaseConfig/login.php" method="POST">
  <div class="container text-center">
    <h1>Welcome Back!</h1>
    <h3>Please login with your user credentials below!</h3>
    <?php
 if (isset($_SESSION['loginError'])) {
   echo '<h6>Error - Invalid credentials were submitted!</h6>';
}
  ?>
    <div class="row">
    <div class="col-md-1">
</div>
      <div class="col-10 mx-auto text-center align-vertical">
    <form>
  <div class="form-group">
    <label class="form-control" for="exampleInputEmail1">Phone Number
    <input type="text" name="phoneNumber" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </label>
   
   </div>
   <div class="form-group">
   <label class="form-control" for="exampleInputPassword1">Password
     <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
   </label>
   </div>
   <!-- Redirects to signup page -->
   <p>Don't have an account with us yet? <a href="./userSignup.php">Sign up here!</a> </p>
   <!-- Submits value -->
   <input type="submit" value="Login" class="btn btn-primary"/>
  </form>
</div>
<div class="col-md-1">
</div>
</div>
</div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>