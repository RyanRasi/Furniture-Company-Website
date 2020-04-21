<nav class="navbar navbar-expand-lg navbar-light bg-light text-center">
  <a class="navbar-brand text-center" href="./index.php">Furniture Emporium</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto mr-auto">
    <li class="nav-item active">
        <a class="nav-link" href="./index.php">HOME <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./products.php">PRODUCTS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">ABOUT</a>
      </li>
    </ul>

 <form class="form-inline my-2 my-lg-0">
<?php
if (isset($_SESSION['loggedIn'])) {
      echo '<a class="btn btn-outline-secondary my-2 my-sm-0" href="./userDashboard.php">Dashboard</a>';
      echo '<p>&nbsp;</p>';
      echo '<a class="btn btn-outline-danger my-2 my-sm-0" href="./databaseConfig/signout.php">Log Out</a>';
} else {
  echo '<a class="btn btn-outline-success my-2 my-sm-0" href="./userLogin.php">Login</a>';
}
?>    
    </form>

  </div>

</nav>

<!-- Free Delivery -->

<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Free Delivery On All UK Orders Over £500</strong>
</div>

<!-- Modal -->
<div class="modal fade" id="shoppingCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Your Basket</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Order Now</button>
      </div>
    </div>
  </div>
</div>