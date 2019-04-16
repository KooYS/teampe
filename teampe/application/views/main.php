<?php

// var_dump($room)
?>
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    
<style>
    @font-face {
       font-family: 'Noto Sans KR';
       font-style: normal;
       font-weight: 500;
       src: url(/fonts/NotoSansKr/NotoSansKR-Medium.woff2) format('woff2'),
            url(/fonts/NotoSansKr/NotoSansKR-Medium.woff) format('woff'),
            url(/fonts/NotoSansKr/NotoSansKR-Medium.otf) format('opentype');

        }
    .profile{
        background-image: linear-gradient(to right,#147dd9,#3f4a9c); 
        position: relative;
        height: 90px;
    }
    .pro_img {
        border-radius: 50%;
        margin-left: 10px;
        width: 60px;
        border: solid;
        border-color: #ffffff;
        margin:15px;
    }
    .profile .nickname {
        color: #ffffff;
        top: 50%;
        margin-left: -15px;
        transform: translate(50%,-50%);
        position: absolute;
        font-family: Noto Sans KR;
    }


    .make_btn_wrap {
        text-align: center;
        color: #0a85d7;
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
        padding: 20px;
    }

    .room_wrap{
        position: relative;
        width: 100%;
        height: 100px;
        margin-bottom: 13px;
        box-shadow: 1px 1px 1px gray;
        border-radius: 5px;
        border: 1px solid #D0D0D0;
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
    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #f3f5fa;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
        z-index: 10001;
    }

    .sidenav_overlay{
        width: 100%;
        height: 100%;
        background-color:rgba(0, 0, 0, 0.3);
        position: absolute;
        left: 0;
        top: 0;
        display: none;
        z-index: 10000;
        transition: background .25s ease-in-out;
        -moz-transition: background .25s ease-in-out;
        -webkit-transition: background .25s ease-in-out;
    }
    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 20px;
        color: #315bb0;
        display: block;
        transition: 0.3s;
        background-color: #f3f5fa;
    }

    .sidenav a:hover {
        color: #ffffff;
        background-color: #315bb0;
    }

    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }
    .menu{
        font-size:25px;
        cursor:pointer;
        color:#ffffff;
        margin-left: 15px;
        vertical-align: center;
        top: 50%;

    }
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}      

</style>
</head>


<div class="profile">
    <div class="sidenav_overlay" onclick="closeNav()"></div>
    <div id="mySidenav" class="sidenav">
      <a href="#">시간표</a>
      <a href="#">빈강의실</a>
      <a href="#">자료공유</a>
      <a href="#">ToDoList</a>
    </div>
    <span class="menu" onclick="openNav()">&#9776;</span>

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

    function openNav() {
        $("#mySidenav").width( '200px' );
        $(".sidenav_overlay").fadeIn();
    }

    function closeNav() {
        $("#mySidenav").width( '0' );
        $(".sidenav_overlay").fadeOut();
    }

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
