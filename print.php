<?php 
header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
require('query/connect.php');
if(isset($_GET['id'])){
  $id = $_GET['id'];
  }
  $sql = "SELECT
  b.*,
  s.id AS subDistrictId,
  p.id AS provinceId,
  d.id AS districtId,
  YEAR(timestamp) AS yearTimestamp,
  MONTH(timestamp) AS monthTimestamp,
  DAY(timestamp) AS dayTimestamp,
  YEAR(birthDateTime) AS yearBirth,
  MONTH(birthDateTime) AS monthBirth,
  DAY(birthDateTime) AS dayBirth,
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
  
  if(mysqli_num_rows($result)>=1){
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  }else{
    $row =null;
  }
$birthYear = $row['yearBirth']+543;
$birthDay = $row['dayBirth'] ." ".thaiMonth($row['monthBirth']) ." พ.ศ. ". $birthYear;
 // print json_encode($row,JSON_UNESCAPED_UNICODE);
   mysqli_close($conn);
$currentDate = date("Y-m-d");
$currentYear = date("Y")+543;
$currentDay = date("d");
$currentMonth = date("m");

function thaiMonth($month){
  $monthTH = [null,'มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'];
  return $monthTH[intval($month)];
}

function preName($pname){
  return $pname == "ด.ช." ? "เด็กชาย":"เด็กหญิง";
}



require('assets/fpdf/fpdf.php');
//หน้าปก จากซ้าย,จากบน ::จากซ้าย +1
$pdf = new FPDF('P','mm','A4');
$pdf->AddFont('THSarabunNew_b', '', 'THSarabunNew_b.php');
$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->SetAutoPageBreak(false);
$pdf->AddPage('P' ,'A4');
$pdf->SetFont('THSarabunNew_b', '', 22);
$pdf->setXY(0, 25);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', "หนังสือแสดงความยินยอมให้บุตรใช้ชื่อสกุลบิดา"), 0 , 1 , 'C');
$pdf->SetFont('THSarabunNew', '', 18);
$pdf->setXY(120, 40);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', "เขียนที่ โรงพยาบาลพระนายรายณ์มหาราช"));
$pdf->setXY(120, 50);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', "วันที่............"));
$pdf->setXY(140, 50);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', "เดือน........................"));
$pdf->setXY(173, 50);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', "พ.ศ. ........."));
$pdf->setXY(30, 60);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', "หนังสือแสดงความยินยอมฉบับนี้ให้ไว้เพื่อแสดงว่า ข้าพเจ้านาย........................................................."));
$pdf->setXY(15, 70);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', "เลขบัตรประจำตัวประชาชน........................................................................................ขอแสดงความยินยอมให้"));
$pdf->setXY(15, 80);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', "..................................................................................เกิดวันที่............เดือน..................................พ.ศ. ............."));
$pdf->setXY(15, 90);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', "ตามหลักฐานหนังสือรับรองการเกิดของโรงพยาบาล.........................................................................................."));
$pdf->setXY(110, 89);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', "พระนารายณ์มหาราช"));
$pdf->setXY(15, 100);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', "เลขที่............................................................................ลงวันที่..........................................................................."));
$pdf->setXY(15, 110);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', "ซึ่งเป็นบุตรของข้าพเจ้าอันเกิดจาก....................................................................................................................."));
$pdf->setXY(15, 120);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', "เลขบัตรประจำตัวประชาชน..................................................................โดยมิได้จดทะเบียนสมรสตามกฎหมาย"));
$pdf->setXY(15, 130);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', 'ใช้ชื่อสกุลบิดา (นามสกุล) "..................................................................." ของข้าพเจ้าได้'));
$pdf->setXY(0, 150);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', 'ให้ไว้ ณ วันที่...............เดือน....................................พ.ศ. ....................'), 0 , 1 , 'C');
$pdf->setXY(0, 170);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', '(ลงชื่อ).......................................................................บิดา'), 0 , 1 , 'C' );
$pdf->setXY(0, 180);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', '(....................................................................)'), 0 , 1 , 'C' );
$pdf->setXY(0, 200);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', '(ลงชื่อ)....................................................................มารดา'), 0 , 1 , 'C' );
$pdf->setXY(0, 210);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', '(....................................................................)'), 0 , 1 , 'C' );


//---------------------------------------------------------------------------
$pdf->setXY(131, 49);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', $row['dayTimestamp']));
$pdf->setXY(151, 49);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', thaiMonth($row['monthTimestamp'])));
$pdf->setXY(182, 49);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', $row['yearTimestamp']+543));
$pdf->setXY(134, 59);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', $row['firstNameFather']." ".$row['lastNameFather']));
$pdf->setXY(15, 79);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', preName($row['prename']).$row['firstName']." ".$row['lastName']));
$pdf->setXY(70, 69);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', $row['cidFather']));
$pdf->setXY(116, 79);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', $row['dayBirth']));
$pdf->setXY(140, 79);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', thaiMonth($row['monthBirth'])));
$pdf->setXY(180, 79);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', $row['yearBirth']+543));
$pdf->setXY(30, 99);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', $row['no']));
$pdf->setXY(118, 99);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', $birthDay));
$pdf->setXY(75, 109);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', $row['preNameMother'].$row['firstNameMother']." ".$row['lastNameMother']));
$pdf->setXY(70, 119);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', $row['cidMother']));
$pdf->setXY(70, 129);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', $row['lastNameFather']));
$pdf->setXY(70, 149);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', $currentDay));
$pdf->setXY(95, 149);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', thaiMonth($currentMonth)));
$pdf->setXY(140, 149);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', $currentYear));
$pdf->setXY(0, 179);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', $row['preNameFather'].$row['firstNameFather']." ".$row['lastNameFather']), 0 , 1 , 'C' );
$pdf->setXY(0, 209);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874',  $row['preNameMother'].$row['firstNameMother']." ".$row['lastNameMother']), 0 , 1 , 'C' );
$pdf->Output();
?>