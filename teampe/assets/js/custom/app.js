function loadPage($url) {
    location.href = $url;
}

function go2Main() {
    loadPage(site_url + '/Login');
}


function registerLog($transcipt) {
            var text = $transcipt;
            var fd = new FormData();
            // fd.append('userid', <?php echo $this->session->userdata(SESSION_USR_ID)?>)
            fd.append('userid', 0);
            fd.append('text', text);
            axios({
              method: 'post',
              url: '/teampe/index.php/MyFunction/registerLog',
              data: fd
            }).then(function(res){
              $(".record_list_wrap").empty();
              var data =  res.data;
              for (var i = 0; i < data.length ; i++) {
                var line = data[i];
                var txt = "<div class='record_list'><i class='material-icons close'>close</i><div class='record_list_date'>";
                txt = txt + line["date"] + "<br>";
                txt = txt + "</div><div class='record_list_data none'>" + line["text"] + "<br></div></div>";
                $(".record_list_wrap").append(txt);
              }

              $(".record_list").click(function(){

    if($(this).find(".record_list_date").hasClass("none")){
      $(this).find(".record_list_date").removeClass("none");
      $(this).find(".record_list_data").addClass("none");
      return;
    }

    $(".record_list").each(function(v,c){
        $(c).find(".record_list_data").addClass("none");
        $(c).find(".record_list_date").removeClass("none");
    });
      $(this).find(".record_list_date").addClass("none");
      $(this).find(".record_list_data").removeClass("none");
  });

              
              var fd = new FormData();
              fd.append('status', "end");
              axios({
                method: 'post',
                url: '/teampe/index.php/MyFunction/recording',
                data: fd
              }).then(function(){
                $(".waiting").hide();
              });
            });


      }


      