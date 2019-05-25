<?php

?>

<head>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<style>

.material-icons.bi{
    color: #ffffff;
    font-size: 20px;
    right: 10%;
    bottom: 40%;
    position: absolute;
}

.pro_img{
    border-radius: 50%;
    margin-left: 10px;
    width: 60px;
    border: solid;
    border-color: #ffffff;
    margin:15px;
}

.schedule_name{
  font-size: 20px;
  bottom: 25%;
  position: absolute;
  color: #ffffff;
  text-align: center;
  margin-left: 44%;
}

.record_wrap {
  border-radius: 50%;
  width: 45px;
  text-align: center;
  color: #0a85d7;
  background-color: #3f4a9c;
  margin-left: 45%;
  margin-top: 450px;
  position: fixed;
}

.record {
  color: #ffffff;
  font-size: 30px;
}


</style>
</head>


  <div class="profile">
  <div class="sidenav_overlay" onclick="closeNav()"></div>
  <div id="mySidenav" class="sidenav">
    <hr>
    <a href="<?=base_url()?>index.php/MyFunction/index/1">시간표</a>
    <a href="<?=base_url()?>index.php/MyFunction/index/2">빈강의실</a>
    <a href="<?=base_url()?>index.php/MyFunction/index/3">장소추천</a>
    <a href="<?=base_url()?>index.php/MyFunction/index/4">ToDoList</a>
    <a href="<?=base_url()?>index.php/MyFunction/index/5">회의록</a>
    <a href="<?=base_url()?>index.php/MyFunction/index/6">자료공유</a>
    <hr>
    <p class="conv">대화참여자</p>
    <img class="pro_img1" src="<?=$this->session->userdata(SESSION_USR_IMG)?>">
    <span class="part_name"><?=$this->session->userdata(SESSION_USR_NAME)?></span>
  </div>
  

    <i class="material-icons menu" onclick="openNav()">menu</i>
    <img class="pro_img" src="<?=$this->session->userdata(SESSION_USR_IMG)?>">
    <div class="schedule_name"><p>장소추천</p></div>
    <a href="javascript:history.back()"><i class="material-icons bi">keyboard_backspace</i></a>
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


</script>

