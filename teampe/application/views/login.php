<?php

if($roomNum != "")
  $param = $roomNum;
else
  $param = "0";
$kakao_apiURL = "https://kauth.kakao.com/oauth/authorize?client_id="."c47884e2681e2a2a01b8e140dbc21ffb"."&redirect_uri=".urlencode(base_url()."index.php/Login/kakao_login")."&response_type=code&state=".$param;

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
