<?php 
// $date = $_GET['date'];
$date =  date_create("2007-03-07");
$y = date_format($date,"Y");
$m = date_format($date,"m");
$d = date_format($date,"d");
$jd = gregoriantojd($m, $d, $y);
$h = $jd-1954167;
$dithee = floor(fmod($h+0.192, 29.530588));



?>