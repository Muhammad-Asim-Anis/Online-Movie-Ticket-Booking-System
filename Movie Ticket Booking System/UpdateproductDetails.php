<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['loggedin']))
{
	header("location: login.php");
}
$PID = $_GET['GetID'];
$query = " select * from `products` where `PID`='".$PID."'";
$result = mysqli_query($conn,$query);

while($row=mysqli_fetch_assoc($result))
{   
    $PID = $row['PID'];
    $Pimg = $row['Product image'];
    $Pname = $row['Product Name'];
    $Pcategory = $row['Product Category'];
    $Price = $row['Product Price'];

}

if(isset($_POST['Update']))
    {
        
        $newimage= $_FILES['img']['name'];
        $path = 'images/'.$newimage;
        $oldproductImg = $Pimg;
        $PID= $_POST['productID'];
        $Pname= $_POST['pName'];
        $pcategory = $_POST['Pcategory'];
        $price = $_POST['Pprice'];
       if($newimage != '')
       {
           $updateproductImg = $newimage;
       }
       else
       {
           $updateproductImg = $oldproductImg;
       }
        if(file_exists("images/".$_FILES['img']['name']))
        {
          $query = " UPDATE `products` set `Product Name` = '".$Pname."',`Product Category` = '".$pcategory."',`Product Price` = '".$price."' where `PID`='".$PID."'";
          $result = mysqli_query($conn,$query);
          if($result)
          {
              header("location:productsDetail.php");
              
          }
          else
          {
              echo ' Please Check Your Query ';
          }
        }
        else
        {
            
            $query = " UPDATE `products` set `Product image`='"."images/".$updateproductImg."', `Product Name` = '".$Pname."',`Product Category` = '".$pcategory."',`Product Price` = '".$price."' where `PID`='".$PID."'";
            $result = mysqli_query($conn,$query);
    
            if($result)
            {
                unlink($oldproductImg);
                move_uploaded_file($_FILES['img']['tmp_name'],$path);
                header("location:productsDetail.php");
            }
            else
            {
                echo ' Please Check Your Query ';
            }
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


<body style="background-color: #020D18;">


    <!--end of login form popup-->

    <!-- BEGIN | Header -->
    
    <!-- END | Header -->

  

    <div class="movie-items ">
        <div class="container d-flex justify-content-center flex-column text-white border border-light rounded  ">
        <div class="container d-flex justify-content-center align-items-center pr-2 ">
            <h2 class="m-3">Product Details</h2>
        </div>    
        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label col-sm-2 h4" for="email">Proudct ID:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="PID" placeholder="Enter Product ID" name="productID" value="<?php echo $PID; ?>">
                    </div>
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2 h4" for="email">Product Image</label>
                    <div class="col-sm-10 mb-2">
                    <input type="file" id="img" name="img" accept="image/*" value="<?php echo $Pimg; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 h4" for="email">Product Name :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="PName" placeholder="Enter Product Name" name="pName" value="<?php echo $Pname; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 h4" for="email">Product Category:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="category" placeholder="Enter Category" name="Pcategory" value="<?php echo $Pcategory; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 h4" for="email">Product Price:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="price" placeholder="Enter Price" name="Pprice" value="<?php echo $Price; ?>">
                    </div>
                </div>
                

                <div class="form-group">
                    <div class="col-sm-offset-2 col-10 p-3 ">
                        <button type="Submit" name="Update"  class="btn btn-primary btn-lg m-1 ">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <!-- footer section-->
 
    <!-- end of footer section-->

    <script src="js/jquery.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/plugins2.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>


</html>