<?php 
   
    include 'connect.php';
    session_start();
if(!isset($_SESSION['loggedin']))
{
	header("location: login.php");
}
   $check =false;
   $path = '';
    $query = " SELECT `Movie Name`, `Movie Year`, `Movie Language`, `Movie Category`, `Movie Time`, `Movie length` FROM `movieinfo`";
    $result = mysqli_query($conn,$query);
    if(isset($_GET['Del']))
         {
             $MovieName = $_GET['Del'];
             $query2 = " SELECT `Movie Image` FROM `movieinfo` where `Movie Name` = '".$MovieName."'";
             $result2 = mysqli_query($conn,$query2);
             while($row=mysqli_fetch_assoc($result2))
              {
                  $path = $row['Movie Image'];
              } 
             $query = " DELETE FROM `movieinfo` where `Movie Name` = '".$MovieName."'";
             $result = mysqli_query($conn,$query);
             if($result)
             {
                 $check = true;
                 unlink($path);
                 header("location:movieDetails.php");
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
<?php
  if($check)
  {
      echo "<div class='alert alert-success m-0 p-0' role='alert'>
      Deleted Successfully
    </div>";
  }
?>
<div class="movie-items">
        <div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                        <table class="table table-bordered">
                            <tr>
                                <td> Movie Name </td>
                                <td> Movie Year </td>
                                <td> Movie Language </td>
                                <td> Movie Category </td>
                                <td> Movie Time </td>
                                <td> Movie Run time </td>
                                <td> Edit  </td>
                                <td> Delete </td>
                            </tr>

                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $MovieName = $row['Movie Name'];
                                        $MovieYear = $row['Movie Year'];
                                        $lang = $row['Movie Language'];
                                        $category = $row['Movie Category'];
                                        $time = $row['Movie Time'];
                                        $Rtime = $row['Movie length'];
                            ?>
                                    <tr>
                                        <td><?php echo $MovieName ?></td>
                                        <td><?php echo $MovieYear ?></td>
                                        <td><?php echo $lang ?></td>
                                        <td><?php echo $category ?></td>
                                        <td><?php echo $time ?></td>
                                        <td><?php echo $Rtime ?></td>
                                        <td><a href="UpdateDetails.php?GetID=<?php echo $MovieName ?>">Edit</a></td>
                                        <td><a href="MovieDetails.php?Del=<?php echo $MovieName ?>">Delete</a></td>
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