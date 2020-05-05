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
    <link rel="stylesheet" href="./styles/productLists.css" />
    <title>Furniture Emporium - Kitchen</title>
    <meta name="description" content="Kitchen products range!">
  <meta name="keywords" content="Furniture Store, Kitchen, Delivery, Environmentally friendly, Fridge, Cooker, Sinks, Cabinets, Appliances, Chairs, Worktops">
    <!-- REACT is JavaScript library created by Facebook used for building Web Apps -->
    <script src= "https://unpkg.com/react@16/umd/react.production.min.js"></script>
    <script src= "https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
    <script src="https://unpkg.com/babel-standalone@6.15.0/babel.min.js"></script>

  </head>
  <body>
    <!-- Imports the Navbar -->
      <?php include "./components/navbar.php";?>

      <div class="container-fluid text-center">
  <div class="row">


<br><br>

<div class="col-md-5">
</div>
    <div class="col-md-2">
<label for="exampleFormControlSelect1"><b>Sort Variety</b></label>
<!-- Option select -->
<select class="form-control" name=variety id='s1' onchange=ajaxFunction(s1.value);>
<option value='View All'>View All</option>

<?php
// Imports the database config credentials
include_once './databaseConfig/credentials.php';

try {
$dbo = new PDO('mysql:host='.$host.';dbname='.$dbname, $username, $password);

} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
// The option values from the tables variety column
$sql="select distinct variety from Kitchen ";
foreach ($dbo->query($sql) as $row) {
	echo "<option value='" . $row["variety"] . "'>" . $row["variety"] . "</option>";
}
?>
</select>
</div>
<div class="col-md-5">
</div>
</div>
</td>

        
</div>
<br><br>
<div class="container-fluid">
  <div class="row" id="your_div">Product info will be listed here...</b></div>

</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
    <script src="./script/ajaxKitchen.js"></script>

  </body>
</html>