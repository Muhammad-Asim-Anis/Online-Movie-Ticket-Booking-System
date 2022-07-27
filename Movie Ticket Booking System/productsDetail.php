<?php 

    include 'connect.php';
    session_start();
if(!isset($_SESSION['loggedin']))
{
	header("location: login.php");
}
    $query = " SELECT * FROM `products`";
    $result = mysqli_query($conn,$query);
    if(isset($_GET['Del']))
         {
             $PID = $_GET['Del'];
             $query = " DELETE FROM `products` where `PID` = '".$PID."'";
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
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php'; ?>
</head>
<body class="">
<?php include 'adminnavbar.php';?>
<div class="movie-items">
        <div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                        <table class="table table-bordered">
                            <tr>
                                <td> Product ID </td>
                                <td> Product Name </td>
                                <td> Product Category </td>
                                <td> Product Price </td>
                                <td> Edit  </td>
                                <td> Delete </td>
                            </tr>

                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $PID = $row['PID'];
                                        $Pname = $row['Product Name'];
                                        $Pcategory = $row['Product Category'];
                                        $Price = $row['Product Price'];
                                        
                            ?>
                                    <tr>
                                        <td><?php echo $PID ?></td>
                                        <td><?php echo $Pname ?></td>
                                        <td><?php echo $Pcategory ?></td>
                                        <td><?php echo $Price ?></td>
                                        <td><a href="UpdateproductDetails.php?GetID=<?php echo $PID ?>">Edit</a></td>
                                        <td><a href="productsDetail.php?Del=<?php echo $PID ?>">Delete</a></td>
                                    </tr>        
                            <?php 
                                    }  
                            ?>                                                                    
                                   

                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
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