<?php
session_start();
if (!isset($_SESSION['loggedIn'])) {
  header("Location: ./index.php");
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
  <link rel="stylesheet" href="./styles/index.css" />
  <title>Furniture Emporium - Dashboard</title>
  <meta name="description" content="User Dashboard Page!">
  <meta name="keywords" content="Offers, Purchase, UserConfig">
  <!-- REACT is JavaScript library created by Facebook used for building Web Apps -->
  <script src="https://unpkg.com/react@16/umd/react.production.min.js"></script>
  <script src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
  <script src="https://unpkg.com/babel-standalone@6.15.0/babel.min.js"></script>

</head>

<body>
  <?php include "./components/navbar.php"; ?>
  <div class="container-fluid">
    <div class="row">
      <?php
      echo '
  <div class="col-md-12 d-flex justify-content-center" style="background-color:#f1f1f1; padding: 20px;">
<h4>Welcome back ' . $_SESSION["name"] . '!</h4>
  </div>';
      ?>

      <div class="col-sm-7" style="margin-top: 16px;">
        <div class="box" style="width: 100%; background-color:#f1f1f1; padding:15px">
          <?php
          if ($_SESSION['admin'] == TRUE) {
            echo ' <h2 align="center">Manager REST API</h2>';
            include "./productRestApi/index.php";
          } else {
            echo 'Hi';
          }
          ?>
        </div>
      </div>
      <div class="col-sm-5" style="margin-top: 16px;">
        <div class="box" style="width: 100%; background-color:#f1f1f1; padding:15px">
          <iframe src="https://open.spotify.com/embed/playlist/2njiabuQAJcRTKC4CDja47" width="100%" height="480" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
        </div>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>