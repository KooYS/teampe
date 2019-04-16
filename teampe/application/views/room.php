<?php

?>

<style>
.sidenav {
	height: 100%;
	width: 0;
	position: fixed;
	top: 0;
	left: 0;
	background-color: #111;
	overflow-x: hidden;
	transition: 0.5s;
	padding-top: 60px;
	z-index: 10001;
}

.sidenav_overlay{
	width: 100%;
	height: 100%;
	background-color:rgba(0, 0, 0, 0.3);
	position: absolute;
	left: 0;
	top: 0;
	display: none;
	z-index: 10000;
	transition: background .25s ease-in-out;
	-moz-transition: background .25s ease-in-out;
	-webkit-transition: background .25s ease-in-out;
}
.sidenav a {
	padding: 8px 8px 8px 32px;
	text-decoration: none;
	font-size: 25px;
	color: #818181;
	display: block;
	transition: 0.3s;
}

.sidenav a:hover {
	color: #f1f1f1;
}

.sidenav .closebtn {
	position: absolute;
	top: 0;
	right: 25px;
	font-size: 36px;
	margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>


	<div class="sidenav_overlay" onclick="closeNav()"></div>
	<div id="mySidenav" class="sidenav">
	  <a href="<?=base_url()?>index.php/MyFunction/index/1">메뉴1</a>
	  <a href="<?=base_url()?>index.php/MyFunction/index/2">메뉴2</a>
	  <a href="<?=base_url()?>index.php/MyFunction/index/3">메뉴3</a>
	  <a href="<?=base_url()?>index.php/MyFunction/index/4">메뉴4</a>
	</div>
	

	<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>


	<div class="list"></div>
	<input type="text" name="" id="chat"><button id="go">전송</button>


	<button id="authorize_button" style="display: none;">Authorize</button>
    <button id="signout_button" style="display: none;">Sign Out</button>

    <pre id="content" style="white-space: pre-wrap;"></pre>

<script type="text/javascript">
      // Client ID and API key from the Developer Console
      var CLIENT_ID = '1042659178211-v3g7h3tf163i1fai0d742fmo6e3h2g0r.apps.googleusercontent.com';
      var API_KEY = 'AIzaSyBmgeljxGX_CmUcSSP9dppXDbndG7rKlf0';

      // Array of API discovery doc URLs for APIs used by the quickstart
      var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/drive/v3/rest"];

      // Authorization scopes required by the API; multiple scopes can be
      // included, separated by spaces.
      var SCOPES = 'https://www.googleapis.com/auth/drive.metadata.readonly';

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
					$(".list").append(unescape(k) + " : "+unescape(childData[k]) + "<br>");
				}
			});
		});


       	

 	});


</script>
