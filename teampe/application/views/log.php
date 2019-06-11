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
.material-icons.home{
  color: #ffffff;
  font-size: 20px;
  right: 20%;
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
.room_name {
  font-size: 20px;
  color: #315bb0;
  display: table;
  margin-left: auto;
  margin-right: auto;
}

.schedule_name{
  font-size: 20px;
  bottom: 25%;
  position: absolute;
  color: #ffffff;
  text-align: center;
  margin-left: 45%;
}

.record_wrap {
  border-radius: 50%;
  width: 45px;
  text-align: center;
  color: #0a85d7;
  background-color: #3f4a9c;
  margin-left: 45%;
  top: 550px;
  position: fixed;
}

.record_list_wrap{
  height: 450px;
  overflow: scroll;
}

.record_list{
  border-radius: 8px;
  background-image: radial-gradient(#64A3F6,#2E71C8); 
  color: #ffffff;
  padding: 10px;
  margin: 20px;
  font-family: NotoSansKr;
}

.record {
  color: #ffffff;
  font-size: 30px;
  background:transparent !important;
  border: transparent !important;
}

i{
  color: white;
}
i.ing{
  color : red;
}
button {
  border:0;
  outline: 0;
}

.material-icons.close{
  color: #ffffff;

}

.none {
   display: none;
}

b{
      color: orangered;
}



</style>
</head>

  <div class="profile">
  <div class="sidenav_overlay" onclick="closeNav()"></div>
  <div id="mySidenav" class="sidenav">
    <span class="room_name"><?=$현재방->name?></span>
    <hr>
    <a href="<?=base_url()?>index.php/MyFunction/index/1">시간표</a>
    <a href="<?=base_url()?>index.php/MyFunction/index/2">팀플룸</a>
    <a href="<?=base_url()?>index.php/MyFunction/index/3">장소추천</a>
    <a href="<?=base_url()?>index.php/MyFunction/index/4">ToDoList</a>
    <a href="<?=base_url()?>index.php/MyFunction/index/5">회의록</a>
    <hr>
    <p class="conv">대화참여자</p>
    <?php
    foreach ($participant as $key => $value) {

      echo '<div class="part_name">'.'<img class="pro_img1" src="'.$value->image.'">';
      echo $value->name.'</div>';
    
    }

    ?>
  </div>
  

    <i class="material-icons menu" onclick="openNav()">menu</i>
    <img class="pro_img" src="<?=$this->session->userdata(SESSION_USR_IMG)?>">
    <div class="schedule_name"><p>회의록</p></div>
    <a onclick="location.href='<?=base_url()?>index.php/Main'"><i class="material-icons home">home</i></a>
    <a onclick="location.href='<?=base_url()?>index.php/Room/index/'+<?=$this->session->userdata(SESSION_USR_ROOM)?>"><i class="material-icons bi">chat</i></a>
  </div>

  <div class="record_list_wrap">


    <?php
    // for($i=0;$i<count($log);$i++){
    //   $log[$i]=explode('^',$log[$i]);
    // }
    // for($i=0;$i<count($log);$i++){
    //   // echo '<div class="record_list"><i class="material-icons close" onclick="deleteTodolist();">close</i>';
      for($i=0;$i<count($log);$i++){
        $log[$i]=explode('^',$log[$i]);
    ?>
        
      <div class="record_list">
          <i class="material-icons close">close</i>
          <div class="record_list_date">
          <?=$log[$i][0]?><br>
          </div>
           <div class="record_list_data none">
          <?=$log[$i][1]?><br>
          </div>
      </div>

    <?php
      }
    
    ?>
  </div>


<div class="waiting" style="display: none;"><div class="loader"></div></div>
  <div class="record_wrap">
    <?php 
      $recording = $this->session->userdata('recording');
    if($recording){
    ?>
    <button class="record" onclick="recordAnalyze()"><i class="ing material-icons add">keyboard_voice</i></button>
    <?php }else{

    ?>
    <button class="record" onclick="recordAnalyze()"><i class="material-icons add">keyboard_voice</i></button>
    <?php }
    ?>

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

<script
   src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>

      function logLoading() {
          // $(".waiting").show();
      }
      if (typeof window.HybridApp != 'undefined')
      $(".record").click(function(){
        if($(this).find("i").hasClass("ing"))
          $(this).find("i").removeClass("ing");
        else
          $(this).find("i").addClass("ing");
      });

      

      function recordAnalyze($transcipt) {
        var UserAgent = navigator.userAgent; 
         if (typeof window.HybridApp != 'undefined')
        { 
            // 모바일로 접속한 경우
            var fd = new FormData();
            axios({
              method: 'post',
              url: '/teampe/index.php/MyFunction/recording',
            }).then(function(){
              window.HybridApp.meetingLog("<?=$this->session->userdata(SESSION_USR_ROOM)?>");
            });

        } 

        else 
        { 
            // PC로 접속한 경우
            alert('모바일에서만 가능한 기능입니다.');
        }
      }


      $(".record_list").click(function(){

    if($(this).find(".record_list_date").hasClass("none")){
      $(this).find(".record_list_date").removeClass("none");
      $(this).find(".record_list_data").addClass("none");
      return;
    }

    $(".record_list").each(function(v,c){
        $(c).find(".record_list_data").addClass("none");
        $(c).find(".record_list_date").removeClass("none");
    });
      $(this).find(".record_list_date").addClass("none");
      $(this).find(".record_list_data").removeClass("none");
  });



</script>
