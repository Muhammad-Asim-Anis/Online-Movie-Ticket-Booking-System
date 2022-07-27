<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn)
{
//    echo "Connection not success".mysqli_connect_error()."<br>";
}
else
{
//    echo "Connection Success <br>";
}
?>