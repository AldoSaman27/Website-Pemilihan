<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname   = 'webpilketos';

    $conn = mysqli_connect($hostname, $username, $password, $dbname) or die (`[MySQL] Gagal terconnect ke database!`);
?>