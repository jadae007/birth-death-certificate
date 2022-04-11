var stateModal = 0;
$(document).ready(function () {
  $("#deadMenu a").addClass("active ");
  showAllDeath();
  showProvinces();
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
$("#xModal").click(function (e) {
  e.preventDefault();
  $(":input").removeClass("border border-danger");
  $("#fromAddDeath")[0].reset();
  stateModal = 0
});

$("#cancelModal").click(function (e) {
  e.preventDefault();
  $(":input").removeClass("border border-danger");
  $("#fromAddDeath")[0].reset();
  stateModal = 0
});
$("#deathDate").change(function (e) {
  e.preventDefault();
});

$("#btnAddDeath").click(()=>{
$.ajax({
  type: "GET",
  url: "query/showLastDeathId.php",
  success: function (response) {
    $("#no").val(response)
  }
});
})

$("#submit").click(function (e) {
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
    stateModal ?editDeath(data):addDeath(data)
  }
});

const showInfo = (id) => {
  $("#deathId").val(id)
  $.ajax({
    type: "get",
    url: "query/showOneDeath.php",
    data: {
      id,
    },
    success: function (response) {
      if (response != "null") {
        const data = JSON.parse(response);
 
        $("#no").val(data.no);
        $("#preName").val(data.prename);
        $("#firstName").val(data.firstName);
        $("#lastName").val(data.lastName);
        $("#hn").val(data.hn);
        $("#cId").val(data.cid);
        $("#age").val(data.age);
        $("#address").val(data.address);
        $("#zipCode").val(data.zip_code);
        $("#deathDate").val(data.deathDateAndtime);
        $("#doctorName").val(data.doctorName);
        $("#department").val(data.department);
        $("#causeOfDeathEng1").val(data.causeOfDeath1);
        $("#causeOfDeathEng2").val(data.causeOfDeath2);
        $("#causeOfDeathEng3").val(data.causeOfDeath3);
        $("#causeOfDeathEng4").val(data.causeOfDeath4);
        $("#causeOfDeathThai").val(data.causeOfDeathThai);
        $("#additionalCause").val(data.additionalCause);
        $("#nameInformer").val(data.informerName);
        $("#cIdInformer").val(data.informerCid);
        $("#telInformer").val(data.informerTel);
        $("#relation").val(data.relation);
        showInfoProvince(data.provinceId)
        showInfoDistrict(data.provinceId,data.districtId)
        showInfoSubDistrict(data.districtId,data.subDistrictId);
      }
    },
  });
  $("#deathCer").modal("show");
  stateModal = 1;
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


const showInfoSubDistrict = (districtId, subDistrictId) => {
  $.ajax({
    type: "get",
    data: {
      districtId,
    },
    url: "query/showSubDistricts.php",
    success: function (response) {
      $("#districts").children().remove();
      const { subDistrictsObj } = JSON.parse(response);
      let html = "";
      subDistrictsObj.forEach((element) => {
        html += `<option value="${element.id}"`;
        if (subDistrictId == element.id) {
          html += " selected";
        }
        html += `>${element.name_in_thai}</option>`;
      });

      $("#districts").append(html);
    },
  });
};

const showInfoProvince = (provinceId) => {
  $.ajax({
    type: "get",
    url: "query/showProvinces.php",
    success: function (response) {
      $("#provinces").children().remove()
      const { provincesObj } = JSON.parse(response);
      let html = "";
      provincesObj.forEach((element) => {
        html += `<option value="${element.id}"`;
        if (provinceId == element.id) {
          html += "selected";
        }
        html += `>${element.name_in_thai}</option>`;
      });
      $("#provinces").append(html);
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
      $("#amphures").children().remove()
      let html = "";
      districtsObj.forEach((element) => {
        html += `<option value="${element.id}"`;
        if (districtId == element.id) {
          html += "selected";
        }
        html += `>${element.name_in_thai}</option>`;
      });
      
      $("#amphures").append(html);
    },
  });
};

const deleteDeath = (id) => {
  SoloAlert.confirm({
    title: "แน่ใจหรือไม่?",
    body: "คุณแน่ใจว่าต้องการจะลบหรือไม่?",
    useTransparency: true,
    onOk: () => {
      $.ajax({
        type: "post",
        url: "query/deleteDeath.php",
        data: { id },
        success: function (response) {
          const data = JSON.parse(response);
          if (data.status == "true") {
            SoloAlert.alert({
              title: "Success!!",
              body: "ลบข้อมูลเรียบร้อยแล้ว?",
              icon: "success",
              useTransparency: true,
              onOk: () => {
                $("#table").DataTable().destroy();
                $("#tbody").children().remove();
                showAllDeath();
              },
            });
          } else {
            SoloAlert.alert({
              title: "ไม่สามารถลบข้อมูลได้!!",
              body: data.message,
              icon: "error",
              useTransparency: true,
            });
          }
        },
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
    type: "GET",
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

const showAllDeath = () => {
  $.ajax({
    type: "get",
    url: "query/showAllDeath.php",
    success: function (response) {
      const { deathObj } = JSON.parse(response);
      if (deathObj != "null") {
        deathObj.forEach((element) => {
          let formatDate = new Date(element.dateDead.split(" ")[0])
          let thaiDate = formatDate.getDate()+"-"+(formatDate.getMonth()+1)+"-"+(formatDate.getFullYear()+543)
          $("#tbody").append(`
         <tr>
         <th scope="row">${element.no}</th>
         <td>${element.prename}${element.firstName} ${element.lastName}</td>
         <td>${element.address} ต.${element.subDistrict} อ.${element.district} จ.${element.province} ${element.zip_code}</td>
         <td>${element.cid}</td>
         <td>${element.age}</td>
         <td>${thaiDate}</td>
         <td>${element.dateDead.split(" ")[1]}</td>
         <td>${element.department}</td>
         <td>${element.doctorName}</td>
         <td>${element.causeOfDeath1}</td>
         <td>${element.causeOfDeath2}</td>
         <td>${element.causeOfDeath3}</td>
         <td>${element.causeOfDeath4}</td>
         <td>${element.additionalCause}</td>
         <td>${element.causeOfDeathThai}</td>
         <td>${element.informerName}</td>
         <td>
           <button type="button" class="btn btn-info btn-floating" onclick="showInfo(${
             element.id
           })"><i class="fas fa-info-circle"></i></button>
           <button type="button" class="btn btn-danger btn-floating" onclick="deleteDeath(${
             element.id
           })"><i class="fas fa-trash"></i></button>
         </td>
       </tr>
         `);
        });
      }
      $('td:nth-child(3),th:nth-child(3)').hide();
      $('td:nth-child(10),th:nth-child(10)').hide();
      $('td:nth-child(11),th:nth-child(11)').hide();
      $('td:nth-child(12),th:nth-child(12)').hide();
      $('td:nth-child(13),th:nth-child(13)').hide();
      $('td:nth-child(14),th:nth-child(14)').hide();
      table = $("#table").DataTable({
        scrollX: true,
        scrollY: "600px",
        dom: "Bfrtip",
        buttons: [
          {
            extend: "excelHtml5",
            className: "btn btn-success",
          },
        ],
      }
      );
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
      const { status } = JSON.parse(response);
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
            showAllDeath();
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

const editDeath = (data) => {
  $.ajax({
    type: "POST",
    enctype: "multipart/form-data",
    url: "query/editDeath.php",
    data: data,
    processData: false,
    contentType: false,
    cache: false,
    success: function (response) {
      const { status } = JSON.parse(response);
      if (status == "true") {
        $("#deathCer").modal("hide");
        $("#fromAddDeath")[0].reset();
        $(":input").removeClass("border border-danger");
        SoloAlert.alert({
          title: "Success!!",
          body: "แก้ไขการแจ้งตายเรียบร้อยแล้ว",
          icon: "success",
          useTransparency: true,
          onOk: () => {
            table.destroy();
            $("#tbody").children().remove();
            showAllDeath();
          },
        });
      } else {
        SoloAlert.alert({
          title: "ERROR!!",
          body: "ไม่สามารถแก้ข้อมูลได้",
          icon: "error",
          useTransparency: true,
        });
      }
    },
  });
};

