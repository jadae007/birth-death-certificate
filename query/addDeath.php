<?php 
$no = $_POST['no'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$cId = $_POST['cId'];
$sex = $_POST['sex'];
$age = $_POST['age'];
$nationality = $_POST['nationality'];
$status = $_POST['status'];
$religion = $_POST['religion'];
$address = $_POST['address'];
$subDistrict = $_POST['districts'];
$deathDate = $_POST['deathDate'];
$doctorName = $_POST['doctorName'];
$causeOfDeathEng1 = $_POST['causeOfDeathEng1'];
$causeOfDeathEng2 = $_POST['causeOfDeathEng2'];
$causeOfDeathEng3 = $_POST['causeOfDeathEng3'];
$causeOfDeathEng4= $_POST['causeOfDeathEng4'];
$causeOfDeathThai = $_POST['causeOfDeathThai'];
$nameInformer = $_POST['nameInformer'];
$cIdInformer = $_POST['cIdInformer'];
$telInformer = $_POST['telInformer'];
$relation = $_POST['relation'];


echo $no ."<br>". $firstName  ."<br>". $lastName  ."<br>". $cId  ."<br>". $sex  ."<br>". $age  ."<br>". $nationality . 
$status ."<br>". $religion ."<br>". $address ."<br>". $subDistrict ."<br>".
 $deathDate ."<br>". $doctorName ."<br>". $causeOfDeathEng1 ."<br>". $causeOfDeathEng2 ."<br>". $causeOfDeathEng3 
."<br>". $causeOfDeathEng4  ."<br>". $causeOfDeathThai  ."<br>". $nameInformer  ."<br>". $telInformer  ."<br>". $relation ;
?>