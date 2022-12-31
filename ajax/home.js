var getZipCode = {};
var gobalYear = 0 
$(document).ready(function () {
  let year = $("#year").val()
  gobalYear = year
  $("#birthMenu a").addClass("active ");
  showAllBaby();
  showProvinces();
});

$("#changeYear").click(function (e) {
  let year = $("#year").val()
  gobalYear = year
  e.preventDefault();
  showAllBaby()
});

$("#editProvinces").change(function (e) {
  e.preventDefault();
  showInfoProvince(e.currentTarget.value);
});
$("#editAmphures").change(function (e) {
  e.preventDefault();
  showInfoSubDistrict(e.currentTarget.value);
});

$("#provinces").change(function () {
  $("#amphures").children().remove();
  $("#districts").children().remove();
  showDistricts($(this).val());
});

$("#amphures").change(function () {
  $("#districts").children().remove();
  showSubDistricts($(this).val());
});

$("#districts").change(function () {
  getZipCode.forEach((element) => {
    if ($(this).val() == element.id) {
      $("#zipCode").val(element.zip_code);
    }
  });
});

$("#editDistricts").change(function () {
  getZipCode.forEach((element) => {
    if ($(this).val() == element.id) {
      $("#editZipCode").val(element.zip_code);
    }
  });
});

$("#hideModal").click(function () {
  $(":input").removeClass("border border-danger");
  $("#addBabyFrom")[0].reset();
});
$("#btnX").click(function () {
  $(":input").removeClass("border border-danger");
  $("#addBabyFrom")[0].reset();
});

$("#editHideModal").click(function () {
  $(":input").removeClass("border border-danger");
  $("#showBabyFrom")[0].reset();
  $("#editSave").val("edit");
});
$("#editBtnX").click(function () {
  $(":input").removeClass("border border-danger");
  $("#showBabyFrom")[0].reset();
  $("#editSave").val("edit");
});

$("#editSave").click(function () {
  if ($(this).val() == "edit") {
    $(this).val("save");
    $(".canEdit").prop("disabled", false);
  } else {
    $(this).val("edit");
    editBaby();
  }
});

$("#birthDate").change(function () {
  let selectDate = $(this).val().split("T")[0];
  calDay(selectDate);
});
$("#editBirthDate").change(function () {
  let selectDate = $(this).val().split("T")[0];
  calDay(selectDate, "edit");
});

const showAllBaby = () => {
  $.ajax({
    type: "get",
    data:{
      year:gobalYear
    },
    url: "query/showAllBaby.php",
    success: function (data) {
      const { babyObj } = JSON.parse(data);
      if(babyObj != null){
        $("#babyTable").DataTable().destroy();
        $("#tbody").children().remove();
        babyObj.forEach((element) => {
        let number = Number(element.no.split("/")[0])
        let formatDate = new Date(element.birthDateTime.split(" ")[0])
        let thaiDate = formatDate.getDate()+"-"+(formatDate.getMonth()+1)+"-"+(formatDate.getFullYear()+543)
        $("#tbody").append(`
      <tr>
      <th scope="row" data-order=${number}>${element.no}</th>
      <td>${element.prename}${element.firstName} ${element.lastName}</td>
      <td>${element.address} ต.${element.subDistrict} อ.${element.district} จ.${element.province} ${element.zip_code}</td>
      <td>${thaiDate}</td>
      <td>${element.weight}</td>
      <td>${element.preNameFather}${element.firstNameFather} ${
          element.lastNameFather
        }</td>
      <td>${element.preNameMother}${element.firstNameMother} ${
          element.lastNameMother
        }</td>
      <td>${element.informerName}</td>
      <td>
      
        <button type="button" class="btn btn-info btn-floating" onclick="showInfo(${
          element.id
        })"><i class="fas fa-info-circle"></i></button>
        <button type="button" class="btn btn-secondary btn-floating" onclick="printDoc(${
          element.id
        })"><i class="fa fa-print" aria-hidden="true"></i></button>
        <button type="button" class="btn btn-danger btn-floating" onclick="deleteBaby(${
          element.id
        })"><i class="fas fa-trash"></i></button>
      </td>
    </tr>
      `);
      });
      $('td:nth-child(3),th:nth-child(3)').hide();
      $("#babyTable").DataTable({
        dom: "Bfrtip",
        buttons: [
          {
            extend: "excelHtml5",
            className: "btn btn-success",
          },
        ],
      });
    }else{
      $("#contents").children().remove();
      $("#contents").html("<h1 class='text-center'>ไม่มีข้อมูล</h1>")
    }
    },
  });
};

const editBaby = () => {
  let form = $("#showBabyFrom")[0];
  let data = new FormData(form);
  $.ajax({
    type: "POST",
    enctype: "multipart/form-data",
    url: "query/editBaby.php",
    data: data,
    processData: false,
    contentType: false,
    cache: false,
    beforeSend: function () {
      $(".canEdit").prop("disabled", true);
    },
    success: function (response) {
      const { status } = JSON.parse(response);
      if (status == "true") {
        SoloAlert.alert({
          title: "Success!!",
          body: "แก้ไขข้อมูลเรียบร้อยแล้ว",
          icon: "success",
          useTransparency: true,
          onOk: () => {
            showAllBaby();
            $("#showBaby").modal("hide");
            $(":input").removeClass("border border-danger");
            $("#showBabyFrom")[0].reset();
          },
        });
      } else {
      }
    },
  });
};

const showSubDistricts = (districtId) => {
  $.ajax({
    type: "get",
    data: {
      districtId,
    },
    url: "query/showSubDistricts.php",
    success: function (response) {
      const { subDistrictsObj } = JSON.parse(response);
      subDistrictsObj.forEach((element) => {
        $("#districts").append(`
          <option value="${element.id}">${element.name_in_thai}</option>
          `);
      });
      $("#zipCode").val(subDistrictsObj[0].zip_code);
      getZipCode = subDistrictsObj;
    },
  });
};

const showDistricts = (provinceId) => {
  $.ajax({
    type: "get",
    data: {
      provinceId,
    },
    url: "query/showDistricts.php",
    success: function (response) {
      const { districtsObj } = JSON.parse(response);
      districtsObj.forEach((element) => {
        $("#amphures").append(`
          <option value="${element.id}">${element.name_in_thai}</option>
          `);
      });
      showSubDistricts(districtsObj[0].id);
    },
  });
};

const showProvinces = () => {
  $.ajax({
    type: "get",
    url: "query/showProvinces.php",
    success: function (response) {
      const { provincesObj } = JSON.parse(response);
      showDistricts(provincesObj[0].id);
      provincesObj.forEach((element) => {
        $("#provinces").append(`
          <option value="${element.id}">${element.name_in_thai}</option>
          `);
      });
    },
  });
};
const deleteBaby = (id) => {
  SoloAlert.confirm({
    title:"แน่ใจหรือไม่?",
    body:"คุณแน่ใจว่าต้องการจะลบหรือไม่?",
    useTransparency: true,
    onOk : ()=>{
      $.ajax({
        type: "post",
        url: "query/deleteBaby.php",
        data:{id,},
        success: function (response) {
          const data = JSON.parse(response)
          if(data.status == "true"){
            SoloAlert.alert({
              title:"Success!!",
              body:"ลบข้อมูลเรียบร้อยแล้ว?",
              icon:"success",
              useTransparency: true,
              onOk : ()=>{
               showAllBaby();
              },
            })
          }else{
            SoloAlert.alert({
              title:"ไม่สามารถลบข้อมูลได้!!",
              body:data.message,
              icon:"error",
              useTransparency: true,
            })
          }
        }
      });
    },
  })
};


const showInfoSubDistrict = (districtId, subDistrictId) => {
  $.ajax({
    type: "get",
    data: {
      districtId,
    },
    url: "query/showSubDistricts.php",
    success: function (response) {
      $("#editDistricts").children().remove();
      const { subDistrictsObj } = JSON.parse(response);
      let html = "";
      subDistrictsObj.forEach((element) => {
        html += `<option value="${element.id}"`;
        if (subDistrictId == element.id) {
          html += " selected";
        }
        html += `>${element.name_in_thai}</option>`;
      });

      $("#editDistricts").append(html);
    },
  });
};

const showInfoProvince = (provinceId) => {
  $.ajax({
    type: "get",
    url: "query/showProvinces.php",
    success: function (response) {
      $("#editProvinces").children().remove()
      const { provincesObj } = JSON.parse(response);
      let html = "";
      provincesObj.forEach((element) => {
        html += `<option value="${element.id}"`;
        if (provinceId == element.id) {
          html += "selected";
        }
        html += `>${element.name_in_thai}</option>`;
      });
      $("#editProvinces").append(html);
    },
  });
};

const showInfoDistrict = (provinceId,districtId) => {
  $.ajax({
    type: "get",
    data: {
      provinceId,
    },
    url: "query/showDistricts.php",
    success: function (response) {
      const { districtsObj } = JSON.parse(response);
      $("#editAmphures").children().remove()
      let html = "";
      districtsObj.forEach((element) => {
        html += `<option value="${element.id}"`;
        if (districtId == element.id) {
          html += "selected";
        }
        html += `>${element.name_in_thai}</option>`;
      });
      
      $("#editAmphures").append(html);
    },
  });
};

const showInfo = (id) => {
  $("#showBaby").modal("show");
  $.ajax({
    type: "get",
    url: "query/showOneBaby.php",
    data: {
      id,
    },
    success: function (data) {
      const new_data = JSON.parse(data);
      console.log(new_data)
      $("#editNo").val(new_data.no);
      $("#editPrename").val(new_data.prename);
      $("#editFirstName").val(new_data.firstName);
      $("#editLastName").val(new_data.lastName);
      $("#editBirthDate").val(new_data.birthDateAndtime);
      $("#editWeight").val(new_data.weight);
      $("#editBirthDay").val(new_data.birthDay);
      $("#editLunarPhase").val(new_data.lunarPhase);
      $("#editThaiMonth").val(new_data.thaiMonth);
      $("#editThaiYears").val(new_data.thaiYears);
      $("#editPreNameFather").val(new_data.preNameFather);
      $("#editFirstNameFather").val(new_data.firstNameFather);
      $("#editLastNameFather").val(new_data.lastNameFather);
      $("#editPreNameMother").val(new_data.preNameMother);
      $("#editFirstNameMother").val(new_data.firstNameMother);
      $("#editLastNameMother").val(new_data.lastNameMother);
      $("#editCidFather").val(new_data.cidFather);
      $("#editCidMother").val(new_data.cidMother);
      $("#editAddress").val(new_data.address);
      $("#editInformerName").val(new_data.informerName);
      $("#editInformerTel").val(new_data.informerTel);
      $("#editRelation").val(new_data.relation);
      $("#idForEdit").val(new_data.id);
      $("#editZipCode").val(new_data.zip_code)
      $(".canEdit").prop("disabled", true);
      showInfoProvince(new_data.provinceId);
      showInfoDistrict(new_data.provinceId,new_data.districtId)
      showInfoSubDistrict(new_data.districtId, new_data.subDistrictId);
    },
  });
};
const printDoc = (id) =>{
  window.open(`print.php?id=${id}`, '_blank');
}

const calDay = (date, modal) => {
  let selectedYear = date.substr(0, 4)
  $.getJSON(`json/${selectedYear}.json`, function (data) {
    const new_data = data.year;
    let day = {};
    new_data.forEach((element) => {
      if (date == element.date) {
        day = element;
      }
    });
    if (modal == "edit") {
      $("#editBirthDay").val(`${day.weekDay}`);
      $("#editLunarPhase").val(`${day.moonPhase}`);
      $("#editThaiMonth").val(`${day.thaiMonth}`);
      $("#editThaiYears").val(`${day.thaiYear}`);
    } else {
      $("#birthDay").val(`${day.weekDay}`);
      $("#lunarPhase").val(`${day.moonPhase}`);
      $("#thaiMonth").val(`${day.thaiMonth}`);
      $("#thaiYears").val(`${day.thaiYear}`);
    }
  }).fail(function () {
    console.log("An error has occurred.");
  });
};

$("#save").click(function () {
  let form = $("#addBabyFrom")[0];
  let data = new FormData(form);

  if (
    form.firstName.value == "" ||
    form.lastName.value == "" ||
    form.birthDate.value == "" ||
    form.weight.value == "" ||
    form.birthDay.value == 0 ||
    form.lunarPhase.value == 0 ||
    form.thaiMonth.value == 0 ||
    form.thaiYears.value == 0 ||
    form.preNameFather.value == "" ||
    form.firstNameFather.value == "" ||
    form.lastNameFather.value == "" ||
    form.preNameMother.value == "" ||
    form.firstNameMother.value == "" ||
    form.lastNameMother.value == "" ||
    form.cidFather.value == "" ||
    form.cidMother.value == "" ||
    form.address.value == "" ||
    form.informerName.value == "" ||
    form.informerTel.value == "" ||
    form.relation.value == ""
  ) {
    if (form.firstName.value == "") {
      $("#firstName").addClass("border border-danger");
    } else {
      $("#firstName").removeClass("border border-danger");
    }
    if (form.lastName.value == "") {
      $("#lastName").addClass("border border-danger");
    } else {
      $("#lastName").removeClass("border border-danger");
    }
    if (form.birthDate.value == "") {
      $("#birthDate").addClass("border border-danger");
    } else {
      $("#birthDate").removeClass("border border-danger");
    }
    if (form.weight.value == "") {
      $("#weight").addClass("border border-danger");
    } else {
      $("#weight").removeClass("border border-danger");
    }
    if (form.birthDay.value == 0) {
      $("#birthDay").addClass("border border-danger");
    } else {
      $("#birthDay").removeClass("border border-danger");
    }
    if (form.lunarPhase.value == 0) {
      $("#lunarPhase").addClass("border border-danger");
    } else {
      $("#lunarPhase").removeClass("border border-danger");
    }
    if (form.thaiMonth.value == 0) {
      $("#thaiMonth").addClass("border border-danger");
    } else {
      $("#thaiMonth").removeClass("border border-danger");
    }
    if (form.thaiYears.value == 0) {
      $("#thaiYears").addClass("border border-danger");
    } else {
      $("#thaiYears").removeClass("border border-danger");
    }
    if (form.preNameFather.value == "") {
      $("#preNameFather").addClass("border border-danger");
    } else {
      $("#preNameFather").removeClass("border border-danger");
    }
    if (form.firstNameFather.value == "") {
      $("#firstNameFather").addClass("border border-danger");
    } else {
      $("#firstNameFather").removeClass("border border-danger");
    }
    if (form.lastNameFather.value == "") {
      $("#lastNameFather").addClass("border border-danger");
    } else {
      $("#lastNameFather").removeClass("border border-danger");
    }
    if (form.preNameMother.value == "") {
      $("#preNameMother").addClass("border border-danger");
    } else {
      $("#preNameMother").removeClass("border border-danger");
    }
    if (form.firstNameMother.value == "") {
      $("#firstNameMother").addClass("border border-danger");
    } else {
      $("#firstNameMother").removeClass("border border-danger");
    }
    if (form.lastNameMother.value == "") {
      $("#lastNameMother").addClass("border border-danger");
    } else {
      $("#lastNameMother").removeClass("border border-danger");
    }
    if (form.cidFather.value == "") {
      $("#cidFather").addClass("border border-danger");
    } else {
      $("#cidFather").removeClass("border border-danger");
    }
    if (form.cidMother.value == "") {
      $("#cidMother").addClass("border border-danger");
    } else {
      $("#cidMother").removeClass("border border-danger");
    }
    if (form.address.value == "") {
      $("#address").addClass("border border-danger");
    } else {
      $("#address").removeClass("border border-danger");
    }
    if (form.informerName.value == "") {
      $("#informerName").addClass("border border-danger");
    } else {
      $("#informerName").removeClass("border border-danger");
    }
    if (form.informerTel.value == "") {
      $("#informerTel").addClass("border border-danger");
    } else {
      $("#informerTel").removeClass("border border-danger");
    }
    if (form.relation.value == "") {
      $("#relation").addClass("border border-danger");
    } else {
      $("#relation").removeClass("border border-danger");
    }
  } else {
    addBaby(data);
  }
});

const addBaby = (data) => {
  $.ajax({
    type: "POST",
    enctype: "multipart/form-data",
    url: "query/addBaby.php",
    data: data,
    processData: false,
    contentType: false,
    cache: false,
    success: function (data) {
      const { status } = JSON.parse(data);
      if (status == "true") {
        $("#addBaby").modal("hide");
        $("#addBabyFrom")[0].reset();
        $(":input").removeClass("border border-danger");
        SoloAlert.alert({
          title: "Success!!",
          body: "บันทึกการแจ้งเกิดเรียบร้อยแล้ว",
          icon: "success",
          useTransparency: true,
          onOk: () => {
            showAllBaby();
          },
        });
      } else {
        const { errMsg } = JSON.parse(data);
        SoloAlert.alert({
          title: "ERROR!!",
          body: `ไม่สามารถบันทึกข้อมูลได้ ${errMsg}`,
          icon: "error",
          useTransparency: true,
        });
      }
    },
  });
};
