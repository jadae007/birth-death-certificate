<?php 
require('connect.php');
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
 WHERE active = 1";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
  $rows['deathObj'] = mysqli_fetch_all($result,MYSQLI_ASSOC);
  $date = date_create($r['dateDead']);
  $r['dateFormat'] = date_format($date, "d-m-Y");
}else{
$rows['deathObj'] = null;
}
echo json_encode($rows,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
?>