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
  z-index: 10001;
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
}

.pro_img1{
    border-radius: 50%;
    margin-left: 10px;
    width: 45px;
    margin:15px;
    }

.part_name{
  color: #315bb0;
  font-size: 15px;
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



