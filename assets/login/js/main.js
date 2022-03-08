
(function ($) {
    "use strict";
    /*==================================================================
    [ Focus Contact2 ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })    
    })
  
    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(e){
      e.preventDefault();
        var check = true;
        for(let i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }
        return check;
    });
    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'text' || $(input).attr('name') == 'username') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }else{
                let form = $("#loginForm")[0];
                let data = new FormData(form);
                console.log(form)
              $.ajax({
                  type: "POST",
                  enctype: "multipart/form-data",
                  url: "query/login.php",
                  data: data,
                  processData: false,
                  contentType: false,
                success: function (response) {
                  const data  = JSON.parse(response).loginObj;
                  console.log(data)
                  if(data[0].status == "true"){
                    if(data[0].role ==1){
                      window.location.href="home.php" 
                    }else{
                      window.location.href="admin.php" 
                    }
                  }else{
                    SoloAlert.alert({
                      title:"Error!!",
                      body:"ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง",
                      icon: "error",
                      theme: "light",
                      useTransparency: true,
                    });
                  }
                }
              });
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();
        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    

})(jQuery);