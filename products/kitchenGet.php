<?php
session_start();
include_once '../databaseConfig/credentials.php';
$q = $_GET['q'];

$connection = mysqli_connect($host, $username, $password, $dbname);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// If view all is selected then all the products appear
if ($q == "View All") {
  $query = "SELECT * FROM `kitchen`";

  $result = mysqli_query($connection, $query);
// A bootstrap card is echoed and looped with all the features of the product, e.g. name, price, image
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="col-lg-3 col-md-4 col-sm-6">';
    echo '<div class="card" style="width: 100%;margin-bottom: 15px;">';
    echo '<img class="card-img-top" src="./products/img/' . $row['filepath'] . '" alt="Image of Product" style="width:auto; height:300px; background-size:cover; float: left; object-fit:contain;">';
    echo '<div class="card-body" style="text-align:center;">';
    echo '<h5 class="card-title">' . $row['name'] . '</h5>';
    echo '<p class="card-text"> ' . $row['price'] . ' </p>';
    echo '<div class="row">';
    if (isset($_SESSION['loggedIn'])) {
      echo '<div class="col-xl-12 mx-auto text-center" style="margin-top:15px;"> 

      <form action="./productRestApi/addProduct.php" method="post">
<input type="hidden" name="name" value="' . $_SESSION["name"] . '"/> 
<input type="hidden" name="phoneNumber" value="' . $_SESSION["phoneNumber"] . '"/> 
<input type="hidden" name="emailID" value="' . $_SESSION["emailID"] . '"/> 
<input type="hidden" name="item" value="' . $row["name"] . '"/> 
<input type="hidden" name="price" value="' . $row["price"] . '"/> 
<input type="submit" value="Order">
</form>
      </div>';
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

  }
} else {
// Else if the variety selected only appears
  $query = "SELECT * FROM `kitchen` WHERE variety='$q'";

  $result = mysqli_query($connection, $query);
// A bootstrap card is echoed and looped with all the features of the product, e.g. name, price, image
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="col-lg-3 col-md-4 col-sm-6">';
    echo '<div class="card" style="width: 100%;margin-bottom: 15px;">';
    echo '<img class="card-img-top" src="./products/img/' . $row['filepath'] . '" alt="Image of Product" style="width:auto; height:300px; background-size:cover; float: left; object-fit:contain;">';
    echo '<div class="card-body" style="text-align:center;">';
    echo '<h5 class="card-title">' . $row['name'] . '</h5>';
    echo '<p class="card-text"> ' . $row['price'] . ' </p>';
    echo '<div class="row">';
    if (isset($_SESSION['loggedIn'])) {
      echo '<div class="col-xl-12 mx-auto text-center" style="margin-top:15px;"> 

      <form action="./productRestApi/addProduct.php" method="post">
<input type="hidden" name="name" value="' . $_SESSION["name"] . '"/> 
<input type="hidden" name="phoneNumber" value="' . $_SESSION["phoneNumber"] . '"/> 
<input type="hidden" name="emailID" value="' . $_SESSION["emailID"] . '"/> 
<input type="hidden" name="item" value="' . $row["name"] . '"/> 
<input type="hidden" name="price" value="' . $row["price"] . '"/> 
<input type="submit" value="Order">
</form>
      </div>';
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

  }
}
mysqli_close($connection);
