<?php 
require('connect.php');
$year = $_GET['year'];
$sql = "SELECT no FROM death WHERE no LIKE '%/$year' ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$no =  explode("/",$row['no']) ;
echo $no[0]+1 . "/" . $no[1];
mysqli_close($conn);
?>