<?php
session_start();
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
    <title>Furniture Emporium - Homepage</title>

    <!-- REACT is JavaScript library created by Facebook used for building Web Apps -->
    <script src= "https://unpkg.com/react@16/umd/react.production.min.js"></script>
    <script src= "https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
    <script src="https://unpkg.com/babel-standalone@6.15.0/babel.min.js"></script>

  </head>
  <body>
      <?php include "./components/navbar.php";?>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js" integrity="sha256-lPE3wjN2a7ABWHbGz7+MKBJaykyzqCbU96BJWjio86U=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TimelineMax.min.js" integrity="sha256-fIkQKQryItPqpaWZbtwG25Jp2p5ujqo/NwJrfqAB+Qk=" crossorigin="anonymous"></script>

      <header>
        <section>
          <div class="hero">
            <img src="./img/sofa.jpg" alt="An image of a blue sofa">
            <h1 class="headline">Dream Big</h1>
          </div>
        </section>
      </header>

      <div class="slider"></div>

<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-4 mx-auto">
            <div class="card h-100 border-primary justify-content-center">
  <img class="card-img-top" src="./img/kitchen.jpg" alt="Card image cap">
  <div class="card-body">
    <p class="card-text">Explore our furniture range and discover your dream sofa today!</p>
  </div>
</div>
</div>
<div class="col-md-4 mx-auto">
            <div class="card h-100 border-primary justify-content-center">
  <img class="card-img-top" src="./img/kitchen.jpg" alt="Card image cap">
  <div class="card-body">
    <p class="card-text">Have a breeze exploring our freezer range!</p>
  </div>
</div>
</div>
<div class="col-md-4 mx-auto">
            <div class="card h-100 border-primary justify-content-center">
  <img class="card-img-top" src="./img/kitchen.jpg" alt="Card image cap">
  <div class="card-body">
    <p class="card-text">You'll have a juicy time with our new smoothie maker!</p>
  </div>
</div>
</div>
</div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
    <script src="./script/furnitureSlideIn.js"></script>
  </body>
</html>