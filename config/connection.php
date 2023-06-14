<?php 
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "library";

    $conf = mysqli_connect($host,$user,$password,$db);
    if(!$conf){
        die("connection failed:".mysqli_connect_error());
    }
?>

<!-- senilai setipe (===) -->