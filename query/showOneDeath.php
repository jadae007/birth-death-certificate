<?php
require('connect.php');
if(isset($_GET['id'])){
$id = $_GET['id'];
}
$sql = "SELECT death.*,s.id AS subDistrictId,
p.id AS provinceId,
d.id AS districtId,
s.name_in_thai AS subDistrict,
s.zip_code,
d.name_in_thai AS district,
p.name_in_thai AS province
 FROM death 
INNER JOIN subdistricts s
ON death.subDistrict = s.id
INNER JOIN districts d
ON s.district_id = d.id
INNER JOIN provinces p
ON d.province_id = p.id
 WHERE death.id = '$id'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>=1){
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $row['deathDateAndtime'] = str_replace(" ","T",$row['dateDead']);  
}else{
  $row = null;
}

print json_encode($row,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
?>