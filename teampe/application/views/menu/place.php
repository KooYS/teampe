<?php 

	


?>


<?php
        require_once VIEWPATH.'menu/place_map.php';
?>




<script type="text/javascript">


    function share(url,title,description,img){
        alert('채팅방에 공유되었습니다.');
        var today = new Date();
        var y = today.getFullYear();
        var Month = ("0" + (today.getMonth() + 1)).slice(-2) ;
        var d = ("0" + today.getDate()).slice(-2) ;
        var h = ("0" + today.getHours()).slice(-2) ;
        var m = ("0" + today.getMinutes()).slice(-2) ;
        var s = ("0" + today.getSeconds()).slice(-2) ;
        var timestamp = y + "-" + Month  + "-" + d + "-" + h + ":" + m + ":" + s;

        // 세션 추가
        var ref_data = '<?=$this->session->userdata(SESSION_USR_ROOM)?>/'+timestamp+'/'+escape("<?=$this->session->userdata(SESSION_USR_NAME)?>");

        palce_url = "share://" + url + "," + title + "," + description + "," + img;
        database.ref(ref_data).set(escape(palce_url));
        
        // console.log(title,description,img);
    }

    function displayPlaceInfo (place) {
        $.ajax({
            url : '<?=base_url()?>index.php/Base/get_url_metadata',
            type : 'post',
            data : {url : place.place_url},
            success : function(res){
                var data = JSON.parse(res);
                fucntionstr = "share('"+place.place_url+"','"+data['title']+"','"+data['description']+"','"+data['image']+"')";
                var content = '<div class="placeinfo">' +
                        '   <a class="title" href="' + place.place_url + '" target="" title="' + place.place_name + '">' + place.place_name + '</a>';   

                if (place.road_address_name) {
                    content += '    <span title="' + place.road_address_name + '">' + place.road_address_name + '</span>' +
                                '  <span class="jibun" title="' + place.address_name + '">(지번 : ' + place.address_name + ')</span>';
                }  else {
                    content += '    <span title="' + place.address_name + '">' + place.address_name + '</span>';
                }                
               
                content += '    <span class="tel">' + place.phone + '</span>' ;

                content += '    <span onclick="'+fucntionstr+'" class="share">공유하기</span>' + 
                            '</div>' + 
                            '<div class="after"></div>';


                contentNode.innerHTML = content;
                placeOverlay.setPosition(new daum.maps.LatLng(place.y, place.x));
                placeOverlay.setMap(map);  
            }
        });


        
    }


    $(document).ready(function () {

        if($("#keyword_for_map").val() != ""){
            ps.keywordSearch($("#keyword_for_map").val(), placesSearch_keyword); 
        }
        

        // 키워드 검색 완료 시 호출되는 콜백함수 입니다
        function placesSearch_keyword (data, status, pagination) {
            if (status === daum.maps.services.Status.OK) {
                for (var i=0; i<data.length; i++) {
                    map.setCenter(new daum.maps.LatLng(data[i].y, data[i].x));
                    break;
                }       
            } 
        }


        $("#keyword_for_map").keyup(function(event) {
          // Number 13 is the "Enter" key on the keyboard
          if (event.keyCode === 13) {
            // Cancel the default action, if needed
            event.preventDefault();
            ps.keywordSearch($(this).val(), placesSearch_keyword); 
          }
        });


    });
    


</script>