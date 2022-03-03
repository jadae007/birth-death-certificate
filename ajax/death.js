$(document).ready(function () {
  $("#table").DataTable({
    scrollX: true,
    scrollY: "600px",
  });
  $("#deadMenu a").addClass("active ");
  showProvinces();
});
$("#preName").keyup(function (e) { 
  let value = e.target.value
  console.log(value.length)
if(value.length == 6){
  value == "นางสาว" ? console.log("นาย") : console.log("ไม่ใช่นาย")
}
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

$("#submit").click(function (e) {
  console.log("submit")
  e.preventDefault();

  let form = e.target.form;
  let data = new FormData(form);

  if (
    form.no.value == "" ||
    form.preName.value == "" ||
    form.firstName.value == "" ||
    form.lastName.value == "" ||
    form.hn.value == "" ||
    form.cId.value == "" ||
    form.age.value == "" ||
    form.address.value == "" ||
    form.zipCode.value == "" ||
    form.deathDate.value == "" ||
    form.doctorName.value == "" ||
    form.causeOfDeathEng1.value == "" ||
    form.causeOfDeathThai.value == "" ||
    form.nameInformer.value == "" ||
    form.cIdInformer.value == "" ||
    form.telInformer.value == "" ||
    form.relation.value == ""
  ) {
    console.log("some empty")
    form.no.value == ""
      ? $("#no").addClass("border border-danger")
      : $("#no").removeClass("border border-danger");
      
    form.preName.value == ""
      ? $("#preName").addClass("border border-danger")
      : $("#preName").removeClass("border border-danger");

    form.firstName.value == ""
      ? $("#firstName").addClass("border border-danger")
      : $("#firstName").removeClass("border border-danger");

    form.firstName.value == ""
      ? $("#firstName").addClass("border border-danger")
      : $("#firstName").removeClass("border border-danger");

    form.lastName.value == ""
      ? $("#lastName").addClass("border border-danger")
      : $("#lastName").removeClass("border border-danger");

    form.hn.value == ""
      ? $("#hn").addClass("border border-danger")
      : $("#hn").removeClass("border border-danger");

    form.cId.value == ""
      ? $("#cId").addClass("border border-danger")
      : $("#cId").removeClass("border border-danger");

    form.age.value == ""
      ? $("#age").addClass("border border-danger")
      : $("#age").removeClass("border border-danger");

    form.address.value == ""
      ? $("#address").addClass("border border-danger")
      : $("#address").removeClass("border border-danger");

    form.zipCode.value == ""
      ? $("#zipCode").addClass("border border-danger")
      : $("#zipCode").removeClass("border border-danger");

    form.deathDate.value == ""
      ? $("#deathDate").addClass("border border-danger")
      : $("#deathDate").removeClass("border border-danger");

    form.doctorName.value == ""
      ? $("#doctorName").addClass("border border-danger")
      : $("#doctorName").removeClass("border border-danger");

    form.causeOfDeathEng1.value == ""
      ? $("#causeOfDeathEng1").addClass("border border-danger")
      : $("#causeOfDeathEng1").removeClass("border border-danger");

    form.causeOfDeathThai.value == ""
      ? $("#causeOfDeathThai").addClass("border border-danger")
      : $("#causeOfDeathThai").removeClass("border border-danger");

    form.nameInformer.value == ""
      ? $("#nameInformer").addClass("border border-danger")
      : $("#nameInformer").removeClass("border border-danger");

    form.cIdInformer.value == ""
      ? $("#cIdInformer").addClass("border border-danger")
      : $("#cIdInformer").removeClass("border border-danger");

    form.telInformer.value == ""
      ? $("#telInformer").addClass("border border-danger")
      : $("#telInformer").removeClass("border border-danger");

    form.relation.value == ""
      ? $("#relation").addClass("border border-danger")
      : $("#relation").removeClass("border border-danger");
  } else {
    addDeath(data);
  }
});

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

const addDeath = (data) => {
  $.ajax({
    type: "POST",
    enctype: "multipart/form-data",
    url: "query/addDeath.php",
    data: data,
    processData: false,
    contentType: false,
    cache: false,
    success: function (response) {
     const { status } = JSON.parse(response)
     if (status == "true") {
      $("#deathCer").modal("hide");
      $("#fromAddDeath")[0].reset();
      $(":input").removeClass("border border-danger");
      SoloAlert.alert({
        title: "Success!!",
        body: "บันทึกการแจ้งตายเรียบร้อยแล้ว",
        icon: "success",
        useTransparency: true,
        onOk: () => {
          table.destroy();
          $("#tbody").children().remove();
         // showAllDeath();
        },
      });
    } else {
      SoloAlert.alert({
        title: "ERROR!!",
        body: "ไม่สามารถบันทึกข้อมูลได้",
        icon: "error",
        useTransparency: true,
      });
    }
    },
  });
};
