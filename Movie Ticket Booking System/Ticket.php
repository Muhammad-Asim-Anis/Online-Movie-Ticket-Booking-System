
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
    <link rel="stylesheet" href="css/ticket.css">

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
    <div class="container" style="margin-left: 50px;">
        <div class="row">
        <?php 
                           foreach ($_SESSION['seats'] as $value) {
                               
                           
                        ?>

            <div class="col">
                <div class="cardWrap">
                    <div class="card cardLeft">
                        <h1>Startup <span>Cinema</span></h1>
                        <div class="title">
                            <h2 ><?php echo $_SESSION['moviename']; ?></h2>
                            <span>movie</span>
                        </div>
                        <div class="container">
                            <div class="seat-ticket">
                        
                                <h2><?php echo $value ?></h2>
                                <span><?php echo $_SESSION['movietime']; ?></span>
                            </div>
                            
                            <div class="time">
                                <h2><?php echo $_SESSION['movietime']; ?></h2>
                                <span>time</span>
                            </div>
                        </div>

                    </div>
                    <div class="card cardRight">
                        <div class="eye"></div>
                        <div class="number">
                            <h3><?php echo $value ?></h3>
                            <span>seat</span>
                        </div>

                    </div>
                </div>
            </div>
         <?php } ?>

            

        </div>
        

    </div>
    <div id="product" class="container" style="background-color: beige; border: 1px dotted; justify-content: center; width: 22%; padding-top: 20px;padding-bottom: 20px; border-radius: 25px;"> 
    <div class="" >
        <div class="col" style=" justify-content: center; ">
        <h2 >Your Food Coupon</h2>
        </div>
        <div class="col row" style=" justify-content: center; padding: 20px;">
            <div class="col">
                <p style="color: black;">Items</p>
            </div>
            <div class="col">
                <p style="color: black;">Quantity</p>
            </div>
            
        </div>
        <!-- assdasd -->
        <div   id ="productbill">
            
            
        </div>

        

        <div class="col" style="padding-top: 20px;">
            <h4>Thanks For purchasing</h4>
        </div>
    </div>
</div>

<script>
     let productdiv = document.getElementById('productbill');
     var ProductName = [],Quentity = [];
    var totalproductbalance = JSON.parse(localStorage.getItem('productbill'));
    if(totalproductbalance < 2 || totalproductbalance == null)
    {
        document.getElementById('product').classList.add('d-none');
    }
    else
    {

        totalproductbalance.forEach((element,index) => {
                    ProductName[index] = totalproductbalance[index][2];
                    Quentity[index] = totalproductbalance[index][0];
                     let text = ` 
                                  <div class = "col row" style="width:400px;">
                                  
                                  

                                  <div class="col">
                                  <p style="padding-left: 20px">${ProductName[index]}</p>
                                   </div>
                                  <div class="col" style="margin-left: 5px;">
                                  <p>${Quentity[index]}</p>
                                  </div>
                                  </div>
                                  
                    `
                      productdiv.innerHTML += text;
                   
                 });
    }
</script>

    <footer class="ht-footer">
        <?php include 'footer.php'  ?>
    </footer>

    <script src="js/jquery.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/plugins2.js"></script>
    <script src="js/custom.js"></script>
</body>


</html>