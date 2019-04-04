<?php
// koo
?>

<input type="hidden" id="session_usr_uid" value="<?= $me ?>"/>

<script type="text/javascript" src="<?= base_url() ?>assets/js/custom/app.js"></script>



<style>
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
	}

	.mypopup .popup-content {
	    font-size: 16px;
	    color: #555555;
	    text-align: center;
	    margin-top: 20px;
	    margin-bottom: 20px;
	}

</style>


<div class="mypopup-bg" id="popup-make" style="display: none;">
    <div class="mypopup">
        <div class="popup-title">방만들기</div>
        <div class="popup-content">
        	<span>제목 : </span>
        	<input type="text" id="make_room_title"></input>
        </div>
         <div class="form-group" style="text-align: center;">
            <a class="" onclick="onMakeRoom()">확인</a>
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
</body>
</html>
