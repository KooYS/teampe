<!DOCTYPE html>
<html>
  <head>
    <title>Google Picker Example</title>

    <script type="text/javascript">

    // The Browser API key obtained from the Google API Console.
    // Replace with your own Browser API key, or your own key.
    var developerKey = 'AIzaSyByvf5SaohOQC2Ajx0ih7NC1wum4O8oSFk';

    // The Client ID obtained from the Google API Console. Replace with your own Client ID.
    var clientId = "1042659178211-ss6s7ab0hifp7pfhtin9eslp74u92qbh.apps.googleusercontent.com"

    // Replace with your own project number from console.developers.google.com.
    // See "Project number" under "IAM & Admin" > "Settings"
    var appId = "teampe-1e388";

    // Scope to use to access user's Drive items.
    var scope = ['https://www.googleapis.com/auth/drive'];

    var pickerApiLoaded = false;

    // Use the Google API Loader script to load the google.picker script.
    function loadPicker() {
      gapi.load('auth', {'callback': onAuthApiLoad});
      gapi.load('picker', {'callback': onPickerApiLoad});
    }

    function onAuthApiLoad() {
      window.gapi.auth.authorize(
          {
            'client_id': clientId,
            'scope': scope,
            'immediate': false
          },
          handleAuthResult);
    }

    function onPickerApiLoad() {
      var url_string = window.location.href; //
      var url = new URL(url_string);
      window.oauthToken = url.searchParams.get("Authcode");
      pickerApiLoaded = true;
      createPicker();
    }

    function onPickerApiLoad_web() {
        pickerApiLoaded = true;
        createPicker();
      }



    function handleAuthResult(authResult) {
      if (authResult && !authResult.error) {
        window.oauthToken = authResult.access_token;
        createPicker();
      }
    }

    // Create and render a Picker object for searching images.
    function createPicker() {
      if (pickerApiLoaded && window.oauthToken) {
        var view = new google.picker.View(google.picker.ViewId.DOCS);
        view.setMimeTypes("image/png,image/jpeg,image/jpg");
        var picker = new google.picker.PickerBuilder()
            .enableFeature(google.picker.Feature.NAV_HIDDEN)
            .enableFeature(google.picker.Feature.MULTISELECT_ENABLED)
            .setAppId(appId)
            .setOAuthToken(window.oauthToken)
            .addView(view)
            .addView(new google.picker.DocsUploadView())
            // .setDeveloperKey(developerKey)
            .setCallback(pickerCallback)
            .build();
         picker.setVisible(true);
      }
    }

    function share(url,fileId){
        var fetch_url = "https://www.googleapis.com/drive/v3/files/"+fileId+"/permissions?key=" + window.oauthToken;
        fetch(fetch_url, {
              method: "POST",
              headers: new Headers({
                  Authorization: "Bearer "+ window.oauthToken,
                  Accept : "application/json",
                  'Content-Type' : "application/json"
              }),
               body: JSON.stringify({role: "reader", "type": 'anyone'})
          }).then( response => {
            
          });

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

        google_share_url = "google_share://" + url;
        database.ref(ref_data).set(escape(google_share_url));
        // console.log(title,description,img);
    }


    // A simple callback implementation.
    function pickerCallback(data) {
      if (data.action == google.picker.Action.PICKED) {
        var fileId = data.docs[0].id;
         
        
          
          share('https://drive.google.com/open?id=' + fileId,fileId);

        // https://drive.google.com/uc?export=download&id=0B0CqY3Ik-JVjN2tYY3dVeDNiaFRxNE92MkpTZnNkakVRZEVv
        
      }
    }
    </script>
  </head>
  <body>
    <div id="result"></div>

    <!-- The Google API Loader script. -->
    <script type="text/javascript" src="https://apis.google.com/js/api.js"></script>
  </body>

    
</html>