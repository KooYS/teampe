<?php
// koo
?>

<input type="hidden" id="session_usr_uid" value="<?= $me ?>"/>

<script type="text/javascript" src="<?= base_url() ?>assets/js/custom/app.js?version=1.1"></script>



<style>
	@font-face {
       font-family: 'Noto Sans KR';
       font-style: normal;
       font-weight: 500;
       src: url(/fonts/NotoSansKr/NotoSansKR-Medium.woff2) format('woff2'),
            url(/fonts/NotoSansKr/NotoSansKR-Medium.woff) format('woff'),
            url(/fonts/NotoSansKr/NotoSansKR-Medium.otf) format('opentype');
 	}
	.mypopup-bg{
		position: fixed;
	    top: 0;
	    left: 0;
	    width: 100%;
	    height: 100%;
	    z-index: 10001;
	    background-color: rgba(0, 0, 0, 0.5);
	}
	.mypopup-bg > .mypopup {
	    width: 80%;
	    position: absolute;
	    box-sizing: border-box;
	    left: 10%;
	    top: 50%;
	    background: white;
	    border-radius: 5px;
	    padding: 15px;
	    box-shadow: 0 0 6px 3px rgba(0, 0, 0, 0.3);
	}

	.mypopup .popup-title {
	    font-size: 16px;
	    text-align: center;
	    position: relative;
	    font-family: Noto Sans KR;
	    font-weight: bold;
	    color: #0a85d7;
	}

	.mypopup .popup-content {
	    font-size: 16px;
	    color: #555555;
	    text-align: center;
	    margin-top: 20px;
	    margin-bottom: 20px;
	    font-family: Noto Sans KR;
	    font-weight: bold;
	    color: #0a85d7;
	}

	.mypopup .popup-text {
		color: #555555;
		border-radius: 12px;
		background-color: #e5e5e5;
        border: solid;
        border-color: #ffffff;
        width: 60%;
	}
	.mypopup .popup-ok {
		font-size: 16px;
	    text-align: center;
	    font-family: Noto Sans KR;
	    font-weight: bold;
	    color: #0a85d7;
	}

</style>


<div class="mypopup-bg" id="popup-make" style="display: none;">
    <div class="mypopup">
        <div class="popup-title">방만들기</div>
        <div class="popup-content">
        	<span>제목 : </span>
        	<input class="popup-text" type="text" id="make_room_title"></input>
        	<a class="popup-ok" onclick="onMakeRoom(); window.location.reload(true);" >OK</a>

        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $(".make_btn").click(function(){
        	$("#popup-make").fadeIn();
        })

         $("#popup-make").click(function(event){
         	if(event.target.id === "popup-make")
        		$("#popup-make").fadeOut();
        })
    });

    function onMakeRoom(){
    	if($("#make_room_title").val() == ""){
    		alert("제목입력해주세요.");
    		return;
    	}
    	$.ajax({
	        url: site_url + '/Main/ajax_make_room',
	        type: 'POST',
	        data: {
	            title : $("#make_room_title").val(),
	        },
	        success: function (result) {
	            var jsonData = JSON.parse(result);
	            console.log(jsonData);

	            $("#popup-make").fadeOut();

	            
	        }
        });
    }

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


</script>
</body>
</html>
