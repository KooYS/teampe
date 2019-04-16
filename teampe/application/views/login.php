<?php

if($roomNum != "")
  $param = $roomNum;
else
  $param = "0";
$kakao_apiURL = "https://kauth.kakao.com/oauth/authorize?client_id="."3db0ef82cfa5221c3278986f53496948"."&redirect_uri=".urlencode(base_url()."index.php/Login/kakao_login")."&response_type=code&state=".$param;

?>


<style>
    .profile{
        background-color: #000000;
        position: relative;
    }
    .profile > img{
        border-radius: 50%;
        padding: 3px;
    }
    .profile .nickname{
        color: #ffffff;
        text-align: center;
        top: 50%;
        right: 50%;
        transform: translate(50%,-50%);
        position: absolute;
    }

    .waiting{
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 10001;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .loader {
      margin-left: -15px;
      margin-top: -15px;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      transform: -webkit-translate(-50%, -50%);
      transform: -moz-translate(-50%, -50%);
      transform: -ms-translate(-50%, -50%);

      border: 6px solid #f3f3f3;
      border-radius: 50%;
      border-top: 6px solid black;
      width: 30px;
      height: 30px;
      -webkit-animation: spin 2s linear infinite; /* Safari */
      animation: spin 2s linear infinite;
    }

    .login_btn {
      left: 50%;
      bottom: 25%;
      transform: translate(-50%,50%);
      position: absolute;
      z-index: 2;

    }
    .splash{
        background: url("<?=base_url()?>assets/images/main/login.png") no-repeat center;
        background-size: cover;
        position: absolute;
        top: 50%; right: 50%;
        transform: translate(50%,-50%);
        height: 100%;
        width: 100%;
        z-index: 1;
    }

    /* Safari */
    @-webkit-keyframes spin {
      0% { -webkit-transform: rotate(0deg); }
      100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

</style>

<!-- Views-->

<div class="views">
    <div class="view view-main splash">
        <div class="pages">
            <div class="page splash" data-page="splash">
            </div>
        </div>
    </div>
</div>



<div class="waiting" style="display: none;"><div class="loader"></div></div>
<a class="login_btn" id="kakao-login-btn"></a>
<a href="http://developers.kakao.com/logout"></a>
<a class="login_btn" href="<?=$kakao_apiURL;?>"><img src="https://kauth.kakao.com/public/widget/login/kr/kr_02_medium.png"></a>


<script>

    $(document).ready(function () {
       
    })

    

</script>
