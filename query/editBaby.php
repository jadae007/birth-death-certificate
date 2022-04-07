<?php 
require('connect.php');
$id = $_POST["idForEdit"];
$prename = $_POST["editPrename"];
$firstName = $_POST["editFirstName"];
$lastName = $_POST["editLastName"];
$birthDate = date("Y-m-d H:i:s", strtotime($_POST["editBirthDate"]));
$birthDay = $_POST["editBirthDay"];
$weight = $_POST["editWeight"];
$lunarPhase = $_POST["editLunarPhase"];
$thaiMonth = $_POST["editThaiMonth"];
$thaiYears = $_POST["editThaiYears"];
$preNameFather = $_POST["editPreNameFather"];
$firstNameFather = $_POST["editFirstNameFather"];
$lastNameFather = $_POST["editLastNameFather"];
$preNameMother = $_POST["editPreNameMother"];
$firstNameMother = $_POST["editFirstNameMother"];
$lastNameMother = $_POST["editLastNameMother"];
$cidFather = $_POST["editCidFather"];
$cidMother = $_POST["editCidMother"];
$address = $_POST["editAddress"];
$subDistrictId = $_POST["editDistricts"];
$informerName = $_POST["editInformerName"];
$informerTel = $_POST["editInformerTel"];
$relation = $_POST["editRelation"];
$zipCode = $_POST["editZipCode"];
$editNo = $_POST['editNo'];

$sql ="UPDATE
  birth
SET
  no = '$editNo',
  prename = '$prename',
  firstName = '$firstName',
  lastName = '$lastName',
  birthDateTime = '$birthDate',
  birthDay = '$birthDay',
  weight = '$weight',
  lunarPhase = '$lunarPhase',
  thaiMonth = '$thaiMonth',
  thaiYears = '$thaiYears',
  preNameFather = '$preNameFather',
  firstNameFather = '$firstNameFather',
  lastNameFather = '$lastNameFather',
  preNameMother = '$preNameMother',
  firstNameMother = '$firstNameMother',
  lastNameMother = '$lastNameMother',
  cidFather = '$cidFather',
  cidMother = '$cidMother',
  address = '$address',
  subDistrict = '$subDistrictId',
  informerName = '$informerName',
  informerTel = '$informerTel',
  relation = '$relation'
WHERE id = '$id'";


$result = mysqli_query($conn,$sql);

if($result){
  echo json_encode(array("status"=>"true"),JSON_UNESCAPED_UNICODE) ;
}else{
  echo json_encode(array("status"=>"false"),JSON_UNESCAPED_UNICODE) ;
}

mysqli_close($conn);

?>