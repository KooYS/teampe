<?php
<<<<<<< HEAD
	// var_dump($현재방)
=======
	var_dump($현재방)
>>>>>>> 0d70b5b63fb00ff82fcf24870b9f2631e5a7d3ca

?>

<style>
<<<<<<< HEAD
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
	  <a href="#">메뉴1</a>
	  <a href="#">메뉴2</a>
	  <a href="#">메뉴3</a>
	  <a href="#">메뉴4</a>
	</div>
	

	<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>


	<div class="list"></div>
	<input type="text" name="" id="chat"><button id="go">전송</button>


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

    		var ref_data = '<?=$현재방->uid?>/'+timestamp+'/<?=$this->session->userdata(SESSION_USR_ID)?>';

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
					$(".list").append(unescape(childData[k]) + "<br>");
				}
			});
		});


       	

 	});

</script>
=======

</style>




<script>


	// var receiverID = "supergroup";
	// var messageText = "Hello world!";
	// var messageType = CometChat.MESSAGE_TYPE.TEXT;
	// var receiverType = CometChat.RECEIVER_TYPE.GROUP;

	// var textMessage = new CometChat.TextMessage(receiverID, messageText, messageType, receiverType);

	// CometChat.sendMessage(textMessage).then(
	//   message => {
	//     console.log("Message sent successfully:", message);
	//     // Text Message Sent Successfully
	//   },
	//   error => {
	//     console.log("Message sending failed with error:", error);
	//   }
	// );


	// var GUID = "supergroup";
	// var limit = 30;

	// var messagesRequest = new CometChat.MessagesRequestBuilder().setGUID(GUID).setLimit(limit).build();

	// messagesRequest.fetchPrevious().then(
	// 	messages => {
	// 		console.log("Message list fetched:", messages);
	// 		//Handle the list of messages
	// 	},
	// 	error => {
	// 		console.log("Message fetching failed with error:", error);
	// 	}
	// );


    $(document).ready(function () {
       	console.log(window.mycomechat);

 	});








 
</script>



</script>
>>>>>>> 0d70b5b63fb00ff82fcf24870b9f2631e5a7d3ca
