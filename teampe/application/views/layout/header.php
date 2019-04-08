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



    

</head>

    <script type="text/javascript" src="<?= base_url() ?>assets/js/swiper/swiper.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/lazyload.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/ajaxupload.3.6.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/plugins/bootstrap-touchspin/bootstrap.touchspin.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/plugins/clipboardjs/clipboard.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/plugins/raty-fa/jquery.raty-fa.js"></script>
    <script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>    
    <script type="text/javascript" src="https://unpkg.com/@cometchat-pro/chat@1.3.0/CometChat.js"></script>
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


