<?php
if(isset($_GET['GetName']))
{
    $movie = $_GET['GetName'];
    echo $movie;
}
?>
<a href="Seats.php?GetName=<?php echo $movie ?>" type="sumbit" id="seats" name="submit" class="btn btn-success p-3 m-3">Done</a>