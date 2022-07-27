<?php 
include 'connect.php';
session_start();
if(!isset($_SESSION['loggedin']))
{
	header("location: login.php");
}

$check = false;
$check2 = false;
if(isset($_POST['add']))
{
    
    $image= $_FILES['img']['name'];
    $path = 'images/'.$image;
    $name= $_POST['mName'];
    $year = date('Y-m-d',strtotime($_POST['year'])); 
    $lang = $_POST['lang'];
    $category = $_POST['category'];
    $time = $_POST['time'];
    $Rtime = $_POST['Rtime'];
    // $desc = $_POST['desc'];
    $desc = mysqli_real_escape_string($conn, $_POST['desc'] );

  if(!empty($name) && !empty($path) && !empty($year) && !empty($lang) && !empty($category) && !empty($time) && !empty($Rtime) && !empty($desc) )
  {
     
      $sql = "INSERT INTO `movieinfo`(`Movie Name`, `Movie Image`, `Movie Year`, `Movie Language`, `Movie Category`, `Movie Time`, `Movie length`, `Movie Description`)
      "." VALUES ('$name','$path','$year','$lang','$category','$time','$Rtime','$desc')";
  
      $result = mysqli_query($conn,$sql);
      if($result)
      {
          $check = true;
          move_uploaded_file($_FILES['img']['tmp_name'],$path);
      }
      else
      {
          echo "not run".mysqli_error($conn);
      }
  } 
  else
  { 
    $check2 = true;
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
<?php include 'adminnavbar.php';?>
<?php
if($check)
{
    echo "<div class='alert alert-success m-0 p-0' role='alert'>
          Added Successfully
        </div>";
}
else if($check2)
{
    echo "<div class='alert alert-danger m-0 p-0' role='alert'>
          Please insert something!
        </div>";
}
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
                        <input type="text" class="form-control" id="name" placeholder="Enter Movie Name" name="mName">
                    </div>
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2 h4" for="email">Movie Image</label>
                    <div class="col-sm-10 mb-2">
                    <input type="file" id="img" name="img" accept="image/*">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 h4" for="email">Movie Year:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="year" placeholder="Enter Year" name="year">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 h4" for="email">Movie Language:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="lang" placeholder="Enter Language" name="lang">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 h4" for="email">Movie Category:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="category" placeholder="Enter Category" name="category">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 h4" for="email">Movie Time:</label>
                    <div class="col-sm-10">
                        <input type="time" class="form-control" id="time" placeholder="Enter Time" name="time">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 h4" for="email">Movie Running Time:</label>
                    <div class="col-sm-10">
                        <input type="text"  class="form-control" id="Rtime" placeholder="Enter Time" name="Rtime">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 h4" for="pwd">Description:</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Description" style="font-size: 15px; "></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-10 p-3 ">
                        <button type="Submit" name="add" class="btn btn-primary btn-lg m-1 ">ADD</button>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>



    <!-- footer section-->
    <footer class="ht-footer">
        <?php include 'footer.php' ?>
    </footer>
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