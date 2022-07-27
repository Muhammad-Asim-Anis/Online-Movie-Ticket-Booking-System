    <!-- <?php
      if(isset($_POST['codeword']))
      {
          if($_POST['codeword'] == 'Adminlogin')
          {
              header("location: login.php");
          }
      }
     ?> -->


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
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" name="clicklog" href="CustomerLogin.php"  >Login <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" name="clickReg" href="CustomerRegister.php"  >Register <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
  <!-- <form class="form-inline p-4" method="post">
    <input class="form-control mr-sm-2" autocomplete="off" type="search" placeholder="Search" aria-label="Search" name="codeword">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form> -->
</nav>



