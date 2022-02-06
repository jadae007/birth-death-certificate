<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>แจ้งตาย</title>
  <?php
  require('mdbCSS.php');
  require('mdbJS.php');
  ?>
</head>

<body>
  <?php require('components/navbar.php'); ?>
  <div class="container-fluid" id="root">
  <div class="row mt-5 mb-5">
      <div class="col-1">
      </div>
      <div class="col-10 text-end">
      <button type="button" class="btn btn-danger btn-rounded btn-lg" style="font-size: 16px;">บันทึกการแจ้งตาย</button>
      </div>
      <div class="col">
      </div>
    </div>
    <div class="row">
      <div class="col-1">
      </div>
      <div class="col-10">
        <table class="table" id="table">
          <thead>
            <tr class="text-center">
              <th scope="col">ลำดับ</th>
              <th scope="col">ชื่อ - สกุล</th>
              <th scope="col">เลขที่บัตร ปชช.</th>
              <th scope="col">อายุ</th>
              <th scope="col">ว ด ป</th>
              <th scope="col">เวลา</th>
              <th scope="col">หน่วยงาน</th>
              <th scope="col">แพทย์</th>
              <th scope="col">สาเหตุการตายภาษาไทย</th>
              <th scope="col">ผู้แจ้ง</th>
              <th scope="col">Action</th>

            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>นายทดสอบ ทดสอบ</td>
              <td>11223457894</td>
              <td>30</td>
              <td>01-01-2022</td>
              <td>19.30</td>
              <td>ICU MED</td>
              <td>นายแพทย์ทดสอบ ทดสอบ</td>
              <td>หายใจไม่ออก 2 3 4 5 6 7 8 9 140</td>
              <td>นายทดสอบ ทดสอบ</td>
              <td>
                <button type="button" class="btn btn-info btn-floating"><i class="fas fa-info-circle"></i></button>
                <button type="button" class="btn btn-warning btn-floating"><i class="fas fa-edit"></i></button>
                <button type="button" class="btn btn-danger btn-floating"><i class="fas fa-trash"></i></button>
              </td>
            </tr>

          </tbody>
        </table>
      </div>
      <div class="col-1">
      </div>
    </div>
  </div>
  <script src="ajax/dead.js"></script>
</body>

</html>