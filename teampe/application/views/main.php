<?php

// var_dump($room)
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


    .make_btn_wrap {
        text-align: center;
    }

    .room_list_wrap{
        padding: 20px;
    }
    .room_wrap{
        position: relative;
        width: 100%;
        height: 150px;
        border-radius: 15px;
        border: 1px solid #D0D0D0;
    }

    .room_wrap .room_name{
        position: absolute;
        top: 50%; right: 50%;
        transform: translate(50%,-50%);
    }   

</style>


<div class="profile">
    <img src="<?=$this->session->userdata(SESSION_USR_IMG)?>">
    <span class="nickname"><?=$this->session->userdata(SESSION_USR_NAME)?></span>
</div>

<div class="make_btn_wrap">
    <a class="make_btn">방만들기</a>
</div>



<div class="room_list_wrap">
    
    <?php
        foreach ($room as $key => $val) {
    ?>
    <div class="room_wrap" data-id="<?=$val->uid?>">
        <span class="room_name"><?=$val->name?></span>
        <a class="kakao-link-btn" data-id="<?=$val->uid?>">
        <img src="//developers.kakao.com/assets/img/about/logos/kakaolink/kakaolink_btn_medium.png"/>
        </a>
    </div>

    <?php
        }
    ?>
</div>




<script>
    Kakao.init('60b4798e25980dfd4fc4a9ce562f2f27');
    function kakao_share(id){
        // alert(site_url + '/Room/index/' + id);
        Kakao.Link.sendDefault({
        objectType: 'feed',
        content: {
          title: '공유하기',
          description: '',
          imageUrl: 'http://mud-kage.kakao.co.kr/dn/Q2iNx/btqgeRgV54P/VLdBs9cvyn8BJXB3o7N8UK/kakaolink40_original.png',
          link: {
           mobileWebUrl: site_url + '/Room/index/' + id,
            webUrl: site_url + '/Room/index/' + id
          }
        },
        buttons: [
        {
          title: '참가하기',
          link: {
            mobileWebUrl: site_url + '/Room/index/' + id,
            webUrl: site_url + '/Room/index/' + id
          }
        },
        
      ]
      });
    }

    $(document).ready(function () {
        $(".room_wrap").click(function(event){
             window.location.href = site_url + '/Room/index/' +  ($(this).data('id'));
        });

        $(".kakao-link-btn").click(function(event){
            event.stopPropagation();
            kakao_share($(this).data('id'));
        });



    });


</script>
