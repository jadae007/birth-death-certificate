<?php 
require('connect.php');
$year = $_GET['year'];
$sql = "SELECT no FROM death WHERE no LIKE '%/$year' ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
if(mysqli_num_rows($result)>0){
$no =  explode("/",$row['no']);
echo $no[0]+1 . "/" . $no[1];
}else{
  echo "1/".$year;
}
mysqli_close($conn);
?>