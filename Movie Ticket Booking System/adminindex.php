<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['loggedin']))
{
	header("location: login.php");
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
	<script src="https://kit.fontawesome.com/3fbc97f27f.js" crossorigin="anonymous"></script>
</head>

<body>

	
	<!--end of login form popup-->
	
	<?php include 'adminnavbar.php';?> 
	<!-- BEGIN | Header -->
	
	<!-- END | Header -->
	<div class="bg-primary" style="padding-top: 10px;padding-bottom: 10px;">
		<?php include 'dashboard.php' ?>
    </div>



	<!-- footer section-->
	<footer class="ht-footer">
		<?php include 'footer.php' ?>
	</footer>
	<!-- end of footer section-->

	<script src="js/jquery.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/plugins2.js"></script>
	<script src="js/custom.js"></script>
</body>


</html>