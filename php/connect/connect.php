<?php
    $host = "localhost";
    $user = "dhtpfls321";
    $pass = "Tk12ek!1998iu"; 
    $db = "dhtpfls321";
    $connect = new mysqli($host, $user, $pass, $db);
    $connect -> set_charset("utf8");

    if(mysqli_connect_errno()){
        echo "DATABASE Connect False";
    } else {
       // echo "DATABASE Connect True";
    }
?>