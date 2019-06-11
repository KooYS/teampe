<?php
?>
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    
<style>

    .profile{
        background-image: linear-gradient(to right,#147dd9,#3f4a9c); 
        position: fixed;
        width: 100%;
        height: 90px;
        z-index: 1002;
    }
    .pro_img {
        border-radius: 50%;
        margin: 15px;
        width: 60px;
        border: solid;
        border-color: #ffffff;

    }
    .profile .nickname {
        color: #ffffff;
        top: 50%;
        margin-left: -15px;
        transform: translate(50%,-50%);
        position: absolute;
        font-family: NotoSansKR;
        font-size: 15px;
    }

    .make_btn_wrap {
        position: fixed;
        left: 40%;
        bottom: 0%;
        transform: translate(50%,-50%);
        text-align: center;
    }

    .make_btn {
        color: #3f4a9c;
        font-size: 30px;
    }

    .material-icons.add{
        font-size: 36px;
        color: #3f4a9c;
    }

    .material-icons.ni{
        color: #ffffff;
        font-size: 20px;
        right: 23%;
        bottom: 40%;
        position: absolute;
    }
    .material-icons.pi{
        color: #ffffff;
        font-size: 20px;
        right: 15%;
        bottom: 40%;
        position: absolute;
    }
    .material-icons.si{
        color: #ffffff;
        font-size: 20px;
        right: 7%;
        bottom: 40%;
        position: absolute;
    }

    .room_list_wrap{
        padding-top: 110px;
        padding-left: 20px;
        padding-right: 20px;
        padding-bottom: 20px;
        overflow: scroll;
        z-index: 1001;
        height: 550px;
        background-color: #ffffff;

        
    }

    .room_wrap{
        position: relative;
        width: 100%;
        height: 100px;
        margin-bottom: 20px;
        box-shadow: 1px 1px 1px gray;
        border-radius: 5px;
        border: 1px solid #D0D0D0;
        background-color: #f3f5fa;

    }

    .room_wrap .room_name{
        position: absolute;
        top: 50%; right: 50%;
        transform: translate(50%,-50%);
        color: #2865bc;
        font-size: 15px;
        text-decoration: underline;
        font-family: NotoSansKr;
        font-weight: bold;
    }
    .room_img{
        
        border-radius: 50%;
        margin: 15px;
        width: 60px;
        border: solid;

    }
    

    .menuP{
        font-size: 20px;
        color: #315bb0;
        text-align: center;
    }

    hr{
        width: 95%;
        height: 2px;
        background: #315bb0;
 
    }

    .room_wrap .pro_img2{
        position: relative;
        border-radius: 50%;
        width: 20px;
        margin : 2px;
        

    }
    .room_wrap .pro_img2_wrap{
        position: relative;
        display: inline;
        margin-left: 35%;
    }

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}      

</style>
</head>


<div class="profile">
    
    <img class="pro_img" src="<?=$this->session->userdata(SESSION_USR_IMG)?>">
    <span class="nickname"><?=$this->session->userdata(SESSION_USR_NAME)?></span>
    <i class="material-icons ni">notifications_none</i>
    <i class="material-icons pi">person</i>
    <i class="material-icons si">search</i>
</div>


<div class="room_list_wrap">
    
    <?php
        foreach ($room as $key => $val) {
    ?>
    <div class="room_wrap" data-id="<?=$val->uid?>">
        <span class="room_name"><?=$val->name?></span>
        <a class="kakao-link-btn" data-id="<?=$val->uid?>">
        <img class="room_img" src="<?=$this->session->userdata(SESSION_USR_IMG)?>">
        <div class="pro_img2_wrap">
        <?php
        foreach ($participant as $key => $value) {
            if($val->uid == $value[0]){
                foreach ($value as $key => $img)
                    if($key > 0)
                        echo '<img class="pro_img2" src="'.$img->image.'">';
            }
            else
                continue;
        }
        ?>
        </div>
        
        </a>
    </div>

    <?php
        }
    ?>
</div>

<div class="make_btn_wrap">
    <a class="make_btn"><i class="material-icons add">add_circle</i></a>
</div>


<script>

    Kakao.init('3db0ef82cfa5221c3278986f53496948');
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
