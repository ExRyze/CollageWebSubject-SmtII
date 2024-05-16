<?php
    $host="localhost";
    $user="root";
    $pass= "";

    $dbname = "mahasiswa";

    $koneksi=mysqli_connect($host,$user,$pass,$dbname);
    if(!$koneksi){
        echo "tdk berhasil";
    }
?>