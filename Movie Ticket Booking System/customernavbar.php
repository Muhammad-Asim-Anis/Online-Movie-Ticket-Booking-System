<?php
if(isset($_POST['logout']))
{
    
    unset($_SESSION['loggedinuser']);  
    session_destroy();
    session_start();
    $_SESSION['guest']=true;
    header("location: CustomerLogin.php"); 
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
        <a class="nav-link" name="click" href="index.php"  >Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Movies
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="moviegridfw.php">In Theater</a>
          <a class="dropdown-item" href="moviegridfwupcoming.php">Cooming Soon</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="changePassword.php">Change Password</a>
        </div>
      </li>
      
    </ul>
  </div>
  <form  action="" method="post">
    
  <div class="btn-group dropleft p-3 " style="margin-right: 76px;" >
  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Profile
  </button>
  <div class="dropdown-menu  ">
              
              <a class="dropdown-item" href="changePassword.php">Change Password</a>
              <button class="btn btn-success p-3 m-3" type="Sumbit" class="nav-link" name="logout" href="CustomerLogin.php" >Logout</button>
  </div>
</div>
      <!-- <li class="nav-item dropleft ">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Movies
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="moviegridfw.php">In Theater</a>
              <a class="dropdown-item" href="moviegridfwupcoming.php">Cooming Soon</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="changePassword.php">Change Password</a>
            </div>
          </li> -->
         
    
      
  </form>
</nav>
