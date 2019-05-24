<?php 

?>

<style type="text/css">

	@font-face {
font-family: "NanumGothic";
src: url(../../../assets/font/NanumGothic.eot);
src: url(../../../assets/ont/NanumGothic.eot?#iefix) format('embedded-opentype'),
url(../../../assets/font/NanumGothic.woff) format('woff'),
url(../../../assets/font/NanumGothic.ttf) format('truetype');
}
	@font-face {
font-family: "NanumGothicBold";
src: url(../../../assets/font/NanumGothicBold.eot);
src: url(../../../assets/font/NanumGothicBold.eot?#iefix) format('embedded-opentype'),
url(../../../assets/font/NanumGothicBold.woff) format('woff'),
url(../../../assets/font/NanumGothicBold.ttf) format('truetype');
}



	.cau-content > *{
		font-family: "NanumGothic";
	}

	.cau-table thead tr th{
		font-size: 10px;
	}
	.cau-table tbody tr th{
		font-size: 10px;
	}
	.cau-table tbody tr td{
		font-size: 10px;
	}
	

	.teample thead tr th {
		padding: 0px !important;
	}

	.waiting{
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 10001;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .loader {
      margin-left: -15px;
      margin-top: -15px;
      position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    transform: -webkit-translate(-50%, -50%);
    transform: -moz-translate(-50%, -50%);
    transform: -ms-translate(-50%, -50%);

      border: 6px solid #f3f3f3;
      border-radius: 50%;
      border-top: 6px solid black;
      width: 30px;
      height: 30px;
      -webkit-animation: spin 2s linear infinite; /* Safari */
      animation: spin 2s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
      0% { -webkit-transform: rotate(0deg); }
      100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }



</style>

<link rel="stylesheet" type="text/css" href="https://library.cau.ac.kr/assets/css/main.css?sv=2019.4.25.14">







<div class="waiting" style="display: none;"><div class="loader"></div></div>
<div class="cau-content">

<table class="cau-table teample">
	<caption>팀플룸현황</caption>
</table>

<select class="hopeDate" style="margin: 10px 0px;">
	
</select>

	<div class="reserve_content">
	<?php
		$date = date("Y-m-d");
		for ($roomNum=1; $roomNum < 18 ; $roomNum++) { 
			if(!isset($teampleRoomData[$roomNum]))
				continue;

			$roomPt = $teampleRoomData[$roomNum];
	?>
	<table class="cau-table teample">
		<thead>
			<th colspan="24"><?=$room_summary['data']['list'][$roomNum - 1]["room"]['name']?></th>
		    <tr>
		        <?php 
		        for ($i=$room_summary['data']['list'][$roomNum - 1]["hours"][0]["beginHour"]; $i < $room_summary['data']['list'][$roomNum - 1]["hours"][0]["endHour"] ; $i++) { 
		        ?>
		        <th><?=sprintf("%02d", $i)?></th>
		        <?php 
		        }
		        ?>
		    </tr>
		</thead>
		<tbody>
		     <?php
		     	$index = 0;
		        $switchTime = false;
		        for ($i=$room_summary['data']['list'][$roomNum - 1]["hours"][0]["beginHour"]; $i < $room_summary['data']['list'][$roomNum - 1]["hours"][0]["endHour"] ; $i++) { 
		        		if($teampleRoomData[$roomNum] != null)
		        		if($i == explode(":",explode(" ", $roomPt[$index])[1])[0]){
		        			$switchTime = !$switchTime;
		        			if($index < count($roomPt) - 1)
		        				$index++;
		        		}
		        	if($switchTime){
		        	?>
		        		<td style="background: #0074bb"></td>
		        	 <?php 
			        } else {
			    	?>
			    		<td style="background: white"></td>
			    	<?php 
			        }
			    	?>
		        <?php 
		        }
		    	?>
		</tbody>
	</table>
	<button onclick="window.open('https://library.cau.ac.kr/#/smuf/room/group-study/<?=$roomNum?>/reserve?hopeDate=<?=$date?>')">예약하기</button>
	<?php }?>
	</div>


<table class="cau-table">
    <caption>이용시간</caption>
    <thead>
        <tr>
            <th>구분</th>
            <th>위치</th>
            <th>평일</th>
            <th>토요일</th>
            <th>공휴일</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>스터디룸 01-05</th>
            <td>도서관 3층</td>
            <td colspan="3">05:00 ~ 23:00</td>
        </tr>
        <tr>
            <th style="font-size: 10px;">스터디룸 06-13 (창의문화) *</th>
            <td>도서관 외부 1층</td>
            <td colspan="2">도서관 개관시간 내</td>
            <td>휴 관</td>
        </tr>
        <tr>
            <th>팀플룸</th>
            <td>도서관 2층</td>
            <td colspan="3">24시간</td>
        </tr>
    </tbody>
</table>


<ul class="cau-list01">
    <li>
        <b style="font-size: 13px;">유의사항</b>
        <ul>
            <li>예약은 7일 전부터 당일 이용 2시간 전까지 가능</li>
            <li>스터디룸/세미나룸에는 음료수 및 음식물 반입 금지</li>
            <li>스터디룸 (최대 2시간), 팀플룸 (최대 3시간) 예약 후 이용 가능</li>
            <li>예약시 24시 시간은 00:00로 입력함</li>
            <li>사용 후 다음 이용자를 위해 자리를 반드시 정리 (전원 및 냉방 소등, 화이트보드, 책상 정리)</li>
        </ul>
    </li>
</ul>
</div>











<body>

<script>


function dateToYYYYMMDD(date){
    function pad(num) {
        num = num + '';
        return num.length < 2 ? '0' + num : num;
    }
    return date.getFullYear() + '-' + pad(date.getMonth()+1) + '-' + pad(date.getDate());
}


function scrollPrevent(flag){
	if(flag){
		$('html, body').css({'overflow': 'hidden', 'height': '100%'});
		$('#element').on('scroll touchmove mousewheel', function(event) {
		  event.preventDefault();
		  event.stopPropagation();
		  return false;
		});
	}
	else{
		$('#element').off('scroll touchmove mousewheel');
		$('html, body').css({'overflow': 'auto', 'height': '100%'});
	}

}

$(document).ready(function () {

	for (var i = 0; i < 8; i++) {
		var day = new Date();
		$(".hopeDate").append('<option value="'+i+'">'+dateToYYYYMMDD(new Date(day.setDate(day.getDate() + i)))+'</option>');
	}

	$(".hopeDate").change(function(){
		$(".waiting").show();
		scrollPrevent(true);
		$.ajax({
			url : '<?=base_url()?>index.php/MyFunction/ajax_reserve_state_by_day',
			type : 'post',
			data : {day : $(this).val()},
			success : function(res){
				var data = JSON.parse(res);
				
				$(".reserve_content").empty();

				for (var i in data['data']) {

					var roomPt = data['data'][i];
					var room_summary = data['summary']['data']['list'][i-1];
					var str = "";

					if (room_summary['hours'].length == 0)
						continue;

					str += '<table class="cau-table teample"><thead><th colspan="24">'+room_summary["room"]["name"]+'</th><tr>';
					for(var j = room_summary["hours"][0]["beginHour"]; j<room_summary["hours"][0]["endHour"]; j++){
						time = (j < 10 ? '0' : '') + j;
						str += ('<th>'+time+'</th>');
					}
					str += '</tr></thead>';



					str += '<tbody>';

					var index = 0;
					var switchTime = false;
					for(var j = room_summary["hours"][0]["beginHour"]; j<room_summary["hours"][0]["endHour"]; j++){
						if(roomPt != null)
						if( j == (roomPt[index].split(" ")[1]).split(":")[0] ){
							switchTime = !switchTime;
							if(index < roomPt.length - 1)
		        				index++;
						}
						if(switchTime){
							str += '<td style="background: #0074bb"></td>';
						}
						else{
							str += '<td style="background: white"></td>';
						}
					}
					str += "</tbody>";
					str += "</table>";
					url = "window.open('https://library.cau.ac.kr/#/smuf/room/group-study/"+i+"/reserve?hopeDate="+data['day']+"')";
					str += "<button onclick="+url+">예약하기</button>";
	


					$(".reserve_content").append(str);
					$(".waiting").hide();
					scrollPrevent(false);
				}



				
			
		


		    




			}
		});
	});


});


</script>