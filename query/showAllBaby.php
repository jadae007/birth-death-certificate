<?php 
require_once('connect.php');

$sql ="SELECT * FROM birth";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>=1){
 while($r = mysqli_fetch_assoc($result)){
   $rows['babyObj'][] = $r;
 }
}else{
  $rows['babyObj'] = null;
}

print json_encode($rows,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
?>