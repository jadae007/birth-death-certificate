<?php
require('connect.php');
$id = $_POST['id'];
$sql = "UPDATE birth SET active = 0 WHERE id = '$id'";
// $sql = "DELETE FROM birth WHERE id = '$id'";
if(mysqli_query($conn,$sql)){
  echo json_encode(array("status"=>"true"),JSON_UNESCAPED_UNICODE);
}else{
  echo json_encode(array("status"=>"false","message"=>mysqli_error($conn)),JSON_UNESCAPED_UNICODE);
}
mysqli_close($conn);

?>