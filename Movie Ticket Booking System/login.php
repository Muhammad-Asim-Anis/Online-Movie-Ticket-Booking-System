<?php

include 'connect.php';
if(isset($_POST['sumbit']))
{   
    session_start();
    $name = $_POST['email'];
    $password = $_POST['pass'];
    $sql = "SELECT * FROM `adminlogin` where `Admin_eamil` ='$name' AND `Admin_password` ='$password'";
	$result = mysqli_query($conn,$sql);
	$num= mysqli_num_rows($result);
	if($num == 1)
    {
		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $name;
        header("location: adminindex.php");
    }
    else
    {
        header("location: login.php");
    }
}
 
?>
<!doctype html>
<html lang="en">
  <head>
  	<?php include "head.php" ?>
      <style>
          body {
              background-color: #01112A;
          }
          a:hover{
            color: rgb(255, 145, 0);
          }
      </style>
	</head>
	<body>
        <?php include "navbar.php" ?>
	<section style="margin-top: 30px; margin-bottom: 30px;">
		<div class="container-sm p-5 mb-2 text-white " style="background-color: #020D18; width: 60%;">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap py-5">
		      	<h3 class="text-center mb-0">Welcome</h3>
		      	<p class="text-center">Sign in by entering the information below</p>
				<form action="" class="login-form" method="post">
		      		<div class="form-group">
		      			
		      			<input type="text" class="form-control" autocomplete="off" placeholder="Username" name="email" required>
		      		</div>
	            <div class="form-group">
	            	
	              <input type="password" class="form-control" placeholder="Password" name="pass" required>
	            </div>
	            <div class="form-group d-md-flex">
								<div class="w-100 text-md-right">
									<a href="#">Forgot Password</a>
								</div>
	            </div>
	            <div class="form-group">
	            	<button type="Submit" name="sumbit" class="btn form-control btn btn-warning rounded submit px-3">Get Started</button>
	            </div>
	          </form>
	          
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <footer class="ht-footer">
    <?php include "footer.php" ?>
  </footer>
    
	</body>
</html>
