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
  margin:10px;
    }
.part_name{
  color: #315bb0;
  font-size: 15px;
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
  width:78%;

}

.ok_btn {
  font-size: 14px;
  text-align: center;
  font-family: Noto Sans KR;
  font-weight: bold;
  color: #0a85d7; 
  border-color: #ffffff;
  background-color: #ffffff;
  padding: 5px;

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
  font-size: 20px;
  color: #ffffff;
  margin-left: 20px;

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
  max-width: 620px;
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
  max-width: 620px;
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




</style>
</head>

<!-- <script>
    var fd = new FormData();
    var img = i;
    fd.append('id', id);
    axios({
      method: 'get',
      url: '/teampe/index.php/Login/',
      data: fd
    });      
    
</script> -->
<!-- <script>
  var img
  $.ajax({
    url: '/teampe/index.php/Login'
    type: 'GET'
    data
  })
</script> -->

  
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
    <span class="room_name1"><?=$현재방->name?></span>

    <i class="material-icons pi">person_add</i>
    <i class="material-icons ni">notifications_none</i>
    <a onclick="location.href='<?=base_url()?>index.php/Main'"><i class="material-icons bi">home</i></a>
  </div>

  <!-- <button id="authorize_button" style="display: none;">Authorize</button>
    <button id="signout_button" style="display: none;">Sign Out</button>

    <pre id="content" style="white-space: pre-wrap;"></pre> -->


    <?php
        require_once VIEWPATH.'drive.php';
    ?>



  <div class="chat_area"><div class="list"></div></div>
  <div class="footer">
    <input class="chat_text" type="text" placeholder=" message..." name="" id="chat"><button class="ok_btn" id="upload">+</button><button class="ok_btn" id="go">보내기</button>
   

  </div>

	



<script type="text/javascript">

      if (typeof window.HybridApp != 'undefined') {
        // window.HybridApp.meetingLog();
    }


      // Client ID and API key from the Developer Console
      var CLIENT_ID = '1042659178211-ss6s7ab0hifp7pfhtin9eslp74u92qbh.apps.googleusercontent.com';
      var API_KEY = 'AIzaSyByvf5SaohOQC2Ajx0ih7NC1wum4O8oSFk';

      // Array of API discovery doc URLs for APIs used by the quickstart
      var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/drive/v3/rest"];

      // Authorization scopes required by the API; multiple scopes can be
      // included, separated by spaces.
      var SCOPES = 'https://www.googleapis.com/auth/drive';

      var authorizeButton = document.getElementById('authorize_button');
      var signoutButton = document.getElementById('signout_button');

      /**
       *  On load, called to load the auth2 library and API client library.
       */
      function handleClientLoad() {
        // gapi.load('client:auth2', initClient);
      }

      /**
       *  Initializes the API client library and sets up sign-in state
       *  listeners.
       */
      function initClient() {
        gapi.client.init({
          apiKey: API_KEY,
          clientId: CLIENT_ID,
          discoveryDocs: DISCOVERY_DOCS,
          scope: SCOPES
        }).then(function () {
          gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus);
          updateSigninStatus(gapi.auth2.getAuthInstance().currentUser.get().getAuthResponse().access_token);
        }, function(error) {
        });
      }

      /**
       *  Called when the signed in status changes, to update the UI
       *  appropriately. After a sign-in, the API is called.
       */
      function updateSigninStatus(token) {
        var renewURL = location.href;
        renewURL = renewURL + "?Authcode="+token;
        //페이지 갱신 실행!
        history.pushState(null, null, renewURL);

        var url_string = window.location.href; //
        var url = new URL(url_string);
        window.access_token = url.searchParams.get("Authcode");
        location.href = renewURL;
      }

    

    </script>

    <script async defer src="https://apis.google.com/js/api.js"
      onload="this.onload=function(){};handleClientLoad()"
      onreadystatechange="if (this.readyState === 'complete') this.onload()">
    </script>


<script type="text/javascript">
  
// a quick and dirty function to list some Drive files using the newly acquired access token
function files_list (access_token) {
    const drive_url = "https://www.googleapis.com/drive/v3/files";
    let drive_request = {
        method: "GET",
        headers: new Headers({
            Authorization: "Bearer "+access_token
        })
    }
    fetch(drive_url, drive_request).then( response => {
        return(response.json());
    }).then( list =>  {
      // console.log(list.files);
      //https://drive.google.com/open?id=
        console.log("Found a file called "+list.files[0].name);
    });
}





</script>
<script>
  Kakao.init('60b4798e25980dfd4fc4a9ce562f2f27');
    function kakao_share(id){
        // alert(site_url + '/Room/index/' + id);
        Kakao.Link.sendDefault({
        objectType: 'feed',
        content: {
          title: 'Teampe에 초대 받았습니다.',
          description: '',
          imageUrl: 'https://teampe.co.kr/teampe/assets/images/share.jpg',
          link: {
           mobileWebUrl: site_url + '/Room/index/' + id,
            webUrl: site_url + '/Room/index/' + id
          }
        },
        buttons: [
        {
          title: '참가하기',
          link: {
            mobileWebUrl: site_url + '/Room/index/' + id,
            webUrl: site_url + '/Room/index/' + id
          }
        },
        
      ]
      });
    }
	function openNav() {
		$("#mySidenav").width( '200px' );
		$(".sidenav_overlay").fadeIn();
	}

	function closeNav() {
		$("#mySidenav").width( '0' );
		$(".sidenav_overlay").fadeOut();
	}




    $(document).ready(function () {




    var url_string = window.location.href; //
    var url = new URL(url_string);
    window.access_token = url.searchParams.get("Authcode");
    if(window.access_token)
      files_list(window.access_token);


    var uploadbtn = $("#upload");

	if (typeof window.HybridApp != 'undefined' && !window.access_token) {
        uploadbtn.one( "click", function() {
        	window.HybridApp.googleDriveLogin('<?=$this->session->userdata(SESSION_USR_ROOM)?>');
	    });
    }
    else{
      if(!window.access_token)
        uploadbtn.click(function() {
           gapi.load('client:auth2', initClient);
        });
     else{
  	    try{
  	        new AjaxUpload(uploadbtn,{
  	            action: "<?=site_url('Base/ajax_img_upload')?>",
  	            data : {token : window.access_token },
  	            name: 'uploadfile',

  	            onComplete: function (file, response) {
                    if(response){
                      if (typeof window.HybridApp != 'undefined')
                      gapi.load('picker', {'callback': onPickerApiLoad});
                    else{
                      gapi.load('auth', {'callback': onAuthApiLoad});
                      gapi.load('picker', {'callback': onPickerApiLoad_web});
                      }
                    }
  	                // if(response == "error"){
  	                //     toastr['error']("화일업로드시 오유가 발생하였습니다.", "오유");
  	                //     return;
  	                // }else{
  	                //     var data = JSON.parse(response);
  	                //     if(data.result=='ok'){
  	                //         $("#hid_delegate_img").val(data.filename);
  	                //         $("#img_delegate").attr("src",data.fileurl+'/'+data.filename);
  	                //     }
  	                //     else if(response == 'no_file'){
  	                //         toastr['warning']("화일이 존재하지 않습니다.", "경고");
  	                //         return;
  	                //     }
  	                // }
  	            }
  	        });
  	    }catch (e){
  	        alert(e);
  	    }
      }
    }




    $(".material-icons.pi").click(function(){
          event.stopPropagation();
          kakao_share('<?=$현재방->uid?>');
    });
	  
	  
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
		      share_data = unescape(childData[k]);
          if(share_data.includes("google_share://")){

            origin_data = share_data.split("google_share://");
            str = "<div class='share_href'>"+ "<a class='kakao_place' href = "+origin_data[1]+">"+origin_data[1]+"</a>";
            if(unescape(k) =="<?=$this->session->userdata(SESSION_USR_NAME)?>")
                    temp = "<div class='chat1'>"+str+ "</div>";
                  else
                    temp = "<div class='chat2'>"+unescape(k) + " : "+str+"</div>";
             $(".list").append(temp);
          }
          else if(share_data.includes("share://")){
            origin_data = share_data.split("share://");
            origin_data = origin_data[1].split(",");
            // console.log(origin_data);
            var img_tag_src = origin_data[3];
            if (typeof window.HybridApp != 'undefined') {
                img_tag_src.replace(/%/gi, "%25");
            }
            str = "<div class='share_href'>"+ "<a class='kakao_place' href = "+origin_data[0]+">"+origin_data[0]+"</a>" + "</div><div class='share_place_name'>" + origin_data[1] +"</div><div class='share_place_address'>" + origin_data[2] + '</div><img style = "width:250px" src="'+img_tag_src+'">';

            if(unescape(k) =="<?=$this->session->userdata(SESSION_USR_NAME)?>")
            temp = "<div class='chat1'>"+str+ "</div>";
          else
            temp = "<div class='chat2'>"+unescape(k) + " : "+str+"</div>";

            $(".list").append(temp);
          }
        	else{
                  if(unescape(k) =="<?=$this->session->userdata(SESSION_USR_NAME)?>")
                    temp = "<div class='chat1'>"+share_data+ "</div>";
                  else
                    temp = "<div class='chat2'>"+unescape(k) + " : "+share_data+"</div>";
                  $(".list").append(temp);
        	}
          
        }
$('.list').scrollTop($('.list')[0].scrollHeight);
      });
    });


  });


</script>
