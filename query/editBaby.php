<?php 
// require('connect.php');
$id = $_POST['IdForEdit'];
$prename = $_POST['editEditPrename'];
$firstName = $_POST['editFirstName'];
$lastName = $_POST['editLastName'];
$birthDate = date("Y-m-d H:i:s", strtotime($_POST['editBirthDate']));
$birthDay = $_POST['editBirthDay'];
$weight = $_POST['editWeight'];
$lunarPhase = $_POST['editLunarPhase'];
$thaiMonth = $_POST['editThaiMonth'];
$thaiYears = $_POST['editThaiYears'];
$preNameFather = $_POST['editPreNameFather'];
$firstNameFather = $_POST['editFirstNameFather'];
$lastNameFather = $_POST['editLastNameFather'];
$preNameMother = $_POST['editPreNameMother'];
$firstNameMother = $_POST['editFirstNameMother'];
$lastNameMother = $_POST['editLastNameMother'];
$cidFather = $_POST['editCidFather'];
$cidMother = $_POST['editCidMother'];
$address = $_POST['editAddress'];
$subDistrictId = $_POST['editDistricts'];
$informerName = $_POST['editInformerName'];
$informerTel = $_POST['editInformerTel'];
$relation = $_POST['editRelation'];
$zipCode = $_POST['editZipCode'];


$sql ="UPDATE
  birth
SET
  prename = '$prename',
  firstName = '$firstName',
  lastName = '$lastName',
  birthDateTime = '$birthDate',
  birthDay = '$birthDay',
  weigh = '$weigh',
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
  relation = '$relation'";
echo $sql;
?>