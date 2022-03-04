<?php 
require('connect.php');
$sql = "SELECT * FROM death";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
  $rows['deathObj'] = mysqli_fetch_all($result,MYSQLI_ASSOC);
}else{
$rows['deathObj'] = null;
}
echo json_encode($rows,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
?>