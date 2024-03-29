<?php
session_start();
if ($_SESSION) {
  header('location:/build/views/');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>تسجيل الدخول لقاعده بياتات الدعم الفنى</title>
  <link rel="icon" href="../../../build/assets/images/build.svg" type="image/x-icon" />
  <style>
    body,
    html {
      margin: 0;
      padding: 0;
      height: 100%;
      width: 100%;
      font-family: system-ui;
      min-width: 700px;
      overflow: hidden;
    }

    .splitdiv {
      height: 100%;

    }

    #leftdiv {
      float: right;
      width: 40%;
      background-color: #FAFAFA;
    }

    #leftdivcard {
      margin: 0 auto;
      width: 50%;
      /* background-color:white; */
      margin-top: 50vh;
      transform: translateY(-50%);
      /* box-shadow: 10px 10px 1px 0px rgba(78, 205, 196, .2); */
      border-radius: 10px;
      display: flex;
      flex-direction: column;
    }

    .leftbutton {
      background-color: #2c3e50;
      border-radius: 5px;
      color: #FAFAFA;
      cursor: pointer;
    }

    #rightdiv {
      float: left;
      width: 60%;
      background-color: #2c3e50;
    }

    #rightdivcard {
      margin: 0 auto;
      width: 50%;
      margin-top: 50vh;
      transform: translateY(-50%);
    }

    #rightbutton {
      background-color: #FFFFFF;
      border-radius: 5px;
      color: #2c3e50;
    }

    h1 {
      font-family: system-ui;
      color: #2c3e50
    }

    input {}

    input,
    select {
      font-family: system-ui;
      font-size: 16px;
      text-align: right;
      font-size: 1.5rem;
      padding: 10px;
      margin-left: 2%;
      margin-right: 2%;
      margin-top: 10px;
      margin-bottom: 10px;
      display: inline-block;
      background-color: #FAFAFA;
      border: none;
      outline: none !important;
      border: 1px solid #2c3e50;
      box-shadow: 0 0 5px #719ECE;
      direction: rtl
    }

    button {
      outline: none !important;
      font-family: system-ui;
      margin-bottom: 15px;
      border: none;
      font-size: 20px;
      padding: 8px;
      padding-left: 20px;
      padding-right: 20px;
    }
  </style>
</head>

<body>
  <div style="height:100%;">
    <div class="splitdiv" id="leftdiv">
      <form method="post">
        <div id="leftdivcard">
          <input type="text" name="user_id" placeholder="رقم الملف" required>
          <input type="password" name="user_pass" placeholder="كلمه المرور" required>
          <div style="text-align:center">
            <button type="submit" name="login_btn" class="leftbutton">تسجيل الدخول</button>
          </div>
        </div>
      </form>
    </div>
    <div class="splitdiv" id="rightdiv">
      <div id="rightdivcard">
        <h1 style="padding-top:20px;text-align:center;color:white">اداره اجهزه مبانى البريد المصرى </h1>
        <h4 id="result"></h4>
        <p style="color:white;text-align:center">احصائيات | اضافه | تعديل</p>
        <div style="text-align:center">
          <img src="../../build/assets/images/build.svg" style="height:50vh" class="logo">
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/js/plugins/jquery.min.js"></script>
  <script>
    $("form").submit(function (event) {
      event.preventDefault();
      // console.log($('form').serialize());
      $.ajax({
        type: "POST",
        url: "../api/log/login.php",
        data: $('form').serialize(),
        success: function (result) {
          if (result == 'done') {
            window.location.replace('/build/views');
          } else {
            alert(result)
          }
        }
      })
    });
  </script>
</body>

</html>