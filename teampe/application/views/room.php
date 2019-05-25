<?php

?>

<head>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
    position: fixed;
    width: 100%;
    height: 90px;
    z-index: 1000;
  }
.pro_img{
    border-radius: 50%;
    margin-left: 10px;
    width: 60px;
    border: solid;
    border-color: #ffffff;
    margin:15px;
    }
.pro_img1{
    border-radius: 50%;
    margin-left: 10px;
    width: 45px;
    border: solid;
    border-color: #315bb0;
    margin:15px;
    }
.profile .nickname{
    color: #ffffff;
    top: 50%;
    margin-left: -15px;
    transform: translate(50%,-50%);
    position: absolute;
    font-family: Noto Sans KR;
    }


.material-icons.add{
    font-size: 36px;
    color: #3f4a9c;
}

.material-icons.pi{
        color: #ffffff;
        font-size: 20px;
        right: 23%;
        bottom: 40%;
        position: absolute;
}

.material-icons.ni{
    color: #ffffff;
    font-size: 20px;
    right: 15%;
    bottom: 40%;
    position: absolute;
}

.material-icons.bi{
    color: #ffffff;
    font-size: 20px;
    right: 7%;
    bottom: 40%;
    position: absolute;
}
.footer{
  position:fixed;
  bottom: 0;
  width:105%;
  margin-left: ;

}

.chat_text {

  color: #555555;
  border-radius: 12px;
  background-color: #e5e5e5;
  border: solid;
  border-color: #ffffff;
  width:80%;

}

.ok_btn {
  font-size: 14px;
  text-align: center;
  font-family: Noto Sans KR;
  font-weight: bold;
  color: #0a85d7; 
  border-color: #ffffff;
  background-color: #ffffff;

}


.conv{
  font-size: 15px;
  color: #315bb0;
  margin-left: 10%;
}

.room_name {
  font-size: 20px;
  color: #315bb0;
  display: table;
  margin-left: auto;
  margin-right: auto;
}
.room_name1 {
  font-size: 15px;
  color: #ffffff;
  display: inline-table;
  margin-left: auto;
  margin-right: auto;

}

.list{

  height: 600px;
  padding-top: 90px;
  overflow: scroll;
  z-index: 1001;
  
  /*background-color: #f2f2f2; */
  
}

.chat1{
  font-size: 15px;
  text-align: right;
  margin-right: 5px;
  margin-top: 10px;
  padding: 10px 13px;
  border-radius: 5px;
  color: #ffffff;
  background-color: #315bb0;
  border: 1px solid #5858fa;
  word-break: break-all;
  display: inline-block;
  clear: both;
  float: right;
  max-width: 180px;
  position: relative;
}

.chat1:after {
    content: '';
    position: absolute;
    border-bottom: 8px solid #315bb0;
    border-right: 5px solid transparent;
    border-left: 5px solid transparent;
    top: -8px;
    right: 6px;
}



.chat2{
  font-size: 15px;
  text-align: left;
  margin-left: 5px;
  margin-top: 10px;
  padding: 10px 13px;
  border-radius: 5px;
  color: #315bb0;
  background-color: #f3f5fa;
  border: 1px solid #ffffff;
  word-break: break-all;
  display: inline-block;
  clear: both;
  float: left;
  max-width: 180px;
  position: relative;

}

.chat2:after {
    content: '';
    position: absolute;
    border-bottom: 8px solid #f3f5fa;
    border-right: 5px solid transparent;
    border-left: 5px solid transparent;
    top: -8px;
    left: 6px;
}

.chat_img{
  
  border-radius: 50%;
  margin-left: 10px;
  width: 35px;
  border: solid;
  border-color: #ffffff;
  float: right;
  vertical-align: middle;
  
}

.part_name{
  color: #315bb0;
  font-size: 15px;
}


</style>
</head>


  <div class="profile">
  <div class="sidenav_overlay" onclick="closeNav()"></div>
  <div id="mySidenav" class="sidenav">
    <span class="room_name"><?=$현재방->name?></span>
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
    <span class="room_name1"><?=$현재방->name?></span>
    <i class="material-icons pi">person_add</i>
    <i class="material-icons ni">notifications_none</i>
    <a href="javascript:history.back()"><i class="material-icons bi">keyboard_backspace</i></a>
  </div>



  <div class="chat_area"><div class="list"></div></div>
  <div class="footer">
    <input class="chat_text" type="text" placeholder=" message..." name="" id="chat"><button class="ok_btn" id="go">보내기</button>

  </div>


  

    <script async defer src="https://apis.google.com/js/api.js"
      onload="this.onload=function(){};handleClientLoad()"
      onreadystatechange="if (this.readyState === 'complete') this.onload()">
    </script>



<script>

  function openNav() {
    $("#mySidenav").width( '200px' );
    $(".sidenav_overlay").fadeIn();
  }

  function closeNav() {
    $("#mySidenav").width( '0' );
    $(".sidenav_overlay").fadeOut();
  }


    $(document).ready(function () {

      
      $("#go").click(function(){ // 대화 보내기
        var today = new Date();
        var y = today.getFullYear();
        var Month = ("0" + (today.getMonth() + 1)).slice(-2) ;
        var d = ("0" + today.getDate()).slice(-2) ;
        var h = ("0" + today.getHours()).slice(-2) ;
        var m = ("0" + today.getMinutes()).slice(-2) ;
        var s = ("0" + today.getSeconds()).slice(-2) ;
        var timestamp = y + "-" + Month  + "-" + d + "-" + h + ":" + m + ":" + s;

        var ref_data = '<?=$현재방->uid?>/'+timestamp+'/'+escape("<?=$this->session->userdata(SESSION_USR_NAME)?>");

        database.ref(ref_data).set(escape($("#chat").val()));
        $("#chat").val("");

      });


      var starCountRef = firebase.database().ref('<?=$현재방->uid?>/').orderByKey();
    starCountRef.on('value', function(snapshot) {
      $(".list").empty();
      snapshot.forEach(function(childSnapshot) {
          var childKey = childSnapshot.key;
          var childData = childSnapshot.val();
          // console.log(childKey,childData);

        for(var k in childData) {
          if(unescape(k) =="<?=$this->session->userdata(SESSION_USR_NAME)?>")
            temp = "<div class='chat1'>"+unescape(childData[k])+ "</div>";
          else
            temp = "<div class='chat2'>"+unescape(k) + " : "+unescape(childData[k])+"</div>";
          console.log(temp);
          $(".list").append(temp);
        }
      });
    });


        

  });


</script>
