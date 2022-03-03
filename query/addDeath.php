<?php 
$no = $_POST['no'];
$preName = $_POST['preName'];
$firstName = $_POST['firstName'];
$department = $_POST['department'];
$lastName = $_POST['lastName'];
$hn = $_POST['hn'];
$cId = $_POST['cId'];
$sex = $_POST['sex'];
$age = $_POST['age'];
$address = $_POST['address'];
$subDistrict = $_POST['districts'];
$deathDate = date("Y-m-d H:i:s", strtotime($_POST['deathDate']));
$department = $_POST['department'];
$doctorName = $_POST['doctorName'];

$arr = array(
  "eng1"=>$_POST['causeOfDeathEng1'],
  "eng2"=>$_POST['causeOfDeathEng2'],
  "eng3"=>$_POST['causeOfDeathEng3'],
  "eng4"=>$_POST['causeOfDeathEng4']
);

$causeOfDeathEng1 = $_POST['causeOfDeathEng1'];
$causeOfDeathEng2 = $_POST['causeOfDeathEng2'];
$causeOfDeathEng3 = $_POST['causeOfDeathEng3'];
$causeOfDeathEng4= $_POST['causeOfDeathEng4'];
$causeOfDeathThai = $_POST['causeOfDeathThai'];
$nameInformer = $_POST['nameInformer'];
$cIdInformer = $_POST['cIdInformer'];
$telInformer = $_POST['telInformer'];
$relation = $_POST['relation'];

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
    `sex`,
    `address`,
    `subDistrict`,
    `dateDead`,
    `department`,
    `doctorName`,
    `informerName`,
    `informerCid`,
    `informerTel`,
    `relation`
)
VALUES (
    '$no',
    '$preName',
    '$firstName',
    '$department',
    '$lastName',
    '$hn',
    '$cId',
    '$age',
    '$sex',
    '$address',
    '$subDistrict',
    '$deathDate',
    '$department',
    '$doctorName',
    '$nameInformer',
    '$cIdInformer',
    '$telInformer',
    '$relation'
)";

echo $arr;
// echo $sql;
// echo json_encode(array("status"=>"true"),JSON_UNESCAPED_UNICODE);
?>