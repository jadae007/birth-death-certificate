<?php
require('connect.php');
if(isset($_GET['id'])){
$id = $_GET['id'];
}
$sql = "SELECT
b.id,
s.id AS subDistrictId,
p.id AS provinceId,
d.id AS districtId,
no,
prename,
firstName,
lastName,
birthDateTime,
birthDay,
weight,
lunarPhase,
thaiMonth,
thaiYears,
preNameFather,
firstNameFather,
lastNameFather,
cidFather,
preNameMother,
firstNameMother,
lastNameMother,
cidMother,
address,
subDistrict,
informerName,
informerTel,
relation,
s.name_in_thai AS subDistrict,
s.zip_code,
d.name_in_thai AS district,
p.name_in_thai AS province
FROM
birth b
INNER JOIN subdistricts s
ON b.subDistrict = s.id
INNER JOIN districts d
ON s.district_id = d.id
INNER JOIN provinces p
ON d.province_id = p.id
WHERE
b.id = '$id'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)==1){
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $row['birthDateAndtime'] = str_replace(" ","T",$row['birthDateTime']);
}else{
  $row =null;
}

print json_encode($row,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
?>