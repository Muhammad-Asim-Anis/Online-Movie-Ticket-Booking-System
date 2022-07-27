<?php
include 'connect.php';
$check=false;
$check2=false;
$check3=false;
$check4=false;
$check5=false;
if(isset($_POST['RegBtn']))
{
    if(!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password']))
    {
        $f_name = $_POST['first_name'];
        $l_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $C_password = $_POST['confirm_password'];
        $sqlquery="SELECT * FROM `userinfo` where `Email`='".$email."' AND `Password`='".$password."' ";
        $result2 = mysqli_query($conn,$sqlquery);
        $num= mysqli_num_rows($result2);
        if($num == 1)
        {
            $check4 =true;
        }
        else
        {
        if($password == $C_password)
        {

            $sql="INSERT INTO `userinfo`(`First Name`, `Last Name`, `Email`, `Password`)". 
            "VALUES ('".$f_name."','".$l_name."','".$email."','".$password."')";
            $result = mysqli_query($conn,$sql);
            if($result)
            {
                $check =true;
            }
        }
        else
        {
            $check3=true;;
        }
        }
    
    
    }
    else
    {
        $check2=true;
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include "head.php" ?>
<style>
	body {
		color: #fff;
		background: #01112A;
		font-family: 'Roboto', sans-serif;
	}
    
    .form-control{
		height: 40px;
		box-shadow: none;
		color: #969fa4;
	}
	.form-control:focus{
		border-color: #5cb85c;
	}
    .form-control, .btn{        
        border-radius: 3px;
    }
	.signup-form{
		width: 400px;
		margin: 0 auto;
		padding: 30px 0;
	}
	.signup-form h2{
		color: #636363;
        margin: 0 0 15px;
		position: relative;
		text-align: center;
    }
	.signup-form h2:before, .signup-form h2:after{
		content: "";
		height: 2px;
		width: 30%;
		background: #d4d4d4;
		position: absolute;
		top: 50%;
		z-index: 2;
	}	
	.signup-form h2:before{
		left: 0;
	}
	.signup-form h2:after{
		right: 0;
	}
    .signup-form .hint-text{
		color: #01112A;
		margin-bottom: 30px;
		text-align: center;
	}
    .signup-form form{
		color: #01112A;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #f2f3f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.signup-form .form-group{
		margin-bottom: 20px;
	}
	.signup-form input[type="checkbox"]{
		margin-top: 3px;
	}
	.signup-form .btn{        
        font-size: 16px;
        font-weight: bold;		
		min-width: 140px;
        outline: none !important;
    }
	.signup-form .row div:first-child{
		padding-right: 10px;
	}
	.signup-form .row div:last-child{
		padding-left: 10px;
	}    	
    .signup-form a{
		color: #fff;
		text-decoration: underline;
	}
    .signup-form a:hover{
		text-decoration: none;
	}
	.signup-form form a{
		color: #5cb85c;
		text-decoration: none;
	}	
	.signup-form form a:hover{
		text-decoration: underline;
	}  
</style>
</head>
<body>
    <?php include "navbar.php" ?>
    <?php 
    if($check)
    {
        echo "<div class='alert alert-success m-0 p-0' role='alert'>
      Insert Successfully
    </div>";
    }
    if($check2)
    {
        echo "<div class='alert alert-danger m-0 p-0' role='alert'>
      Please Enter! 
      </div>";
    }
    if($check3)
    {
        echo "<div class='alert alert-danger m-0 p-0' role='alert'>
        Confirm Password And Password are not same!
        </div>";
    }
    if($check4)
    {
        echo "<div class='alert alert-danger m-0 p-0' role='alert'>
        You Already Register! 
        </div>";
    }
    ?>
    <div class="signup-form " class="background-color: #020D18;">
    <form class ="" action="" method="post">
		<h2 style="color: #CF5B03;">Register</h2>
		<p class="hint-text">Create your account. It's free and only takes a minute.</p>
        <div class="form-group">
			<div class="row">
				<div class="col-xs-6"><input type="text" autocomplete="off"  class="form-control" name="first_name" placeholder="First Name" required="required"></div>
				<div class="col-xs-6"><input type="text" autocomplete="off"  class="form-control" name="last_name" placeholder="Last Name" required="required"></div>
			</div>        	
        </div>
        <div class="form-group">
        	<input type="email" class="form-control"  name="email" autocomplete="off" placeholder="Email" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" autocomplete="new-password" placeholder="Password" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="confirm_password" autocomplete="new-password" placeholder="Confirm Password" required="required">
        </div>        
        
		<div class="form-group">
            <button type="Submit" name="RegBtn" class="btn btn-dark btn-lg btn-block">Register Now</button>
        </div>
    </form>
	<div class="text-center">Already have an account? <a href="CustomerLogin.php">Sign in</a></div>
</div>
<footer class="ht-footer">
    <?php include "footer.php" ?>
  </footer>
</body>
</html>