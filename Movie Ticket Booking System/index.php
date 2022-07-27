<?php
 include 'connect.php';
 
 $query = " SELECT `Movie Name`,`Movie Image`,`Movie Category` FROM `movieinfo`";
 $result = mysqli_query($conn,$query);
 $query2 = " SELECT `Movie Name`,`Movie Image` FROM `movieinfo` where year(`Movie Year`) <= Year(CURRENT_DATE())";
 $result2 = mysqli_query($conn,$query2);
 $query3 = " SELECT `Movie Name`,`Movie Image` FROM `movieinfo` where year(`Movie Year`) > Year(CURRENT_DATE())";
 $result3 = mysqli_query($conn,$query3);
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
	session_start();
	
	if(isset($_SESSION['loggedinuser']))
	{
		include 'Customernavbar.php';
	}
	else {

    include 'navbar.php';
  }
	
	?> 
	
	<!-- END | Header -->

	<div class="slider movie-items" style="padding-top: 0px;">
		<div class="container">
			<div class="row">
				
				<div class="slick-multiItemSlider">
			    <?php
				while($row=mysqli_fetch_assoc($result))
				{
					$MovieName = $row['Movie Name'];
					$movieImg = $row['Movie Image'];
					$movieCategory = $row['Movie Category'];
				
				?>
					<div class="movie-item" >
						<div class="mv-img">
							<a href="#"><img src="<?php echo $movieImg; ?>" alt="" width="285" height="437" style="height:397px;"></a>
						</div>
						<div class="title-in" >
							<div class="cate">
								<span class="blue"><a href="#"><?php echo $movieCategory; ?></a></span>
							</div>
							<h6 ><a href="#" ><?php echo $MovieName; ?></a></h6>
							
						</div>
					</div>
					
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	
	<div class="movie-items">
		<div class="container">
			<div class="row ipad-width">
				<div class="col">
					<div class="title-hd">
						<h2>in theater</h2>
						<a href="moviegridfw.php" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>
					</div>
					<div class="tabs">

						<div class="tab-content">
							<div id="tab1" class="tab active">
								<div class="row">
									<div class="slick-multiItem">
									<?php
				                     while($row=mysqli_fetch_assoc($result2))
				                      {
					                   $MovieName = $row['Movie Name'];
					                    $movieImg = $row['Movie Image'];
					
				
				                       ?>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="<?php echo $movieImg; ?>" alt="" width="185"
														height="284" style="height:397px;">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.php?GetName=<?php echo $MovieName; ?> "> Read more <i
															class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#"><?php echo $MovieName ?></a></h6>
													
												</div>
											</div>
										</div>
										<?php }?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="title-hd">
						<h2>Coming Soon</h2>
						<a href="moviegridfwupcoming.php" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>
					</div>
					<div class="tabs">
						<div class="tab-content">

							<div id="tab22" class="tab active">
								<div class="row">
									<div class="slick-multiItem">
									<?php
				                     while($row=mysqli_fetch_assoc($result3))
				                      {
					                   $MovieName = $row['Movie Name'];
					                    $movieImg = $row['Movie Image'];
					
				
				                       ?>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="<?php echo $movieImg; ?>" alt="" width="185"
														height="284"style="height:397px;" >
												</div>
												<div class="hvr-inner">
													<a href="moviescomingsingle.php?GetName=<?php echo $MovieName; ?> "> Read more <i
															class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#"><?php echo $MovieName; ?></a></h6>
												</div>
											</div>
											<?php } ?>
										</div>
									</div>
								</div>
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