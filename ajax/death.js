$(document).ready(function () {
  $("#table").DataTable({
    scrollX: true,
    scrollY: "600px",
  });
  $("#deadMenu a").addClass("active ");
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

$("#submit").click(function (e) {
  e.preventDefault();
  
  let form = e.target.form;
  let data = new FormData(form);
  console.log(form.no.value);
  
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
      console.log(response);
    },
  });
};
