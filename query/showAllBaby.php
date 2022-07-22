<?php
require_once('connect.php');
$year = $_GET['year'];
$sql = "SELECT b.*,s.id AS subDistrictId,
p.id AS provinceId,
d.id AS districtId,
s.name_in_thai AS subDistrict,
s.zip_code,
d.name_in_thai AS district,
p.name_in_thai AS province
 FROM birth b 
INNER JOIN subdistricts s
ON b.subDistrict = s.id
INNER JOIN districts d
ON s.district_id = d.id
INNER JOIN provinces p
ON d.province_id = p.id  WHERE active = 1 AND b.no LIKE '%/$year'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) >= 1) {
  while ($r = mysqli_fetch_assoc($result)) {
    $rows['babyObj'][] = $r;
  }
} else {
  $rows['babyObj'] = null;
}

print json_encode($rows, JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
?>