<?php
include 'connect.php';
session_start();

$movieName="";
$check=false;
if(isset($_SESSION['moviename']))
 {
   
  $movieName = 	$_SESSION['moviename'];
  $time = $_SESSION['movietime'];
 }
 else
 {
	 echo "not set";
 }
 
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <!-- <link rel="stylesheet" href="css/seatStyle.css"> -->
  <?php include "head.php" ?>
</head>

<body class="seat-body">

<?php 
	
	if(isset($_SESSION['loggedinuser']))
	{
		include 'Customernavbar.php';
	}
	else {

    include 'navbar.php';
  }
	
	
	?>
  
  <div class="alldivs">
    <div class="movie-container">
      <h2 id="Movie-Name">
        <?php echo $movieName; ?>
      </h2>
    </div>
    <div class="movie-container" style="display:none;">
      <label>Pick a movie:</label>
      <select id="movie">
        <option value="10">Avengers: Endgame ($10)</option>
        <option value="12">Joker ($12)</option>
        <option value="8">Toy Story 4 ($8)</option>
        <option value="9">The Lion King ($9)</option>
      </select>
    </div>
    <ul class="seat-showcase">
      <li>
        <div class="seat"></div>
        <small>N/A</small>
      </li>

      <li>
        <div class="seat selected"></div>
        <small>Selected</small>
      </li>

      <li>
        <div class="seat occupied"></div>
        <small>Occupied</small>
      </li>
      <li>
        <div class="seat-gold"></div>
        <small>Gold</small>
      </li>
      <li>
        <div class="seat-platinum "></div>
        <small>Platinum</small>
      </li>
      <li>
        <div class="seat-silver"></div>
        <small>Silver</small>
      </li>
    </ul>

    <div class="seat-container">
      <div class="seat-screen"></div>
      <div class="seat-row" style="background-color: rgb(136, 133, 132)">
        <div class="seat" id="0"></div>
        <div class="seat" id="1"></div>
        <div class="seat" id="2"></div>
        <div class="seat" id="3"></div>
        <div class="seat" id="4"></div>
        <div class="seat" id="5"></div>
        <div class="seat" id="6"></div>
        <div class="seat" id="7"></div>
      </div>
      <div class="seat-row" style="background-color: rgb(136, 133, 132)">
        <div class="seat" id="8"></div>
        <div class="seat" id="9"></div>
        <div class="seat" id="10"></div>
        <div class="seat" id="11"></div>
        <div class="seat" id="12"></div>
        <div class="seat" id="13"></div>
        <div class="seat" id="14"></div>
        <div class="seat" id="15"></div>
      </div>
      <div class="seat-row" style="background-color: rgb(173, 157, 10)">
        <div class="seat" id="16"></div>
        <div class="seat" id="17"></div>
        <div class="seat" id="18"></div>
        <div class="seat" id="19"></div>
        <div class="seat" id="20"></div>
        <div class="seat" id="21"></div>
        <div class="seat" id="22"></div>
        <div class="seat" id="23"></div>
      </div>

      <div class="seat-row" style="background-color: rgb(173, 157, 10)">
        <div class="seat" id="24"></div>
        <div class="seat" id="25"></div>
        <div class="seat" id="26"></div>
        <div class="seat" id="27"></div>
        <div class="seat" id="28"></div>
        <div class="seat" id="29"></div>
        <div class="seat" id="30"></div>
        <div class="seat" id="31"></div>
      </div>
      <div class="seat-row" style="background-color: rgb(168, 95, 156)">
        <div class="seat" id="32"></div>
        <div class="seat" id="33"></div>
        <div class="seat" id="34"></div>
        <div class="seat " id="35"></div>
        <div class="seat " id="36"></div>
        <div class="seat" id="37"></div>
        <div class="seat" id="38"></div>
        <div class="seat" id="39"></div>
      </div>
      <div class="seat-row" style="background-color: rgb(168, 95, 156)">
        <div class="seat" id="40"></div>
        <div class="seat" id="41"></div>
        <div class="seat" id="42"></div>
        <div class="seat" id="43"></div>
        <div class="seat" id="44"></div>
        <div class="seat" id="45"></div>
        <div class="seat" id="46"></div>
        <div class="seat" id="47"></div>
      </div>
    </div>
    <p class="text">
      You have selected <span id="count">0</span> seats for a price of $<span id="total">0</span>
    </p>
    <?php

      
       
        $sql = "SELECT `Seatindex` FROM `seats` where `Movie Name`='".$movieName."'";
        $result = mysqli_query($conn,$sql);
        $num= mysqli_num_rows($result);
        $ocupiedseats = array();
  
        for($i=1;$i<=$num;$i++)
        {
          $row = mysqli_fetch_assoc($result);
          // echo $row['Seatindex'];
          $ocupiedseats[$i-1] = $row['Seatindex'];
          //  echo $ocupiedseats[$i];
        }
        
        $text = "
        <script>
        console.log('select');
        const seat = document.querySelectorAll('.row .seat');
        var array = ".json_encode($ocupiedseats).";
        console.log('array 1:'+array);
        array.forEach( element => document.getElementById(element).classList.add('occupied'));
        
        </script>
        ";
        
        echo $text;        
         
      
      
      
      
      
      ?>
   
     <button type="button" onclick="store()"  id="seats"  name="submit" class="btn btn-success">Done</button> 
   
  







  </div>

  <footer class="ht-footer">
    <?php include 'footer.php'  ?>
  </footer>
<script>
  function store()
  {
    console.log("Hello");
    var len = localStorage.getItem('selectedSeats');
    console.log(len.length);
      if(len.length > 2)
      {
          window.location = "productslist.php";
      }
      else
      {
        window.location = "Seats.php";
      }
  }
  </script>
  <script src="js/seat.js"></script>
  <script src="js/jquery.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/plugins2.js"></script>
  <script src="js/custom.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>


</body>

</html>