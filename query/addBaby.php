<?php 
require_once('connect.php');
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

// echo $prename."<br>".$firstName."<br>".$lastName."<br>".$birthDate."<br>".$weight."<br>".$birthDay."<br>".$lunarPhase."<br>".
// $thaiMonth."<br>".$thaiYears."<br>".$preNameFather."<br>".$firstNameFather."<br>".$lastNameFather."<br>".$preNameMother.
// "<br>".$firstNameMother."<br>".$lastNameMother."<br>".$cidFather."<br>".$cidMother."<br>".$address."<br>".$informerName.
// "<br>".$informerTel."<br>".$relation."<br>";

$sql = "INSERT INTO
`birth`(
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
    `relation`
)
VALUES (
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
    '$relation'
)";

// echo $sql;
// $result = mysqli_query($conn,$sql);
// if($result){
//   echo json_encode(array("status"=>"true"),JSON_UNESCAPED_UNICODE);
// }else{
//   echo json_encode(array("status"=>"false"),JSON_UNESCAPED_UNICODE);
// }
// mysqli_close($conn);

echo json_encode(array("status"=>"true"),JSON_UNESCAPED_UNICODE);
?>