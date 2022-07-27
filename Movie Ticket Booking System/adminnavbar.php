<?php
if(isset($_POST['logout']))
{
    
    unset($_SESSION['loggedin']);  
    session_destroy();
    header("location: login.php"); 
    exit; 
}
?>
<nav class="navbar navbar-expand-lg navbar-dark m-0" style="background-color: #020d18;">
  <a class="navbar-brand p-2" href="#"><img class="logo" src="images/logo.png" alt="" width="119" height="58"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="adminindex.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Movies
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">In Theater</a>
          <a class="dropdown-item" href="#">Cooming Soon</a>
          
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="Editmovies.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Edit Movies</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="Editmovies.php">Add Movies</a>
          <a class="dropdown-item" href="movieDetails.php">Movie Details</a>
        </div>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="Editmovies.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Edit Refreshments</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="Editrefreshments.php">Add Products</a>
          <a class="dropdown-item" href="productsDetail.php">Product Details</a>
        </div>
      </li>
      <form action="" method="post">
          <li class="nav-item">
            <button type="Sumbit" class="nav-link" name="logout" href="login.php" style="padding-top: 14px;background-color:transparent;border-style:none;">Logout</button>
          </li>
      </form>
    </ul>
  </div>
  <form class="form-inline p-4">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>