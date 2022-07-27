<?php
include 'connect.php';
session_start();
$moviename = $_SESSION['moviename'];

if(isset($_POST['btnpay']))
{
   if(!empty($_POST['cardNumber']) && !empty($_POST['ExpDateMon']) && !empty($_POST['ExpDateYear']) && !empty($_POST['Cardverify']) )
  {
     $quentity = $_POST['itemquantity'];
     $productnames = $_POST['productname'];
     $Seats = $_POST['seats']; 
     $cardNum = $_POST['cardNumber'];
     $expDatemon = $_POST['ExpDateMon'];
     $expDateyear = $_POST['ExpDateYear'];
     $cardcode = $_POST['Cardverify'];
     $total=$_POST['totalvalue'];
     if($cardNum == '12345678' && $expDatemon == '5' && $expDateyear == '2023' && $cardcode == '123456'  )
     {
        
         if(isset($_SESSION['loggedinuser']))
         {
            $email = $_SESSION['username'];
            $time = $_SESSION['movietime'];
            
            $sqlquery = "SELECT * FROM `userinfo` where `Email` ='$email'";
            $result = mysqli_query($conn,$sqlquery);
            $username = "";
		    $usernamelast = "";
		    while($row=mysqli_fetch_assoc($result))
            {
			$username = $row['First Name'];
			$usernamelast = $row['Last Name'];
		    }        
            
             $sql = "INSERT INTO `paymentinfo`(`Name`, `Email`, `Time`, `Date`, `Total`) VALUES('".$username."','".$email."','".date('h:i:s')."','".date("Y/m/d")."','".$total."') ";
             $result2 = mysqli_query($conn,$sql);
             if($result2)
             {
                $seatsarray = explode(",",$Seats);
                $_SESSION['seats'] = $seatsarray;
                $quentityproducts = explode(",",$quentity); 
                $nameproducts =  explode(",",$productnames); 
                for($i=0; $i< count($seatsarray) ; $i++ ){
                    $query="INSERT INTO `seats`(`Movie Name`, `Seatindex`, `Customer_Name`) VALUES ('".$moviename."','$seatsarray[$i]','".$username."')";
                      mysqli_query($conn,$query);
                    
                  }
                  if(count($nameproducts) > 1)
                  {
                      for($i=0; $i< count($nameproducts) ; $i++ ){
                         
                        $sqlquery2="INSERT INTO `purchaseproducts`(`ProductQuantity`, `ProductName`, `Email`, `Name`) VALUES('".$quentityproducts[$i]."','".$nameproducts[$i]."','".$email."','".$name."')";
                          mysqli_query($conn,$sqlquery2);
                        
                      }
                  }
                  header("location: Ticket.php");
             }
             else
             {
                 echo "not set";
             }
         }
         else 
         {
            
            $email = $_POST['email'];
            $name = $_POST['name'];
           
            

            
            $sql = "INSERT INTO `paymentinfo`(`Name`, `Email`, `Time`, `Date`,`Total`) VALUES('".$name."','".$email."','".date('h:i:s')."','".date("Y/m/d")."','".$total."') ";
             $result2 = mysqli_query($conn,$sql);
             if($result2)
             {   
                $seatsarray = explode(",",$Seats);
                $_SESSION['seats'] = $seatsarray;
                $quentityproducts = explode(",",$quentity); 
                $nameproducts =  explode(",",$productnames); 
                
                //  $Seats;
                //  echo 
                
                for($i=0; $i< count($seatsarray) ; $i++ ){
                    $query="INSERT INTO `seats`(`Movie Name`, `Seatindex`, `Customer_Name`) VALUES ('".$moviename."','$seatsarray[$i]','".$name."')";
                      mysqli_query($conn,$query);


                    
                  }
                 
                  if(count($nameproducts) > 1)
                  {
                      for($i=0; $i< count($nameproducts) ; $i++ ){
                         
                        $sqlquery2="INSERT INTO `purchaseproducts`(`ProductQuantity`, `ProductName`, `Email`, `Name`) VALUES('".$quentityproducts[$i]."','".$nameproducts[$i]."','".$email."','".$name."')";
                          mysqli_query($conn,$sqlquery2);
                        
                      }
                  }
                 header("location: Ticket.php");

             }
             else
             {
                 echo "not set";
             }

         }
     }
  }
  else
  {
     echo "not set empty";
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
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

	<?php include 'head.php'; ?>
<style>
    body { margin-top:0px }
.panel-title {display: inline;font-weight: bold;}
.checkbox.pull-right { margin: 0; }
.pl-ziro { padding-left: 0px; }
    
    </style>
</head>

<body style ="background-color: #01112A">
<?php 
	
	if(isset($_SESSION['loggedinuser']))
	{
		include 'Customernavbar.php';
	}
	else if(
		 include 'navbar.php'
	)
	
	?> 
    
<div class="container"  >
    <div class="row" style="display: flex; justify-content: center;margin-bottom: 28px; margin-top:20px;">
        <div class="col-xs-12 col-md-4 " >
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Payment Details
                    </h3>
                    
                </div>
                <div class="panel-body">
                    <form role="form" action="" method="post">
                    <label for="cardNumber" id="label" class="">
                            Guest info</label>
                    <div class="form-group">
                        <div id="email" class="input-group" >
                            <input type="text"  name="email"  id="email" placeholder="Enter your Email"
                             autofocus />
                        </div>
                        <div id ="name" class="input-group mb-3 mt-3">
                            <input type="text"  name="name"  id="number" placeholder="Enter Your Name"
                             autofocus />
                        </div>
                        <label for="cardNumber">
                            CARD NUMBER</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="cardNumber"  id="cardNumber" placeholder="Valid Card Number"
                                required autofocus />
                                
                            <span class="input-group-addon" style="padding-left: 21px;padding-right: 27px;"><span class="glyphicon glyphicon-lock"></span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-7 col-md-7">
                            <div class="form-group">
                                <label for="expityMonth">
                                    EXPIRY DATE</label>
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="text" class="form-control" name="ExpDateMon" id="expityMonth" placeholder="MM" required />
                                </div>
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="text" class="form-control" name="ExpDateYear" id="expityYear" placeholder="YY" required /></div>
                            </div>
                        </div>
                        <div class="col-xs-5 col-md-5 pull-right">
                            <div class="form-group">
                                <label for="cvCode">
                                    CV CODE</label>
                                <input type="password" class="form-control" name="Cardverify" id="cvCode" placeholder="CV" required />
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#"><span name="totalvalue" id="total" class="badge pull-right pt-2" value="0"><span class="glyphicon glyphicon-usd"></span>0</span> Final Payment</a>
                        <input type="text" class="form-control d-none" id="totalnum" name="totalvalue" value="0"id="cvCode" placeholder="CV" required />
                        <input type="text" class="form-control d-none" id="seats" name="seats" value="0" placeholder="CV" required />
                        <input type="text" class="form-control d-none" id="quentity" name="itemquantity" value="0"id="cvCode" placeholder="CV" required />
                        <input type="text" class="form-control d-none" id="Pname" name="productname" value="0" placeholder="CV" required />
                    </li>
                    </ul>
                    <br/>
                    <button type ="Sumbit" name="btnpay" class="btn btn-success btn-lg btn-block" >Pay</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer section-->
<footer class="ht-footer">
		<?php include 'footer.php' ?>
	</footer>
	<!-- end of footer section-->
    <script>
     
       let total,producttotal=0,alltotal=0;
        var totalbalance = localStorage.getItem('selectedMoviePrice');
        var id = document.getElementById('total');
        var totalproductbalance = JSON.parse(localStorage.getItem('productbill'));
         var Seats = JSON.parse(localStorage.getItem('selectedSeats'));
         document.getElementById('seats').setAttribute('value',Seats);
         console.log(Seats); 
         
        var ProductName = [],Quentity = [];
         if(localStorage.getItem('productbill') != null && localStorage.getItem('productbill').length > 0 )
         {
           
            console.log("YEs");
             totalproductbalance.forEach((element,index) => {
                ProductName[index] = totalproductbalance[index][2];
                Quentity[index] = totalproductbalance[index][0];
                console.log(ProductName);
               total = parseInt(totalproductbalance[index][1]);
               producttotal += total;
             });
             console.log(parseInt(totalbalance));
             console.log(producttotal);
             console.log(producttotal + parseInt(totalbalance));
             alltotal = producttotal + parseInt(totalbalance);
             console.log(alltotal);
          id.innerHTML = alltotal;
          id.value=alltotal;
             document.getElementById('quentity').setAttribute('value',Quentity);
             document.getElementById('Pname').setAttribute('value',ProductName);
             document.getElementById('totalnum').setAttribute('value',alltotal);
             localStorage.setItem('total',alltotal);
             
           }
         else {
           
           id.innerHTML = parseInt(totalbalance);
           
           document.getElementById('totalnum').setAttribute('value',parseInt(totalbalance));
           localStorage.setItem('total',parseInt(totalbalance));
          } 
          <?php 
         if(isset($_SESSION['loggedinuser']))
         {
        ?>
          document.getElementById('label').classList.add('d-none');
          document.getElementById('email').classList.add('d-none');
          document.getElementById('name').classList.add('d-none');
      
      <?php 
      }
     else
      {
        ?>
         document.getElementById('label').classList.remove('d-none');
          document.getElementById('email').classList.remove('d-none');
          document.getElementById('name').classList.remove('d-none');
      <?php
      }
        ?>

     
         
         
    </script>
    <script src="js/jquery.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/plugins2.js"></script>
	<script src="js/custom.js"></script>
</body>


</html>