<?php
session_start();
$_SESSION['loginError'] = NULL;
$_SESSION['signupError'] = NULL;
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
  <link rel="stylesheet" href="./styles/products.css" />
  <title>Furniture Emporium - Product Range</title>
  <meta name="description" content="Products range!">
  <meta name="keywords" content="Furniture Store, Kitchen, Delivery, Environmentally friendly, Sofa, Coffee Table, Rug, Bookcases, Media Units, Arm Chairs, Lamps, Fridge, Cooker, Sinks, Cabinets, Appliances, Chairs, Worktops">
  <!-- REACT is JavaScript library created by Facebook used for building Web Apps -->
  <script src="https://unpkg.com/react@16/umd/react.production.min.js"></script>
  <script src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
  <script src="https://unpkg.com/babel-standalone@6.15.0/babel.min.js"></script>

</head>

<body>
  <?php include "components/navbar.php"; ?>

  <?php
  // If a product has been ordered then a success message is displayed
  if (isset($_SESSION['ordered'])) {
    echo '
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <h4>You have successfully ordered your product!</h4>
  <h4>It will arrive in 3 - 5 business days!</h4>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
';

    $_SESSION['ordered'] = NULL;
  }
  ?>

<!-- Living room and kitchen links inside a container -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-6">
        <a href="./livingRoom.php">
          <img alt="Living Room" src="./img/livingroom.jpg">
          <h1 class="headline">Living Room</h1>
        </a>
      </div>

      <div class="col-xl-6">
        <a href="./kitchen.php">
          <img alt="Kitchen" src="./img/kitchen.jpg">
          <h1 class="headline">Kitchen</h1>
        </a>
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