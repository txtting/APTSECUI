<?php if (!defined('THINK_PATH')) exit();?><html>
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title>登录</title>
        <link rel="stylesheet" href="/APTSecUI/Public/css/assets/css/bootstrap.min.css"  />
        <script src="/APTSecUI/Public/js/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="/APTSecUI/Public/js/layer/layer.js"></script>
        <script type="text/javascript" src="/APTSecUI/Public/js/laytpl/laytpl.js"></script>
      <style type="text/css">
          body{
              padding-right:0px!important;
          }
          input:-webkit-autofill {
              background-color: #fff!important;
              background-image: none!important;
              color: #000!important;
          }
          html,body {
              height: 100%;
              background:#070913;
              font-family:'Microsoft Yahei';
          }
          .box {
              background:#070913 url(/APTSecUI/Public/css/assets/images/loginBg.jpg) top center no-repeat;
              margin: 0 auto;
              position: relative;
              padding-top:100px;
              width: 100%;
              height: 100%;
              text-align:center;
          }
          .login-box {
              width:390px;
              margin:0 auto;
              height: 506px;
              background:url(/APTSecUI/Public/css/assets/images/loginBanner.png) center no-repeat;
              position:relative;
              /*设置负值，为要定位子盒子的一半高度*/

          }

          .form {
              width: 100%;
              width:350px;
              height: 70px;
              margin-top:100px;
              padding-top: 25px;
              border:0px solid red;
          }
          .login-content {
              height: 300px;
              width: 100%;
              width:390px;
              float: left;
              margin:0px; padding:0px;
          }

          .btn-info {
              background-color: #2fb298;
              border-color: #2fb298;
              color: #fff;
          }

          .btn-info:hover, .btn-info:focus, .btn-info:active, .btn-info.active, .open .dropdown-toggle.btn-info {
              background-color: #1d967e;
              border-color: #1d967e;
              color: #fff;
          }

          .input-group {
              margin: 0px 0px 10px 0px !important;
              float:left;
              width:200px;
          }
          .form-control,
          .input-group {
              height: 44px;
              float:left;
          }

          .form-group {
              margin-bottom: 0px !important;
              float:left;
              margin-left:40px;
              width:390px;
          }

          .login-title {
              padding: 20px 10px;
          }
          .login-title h1 {
              margin-top: 10px !important;
          }
          .login-title small {
              color: #fff;
          }

          .link p {
              line-height: 20px;
              margin-top: 30px;
          }
          .btn-sm {
              padding: 8px 24px !important;
              font-size: 16px !important;
          }
          .verifyimg{
              height: 44px;
              width: 100px;
          }
          .wrapper {
              opacity: 1;
              width: 100%;
              height: 100%;
          }
          .bg-bubbles {
              position: absolute;
              top: 0;
              left: 0;
              width: 100%;
              height: 100%;
              z-index: 1;
          }
          .bg-bubbles li {
              position: absolute;
              list-style: none;
              display: block;
              width: 40px;
              height: 40px;
              background-color: rgba(255, 255, 255, 0.15);
              bottom: -160px;
              -webkit-animation: square 25s infinite;
              animation: square 25s infinite;
              -webkit-transition-timing-function: linear;
              transition-timing-function: linear;
          }
          .bg-bubbles li:nth-child(1) {
              left: 10%;
          }
          .bg-bubbles li:nth-child(2) {
              left: 20%;
              width: 80px;
              height: 80px;
              -webkit-animation-delay: 2s;
              animation-delay: 2s;
              -webkit-animation-duration: 17s;
              animation-duration: 17s;
          }
          .bg-bubbles li:nth-child(3) {
              left: 25%;
              -webkit-animation-delay: 4s;
              animation-delay: 4s;
          }
          .bg-bubbles li:nth-child(4) {
              left: 40%;
              width: 60px;
              height: 60px;
              -webkit-animation-duration: 22s;
              animation-duration: 22s;
              background-color: rgba(255, 255, 255, 0.25);
          }
          .bg-bubbles li:nth-child(5) {
              left: 70%;
          }
          .bg-bubbles li:nth-child(6) {
              left: 80%;
              width: 120px;
              height: 120px;
              -webkit-animation-delay: 3s;
              animation-delay: 3s;
              background-color: rgba(255, 255, 255, 0.2);
          }
          .bg-bubbles li:nth-child(7) {
              left: 32%;
              width: 160px;
              height: 160px;
              -webkit-animation-delay: 7s;
              animation-delay: 7s;
          }
          .bg-bubbles li:nth-child(8) {
              left: 55%;
              width: 20px;
              height: 20px;
              -webkit-animation-delay: 15s;
              animation-delay: 15s;
              -webkit-animation-duration: 40s;
              animation-duration: 40s;
          }
          .bg-bubbles li:nth-child(9) {
              left: 25%;
              width: 10px;
              height: 10px;
              -webkit-animation-delay: 2s;
              animation-delay: 2s;
              -webkit-animation-duration: 40s;
              animation-duration: 40s;
              background-color: rgba(255, 255, 255, 0.3);
          }
          .bg-bubbles li:nth-child(10) {
              left: 90%;
              width: 160px;
              height: 160px;
              -webkit-animation-delay: 11s;
              animation-delay: 11s;
          }
          @-webkit-keyframes square {
              0% {
                  -webkit-transform: translateY(0);
                  transform: translateY(0);
              }
              100% {
                  -webkit-transform: translateY(-700px) rotate(600deg);
                  transform: translateY(-700px) rotate(600deg);
              }
          }
          @keyframes square {
              0% {
                  -webkit-transform: translateY(0);
                  transform: translateY(0);
              }
              100% {
                  -webkit-transform: translateY(-700px) rotate(600deg);
                  transform: translateY(-700px) rotate(600deg);
              }
          }
      </style>
  </head>
  <body>
  <div class="wrapper">
    <div class="box">

    <div class="login-box" style="z-index: 99999;">
        <div style="position:absolute; width:800px; left:-200px; top:-50px; color:#fff;"><span style="width:400px; margin-left:210px; text-align:left;border:0px solid red;color: #f5f5f5;display: inline-block;float: left;font-size:26px;font-weight: bold;line-height: 56px;text-indent: 100px; background:url(/APTSecUI/Public/css/assets/images/aptLogo.png) left center no-repeat;">APT安全威胁感知系统</span><!--<b style=" display:inline-block; float:left; width:400px; height:60px;background:url(/APTSecUI/Public/css/assets/images/loginText.png) left center no-repeat;">&nbsp;</b>--></div>
      <div class="login-content " style="border:0px solid red;">
            
      <div class="form" style="border:0px solid green;">
            <p id='logmsg' style="display:inline-block; text-align:left; width:270px; line-height:40px;margin-top:16px;">请输入登录信息</p>
      <form >
        <div class="form-group" style="border:0px solid red;">
            <div class="input-group" style="width:320px; position:relative; padding-right:10px; float:left; ">
              <span class="input-group-addon" style="position:absolute; left:-1px; width:40px; height:44px;border-right:1px solid #ddd;z-index:9999999; "><span class="glyphicon glyphicon-user" style="margin-top:5px; "></span></span>
              <input type="text" id="username" name="username" class="form-control" placeholder="用户名" style="text-indent:30px;*text-indent:0px; z-index:90;">
            </div>

            <div class="input-group" style="width:320px;  padding-right:10px; position:relative; z-index:99999; float:left; border:0px solid red;">
              <span class="input-group-addon" style="position:absolute; left:-1px; width:40px; height:44px;border-right:1px solid #ddd; "><span class="glyphicon glyphicon-lock" style="margin-top:3px;"></span></span>
              <input type="password" id="password" name="password" class="form-control" placeholder="密码" style="text-indent:30px;*text-indent:0px;">
            </div>
          <div class="input-group" style="width:320px;  padding-right:10px; position:relative; z-index:99999; float:left; border:0px solid red;">
            <input id="code" name="code" class="form-control" placeholder="输入验证码" autocomplete="off"  type="text" style="width:200px">
            <span><img src="/APTSecUI/index.php/Home/Login/verify" class="verifyimg" style="vertical-align:middle; cursor: pointer;" alt="验证码"  align="bottom"  title="看不清可单击图片刷新" onclick="this.src='/APTSecUI/index.php/Home/Login/verify/d/'+Math.random();" ></span>
          </div>
                        
            <div class="form-actions" style="float:left; ">

            <button  class="btn btn-sm btn-info" id="submit" style="width:310px;_width:310px;*width:310px;border:0px; background:#478fca;"> 登录</button>
                </div>
        </div>
                
                <!--<p style="display:inline-block; width:250px; text-indent:35px; text-align:center;color:#999; margin-top:20px;">©</p>-->
        
      </form>
      </div>
    </div>
  </div>
</div>
      <ul class="bg-bubbles">
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
      </ul>
  </div>

  <script type="text/javascript">
      window.jQuery || document.write("<script src='/APTSecUI/Public/css/assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
  </script>

       
  <script type="text/javascript">
    $('#submit').click(function(e){
        e.stopPropagation();
        e.preventDefault();
        if($("input[name='username']").val()==''|| $("input[name='password']").val()==''){
            layer.msg('用户名或密码不能为空');
            return false;
        }
        var username = $('#username').val();
        var password = $('#password').val();
        var code = $('#code').val();
        var data = {'username':username,'password':password,'code':code};
        $.ajax({
            url:'/APTSecUI/index.php/Home/Login/indexOK',
            type:'POST',
            dataType:'json',
            data:data,
            success:function(data){
                if(data.status=='error'){
                   layer.msg(data.msg);
                   $('.verifyimg').attr('src','/APTSecUI/index.php/Home/Login/verify/d/'+ Math.random());
                }else{
                   layer.msg(data.msg);
                   window.location.href='<?php echo U('Vir/index');?>';
                }
            }
        })
    })
    </script>
  </body>
</html>