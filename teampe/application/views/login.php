<?php
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


<div class="waiting" style="display: none;"><div class="loader"></div></div>
<a id="kakao-login-btn"></a>
<a href="http://developers.kakao.com/logout"></a>


<!-- <div class="profile">
    <img src="">
    <span class="nickname"></span>
</div> -->


<?php 
  if($roomNum == ""){
?>
<form id="form_kakao_login" style="display: none" method="post" action="<?=site_url('Login/kakao_login/0')?>">
<?php 
  }else{
?>
<form id="form_kakao_login" style="display: none" method="post" action="<?=site_url('Login/kakao_login')?>/<?=$roomNum?>">
<?php 
  }
?>
    <input type="hidden" id="login_id" name="id">
    <input type="hidden" id="login_name" name="name">
    <input type="hidden" id="login_img" name="img">
</form>

<script>
    Kakao.init('60b4798e25980dfd4fc4a9ce562f2f27');
    // 카카오 로그인 버튼을 생성합니다.
    Kakao.Auth.createLoginButton({
      container: '#kakao-login-btn',
      success: function(authObj) {
        $(".waiting").fadeIn();
        Kakao.API.request({
          url: '/v2/user/me',
          success: function(res) {
            $("#login_id").val(res["id"]);
            Kakao.API.request({
              url: '/v1/api/talk/profile',
              success: function(res) {
                // $(".profile > img").attr("src",res["thumbnailURL"]);
                // $(".profile .nickname").html(res["nickName"]);
                if(res["thumbnailURL"] == "")
                    res["thumbnailURL"] = "<?=base_url()?>assets/images/login/empty.jpg";
                $("#login_name").val(res["nickName"]);
                $("#login_img").val(res["thumbnailURL"]);
                $("#form_kakao_login").submit();

              },
              fail: function(error) {
                alert(JSON.stringify(error));
              }
            });
          },
          fail: function(error) {
            alert(JSON.stringify(error));
          }
        });

        
      },
      fail: function(err) {
         alert(JSON.stringify(err));
      }
    });



    $(document).ready(function () {
       
    })

    

</script>
