<?php
include 'connect.php';



$text = "<script> localStorage.removeItem('productbill'); </script>";
echo $text;
$sql = "SELECT `PID`, `Product image`, `Product Name`, `Product Category`, `Product Price` FROM `products`"; 
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result))
      {
       
        $Pcategory = $row['Product Category'];
       
      }
        
        session_start();
        $movieName="";
        if(isset($_SESSION['moviename']))
        {
          $movieName = $_SESSION['moviename'];
         }
         else
         {
	          echo "not set";
         }
        
         
         
         
         
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'head.php'; ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<?php 
	
	if(isset($_SESSION['loggedinuser']))
	{
		include 'Customernavbar.php';
	}
	else if(
		 include 'navbar.php'
	)
	
	?> 
 
  <div class="container">
    <div class="row">
      <h1>FOODS AND DRINKS</h1>
      <h2><?php echo $Pcategory; ?></h2>
      
      <?php 
      $sql1 = "SELECT `PID`, `Product image`, `Product Name`, `Product Category`, `Product Price` FROM `products`"; 
      $result2=mysqli_query($conn,$sql1);
      $i=0;
      while($row=mysqli_fetch_assoc($result2))
      {
        $i++;
        $PID = $row['PID'];
        $Pname = $row['Product Name'];
        $Pimg = $row['Product image'];
        $Pcategory = $row['Product Category'];
        $Price = $row['Product Price'];
        ?>
      <div class="col-sm-4">
        <div class="card box-shadow">
          <img class="card-img-top" src="<?php echo $Pimg; ?>" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title" id="<?php echo "pName".$i ?>"><?php echo $Pname; ?></h5>
            <div class="d-flex">
              <p class="card-text pr-1">Rs:</p>
              <p class="card-text" id="<?php echo "price".$i ?>" ><?php echo $Price; ?></p>
           </div>

            <div class="col-6">
            <div class="d-flex justify ">
            <p class="card-text">Total:</p>
            <p class="card-text" id="<?php echo "pricebox$i" ?>">0</p>
            </div>
              <ul class="pagination set_quantity">
                
                <li class="page-item"><button class="page-link" onclick="decreaseNumber('<?php echo 'textbox'.$i ?>','<?php echo 'pricebox'.$i ?>','<?php echo 'pName'.$i ?>','<?php echo 'price'.$i ?>')"> <i
                      class="fas fa-minus"></i></button></li>
                <li class="page-item"><input class="p-2" type="text" class="page-link" value="0" id="<?php echo "textbox$i" ?>"></li>
                <li class="page-item"><button class="page-link" onclick="increaseNumber('<?php echo 'textbox'.$i ?>','<?php echo 'pricebox'.$i ?>','<?php echo 'pName'.$i ?>','<?php echo 'price'.$i ?>')"><i
                      class="fas fa-plus"></i></button></li>
              </ul>
            </div>

          </div>

        </div>
      </div>
      <?php } ?>

    </div>



   

    
    <div class="col-md-12 text-center m-3">
      <button onclick="tempData()" class="btn btn-primary p-3">Back</button>
      <button onclick="bill('<?php echo $i; ?>')" class="btn btn-primary p-3">Add to Bucketlist</button>
      <button onclick="next()" class="btn btn-primary p-3">Skip</button>
    </div>
  </div>
  
<footer class="ht-footer">
  <?php include 'footer.php'  ?>
</footer>


  <!--JavaScript-->
  <script type="text/javascript">
    var priceitem,valitem,productName;
    var productbucket = [];
    
    const decreaseNumber = (textbox,price,name,Pprice) => {
      var itemval = document.getElementById(textbox);
      var priceval = document.getElementById(price);
      var product = document.getElementById(name);
      var  price = document.getElementById(Pprice);
      if (itemval.value < 1) {
        itemval.value = 0;
      } else {
        itemval.value = parseInt(itemval.value) - 1;
        valitem = parseInt(itemval.value);
       
         priceval.innerHTML = parseInt(priceval.innerHTML) - parseInt(price.innerHTML);
         
         priceitem = parseInt(priceval.innerHTML);
         productName = product.innerHTML ;
        
      }
    }
    const increaseNumber = (textbox,price,name,Pprice) => {
      
      var itemval = document.getElementById(textbox);
      var priceval = document.getElementById(price);
      var product = document.getElementById(name);
      var price = document.getElementById(Pprice);
      if (itemval.value >= 20) {
        itemval.value = 0;
        alert('max 20 allowed');
      } else {
        itemval.value = parseInt(itemval.value) + 1;
        valitem = parseInt(itemval.value); 
   
        
        priceval.innerHTML = parseInt(priceval.innerHTML) + parseInt(price.innerHTML); 
        
        priceitem = parseInt(priceval.innerHTML);
        productName = product.innerHTML ;
     
      }
      }
      function bill(n)
      {
        
        
          for(let i=1;i<=n;i++)
          {
            var itemval = document.getElementById(`textbox${i}`);
            var priceval = document.getElementById(`pricebox${i}`);
            var product = document.getElementById(`pName${i}`);
           if(itemval.value > 0)
           {
             productbucket.push([`${itemval.value}`,` ${priceval.innerHTML}`,`${product.innerHTML}`]);
           }
           
          }
          console.log(productbucket)
          localStorage.setItem('productbill',JSON.stringify(productbucket));
          
        next();
      }
      function tempData()
       {
       
        window.location="Seats.php";
         
       }
      function next()
      {
        
        
        window.location="payment.php";
        
      
      }
      
    
  </script>
 <script src="js/jquery.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/plugins2.js"></script>
  <script src="js/custom.js"></script>
</body>

</html>