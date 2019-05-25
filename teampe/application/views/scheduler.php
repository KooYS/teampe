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

td {
  width:8%;
  height: 30px;
  border: 1px solid #f3f5fa;
  text-align: center;
  padding: 5px;
}

.table{
  width: 98%;
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

.schedule_btn{
  background-color: #f3f5fa;
  border-radius: 10px;
  padding: 10px;
  font-family: NotoSansKr;
  text-align: center;
  color: #315bb0;
  left: 50%;
  bottom: 10%;
  transform: translate(-50%,50%);
  position: absolute;


}

.modal {

  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  font-family: NotoSansKr;
  color: #315bb0;
  line-height: 30px;

}

.modal-content {
  text-align: center;
  background-color: #fefefe;
  margin: auto;
  border: 1px solid #888;
  width: 60%;
  font-family: NotoSansKr;
  font-size: 15px;
  height: 60%;
  overflow: auto;
  top: 15%;
  color: #315bb0;
  padding: 20px;
  line-height: 30px;
  display: -webkit-flex;
  align-items: space-around;
  justify-content: center;
}

.buildinglist{
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  font-family: NotoSansKr;
}



</style>
<script>
    var clicked=0;
    function viewEmptyBuilding(id,day,time,k){
      var name='myModal'.concat(Number(day),Number(time));
      modal = document.getElementById(name);
      if(clicked==0){
      modal.style.display = "block";
      window.addEventListener("click", function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
          clicked=0;
        }
      })
      clicked=1;
    }
    else if (clicked==1){
      var name1='mybuildinglist'.concat(Number(day),Number(time),Number(k));
      var modal1 = document.getElementById(name1);

      modal1.style.display = "block";
      window.addEventListener("click", function(event){
        if (event.target == modal1) {
          modal1.style.display = "none";

        }
    })
    }
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
    <div class="schedule_name"><p>시간표</p></div>
    <a href="javascript:history.back()"><i class="material-icons bi">keyboard_backspace</i></a>
  </div>
  
  <div class="table">
  <table>
        <?php
        echo '<tr><td colspan="8" style="color:#0a85d7">SCHEDULE</td></tr>
        <tr>
        <td>&nbsp</td>
        <td>일</td>
        <td>월</td>
        <td>화</td>
        <td>수</td>
        <td>목</td>
        <td>금</td>
        <td>토</td>
        </tr>';
        for($i=0;$i<12;$i++){
          echo '<tr>';
          echo '<td>'.($i+1).'교시</td>';
          for($j=0;$j<7;$j++){

            if ($data[$j][$i]==$usernum){
              if($i<9){
                            echo '<td id="a'.$j.$i.'" style="cursor:pointer;background-color:skyblue"
                            onclick="viewEmptyBuilding(this.id,'.$j.','.$i.','.'0'.');">&nbsp</td>';
                          }
              else{
                echo '<td id="a'.$j.$i.'" style="background-color:skyblue">&nbsp</td>';
              }


          }
          else{
            if($i<9){
                        echo '<td id="a'.$j.$i.'" style="cursor:pointer; background-color:white" onclick="viewEmptyBuilding(this.id,'.$j.','.$i.','.'0'.');">&nbsp</td>';
                      }
            else{
              echo '<td id="a'.$j.$i.'" style="background-color:white">&nbsp</td>';
            }
          }
          }
          echo '</tr>';

        }
        ?>

  </table>
</div>
<?php

  for ($i=0;$i<6;$i++){
    for ($j=0;$j<9;$j++){
      
        echo '<div id="myModal'.($i+1).$j.'" class="modal">
        <div class="modal-content">
          <div>';
        for($k=0;$k<count($tok[9*$i+$j]);$k++){
          echo '<div style="text-align:center;"><div style="cursor:pointer;display:inline;" onclick="viewEmptyBuilding(this.id,'.($i+1).','.$j.','.$k.');">'.$tok[9*$i+$j][$k][0].'</div></div>';
        }
        echo  '</div>
        </div>
        </div>';
        for ($k=0;$k<count($tok[9*$i+$j]);$k++){
          $emptyclass='';
          for($l=0;$l<count($tok[9*$i+$j][$k][1]);$l++){
            $emptyclass=$emptyclass.$tok[9*$i+$j][$k][1][$l].'<br>';
          }
          echo '<div id="mybuildinglist'.($i+1).$j.$k.'" class="buildinglist">
          <div class="modal-content">'.$emptyclass.'</div></div>';
        }

        echo  '</div>
        </div>';

      



}
}
?>


  <button class="schedule_btn"onclick="location.href='<?=base_url()?>index.php/MyFunction/index/100'">스케줄 입력</button>







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
