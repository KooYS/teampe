<?php

?>
<head>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery.datepick.css"> 
    <script type="text/javascript" src="js/jquery.plugin.js"></script> 
    <script type="text/javascript" src="js/jquery.datepick.js"></script>

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

.schedule_name{
  font-size: 20px;
  bottom: 25%;
  position: absolute;
  color: #ffffff;
  text-align: center;
  margin-left: 44%;
}

.add_btn_wrap {
  position: fixed;
  left: 45%;
  bottom: 0%;
  transform: translate(50%,-50%);
  text-align: center;
  color: #0a85d7;
}

.add_btn {
  font-size: 30px;
  color: #3f4a9c;
}
.todolist_wrap{
  height: 480px;
  overflow: scroll;


}
.todo_list{
  border-radius: 8px;
  background-image: radial-gradient(#64A3F6,#2E71C8); 
  color: #ffffff;
  padding: 10px;
  margin: 20px;
  font-family: NotoSansKr;
  font-weight: bold;
}

.d_day{
  display: inline;
  font-size: 20px;
}

.material-icons.close{
  color: #ffffff;

}
.material-icons.check{
  display: inline;
  color: #ffffff;

}


</style>
<!-- <script>
  $(function(){ 
    $('').on('click',function(){ 
              alert("데이터 요청!");  
      $.ajax({ 
           url: site_url + '/MyFunction/updateTodolist',
           type:'get', 
           success : function(t){ 
                 $(t).find("person").each(function(){ 
                           var content = $(this).find('todocontent').text(); 
                           var date = $(this).find('tododate').text();
                           var date1 = $(this).find('tododate1').text();
                           $('<p></p>').text(content+" "+date+" "+date1).appendTo('todolist_wrap'); 
                  }); 
            } , 
            error : function(){ 
                         alert('실패'); 
             } 
      }); 
    });

</script> -->
<script>
  function deleteTodolist(i){
    var fd = new FormData();
    var id = i;
    fd.append('id', id);
    axios({
      method: 'post',
      url: '/teampe/index.php/MyFunction/deleteTodolist',
      data: fd
    });      
    
  }
  function updatecomplete(i){
    var fd = new FormData();
    var id = i;
    fd.append('id', id);
    axios({
      method: 'post',
      url: '/teampe/index.php/MyFunction/completeTodolist',
      data: fd
    });   

  }
</script>
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
    <div class="schedule_name"><p>ToDoList</p></div>
    <a onclick="location.href='<?=base_url()?>index.php/Main'"><i class="material-icons home">home</i></a>
    <a onclick="location.href='<?=base_url()?>index.php/Room/index/'+<?=$this->session->userdata(SESSION_USR_ROOM)?>"><i class="material-icons bi">chat</i></a>
  </div>

  <div class="todolist_wrap">
    <?php
    for($i=0;$i<count($todolist);$i++){
      $todolist[$i]=explode('^',$todolist[$i]);
    }
    

    for($i=0;$i<count($todolist);$i++){
      echo '<div class="todo_list"><i class="material-icons close" onclick="deleteTodolist('.$uid[$i].'); location.reload();">close</i>';
      foreach ($participant as $key => $value) {
        if ($value->id== $id[$i]) {
          echo'<div> 담당자 : '.$value->name.'</div>';
        }

    }
      for($j=0;$j<count($todolist[$i])-1;$j++){
        echo $todolist[$i][$j].'<br>';
      }
      echo '마감일 : '.$todolist[$i][2].'<br>';
      $leftDate = (strtotime("Now")-strtotime($todolist[$i][2])) / 86400;
      if($leftDate < 0){
        if($complete[$i]==0){
        echo '<div class="d_day"><i class="material-icons check"onclick="updatecomplete('.$uid[$i].');location.reload();">check_box</i><span class="d_day_str" style="float: right;"> D'.+(floor($leftDate)).'</span></div></div>';
      }
        else{
          echo '<div class="d_day"><span class="d_day_str" style="float: right;">완료</span><br></div></div>';


        }
      }
      else{
        if($complete[$i]==0){
        echo '<div class="d_day"><i class="material-icons check"onclick="updatecomplete('.$uid[$i].');location.reload();">check_box</i><span class="d_day_str" style="float: right;"> D+'.+(floor($leftDate)).'</span></div></div>';
      }
        else{
          echo '<div class="d_day"><span class="d_day_str" style="float: right;"> 완료</span><br></div></div>';


        }
        
      }
        
    }
    
    ?>    
  </div>

  <div class="add_btn_wrap">
    <a class="add_btn" onclick="location.href='<?=base_url()?>index.php/MyFunction/index/200'"><i class="material-icons add">add_circle</i></a>
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

