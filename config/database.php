<?php
    $host="localhost";
    $user="root";
    $password="root";
    $db="db_toko_online";
    
    $kon = mysqli_connect($host,$user,$password,$db);
    if (!$kon){
          die("Koneksi gagal:".mysqli_connect_error());
    }
?>