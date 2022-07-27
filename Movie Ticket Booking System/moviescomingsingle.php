<?php 
 include 'connect.php';

 if(isset($_GET['GetName']))
 {
	 $movieName = $_GET['GetName'];
	 $query = "select * from `movieinfo` where `Movie Name`='".$movieName."'";
	 $result = mysqli_query($conn,$query);
 }
 else
 {
	 echo "not set";
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

<!-- moviesingle07:38-->
<head>
	
	<?php include 'head.php'; ?>

</head>

</head>
<body>


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

<!-- BEGIN | Header -->

<!-- END | Header -->


<div class="page-single movie-single movie_single " style= "margin-top: 0px;">
	<div class="container">
		<div class="row ipad-width2">
			   <?php
			   while($row=mysqli_fetch_assoc($result))
			   {
				$MovieName = $row['Movie Name'];
				$movieImg = $row['Movie Image'];
				$MovieYear = $row['Movie Year'];
                $lang = $row['Movie Language'];
                $category = $row['Movie Category'];
                $time = $row['Movie Time'];
                $Rtime = $row['Movie length'];	
				$desc = $row['Movie Description']
			    ?>
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="movie-img">
					<img src="<?php echo $movieImg; ?>" alt="">
					<div class="movie-btn">	
						<div class="btn-transform transform-vertical">
							<div><a href="#" class="item item-1 yellowbtn"> <i class="ion-card"></i> Coming Soon</a></div>
							<div><a href="#" class="item item-2 yellowbtn"><i class="ion-card"><span class="p-3">Will Be Avaliable!</i></spna></a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="movie-single-ct main-content">
					<h1 class="bd-hd"><?php echo $movieName; ?><span class="p-3"><?php echo date("Y",strtotime($MovieYear)) ?></span ></h1>
				
					<div class="movie-tabs">
						<div class="tabs">
							<ul class="tab-links tabs-mv d-flex justify-content-left">
								<li class=""><a href="#overview">Overview</a></li>
								                     
							</ul>
						    <div class="tab-content">
						        <div id="overview" class="tab active">
						            <div class="row">
						            	<div class="col-md-8 col-sm-12 col-xs-12" style="margin-top:-30px;">
						            		<p><?php echo $desc; ?></p>
						            	
						            	</div>
						            	<div class="col-md-4 col-xs-12 col-sm-12">
						            		<div class="sb-it">
						            			<h6>Language: </h6>
						            			<p><?php echo $lang; ?></p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Genres:</h6>
						            			<p><?php echo $category ?></p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Release Date:</h6>
						            			<p><?php echo $MovieYear; ?></p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Run Time:</h6>
						            			<p><?php echo $Rtime; ?></p>
						            		</div>
						            		
						            		
						            	</div>
						            </div>
						        </div>
						        
						    </div>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
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

<!-- moviesingle11:03-->
</html>