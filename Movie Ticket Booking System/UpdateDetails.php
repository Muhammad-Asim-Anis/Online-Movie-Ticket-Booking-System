<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['loggedin']))
{
	header("location: login.php");
}
$MovieName = $_GET['GetID'];
$query = " select * from `movieinfo` where `Movie Name`='".$MovieName."'";
$result = mysqli_query($conn,$query);

while($row=mysqli_fetch_assoc($result))
{   
    $movieImg = $row['Movie Image'];
    $MovieName = $row['Movie Name'];
    $MovieYear = $row['Movie Year'];
    $lang = $row['Movie Language'];
    $category = $row['Movie Category'];
    $time = $row['Movie Time'];
    $Rtime = $row['Movie length'];
    $desc = $row['Movie Description'];

}

if(isset($_POST['update']))
    {
        
        $newimage= $_FILES['img']['name'];
        $path = 'images/'.$newimage;
        $oldmovieImg = $movieImg;
        $name= $_POST['mName'];
        $year = date('Y-m-d',strtotime($_POST['year'])); 
        $lang = $_POST['lang'];
        $category = $_POST['category'];
        $time = $_POST['time'];
        $Rtime = $_POST['Rtime'];
        // $desc = $_POST['desc'];
        $desc = mysqli_real_escape_string($conn, $_POST['desc'] );
       if($newimage != '')
       {
           $updatemovieImg = $newimage;
       }
       else
       {
           $updatemovieImg = $oldmovieImg;
       }
        if(file_exists("images/".$_FILES['img']['name']))
        {
          $query = " UPDATE `movieinfo` set `Movie Name` = '".$name."', `Movie Year`='".$year."',`Movie Language`='".$lang."',`Movie Category` = '".$category."',`Movie Time` = '".$time."',`Movie length` = '".$Rtime."',`Movie Description` = '".$desc."' where `Movie Name`='".$MovieName."'";
          $result = mysqli_query($conn,$query);
          if($result)
          {
              header("location:movieDetails.php");
              
          }
          else
          {
              echo ' Please Check Your Query ';
          }
        }
        else
        {
            
            $query = " UPDATE `movieinfo` set `Movie Name` = '".$name."',`Movie Image`='"."images/".$updatemovieImg."', `Movie Year`='".$year."',`Movie Language`='".$lang."',`Movie Category` = '".$category."',`Movie Time` = '".$time."',`Movie length` = '".$Rtime."',`Movie Description` = '".$desc."' where `Movie Name`='".$MovieName."'";
            $result = mysqli_query($conn,$query);
    
            if($result)
            {
                unlink($oldmovieImg);
                move_uploaded_file($_FILES['img']['tmp_name'],$path);
                header("location:movieDetails.php");
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


<body>

<?php

 ?>
    <!--end of login form popup-->

    <!-- BEGIN | Header -->
    
    <!-- END | Header -->

  

    <div class="movie-items ">
        <div class="container d-flex justify-content-center flex-column text-white border border-light rounded  ">
        <div class="container d-flex justify-content-center align-items-center pr-2 ">
            <h2 class="m-3">Movie Details</h2>
        </div>    
            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label col-sm-2 h4" for="email">Movie Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" placeholder="Enter Movie Name" name="mName" value="<?php echo $MovieName; ?>"> 
                    </div>
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2 h4" for="email">Movie Image</label>
                    <div class="col-sm-10 mb-2">
                    <input type="file" id="img" name="img" accept="image/*" value="<?php echo $movieImg; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 h4" for="email">Movie Year:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="year" placeholder="Enter Year" name="year" value="<?php echo $MovieYear; ?>"> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 h4" for="email">Movie Language:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="lang" placeholder="Enter Language" name="lang" value="<?php echo $lang; ?> ">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 h4" for="email">Movie Category:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="category" placeholder="Enter Category" name="category" value="<?php echo $category; ?> "> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 h4" for="email">Movie Time:</label>
                    <div class="col-sm-10">
                        <input type="time" class="form-control" id="time" placeholder="Enter Time" name="time"  value="<?php echo $time; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 h4" for="email">Movie Running Time:</label>
                    <div class="col-sm-10">
                        <input type="text"  class="form-control" id="Rtime" placeholder="Enter Time" name="Rtime"  value="<?php echo $Rtime; ?> ">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 h4" for="pwd">Description:</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Description" style="font-size: 15px; "><?php echo $desc; ?> </textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-10 pl-2 ">
                        <button type="Submit" name="update" class="btn btn-primary btn-lg m-1 ">Update</button>
                        
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