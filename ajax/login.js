$("#submit").click(function () {
  let form = $("#loginForm")[0];
  let data = new FormData(form);

  $.ajax({
    type: "POST",
    enctype: "multipart/form-data",
    url: "query/login.php",
    data: data,
    processData: false,
    contentType: false,
    cache: false,
    success: function (data) {
      console.log(data);
    },
  });
});
