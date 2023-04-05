<?php 
date_default_timezone_set("Asia/Jakarta");
echo date("d-m-Y");//Tanggal
echo "<br>";
$format_wita = date("h") + 1 . ":" . date("i");
echo $format_wita;
?>