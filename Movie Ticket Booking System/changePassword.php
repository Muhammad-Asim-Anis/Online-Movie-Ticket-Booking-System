<?php
include 'connect.php';
$isCurrentChecked=false;
$isPasswordLength=false;
$isPasswordSame=false;
$isPassUpdate=false;
session_start();
    
if(isset($_POST['btnSumbit']))
{ 
    $email='';
    $currPass =  $_POST['Currentpassword'];
    $newPass = $_POST['Newpassword'];
    $confPass =$_POST['Confirmpassword'];
    if(isset($_SESSION['loggedinuser']))
    {
        $email = $_SESSION['username'];
    }
    
    $sql = "SELECT `Password` FROM `userinfo` where `Email`='".$email."'";
    $result2 = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result2))
    {
        $password = $row['Password'];
    } 
    
    if($currPass == $password)
    {
        if(strlen($newPass) > 8)
        {
            if($newPass == $confPass)
            {
               $setpassquery= "UPDATE `userinfo` SET `Password`='".$confPass."' WHERE `Email`='".$email."'";
               $result3 = mysqli_query($conn,$setpassquery);
               $isPassUpdate=true;
            }
            else
            {
               $isPasswordSame=true;
            } 
        }
        else
        {
            $isPasswordLength=true;
        }
    }
    else
    {
           $isCurrentChecked=true;
    }
}
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en" class="no-js">
<head>
	<?php include 'head.php'; ?>

</head>    
<body>

	
	<!--end of login form popup-->
	
	<!-- BEGIN | Header -->
	
	<?php 
	
	if(isset($_SESSION['loggedinuser']))
	{
		include 'Customernavbar.php';
	}
	else if(
		 include 'navbar.php'
	)
	
	?> 
    <?php 
    if($isPassUpdate)
    {
        echo "<div class='alert alert-success m-0 p-0' role='alert'>
        Password Update Successfully!
      </div>";
    }
    if($isPasswordSame)
    {
        echo "<div class='alert alert-danger m-0 p-0' role='alert'>
      New Password and Confirm Password Should Be Same
    </div>";
    }
    if($isPasswordLength)
    {
        echo "<div class='alert alert-danger m-0 p-0' role='alert'>
        Password Length Should Be Greater Than 8 character
      </div>";   
    }
    if($isCurrentChecked)
    {
        echo "<div class='alert alert-danger m-0 p-0' role='alert'>
      Password not match with Current Password
    </div>";
    }
    
    
    
    ?>
<div class="row justify-content-md-center " style="margin-top:20px;margin-bottom:20px;">
    <div class="col-md-4">
        <div class="card border-primary">
            <div class="card-header bg-primary text-white" style="position: relative; display: flex; justify-content: center; align-items: center;">
                <h5 class="card-title">Change Password</h5>
            </div>
            <div class="card-body">
                <form accept-charset="UTF-8" role="form" action="" method="post">
                    <fieldset>
                        <div class="form-group">
                            <div class="input-group" >
                                <span class="input-group-addon" style="padding-top: 10px;"><i class="fa fa-lock fa-lg" aria-hidden="true" style="width: 20px;"></i></span>
                                <input type="password" placeholder="Current Password" name="Currentpassword" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon" style="padding-top: 10px;"><i class="fa fa-lock text-danger fa-lg" aria-hidden="true"style="width: 20px;"></i></span>
                                <input type="password" placeholder="New Password" name="Newpassword" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon" style="padding-top: 10px;"><i class="fa fa-lock text-danger fa-lg" aria-hidden="true"style="width: 20px;"></i></span>
                                <input type="password" placeholder="Confirm New Password" name="Confirmpassword" class="form-control" value="">
                            </div>                        
                        </div>                        
                        <div class="row" >
                            <div class="col" style="position: relative; display: flex; justify-content: center; align-items: center;">
                                <button class="btn btn-lg btn-dark btn-block" type="Sumbit" name="btnSumbit" value="Reset Password">Reset Password</button>
                            </div>
                        </div>                        
                    </fieldset>
                </form>                         
            </div>
        </div>
    </div>
</div>
<footer class="ht-footer">
		<?php include 'footer.php'  ?>
	</footer>
	<!-- end of footer section-->

	<script src="js/jquery.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/plugins2.js"></script>
	<script src="js/custom.js"></script>
</body>


</html>