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

<body style="">

	
	<!--end of login form popup-->
	
	<!-- BEGIN | Header -->
	
	<?php 
	session_start();
	if(isset($_SESSION['loggedinuser']))
	{
		include 'Customernavbar.php';
	}
	else if(
		 include 'navbar.php'
	)
	
	?> 
	
	<!-- END | Header -->

    <div class="container" style="justify-content:center ; width: 100%; margin-top: 20px;">
        <div class="Row" >
            <div class="col-md-4 col-md-offset-4" style=" background-color: rgb(204, 204, 204); padding: 20px;">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <div class="text-center">
                      <h3><i class="fa fa-lock fa-4x"></i></h3>
                      <h2 class="text-center">Forgot Password?</h2>
                      <p style="color: black;">You can reset your password here.</p>
                      <div class="panel-body">
        
                        <form id="register-form" role="form" autocomplete="off" class="form" method="post">
        
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                              <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                            </div>
                          </div>
                          <div class="form-group">
                            <input name="submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                          </div>
                          
                          <input type="hidden" class="hide" name="token" id="token" value=""> 
                        </form>
        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>

    </div>

	<!-- footer section-->
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