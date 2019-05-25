<?php
$this->load->database();

?>

<head>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

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


td {
  width:8%;
  height: 30px;
  border: 1px solid #f3f5fa;
  text-align: center;
  padding: 5px;
}

.table{
  width:98%;
  height:100%;
  margin-top: 20px;
  margin-left: 1%;
  border: 2px solid #f3f5fa;
  border-radius: 10px;
  text-align: center;
  font-family: NotoSansKr-Regular;
  color: #232323;
  font-size: 5px;
}



</style>

<script>
  var schedule =new Array(7);
  for(i=0;i<7;i++){
    schedule[i]=new Array(12);
  }
  for(i=0;i<7;i++){
    for(j=0;j<12;j++){
      schedule[i][j]=0;
    }
  }

  function colorchange(id,day,time){

    if(document.getElementById(id).style.backgroundColor=='white'){
      document.getElementById(id).style.backgroundColor='pink';
      schedule[day][time]=1;

    }
    else if(document.getElementById(id).style.backgroundColor=='pink'){
      document.getElementById(id).style.backgroundColor='white';
      schedule[day][time]=0;
    }
  }

  function updateschedule(schedule){
    var data = []

    for(i=0;i<7;i++){
      for(j=0;j<12;j++){
        if(schedule[i][j]==1){
          data.push([i,j])
        }
      }
    }

    // http requets 태우자
    var fd = new FormData();
    fd.append('userid', <?php echo $this->session->userdata(SESSION_USR_ID)?>)
    fd.append('schedule', JSON.stringify(data));

    axios({
      method: 'post',
      url: '/index.php/MyFunction/updateschedule',
      data: fd
    }).then(function (response) {
      if(response.data === "OK"){
        alert("성공적으로 저장 되었습니다.")
      } else {
        alert("에러 발생!")
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
  <div class="schedule_name"><p>빈강의실</p></div>
  <a href="javascript:history.back()"><i class="material-icons bi">keyboard_backspace</i></a>
</div>

<div class="table">
<table>
  <tr><td colspan="8">schedule</td></tr>
  <tr>
    <td>&nbsp</td>
    <td>일</td>
    <td>월</td>
    <td>화</td>
    <td>수</td>
    <td>목</td>
    <td>금</td>
    <td>토</td>
  </tr>

<?php
for($i=0;$i<12;$i++){
  echo '<tr>';
  echo '<td>'.($i+1).'교시</td>';
  for($j=0;$j<7;$j++){
    echo '<td id="a'.$j.$i.'" onclick="colorchange(this.id,'.$j.','.$i.');">&nbsp</td>';
  }
  echo '</tr>';
}
?>

</table>
</div>

<button onclick="updateschedule(schedule)">스케줄 저장</button>

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
