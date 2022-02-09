<?php
require('connect.php');
if(isset($_GET['id'])){
$id = $_GET['id'];
}
$sql = "SELECT * FROM birth WHERE id = '$id'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>=1){
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $row['birthDateAndtime'] = str_replace(" ","T",$row['birthDateTime']);  
}else{
  $row =null;
}

print json_encode($row,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
?>