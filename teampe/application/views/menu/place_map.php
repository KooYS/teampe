<?php 

	


?>
 <style>
.map_wrap, .map_wrap * {margin:0; padding:0;font-family:'Malgun Gothic',dotum,'돋움',sans-serif;font-size:12px;}
.map_wrap {position:relative;width:100%;height:350px;}
.placeinfo_wrap {position:absolute;bottom:28px;left:-150px;width:300px;}
.placeinfo {position:relative;width:100%;border-radius:6px;border: 1px solid #ccc;border-bottom:2px solid #ddd;padding-bottom: 10px;background: #fff;}
.placeinfo:nth-of-type(n) {border:0; box-shadow:0px 1px 2px #888;}
.placeinfo_wrap .after {content:'';position:relative;margin-left:-12px;left:50%;width:22px;height:12px;background:url('http://t1.daumcdn.net/localimg/localimages/07/mapapidoc/vertex_white.png')}
.placeinfo a, .placeinfo a:hover, .placeinfo a:active{color:#fff;text-decoration: none;}
.placeinfo a, .placeinfo span {display: block;text-overflow: ellipsis;overflow: hidden;white-space: nowrap;}
.placeinfo span {margin:5px 5px 0 5px;cursor: default;font-size:13px;}
.placeinfo .title {font-weight: bold; font-size:14px;border-radius: 6px 6px 0 0;margin: -1px -1px 0 -1px;padding:10px; color: #fff;background: #2865bc url(http://t1.daumcdn.net/localimg/localimages/07/mapapidoc/arrow_white.png) no-repeat right 14px center;}
.placeinfo .tel {color:#0f7833;}
.placeinfo .jibun {color:#999;font-size:11px;margin-top:0;}

    .material-icons.bi{
        color: #ffffff;
        font-size: 20px;
        right: 10%;
        bottom: 40%;
        position: absolute;
    }
    .material-icons.home{
      color: #ffffff;
      font-size: 20px;
      right: 20%;
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
      margin-left: 45%;
    }

    .input_map{
        border: solid;
        border-color: #315bb0;
        border-radius: 5px;
        vertical-align: middle;
        margin-top: 30px;
        margin-left: 20%;
        padding: 5px;
        width: 60%;

    }

    input::placeholder{
        color: #58ACFA; 
        font-family: NotoSansKR-Medium.woff;
    }

    .map{
        width:100%;
        height:100%;
        position:relative;
        overflow:hidden;
        border: solid;
        border-radius: 5px;
        border-color: #315bb0;
        margin-top: 30px;

    }
</style>




<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=c47884e2681e2a2a01b8e140dbc21ffb&libraries=services"></script>

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
    <div class="schedule_name"><p>장소추천</p></div>
    <a onclick="location.href='<?=base_url()?>index.php/Main'"><i class="material-icons home">home</i></a>
    <a onclick="location.href='<?=base_url()?>index.php/Room/index/'+<?=$this->session->userdata(SESSION_USR_ROOM)?>"><i class="material-icons bi">chat</i></a>
  </div>
<input type="text" class="input_map" name="keyword" id="keyword_for_map" placeholder="장소를 입력하세요.">
<div class="map_wrap">
    <div id="map" class="map"></div>
</div>


<script type="text/javascript">

var placeOverlay = new daum.maps.CustomOverlay({zIndex:1}), 
    contentNode = document.createElement('div'), // 커스텀 오버레이의 컨텐츠 엘리먼트 입니다 
    markers = [], // 마커를 담을 배열입니다
    currCategory = ''; // 현재 선택된 카테고리를 가지고 있을 변수입니다
 
var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
    mapOption = {
        center: new daum.maps.LatLng(37.566826, 126.9786567), // 지도의 중심좌표
        level: 3 // 지도의 확대 레벨
    };  

// 지도를 생성합니다    
var map = new daum.maps.Map(mapContainer, mapOption); 

// 장소 검색 객체를 생성합니다
var ps = new daum.maps.services.Places(map); 

// 지도에 idle 이벤트를 등록합니다
daum.maps.event.addListener(map, 'idle', searchPlaces);

// 커스텀 오버레이의 컨텐츠 노드에 css class를 추가합니다 
contentNode.className = 'placeinfo_wrap';

// 커스텀 오버레이의 컨텐츠 노드에 mousedown, touchstart 이벤트가 발생했을때
// 지도 객체에 이벤트가 전달되지 않도록 이벤트 핸들러로 daum.maps.event.preventMap 메소드를 등록합니다 
addEventHandle(contentNode, 'mousedown', daum.maps.event.preventMap);
addEventHandle(contentNode, 'touchstart', daum.maps.event.preventMap);

// 커스텀 오버레이 컨텐츠를 설정합니다
placeOverlay.setContent(contentNode);  

// 각 카테고리에 클릭 이벤트를 등록합니다
onClickCategory();

// 엘리먼트에 이벤트 핸들러를 등록하는 함수입니다
function addEventHandle(target, type, callback) {
    if (target.addEventListener) {
        target.addEventListener(type, callback);
    } else {
        target.attachEvent('on' + type, callback);
    }
}

// 카테고리 검색을 요청하는 함수입니다
function searchPlaces() {
    if (!currCategory) {
        return;
    }
    
    // 커스텀 오버레이를 숨깁니다 
    placeOverlay.setMap(null);

    // 지도에 표시되고 있는 마커를 제거합니다
    removeMarker();
    
    ps.categorySearch(currCategory, placesSearchCB, {useMapCenter:true}); 
}

// 장소검색이 완료됐을 때 호출되는 콜백함수 입니다
function placesSearchCB(data, status, pagination) {
    if (status === daum.maps.services.Status.OK) {

        // 정상적으로 검색이 완료됐으면 지도에 마커를 표출합니다
        displayPlaces(data);
    } else if (status === daum.maps.services.Status.ZERO_RESULT) {
        // 검색결과가 없는경우 해야할 처리가 있다면 이곳에 작성해 주세요

    } else if (status === daum.maps.services.Status.ERROR) {
        // 에러로 인해 검색결과가 나오지 않은 경우 해야할 처리가 있다면 이곳에 작성해 주세요
        
    }
}

// 지도에 마커를 표출하는 함수입니다
function displayPlaces(places) {

    // 몇번째 카테고리가 선택되어 있는지 얻어옵니다
    // 이 순서는 스프라이트 이미지에서의 위치를 계산하는데 사용됩니다
    var order = 4;
    var bounds = new daum.maps.LatLngBounds();

    for ( var i=0; i<places.length; i++ ) {

            // 마커를 생성하고 지도에 표시합니다
            var placePosition = new daum.maps.LatLng(places[i].y, places[i].x);
            var marker = addMarker(placePosition, order);
            // 마커와 검색결과 항목을 클릭 했을 때
            // 장소정보를 표출하도록 클릭 이벤트를 등록합니다
            (function(marker, place) {
                daum.maps.event.addListener(marker, 'click', function() {
                    map.setCenter(new daum.maps.LatLng(place.y, place.x));
                    displayPlaceInfo(place);
                });
            })(marker, places[i]);

    }
}

// 마커를 생성하고 지도 위에 마커를 표시하는 함수입니다
function addMarker(position, order) {
    var marker = new daum.maps.Marker({
        map: map,
        position: position
    });

    marker.setMap(map); // 지도 위에 마커를 표출합니다
    markers.push(marker);  // 배열에 생성된 마커를 추가합니다

    return marker;
}

// 지도 위에 표시되고 있는 마커를 모두 제거합니다
function removeMarker() {
    for ( var i = 0; i < markers.length; i++ ) {
        markers[i].setMap(null);
    }   
    markers = [];
}


// 카테고리를 클릭했을 때 호출되는 함수입니다
function onClickCategory() {
    currCategory = 'CE7';
    searchPlaces();
}



</script>