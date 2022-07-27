
<?php
include 'connect.php';
$query3 = " SELECT `Movie Name`,`Movie Image` FROM `movieinfo` where year(`Movie Year`) <= Year(CURRENT_DATE())";
$result3 = mysqli_query($conn,$query3);
$num= mysqli_num_rows($result3);
$query = " SELECT  * FROM `products`";
$result = mysqli_query($conn,$query);
$num1= mysqli_num_rows($result);
$query4 = "SELECT SUM(`Total`) FROM `paymentinfo`";
$result4 = mysqli_query($conn,$query4);
while($row = mysqli_fetch_assoc($result4) )
{
  $total = $row['SUM(`Total`)'];
  
}
$query5 = "SELECT `Movie Name` FROM `seats` GROUP BY `Movie Name`;";
$result5 = mysqli_query($conn,$query5);
// $num3 = mysqli_num_rows($result5);
// $remain = 48 - $num3;
















?>

<div class="container bootstrap snippet " style=" background-color: #020d18c2; margin-top: 0px; margin-bottom:20px;">
  <div class="row d-flex justify-content-center">
    <div class="col-lg-2 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading dark-blue"><i class="fas fa-coins fa-fw fa-3x" style="margin-top: 15px;"></i></div></a>
        <div class="circle-tile-content dark-blue">
          <div class="circle-tile-description text-faded"> Total sell</div>
          <div class="circle-tile-number text-faded "><?php echo $total; ?></div>
          <div class="circle-tile-footer" style="height: 30px;"></div>
          
        </div>
      </div>
    </div>
     
    <div class="col-lg-2 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading orange"><i class="fas fa-film fa-fw fa-3x" style="margin-top: 15px;"></i></div></a>
        <div class="circle-tile-content orange">
          <div class="circle-tile-description text-faded">Movies</div>
          <div class="circle-tile-number text-faded "><?php echo $num; ?></div>
          <div class="circle-tile-footer" style="height: 30px;"></div>
        
          
        </div>
      </div>
    </div> 

    <div class="col-lg-2 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading red"><i class="fas fa-utensils fa-fw fa-3x" style="margin-top: 15px;"></i></div></a>
        <div class="circle-tile-content red">
          <div class="circle-tile-description text-faded">Foods And Drinks</div>
          <div class="circle-tile-number text-faded "><?php echo $num1; ?></div>
          <div class="circle-tile-footer" style="height: 30px;"></div>
          
        </div>
      </div>
    </div> 
  </div> 
</div>  
<div >
  <div class="container">
<h1 style="text-align: center; background-color: #E66401; color: white; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Movies Details</h1>
</div>
<?php while($row = mysqli_fetch_assoc($result5) )
{
  $avaliable = 0;
  $moviename = $row['Movie Name'];
  $sqlmoviequery = "SELECT COUNT(`Seatindex`) FROM `seats` where `Movie Name`='".$moviename."'";
  $result6 = mysqli_query($conn,$sqlmoviequery);
  while($row2 = mysqli_fetch_assoc($result6))
  {
    $totalseat = $row2['COUNT(`Seatindex`)'];
  }
  $avaliable = 48 - $totalseat;
?>
  <div class="container" style="background-color: #020d18c2; color: white">
  <h2 style="margin: 10px"><?php echo $moviename; ?></h2>
        <div class="row justify-content-center" >
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-blue">
                    <div class="inner">
                        <h3> <?php echo $totalseat; ?> </h3>
                        <p style="color: white;">Booked Seats</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-check-double " aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-green">
                    <div class="inner">
                        <h3><?php echo $avaliable; ?></h3>
                        <p style="color: white;"> Available Seats </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chair" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <?php } ?>
</div>
