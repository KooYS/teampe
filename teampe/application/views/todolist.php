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
  text-align: right;
  font-size: 20px;

}

.material-icons.close{
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
  function deleteTodolist(){
    axios({
      url: '/test2/teampe/teampe/index.php/MyFunction/deleteTodolist',
      type: 'get',
      success: function(deleteTodolist){
        $this->db->query("DELETE FROM todolist;");
      }
    });
  }
</script>
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
    <div class="schedule_name"><p>ToDoList</p></div>
    <a href="javascript:history.back()"><i class="material-icons bi">keyboard_backspace</i></a>
  </div>

  <div class="todolist_wrap">
    <?php
    for($i=0;$i<count($todolist);$i++){
      $todolist[$i]=explode('^',$todolist[$i]);
    }
    for($i=0;$i<count($todolist);$i++){
      echo '<div class="todo_list"><i class="material-icons close" onclick="deleteTodolist();">close</i>';
      for($j=0;$j<count($todolist[$i])-1;$j++){
        echo $todolist[$i][$j].'<br>';
      }
      echo '마감일 : '.$todolist[$i][2].'<br>';
      $leftDate = (strtotime("Now")-strtotime($todolist[$i][2])) / 86400;
      if($leftDate < 0){
        echo '<div class="d_day"> D'.+(floor($leftDate+1)).'<br></div></div>';
      }
      else{
        echo '<div class="d_day"> D+'.+(floor($leftDate+1)).'<br></div></div>';
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

