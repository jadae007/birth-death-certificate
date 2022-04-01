<?php 
require_once('connect.php');
$no = $_POST['no'];
$prename = $_POST['prename'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$birthDate = date("Y-m-d H:i:s", strtotime($_POST['birthDate']));
$weight = $_POST['weight'];
$birthDay = $_POST['birthDay'];
$lunarPhase = $_POST['lunarPhase'];
$thaiMonth = $_POST['thaiMonth'];
$thaiYears = $_POST['thaiYears'];
$preNameFather = $_POST['preNameFather'];
$firstNameFather = $_POST['firstNameFather'];
$lastNameFather = $_POST['lastNameFather'];
$preNameMother = $_POST['preNameMother'];
$firstNameMother = $_POST['firstNameMother'];
$lastNameMother = $_POST['lastNameMother'];
$cidFather = $_POST['cidFather'];
$cidMother = $_POST['cidMother'];
$address = $_POST['address'];
$informerName = $_POST['informerName'];
$informerTel = $_POST['informerTel'];
$relation = $_POST['relation'];
$subDistrictId = $_POST['districts'];
$recorder = $_POST['recorder'];

$sql = "INSERT INTO
`birth`(
    `no`,
    `prename`,
    `firstName`,
    `lastName`,
    `birthDateTime`,
    `birthDay`,
    `weight`,
    `lunarPhase`,
    `thaiMonth`,
    `thaiYears`,
    `preNameFather`,
    `firstNameFather`,
    `lastNameFather`,
    `cidFather`,
    `preNameMother`,
    `firstNameMother`,
    `lastNameMother`,
    `cidMother`,
    `address`,
    `informerName`,
    `informerTel`,
    `relation`,
    `subDistrict`,
    `recorder`,
    `active`
)
VALUES (
    '$no',
    '$prename',
    '$firstName',
    '$lastName',
    '$birthDate',
    '$birthDay',
    '$weight',
    '$lunarPhase',
    '$thaiMonth',
    '$thaiYears',
    '$preNameFather',
    '$firstNameFather',
    '$lastNameFather',
    '$cidFather',
    '$preNameMother',
    '$firstNameMother',
    '$lastNameMother',
    '$cidMother',
    '$address',
    '$informerName',
    '$informerTel',
    '$relation',
    '$subDistrictId',
    '$recorder',
    '1'
)";

$result = mysqli_query($conn,$sql);
if($result){
  echo json_encode(array("status"=>"true"),JSON_UNESCAPED_UNICODE);
}else{
  echo json_encode(array("status"=>"false","errMsg"=>mysqli_error($conn)),JSON_UNESCAPED_UNICODE);
}
mysqli_close($conn);

?>