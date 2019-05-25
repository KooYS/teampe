<?php

var_dump($token);
var_dump($refreshToken);


$GAPIS = 'https://www.googleapis.com/';

function uploadFile($access_token, $file, $mime_type, $name) {
    global $GAPIS;

    $ch1 = curl_init();

    // don't do ssl checks
    curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch1, CURLOPT_SSL_VERIFYHOST, false);

    $my_beautiful_body = '
--joes_awesome_divider
Content-Type: application/json; charset=UTF-8

{
    "name": "'.$name.'"
}

--joes_awesome_divider
Content-Type: '.$mime_type.'

'.file_get_contents($file).'

--joes_awesome_divider--
    ';

    // do other curl stuff
    curl_setopt($ch1, CURLOPT_URL, 'https://www.googleapis.com/upload/drive/v3/files?uploadType=multipart');
    curl_setopt($ch1, CURLOPT_POST, 1);
    curl_setopt($ch1, CURLOPT_POSTFIELDS, $my_beautiful_body);
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);

    // set authorization header
    curl_setopt($ch1, CURLOPT_HTTPHEADER, array('Content-Type: multipart/related; boundary=joes_awesome_divider', 'Authorization: Bearer ' . $access_token) );

    // $response=curl_exec($ch1);
    // if($response === false){
    //     $output = 'ERROR: '.curl_error($ch1);
    // } else{
    //     $output = $response;
    // }
    // var_dump($output);

    // // close first request handler
    // curl_close($ch1);

    // return $output;
}


$mime_type = 'image/png';  // could be 'image/jpeg', etc.
$new_name = 'My Video';
$the_file_and_path = base_url()."../upload/temp/123.png";
$result = uploadFile($token, $the_file_and_path, $mime_type, $new_name);



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

  <a href="kakaolink://send?appkey=60b4798e25980dfd4fc4a9ce562f2f27&appver=1.0&linkver=4.0&template_json=%7B%22P%22%3A%7B%22TP%22%3A%22Feed%22%2C%22ME%22%3A%22%24%7BME%7D%22%2C%22SID%22%3A%22capri_292062%22%2C%22DID%22%3A%22https%3A%2F%2Fteampe.co.kr%2Fteampe%2Findex.php%2FRoom%2Findex%2F1%22%2C%22SNM%22%3A%22teampe%22%2C%22SIC%22%3A%22https%3A%2F%2Fk.kakaocdn.net%2F14%2Fdn%2FbtqbjCnoZ8A%2FMyiKigHpJbSKusX0u3TPL1%2Fo.jpg%22%2C%22L%22%3A%7B%22LPC%22%3A%22https%3A%2F%2Fteampe.co.kr%22%2C%22LMO%22%3A%22https%3A%2F%2Fteampe.co.kr%22%2C%22LCP%22%3A%22kakao1ec48789438b105c234369e63d0d2e76%3A%2F%2Fkakaolink%22%2C%22LCM%22%3A%22kakao1ec48789438b105c234369e63d0d2e76%3A%2F%2Fkakaolink%22%7D%2C%22SL%22%3A%7B%22LPC%22%3A%22https%3A%2F%2Fteampe.co.kr%22%2C%22LMO%22%3A%22https%3A%2F%2Fteampe.co.kr%22%2C%22LCP%22%3A%22kakao1ec48789438b105c234369e63d0d2e76%3A%2F%2Fkakaolink%22%2C%22LCM%22%3A%22kakao1ec48789438b105c234369e63d0d2e76%3A%2F%2Fkakaolink%22%7D%2C%22VA%22%3A%226.0.0%22%2C%22VI%22%3A%225.9.8%22%2C%22VW%22%3A%222.5.1%22%2C%22VM%22%3A%222.2.0%22%2C%22FW%22%3Atrue%2C%22RF%22%3A%22out-client%22%7D%2C%22C%22%3A%7B%22THC%22%3A1%2C%22THL%22%3A%5B%7B%22TH%22%3A%7B%22THU%22%3A%22http%3A%2F%2Fmud-kage.kakao.co.kr%2Fdn%2FQ2iNx%2FbtqgeRgV54P%2FVLdBs9cvyn8BJXB3o7N8UK%2Fkakaolink40_original.png%22%2C%22W%22%3A400%2C%22H%22%3A400%7D%2C%22L%22%3A%7B%22LPC%22%3A%22https%3A%2F%2Fteampe.co.kr%2Fteampe%2Findex.php%2FRoom%2Findex%2F1%22%2C%22LMO%22%3A%22https%3A%2F%2Fteampe.co.kr%2Fteampe%2Findex.php%2FRoom%2Findex%2F1%22%7D%7D%5D%2C%22TI%22%3A%7B%22TD%22%3A%7B%22T%22%3A%22%EA%B3%B5%EC%9C%A0%ED%95%98%EA%B8%B0%22%7D%2C%22L%22%3A%7B%22LPC%22%3A%22https%3A%2F%2Fteampe.co.kr%2Fteampe%2Findex.php%2FRoom%2Findex%2F1%22%2C%22LMO%22%3A%22https%3A%2F%2Fteampe.co.kr%2Fteampe%2Findex.php%2FRoom%2Findex%2F1%22%7D%7D%2C%22BUL%22%3A%5B%7B%22BU%22%3A%7B%22T%22%3A%22%EC%B0%B8%EA%B0%80%ED%95%98%EA%B8%B0%22%7D%2C%22L%22%3A%7B%22LPC%22%3A%22https%3A%2F%2Fteampe.co.kr%2Fteampe%2Findex.php%2FRoom%2Findex%2F1%22%2C%22LMO%22%3A%22https%3A%2F%2Fteampe.co.kr%2Fteampe%2Findex.php%2FRoom%2Findex%2F1%22%7D%7D%5D%7D%7D&template_args=%7B%22%24%7BIMAGE_WIDTH%7D%22%3A%22400%22%2C%22%24%7BIOS_EXECUTION_URL%7D%22%3A%22%22%2C%22%24%7BIMAGE_URL%7D%22%3A%22http%3A%2F%2Fmud-kage.kakao.co.kr%2Fdn%2FQ2iNx%2FbtqgeRgV54P%2FVLdBs9cvyn8BJXB3o7N8UK%2Fkakaolink40_original.png%22%2C%22%24%7BIMAGE_COUNT%7D%22%3A%221%22%2C%22%24%7BFIRST_BUTTON_TITLE%7D%22%3A%22%EC%B0%B8%EA%B0%80%ED%95%98%EA%B8%B0%22%2C%22%24%7BDESCRIPTION%7D%22%3A%22%22%2C%22%24%7BSHARED_COUNT%7D%22%3A%22%22%2C%22%24%7BANDROID_EXECUTION_URL%7D%22%3A%22%22%2C%22%24%7BFIRST_BUTTON_IOS_EXECUTION_URL%7D%22%3A%22%22%2C%22%24%7BFIRST_BUTTON_MOBILE_WEB_URL%7D%22%3A%22https%3A%2F%2Fteampe.co.kr%2Fteampe%2Findex.php%2FRoom%2Findex%2F1%22%2C%22%24%7BCOMMENT_COUNT%7D%22%3A%22%22%2C%22%24%7BSUBSCRIBER_COUNT%7D%22%3A%22%22%2C%22%24%7BIMAGE_HEIGHT%7D%22%3A%22400%22%2C%22%24%7BTITLE%7D%22%3A%22%EA%B3%B5%EC%9C%A0%ED%95%98%EA%B8%B0%22%2C%22%24%7BMOBILE_WEB_URL%7D%22%3A%22https%3A%2F%2Fteampe.co.kr%2Fteampe%2Findex.php%2FRoom%2Findex%2F1%22%2C%22%24%7BFIRST_BUTTON_ANDROID_EXECUTION_URL%7D%22%3A%22%22%2C%22%24%7BVIEW_COUNT%7D%22%3A%22%22%2C%22%24%7BWEB_URL%7D%22%3A%22https%3A%2F%2Fteampe.co.kr%2Fteampe%2Findex.php%2FRoom%2Findex%2F1%22%2C%22%24%7BLIKE_COUNT%7D%22%3A%22%22%2C%22%24%7BFIRST_BUTTON_WEB_URL%7D%22%3A%22https%3A%2F%2Fteampe.co.kr%2Fteampe%2Findex.php%2FRoom%2Findex%2F1%22%7D&template_id=3139&extras=%7B%22KA%22%3A%22sdk%2F1.29.1%20os%2Fjavascript%20lang%2Fko-KR%20device%2FLinux_i686%20origin%2Fhttps%253A%252F%252Fteampe.co.kr%22%7D">려차</a>

  <button id="authorize_button" style="display: none;">Authorize</button>
    <button id="signout_button" style="display: none;">Sign Out</button>
    <button id="click">click</button>

    <pre id="content" style="white-space: pre-wrap;"></pre>


    <?php
        require_once VIEWPATH.'drive.php';
    ?>



  <div class="chat_area"><div class="list"></div></div>
  <div class="footer">
    <input class="chat_text" type="text" placeholder=" message..." name="" id="chat"><button class="ok_btn" id="go">보내기</button>

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
        gapi.load('client:auth2', initClient);
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
          // Listen for sign-in state changes.
          gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus);

          // Handle the initial sign-in state.
          updateSigninStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
          authorizeButton.onclick = handleAuthClick;
          signoutButton.onclick = handleSignoutClick;
        }, function(error) {
          appendPre(JSON.stringify(error, null, 2));
        });
      }

      /**
       *  Called when the signed in status changes, to update the UI
       *  appropriately. After a sign-in, the API is called.
       */
      function updateSigninStatus(isSignedIn) {

        if (isSignedIn) {
          
          authorizeButton.style.display = 'none';
          signoutButton.style.display = 'block';
          listFiles();
        } else {
          authorizeButton.style.display = 'block';
          signoutButton.style.display = 'none';
        }
      }

      /**
       *  Sign in the user upon button click.
       */
      function handleAuthClick(event) {
        gapi.auth2.getAuthInstance().signIn();
      }

      /**
       *  Sign out the user upon button click.
       */
      function handleSignoutClick(event) {
        gapi.auth2.getAuthInstance().signOut();
      }

      /**
       * Append a pre element to the body containing the given message
       * as its text node. Used to display the results of the API call.
       *
       * @param {string} message Text to be placed in pre element.
       */
      function appendPre(message) {
        var pre = document.getElementById('content');
        var textContent = document.createTextNode(message + '\n');
        pre.appendChild(textContent);
      }

      /**
       * Print files.
       */
      function listFiles() {
        gapi.client.drive.files.list({
          'pageSize': 10,
          'fields': "nextPageToken, files(id, name)"
        }).then(function(response) {
          appendPre('Files:');
          var files = response.result.files;
          if (files && files.length > 0) {
            for (var i = 0; i < files.length; i++) {
              var file = files[i];
              appendPre(file.name + ' (' + file.id + ')');
            }
          } else {
            appendPre('No files found.');
          }
        });
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
      console.log(list.files);
      //https://drive.google.com/open?id=
        console.log("Found a file called "+list.files[0].name);
    });
}


  function openNav() {
    $("#mySidenav").width( '200px' );
    $(".sidenav_overlay").fadeIn();
  }


</script>
<script>
  Kakao.init('60b4798e25980dfd4fc4a9ce562f2f27');
    function kakao_share(id){
        // alert(site_url + '/Room/index/' + id);
        Kakao.Link.sendDefault({
        objectType: 'feed',
        content: {
          title: '공유하기',
          description: '',
          imageUrl: 'http://mud-kage.kakao.co.kr/dn/Q2iNx/btqgeRgV54P/VLdBs9cvyn8BJXB3o7N8UK/kakaolink40_original.png',
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

  function closeNav() {
    $("#mySidenav").width( '0' );
    $(".sidenav_overlay").fadeOut();
  }


    $(document).ready(function () {

 var url_string = window.location.href; //
      var url = new URL(url_string);
      var access_token = url.searchParams.get("Authcode");
      if(access_token)
        files_list(access_token);


    $("#click").click(function(){
        gapi.load('picker', {'callback': onPickerApiLoad});
    });


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
          if(share_data.includes("share://")){
            origin_data = share_data.split("share://");
            origin_data = origin_data[1].split(",");
            console.log(origin_data);
            var img_tag_src = origin_data[3];
            if (typeof window.HybridApp != 'undefined') {
                img_tag_src.replace(/%/gi, "%25");
            }
            str = "<br>"+ "<a class='kakao_place' href = "+origin_data[0]+">"+origin_data[0]+"</a>" + "<br>" + origin_data[1] +"<br>" + origin_data[2] + '<img style = "width:250px" src="'+img_tag_src+'">';
            $(".list").append(unescape(k) + " : "+str + "<br>");
          }
	else{
          if(unescape(k) =="<?=$this->session->userdata(SESSION_USR_NAME)?>")
            temp = "<div class='chat1'>"+share_data+ "</div>";
          else
            temp = "<div class='chat2'>"+unescape(k) + " : "+share_data+"</div>";
	}
          console.log(temp);
          $(".list").append(temp);
        }
      });
    });

    $(".kakao_place").click(function(){
      alert($(this).attr("href"));
    });
       	

  });


</script>
