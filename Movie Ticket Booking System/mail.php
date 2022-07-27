<?php
$to = "fa19bsse0032@maju.edu.pk";
$subject = "Password";
$txt = "Asad";
$headers = "From: moviejet3@gmail.com";
if(mail($to,$subject,$txt,$headers)){
    echo "Email succe";
}else{
    echo "Nothing";
}
?>