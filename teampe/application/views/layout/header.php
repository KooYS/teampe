<?php
//koo
?>

<!DOCTYPE html>
<html  lang="ko">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>팀프</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/bootstrap-touchspin/bootstrap.touchspin.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/xenon-forms.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/bootstrap-wysihtml5/wysiwyg-color.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap.min.css">




<style>
@font-face {

    font-family: 'NotoSansKR';
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

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  top: 0;
  left: 0;
  background-color: #f3f5fa;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 30px;
  z-index: 10010;
}

.sidenav_overlay{
  width: 100%;
  height: 800px;
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

.material-icons.menu{
  font-size:25px;
  cursor:pointer;
  color:#ffffff;
  margin-left: 15px;
  vertical-align: middle;
  top: 50%;

}

.conv{
  font-size: 15px;
  color: #315bb0;
  margin-left: 10%;
  font-weight: bold;
  font-family: 'NotoSansKR-Medium';
}

.pro_img1{
  border-radius: 50%;
  margin-left: 10px;
  width: 45px;
  margin:10px;
    }
.part_name{
  color: #315bb0;
  font-size: 15px;
  font-family: 'NotoSansKR-Medium';
}
.room_name {
  font-size: 20px;
  color: #315bb0;
  display: table;
  margin-left: auto;
  margin-right: auto;
}

hr {
  width: 95%;
  height: 2px ;
  background: #315bb0 ;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
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



    

</head>

    <script type="text/javascript" src="<?= base_url() ?>assets/js/swiper/swiper.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/lazyload.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/ajaxupload.3.6.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/plugins/bootstrap-touchspin/bootstrap.touchspin.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/plugins/clipboardjs/clipboard.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/plugins/raty-fa/jquery.raty-fa.js"></script>
    <script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>    
    <script src="https://www.gstatic.com/firebasejs/5.9.2/firebase.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script>

        var config = {
            apiKey: "AIzaSyAlU5nukzynkkp1B2CCOftUF6XKR8v-0po",
            authDomain: "teampe-1e388.firebaseapp.com",
            databaseURL: "https://teampe-1e388.firebaseio.com",
            projectId: "teampe-1e388",
            storageBucket: "teampe-1e388.appspot.com",
            messagingSenderId: "1042659178211"
          };
          firebase.initializeApp(config);
          var database = firebase.database();


        var base_url = "<?=base_url()?>";
        var site_url = "<?=site_url()?>";
        var callback = function () {};

    </script>
<body>


