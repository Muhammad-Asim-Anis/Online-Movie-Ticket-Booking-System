<?php 
include 'connect.php';



if(isset($_POST['searchfilm']))
{
   $query3 = "SELECT * FROM `movieinfo` where `Movie Name` LIKE '%".$_POST['searchfilm']."%'";
   $result3 = mysqli_query($conn,$query3);
   $num= mysqli_num_rows($result3);
}
else
{
$query3 = " SELECT `Movie Name`,`Movie Image` FROM `movieinfo` where year(`Movie Year`) <= Year(CURRENT_DATE()) ";
$result3 = mysqli_query($conn,$query3);
$num= mysqli_num_rows($result3);
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

<!-- moviegridfw07:38-->
<head>
	<!-- Basic need -->
	<?php include 'head.php'; ?>
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


<div class="hero common-hero" style="margin-bottom: -133px;z-index: -10;" >
	<div class="container" style="margin-top: -274px;" >
		<div class="row">
			
			<div class="col-md-12" >
				
				<div class="hero-ct">
					
					<h1>Movie Listing - Grid Fullwidth</h1>
					<ul class="breadcumb">
						<li class="active"><a href="#">Home</a></li>
						<li> <span class="ion-ios-arrow-right"></span> movie listing</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				
					<form class="form-inline p-4" method="post">
					 <input class="form-control mr-sm-2" style="width:94%;" autocomplete="off" type="search" placeholder="Search" aria-label="Search" name="searchfilm">
					 <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
					</form>
				
				<div class="topbar-filter fw p-3">
					<p>Found <span><?php echo $num; ?>  movies</span> in total</p>
				</div>
				<div class="flex-wrap-movielist mv-grid-fw">
					<?php 
					while($row=mysqli_fetch_assoc($result3))
					{
						$MovieName = $row['Movie Name'];
						$movieImg = $row['Movie Image'];
					?>
						<div class="movie-item-style-2 movie-item-style-1 d-flex justify-content-center align-items-center">
							<img src="<?php echo $movieImg; ?>" alt="">
							<div class="hvr-inner">
	            				<a  href="moviesingle.php?GetName=<?php echo $MovieName; ?>"> Read more <i class="ion-android-arrow-dropright"></i> </a>
	            			</div>
							<div class="mv-item-infor">
								<h6><a href="#"><?php echo $MovieName; ?></a></h6>
							</div>
						</div>
						<?php } ?>						
				</div>
				<div class="topbar-filter">
					<div class="pagination2">
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

<!-- moviegridfw07:38-->
</html>