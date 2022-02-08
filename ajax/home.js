$(document).ready(function () {
  $("#table").DataTable();
  $("#birthMenu a").addClass("active ");
});

$("#hideModal").click(function () {
  $("#addBabyFrom")[0].reset();
  $(":input").removeClass("border border-danger")
});
$("#btnX").click(function () {
  $("#addBabyFrom")[0].reset();
  $(":input").removeClass("border border-danger")
});

$("#birthDate").change(function () {
  let selectDate = $(this).val().split("T")[0];
  calDay(selectDate);
});

const calDay = (date) => {
  $.getJSON("json/2022.json", function (data) {
    const new_data = data.year2022;
    let day = {};
    new_data.forEach((element) => {
      if (date == element.date) {
        day = element;
        console.log(day);
      }
    });
    $("#birthDay").val(`${day.weekDay}`);
    $("#lunarPhase").val(`${day.moonPhase}`);
    $("#thaiMonth").val(`${day.thaiMonth}`);
    $("#thaiYears").val(`${day.thaiYear}`);
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
          $(":input").removeClass("border border-danger")
          SoloAlert.alert({
            title: "Success!!",
            body: "บันทึกการแจ้งเกิดเรียบร้อยแล้ว",
            icon: "success",
            useTransparency: true,
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
  }
});
