<?php
$no = trim($_POST['no']);
$preName = trim($_POST['preName']);
$firstName = trim($_POST['firstName']);
$lastName = trim($_POST['lastName']);
$department = trim($_POST['department']);
$hn = trim($_POST['hn']);
$cId = trim($_POST['cId']);
$age = trim($_POST['age']);
$ageMonth = trim($_POST['ageMonth']);
$ageDay = trim($_POST['ageDay']);
$address = trim($_POST['address']);
$subDistrict = trim($_POST['districts']);
$deathDate = date("Y-m-d H:i:s", strtotime($_POST['deathDate']));
$department = trim($_POST['department']);
$doctorName = trim($_POST['doctorName']);
$causeOfDeathEng1 = trim($_POST['causeOfDeathEng1']);
$causeOfDeathEng2 = trim($_POST['causeOfDeathEng2']);
$causeOfDeathEng3 = trim($_POST['causeOfDeathEng3']);
$causeOfDeathEng4 = trim($_POST['causeOfDeathEng4']);
$additionalCause = trim($_POST['additionalCause']);
$causeOfDeathThai = trim($_POST['causeOfDeathThai']);
$nameInformer = trim($_POST['nameInformer']);
$cIdInformer = trim($_POST['cIdInformer']);
$telInformer = trim($_POST['telInformer']);
$relation = trim($_POST['relation']);
$recorder = trim($_POST['recorder']);

require('connect.php');

$sql = "INSERT INTO
`death`(
    `no`,
    `prename`,
    `firstName`,
    `lastName`,
    `hn`,
    `cid`,
    `age`,
    `ageMonth`,
    `ageDay`,
    `address`,
    `subDistrict`,
    `dateDead`,
    `department`,
    `doctorName`,
    `informerName`,
    `informerCid`,
    `informerTel`,
    `relation`,
    `causeOfDeath1`,
    `causeOfDeath2`,
    `causeOfDeath3`,
    `causeOfDeath4`,
    `additionalCause`,
    `causeOfDeathThai`,
    `recorder`,
    `active`
)
VALUES (
    '$no',
    '$preName',
    '$firstName',
    '$lastName',
    '$hn',
    '$cId',
    '$age',
    '$ageMonth',
    '$ageDay',
    '$address',
    '$subDistrict',
    '$deathDate',
    '$department',
    '$doctorName',
    '$nameInformer',
    '$cIdInformer',
    '$telInformer',
    '$relation',
    '$causeOfDeathEng1',
    '$causeOfDeathEng2',
    '$causeOfDeathEng3',
    '$causeOfDeathEng4',
    '$additionalCause',
    '$causeOfDeathThai',
    '$recorder',
    '1'
)";

echo (mysqli_query($conn, $sql)) ?  json_encode(array("status"=>"true"),JSON_UNESCAPED_UNICODE) :  json_encode(array("status"=>"false","errMsg"=>mysqli_error($conn)),JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
?>
