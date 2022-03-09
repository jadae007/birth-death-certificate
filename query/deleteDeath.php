<?php
require('connect.php');
$id = $_POST['id'];
$sql = "DELETE FROM death WHERE id = '$id'";

if(mysqli_query($conn,$sql)){
  echo json_encode(array("status"=>"true"),JSON_UNESCAPED_UNICODE);
}else{
  echo json_encode(array("status"=>"false","message"=>mysqli_error($conn)),JSON_UNESCAPED_UNICODE);
}
mysqli_close($conn);
?>