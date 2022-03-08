<!DOCTYPE html>
<html lang="en">
  <head>
    <title>เข้าสู่ระบบ</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css"
    />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/css/util.css" />
    <link rel="stylesheet" type="text/css" href="assets/login/css/main.css" />
    <!--===============================================================================================-->
    <script src="./assets/js/soloAlert.js" type="text/javascript"></script>
  </head>
  <body style="background-color: #666666">
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100">
          <form class="login100-form validate-form" id="loginForm">
            <span class="login100-form-title p-b-43"> Login to continue </span>

            <div
              class="wrap-input100 validate-input"
              data-validate="Username is required"
            >
              <input class="input100" type="text" name="username" />
              <span class="focus-input100"></span>
              <span class="label-input100">Username</span>
            </div>

            <div
              class="wrap-input100 validate-input"
              data-validate="Password is required"
            >
              <input class="input100" type="password" name="password" />
              <span class="focus-input100"></span>
              <span class="label-input100">Password</span>
            </div>

            <div class="flex-sb-m w-full p-t-3 p-b-32">
              <div class="contact100-form-checkbox">
                <input
                  class="input-checkbox100"
                  id="remember"
                  type="checkbox"
                  name="remember"
                />
                <label class="label-checkbox100" for="remember">
                  Remember me
                </label>
              </div>
            </div>

            <div class="container-login100-form-btn">
              <button class="login100-form-btn">Login</button>
            </div>
          </form>

          <div
            class="login100-more"
            style="background-image: url('assets/login/images/bg-01.jpg')"
          >
            <h1
              style="
                font-family: Kanit-Regular;
                margin: 0;
                position: absolute;
                top: 50%;
                left: 50%;
                margin-right: -50%;
                transform: translate(-50%, -50%);
                color: rgb(58, 58, 58);
              "
            >
              ระบบบันทึกการแจ้งเกิด แจ้งตาย
            </h1>
            <h4
              style="
                font-family: Kanit-Regular;
                margin: 0;
                position: absolute;
                top: 55%;
                left: 50%;
                margin-right: -50%;
                transform: translate(-50%, -50%);
                color: #5a5a5a;
              "
            >
              KingNarai Hospital
            </h4>
          </div>
        </div>
      </div>
    </div>

    <!--===============================================================================================-->
    <script src="assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/login/js/main.js"></script>
  </body>
</html>
