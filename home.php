<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

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
        <button type="button" class="btn btn-success btn-rounded btn-lg" data-mdb-toggle="modal" data-mdb-target="#addBaby" style="font-size: 16px;">บันทึกแจ้งเกิด</button>
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
              <th scope="col">วันเกิด</th>
              <th scope="col">เวลา</th>
              <th scope="col">น้ำหนัก</th>
              <th scope="col">บิดา</th>
              <th scope="col">มารดา</th>
              <th scope="col">ผู้แจ้ง</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>ธนพงศ์ เขียวโพธิ์</td>
              <td>02-01-1998</td>
              <td>13.00</td>
              <td>3000</td>
              <td>นายรังสรรค์ เขียวโพธิ์</td>
              <td>นางสมคิด เขียวโพธิ์</td>
              <td>มารดา นางสมคิด เขียวโพธิ์</td>
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

  <!-- Modal -->
  <div class="modal fade" id="addBaby" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="addBabyLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addBabyLabel">บันทึกการแจ้งเกิด</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="modal-body">
          <div class="container-fluid">
            <form method="POST" id="addBabyFrom" enctype="multipart/form-data">
            <div class="row mt-2 mb-2">
              <!-- <h5>1. เด็ก</h5> -->
              <div class="col-2">
                <label for="prename">คำนำหน้า</label>
                <select class="form-select" aria-label="Default select example" id="prename">
                  <option value="ด.ช." selected="">ด.ช.</option>
                  <option value="ด.ญ.">ด.ญ.</option>
                </select>
              </div>
              <div class="col-5">
                <label for="firstName">ชื่อ</label>
                <input type="text" id="firstName" name="firstName" class="form-control" placeholder="ชื่อ">
              </div>
              <div class="col-5">
                <label for="lastName">นามสกุล</label>
                <input type="text" id="lastName" name="lastName" class="form-control" placeholder="นามสกุล">
              </div>
            </div>

            <div class="row mb-4 mt-2">
              <div class="col-3">
                <label for="birthDate">วันเกิด</label>
                <input type="datetime-local" id="birthDate" name="birthDate" class="form-control">
              </div>
              <div class="col-2">
                <label for="weight">น้ำหนัก</label>
                <input type="text" id="weight" class="form-control" placeholder="น้ำหนัก">
              </div>
              <div class="col-2">
                <label for="birthDay">วัน</label>
                <select class="form-select" aria-label="Default select example" id="birthDay" name="birthDay">
                  <option value="จันทร์">จันทร์</option>
                  <option value="อังคาร">อังคาร</option>
                  <option value="พุธ">พุธ</option>
                  <option value="พฤหัสบดี">พฤหัสบดี</option>
                  <option value="ศุกร์">ศุกร์</option>
                  <option value="เสาร์">เสาร์</option>
                  <option value="อาทิตย์">อาทิตย์</option>
                </select>
              </div>
              <div class="col-2">
                <label for="lunarPhase">ข้างขึ้น ข้างแรม</label>
                <select class="form-select" aria-label="Default select example" id="lunarPhase">
                  <option value="ขึ้น 1">ขึ้น 1</option>
                  <option value="ขึ้น 2">ขึ้น 2</option>
                  <option value="ขึ้น 3">ขึ้น 3</option>
                  <option value="ขึ้น 4">ขึ้น 4</option>
                  <option value="ขึ้น 5">ขึ้น 5</option>
                  <option value="ขึ้น 6">ขึ้น 6</option>
                  <option value="ขึ้น 7">ขึ้น 7</option>
                  <option value="ขึ้น 8">ขึ้น 8</option>
                  <option value="ขึ้น 9">ขึ้น 9</option>
                  <option value="ขึ้น 10">ขึ้น 10</option>
                  <option value="ขึ้น 11">ขึ้น 11</option>
                  <option value="ขึ้น 12">ขึ้น 12</option>
                  <option value="ขึ้น 13">ขึ้น 13</option>
                  <option value="ขึ้น 14">ขึ้น 14</option>
                  <option value="ขึ้น 15">ขึ้น 15</option>
                  <option value="แรม 1">แรม 1</option>
                  <option value="แรม 2">แรม 2</option>
                  <option value="แรม 3">แรม 3</option>
                  <option value="แรม 4">แรม 4</option>
                  <option value="แรม 5">แรม 5</option>
                  <option value="แรม 6">แรม 6</option>
                  <option value="แรม 7">แรม 7</option>
                  <option value="แรม 8">แรม 8</option>
                  <option value="แรม 9">แรม 9</option>
                  <option value="แรม 10">แรม 10</option>
                  <option value="แรม 11">แรม 11</option>
                  <option value="แรม 12">แรม 12</option>
                  <option value="แรม 13">แรม 13</option>
                  <option value="แรม 14">แรม 14</option>
                  <option value="แรม 15">แรม 15</option>
                </select>
              </div>
              <div class="col-1">
                <label for="thaiMonth">เดือน</label>
                <select class="form-select" aria-label="Default select example" id="thaiMonth">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                </select>
              </div>
              <div class="col-2">
                <label for="thaiYears">ปี</label>
                <select class="form-select" aria-label="Default select example" id="thaiYears">
                  <option value="ชวด">ชวด</option>
                  <option value="ฉลู">ฉลู</option>
                  <option value="ขาล">ขาล</option>
                  <option value="เถาะ">เถาะ</option>
                  <option value="มะโรง">มะโรง</option>
                  <option value="มะเส็ง">มะเส็ง</option>
                  <option value="มะเมีย">มะเมีย</option>
                  <option value="มะแม">มะแม</option>
                  <option value="วอก">วอก</option>
                  <option value="ระกา">ระกา</option>
                  <option value="จอ">จอ</option>
                  <option value="กุน">กุน</option>
                </select>
              </div>
            </div>
            <hr>
            <div class="row mt-2 mb-2" for="family">
              <!-- <h5 class="mb-3">2. ครอบครัว</h5> -->
              <div class="col-2">
                <label for="preNameFather">คำนำหน้า (บิดา)</label>
                <input type="text" id="preNameFather" name="preNameFather" class="form-control" placeholder="คำนำหน้า">
              </div>
              <div class="col-2">
                <label for="firstNameFather">ชื่อ</label>
                <input type="text" id="firstNameFather" name="firstNameFather" class="form-control" placeholder="ชื่อ">
              </div>
              <div class="col-2">
                <label for="lastNameFather">นามสกุล</label>
                <input type="text" id="lastNameFather" name="lastNameFather" class="form-control" placeholder="นามสกุล">
              </div>
              <div class="col-2">
                <label for="preNameMother">คำนำหน้าชื่อ (มารดา)</label>
                <input type="text" id="preNameMother" name="preNameMother" class="form-control" placeholder="คำนำหน้า">
              </div>
              <div class="col-2">
                <label for="firstNameMother">ชื่อ</label>
                <input type="text" id="firstNameMother" name="firstNameMother" class="form-control" placeholder="ชื่อ">
              </div>
              <div class="col-2">
                <label for="lastNameMother">นามสกุล</label>
                <input type="text" id="lastNameMother" name="lastNameMother" class="form-control" placeholder="นามสกุล">
              </div>
            </div>
            <div class="row mb-4 mt-2">
              <div class="col-6">
                <label for="cidFather">เลขบัตร ปชช. บิดา</label>
                <input type="text" id="cidFather" name="cidFather" class="form-control" placeholder="เลขบัตร ปชช. บิดา">
              </div>
              <div class="col-6">
                <label for="cidMother">เลขบัตร ปชช. มารดา</label>
                <input type="text" id="cidMother" name="cidMother" class="form-control" placeholder="เลขบัตร ปชช. มารดา">
              </div>
            </div>
            <hr>
            <div class="row mb-2">
              <div class="col-6">
                <label for="address">ที่อยู่</label>
                <textarea class="form-control" id="address" rows="6"></textarea>
              </div>
              <div class="col-6">
                <label for="informerName">ชื่อผู้แจ้ง</label>
                <input type="text" id="informerName" name="informerName" class="form-control" placeholder="ชื่อผู้แจ้ง">
                <label for="informerTel">เบอร์โทร</label>
                <input type="text" id="informerTel" name="informerTel" class="form-control" placeholder="เบอร์โทร" maxlength="10">
                <label for="ความสัมพันธ์">ความสัมพันธ์</label>
                <input type="text" id="ความสัมพันธ์" name="ความสัมพันธ์" class="form-control" placeholder="ความสัมพันธ์">
              </div>
            </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="hideModal" class="btn btn-secondary" data-mdb-dismiss="modal" style="">Cancel</button>
            <button type="button" id="save" class="btn btn-primary">Save</button>
          </div>
        </div>
        </div>
      </div>
    </div>
    <script src="ajax/home.js"></script>
    <script>
      document.querySelectorAll('.form-outline').forEach((formOutline) => {
        new mdb.Input(formOutline).init();
      });
    </script>
</body>

</html>