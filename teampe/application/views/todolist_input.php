<?php

$this->load->database();
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
.todo_maker{
  font-size: 15px;
  font-family: NotoSansKr-Regular;
  color: #0a85d7;
  position: absolute;
  top: 20%;
  right: 85%;
  transform: translate(40%,-40%);
}

.maker_input{
  font-size: 15px;
  font-family: NotoSansKr-Regular;
  color: #0a85d7;
  position: absolute;
  top: 25%;
  right: 50%;
  transform: translate(50%,-50%);
  border: none;
  border-bottom: 2px solid #3556ab;
  border-bottom-color: #3556ab;
  width: 80%;
}
.todo_p{
  font-size: 15px;
  font-family: NotoSansKr-Regular;
  color: #0a85d7;
  position: absolute;
  top: 25%;
  right: 87%;
  transform: translate(40%,-40%);
}

.content_input{
  font-size: 15px;
  font-family: NotoSansKr-Regular;
  color: #0a85d7;
  position: absolute;
  top: 30%;
  right: 50%;
  transform: translate(50%,-50%);
  border: none;
  border-bottom: 2px solid #3556ab;
  border-bottom-color: #3556ab;
  width: 80%;
}

.todo_p1{
  font-size: 15px;
  font-family: NotoSansKr-Regular;
  color: #0a85d7;
  position: absolute;
  top: 40%;
  right: 87%;
  transform: translate(40%,-40%);
}

.description_input{
  font-size: 15px;
  font-family: NotoSansKr-Regular;
  color: #0a85d7;
  position: absolute;
  top: 45%;
  right: 50%;
  transform: translate(50%,-50%);
  border: none;
  border-bottom: 2px solid #3556ab;
  border-bottom-color: #3556ab;
  width: 80%;
}


input::placeholder{
  color: #0a85d7;
  font-size: 12px;
  font-family: NotoSansKr-Regular;
}

.date_p{
  font-size: 15px;
  font-family: NotoSansKr-Regular;
  color: #0a85d7;
  position: absolute;
  top: 55%;
  right: 84%;
  transform: translate(40%,-40%);
}

.date_input1{
  font-size: 15px;
  font-family: NotoSansKr-Regular;
  color: #0a85d7;
  position: absolute;
  top: 54.5%;
  right: 55%;
  transform: translate(50%,-50%);
  border: none;
}

.submit_btn_wrap{
  padding-top: 1%;
  height: 5%;
  width: 100%;
  position: absolute;
  bottom: 0;
  background-color: #3556ab;
  text-align: center;
  vertical-align: center;
}
.submit_btn{
  color: #ffffff;
}


</style>
<!-- <script>

  function updateTodolist(todolist){
    $("input[name=submit]").on('click',function(){
      alert("데이터 전송!");
    }
      $.ajax({
        url: site_url + '/MyFunction/updateTodolist',
        type: 'POST',
        data: {
          content: $("input[name=todocontent]").val(),
          date: $("input[name=tododate]").val(),
          date1: $("input[name=tododate1]").val(),
        },
        success: function () {
          var jsonData = JSON.parse(result);
          console.log(jsonData)
        }
      })
    }

</script> -->
<script>
  
  function updateTodolist(){
    
    var fd = new FormData();
    var content = $('#content').val();
    var description = $('#description').val();
    var date1 = $('#date1').val();
    fd.append('content', content);
    fd.append('description', description);
    fd.append('date1', date1);
    axios({
      method: 'post',
      url: '/teampe/index.php/MyFunction/updateTodolist',
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

  <div class="content_wrap">
    <div class="todo_p">
      <p>할일</p>
    </div>
    <div>
      <input class="content_input" type="text" id="content" name="content" placeholder="할일을 입력하세요.">
    </div>
    <div class="todo_p1">
      <p>내용</p>
    </div>
    <div>
      <input class="description_input" type="text" id="description" name="description" placeholder="내용을 입력하세요.">
    </div>
    <div class="date_p">
      <p>마감일:</p>
    </div>
    <div class="date_input1">
      <input type="date" id="date1" name="date1">
    </div>
    <div class="submit_btn_wrap">
      <!--<input type="submit" name="submit" style="color: white" onclick="location.href='<?=base_url()?>index.php/MyFunction/index/4';updateTodolist(todolist);"> -->
      <a class="submit_btn" name="submit" onclick="location.href='<?=base_url()?>index.php/MyFunction/index/4';updateTodolist();"><p>추가하기</p></a>
    </div>
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

