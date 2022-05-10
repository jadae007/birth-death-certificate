<?php 
require('query/checkLogin.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>บันทึกการแจ้งตาย</title>
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
        <button type="button" data-mdb-toggle="modal" id="btnAddDeath" data-mdb-target="#deathCer" class="btn btn-danger btn-rounded btn-lg" style="font-size: 16px;">บันทึกการแจ้งตาย</button>
      </div>
      <div class="col">
      </div>
    </div>
    <div class="row">
      <div class="col-1">
      </div>
      <div class="col-10">
        <table class="table table-hover display nowrap" id="table">
          <thead>
            <tr class="text-center">
              <th scope="col">ลำดับ</th>
              <th scope="col">ชื่อ - สกุล</th>
              <th scope="col">ที่อยู่</th>
              <th scope="col">เลขที่บัตร ปชช.</th>
              <th scope="col">อายุ</th>
              <th scope="col">ว ด ป</th>
              <th scope="col">เวลา</th>
              <th scope="col">หน่วยงาน</th>
              <th scope="col">แพทย์</th>
              <th scope="col">cause of death1</th>
              <th scope="col">cause of death2</th>
              <th scope="col">cause of death3</th>
              <th scope="col">cause of death4</th>
              <th scope="col">โรคหรือภาวะอื่นที่เป็นเหตุหนุน</th>
              <th scope="col">สาเหตุการตายภาษาไทย</th>
              <th scope="col">ผู้แจ้ง</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody id="tbody">

          </tbody>
        </table>
      </div>
      <div class="col-1">
      </div>
    </div>
  </div>
  <style>
    .form-select {
      padding-top: 4px;
      padding-bottom: 3.28px;
    }
  </style>
  <!-- Modal -->
  <div class="modal fade" id="deathCer" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="deathCerLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deathCerLabel">บันทึกการแจ้งตาย</h5>
          <button type="button" id="xModal" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" id="fromAddDeath" enctype="multipart/form-data">
          <input type="hidden" name="recorder" id="recorder" value="<?php echo $sessionUsername; ?>">
            <input type="hidden" name="deathId" id="deathId" value="">
            <div class="row">
              <div class="col-2">
                <input type="text" class="form-control mb-3" name="no" id="no" placeholder="ลำดับ" required>
              </div>
              <div class="col-10">
              </div>
            </div>
            <div class="row">
              <div class="col-2">
                <label for="preName">คำนำหน้า</label>
                <input type="text" id="preName" name="preName" class="form-control" placeholder="คำนำหน้า" required>
              </div>
              <div class="col-5">
                <label for="firstName">ชื่อ</label>
                <input type="text" id="firstName" name="firstName" class="form-control" placeholder="ชื่อ" required>
              </div>
              <div class="col-5">
                <label for="lastName">นามสกุล</label>
                <input type="text" id="lastName" name="lastName" class="form-control" placeholder="นามสกุล" required>
              </div>
            </div>
            <div class="row">
              <div class="col-3">
                <label for="hn">HN</label>
                <input type="text" id="hn" name="hn" class="form-control" maxlength="7" onkeypress="return event.charCode>=48 && event.charCode<=57" placeholder="HN" required>
              </div>
              <div class="col-3">
                <label for="cId">เลขบัตร ปชช.</label>
                <input type="text" id="cId" name="cId" class="form-control" maxlength="13" onkeypress="return event.charCode>=48 && event.charCode<=57" placeholder="เลขบัตรประจำตัวประชาชน" required>
              </div>
              <div class="col-2">
                <label for="age">อายุ</label>
                <input type="text" id="age" name="age" class="form-control" maxlength="3" onkeypress="return event.charCode>=48 && event.charCode<=57" placeholder="ปี" required>
              </div>
              <div class="col-2">
                <label for="ageMonth">เดือน</label>
                <input type="text" id="ageMonth" name="ageMonth" class="form-control" maxlength="3" onkeypress="return event.charCode>=48 && event.charCode<=57" placeholder="เดือน" required>
              </div>
              <div class="col-2">
                <label for="ageDay">วัน</label>
                <input type="text" id="ageDay" name="ageDay" class="form-control" maxlength="3" onkeypress="return event.charCode>=48 && event.charCode<=57" placeholder="วัน" required>
              </div>
              <!-- <div class="col-2">
                <label for="sex">เพศ</label>
                <select class="form-select" id="sex" name="sex" aria-label="Default select example">
                  <option value="m">ชาย</option>
                  <option value="f">หญิง</option>
                </select>
              </div> -->
            </div>
            <div class="row">
              <div class="col-4">
                <label for="address">ที่อยู่</label>
                <input type="text" class="form-control" id="address" name="address" required>
              </div>
              <div class="col-2">
                <label for="provinces">จังหวัด</label>
                <select class="form-select" aria-label="Default select example" name="provinces" id="provinces">
                </select>
              </div>
              <div class="col-2">
                <label for="amphures">อำเภอ</label>
                <select class="form-select" aria-label="Default select example" name="amphures" id="amphures">
                </select>
              </div>
              <div class="col-2">
                <label for="districts">ตำบล/เขต</label>
                <select class="form-select" aria-label="Default select example" name="districts" id="districts">
                </select>
              </div>
              <div class="col-2">
                <label for="zipCode">รหัสไปรษณีย์</label>
                <input type="text" id="zipCode" name="zipCode" onkeypress="return event.charCode>=48 && event.charCode<=57" class="form-control" placeholder="รหัสไปรษณีย์" required>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-6">
                <label for="deathDate">ตายวันที่</label>
                <input type="datetime-local" id="deathDate" name="deathDate" class="form-control">
              </div>
              <div class="col-3">
                <label for="doctorName">ผู้รักษาก่อนตาย</label>
                <input type="text" id="doctorName" name="doctorName" class="form-control" placeholder="ผู้รักษาก่อนตาย" required>
              </div>
              <div class="col-3">
                <label for="department">หน่วยงาน</label>
                <input type="text" id="department" name="department" class="form-control" placeholder="หน่วยงาน" required>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
                <label for="causeOfDeathEng">สาเหตุการตายภาษาอังกฤษ</label>
                <input type="text" id="causeOfDeathEng1" name="causeOfDeathEng1" class="form-control mb-2" placeholder="a)" required>
                <input type="text" id="causeOfDeathEng2" name="causeOfDeathEng2" class="form-control mb-2" placeholder="b)">
                <input type="text" id="causeOfDeathEng3" name="causeOfDeathEng3" class="form-control mb-2" placeholder="c)">
                <input type="text" id="causeOfDeathEng4" name="causeOfDeathEng4" class="form-control mb-2" placeholder="d)">
                <input type="text" id="additionalCause" name="additionalCause" class="form-control mb-2" placeholder="โรคหรือภาวะที่เป็นเหตุหนุน">
              </div>
              <div class="col-4">
                <label for="causeOfDeath">สาเหตุการตายภาษาไทย</label>
                <input type="text" id="causeOfDeathThai" name="causeOfDeathThai" class="form-control" placeholder="สาเหตุการตายภาษาไทย" required>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-3">
                <label for="nameInformer">ชื่อผู้แจ้ง</label>
                <input type="text" id="nameInformer" name="nameInformer" class="form-control mb-2" placeholder="ชื่อผู้แจ้ง" required>
              </div>
              <div class="col-3">
                <label for="cIdInformer">เลขบัตร ปชช. ผู้แจ้ง</label>
                <input type="text" id="cIdInformer" name="cIdInformer" maxlength="13" class="form-control mb-2" placeholder="เลขบัตรประจำตัวประชาชนผู้แจ้ง" required>
              </div>
              <div class="col-3">
                <label for="telInformer">เบอร์โทรผู้แจ้ง</label>
                <input type="text" id="telInformer" name="telInformer" maxlength="10" onkeypress="return event.charCode>=48 && event.charCode<=57" class="form-control mb-2" placeholder="เบอร์โทรผู้แจ้ง" required>
              </div>
              <div class="col-3">
                <label for="relation">ความสัมพันธ์</label>
                <input type="text" id="relation" name="relation" class="form-control mb-2" placeholder="ความสัมพันธ์" required>
              </div>
            </div>
            <div class="modal-footer mt-4">
              <button type="button" id="cancelModal" class="btn btn-secondary" data-mdb-dismiss="modal">ยกเลิก</button>
              <button type="submit" id="submit" class="btn btn-primary">บันทึก</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="ajax/death.js"></script>
</body>

</html>