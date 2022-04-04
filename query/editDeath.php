<?php 
require('connect.php');
$deathId = $_POST['deathId'];
$no = $_POST['no'];
$preName = $_POST['preName'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$hn = $_POST['hn'];
$cId = $_POST['cId'];
$age = $_POST['age'];
$address = $_POST['address'];
$subDistricts = $_POST['districts'];
$deathDate = date("Y-m-d H:i:s", strtotime($_POST["deathDate"]));
$doctorName = $_POST['doctorName'];
$department = $_POST['department'];
$causeOfDeathEng1 = $_POST['causeOfDeathEng1'];
$causeOfDeathEng2 = $_POST['causeOfDeathEng2'];
$causeOfDeathEng3 = $_POST['causeOfDeathEng3'];
$causeOfDeathEng4 = $_POST['causeOfDeathEng4'];
$additionalCause = $_POST['additionalCause'];
$causeOfDeathThai = $_POST['causeOfDeathThai'];
$nameInformer = $_POST['nameInformer'];
$cIdInformer = $_POST['cIdInformer'];
$telInformer = $_POST['telInformer'];
$relation = $_POST['relation'];

$sql = "UPDATE
`death`
SET
`no` = '$no',
`prename` = '$preName',
`firstName` = '$firstName',
`lastName` = '$lastName',
`hn` = '$hn',
`cid` = '$cId',
`age` = '$age',
`address` = '$address',
`subDistrict` = '$subDistricts',
`dateDead` = '$deathDate',
`department` = '$department',
`doctorName` = '$doctorName',
`informerName` = '$nameInformer',
`informerCid` = '$cIdInformer',
`informerTel` = '$telInformer',
`relation` = '$relation',
`causeOfDeath1` = '$causeOfDeathEng1',
`causeOfDeath2` = '$causeOfDeathEng2',
`causeOfDeath3` = '$causeOfDeathEng3',
`causeOfDeath4` = '$causeOfDeathEng4',
`additionalCause` = '$additionalCause',
`causeOfDeathThai` = '$causeOfDeathThai'
WHERE
id='$deathId'";

$result = mysqli_query($conn,$sql);
if($result){
  echo json_encode(array("status"=>"true"),JSON_UNESCAPED_UNICODE) ;
}else{
  echo json_encode(array("status"=>"false"),JSON_UNESCAPED_UNICODE) ;
}

mysqli_close($conn);
?>