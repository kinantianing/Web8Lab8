<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "dblab8";

    $conn = mysqli_connect($host, $user, $pass, $db);
    if ($conn == false)
    {
        echo "Koneksi ke server gagal.";
        die();
    }  #else echo "Koneksi berhasil";
?>