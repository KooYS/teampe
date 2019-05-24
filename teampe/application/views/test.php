<?php
?>
<style>
</style>
<div class="record">
<button onclick="recordAnalyze()">MIC</button>
</div>
<script>
   function recordAnalyze(){
      var UserAgent = navigator.userAgent; 
      if (UserAgent.match(/iPhone|iPod|Android|Windows CE|BlackBerry|Symbian|Windows Phone|webOS|Opera Mini|Opera Mobi|POLARIS|IEMobile|lgtelecom|nokia|SonyEricsson/i) != null || UserAgent.match(/LG|SAMSUNG|Samsung/) != null) 
      { 
           // 모바일로 접속한 경우
           var keywords = window.HybridApp.meetingLog();
           alert(keywords);

      } 

      else 
      { 
          // PC로 접속한 경우
          alert('모바일에서만 가능한 기능입니다.'); 
      }
   }
</script>