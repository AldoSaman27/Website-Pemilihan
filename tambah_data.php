<?php
include './db.php'; 

$alha_numeric="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";

for($kata=1; $kata <= 1500; $kata++) {
    $arr=array();
    $length=strlen($alha_numeric) - 2;
    for($i = 0; $i<9; $i++) {
        $x = rand(0, $length);
        $arr[] = $alha_numeric[$x];
    }
    //mysqli_query($conn, "INSERT INTO `users` (`userid`) VALUES ('". implode($arr) ."')");
}
?>