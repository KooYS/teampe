

<?php 
  
  function send_notification ($tokens)
  {

    $url = 'https://fcm.googleapis.com/fcm/send';
    $fields = array(
       'registration_ids' => array($tokens),
       'notification' => array("sound" => "default" , "title" => "팀프" , "body" => "테스트1234")
      );

    $headers = array(
      'Authorization:key =' . "AAAAOWSubfs:APA91bFg-JkBEnZKwCF8xzZMh0Ns-cfYfPiQ5hphh_sUkAtp5p1OJKIxSHJJcuz_ftTwbI8zcCCiofba4abYyUlXzCO_KzKrnOYvsBVEo7IMAP7NyF1_TolaJ1cza3ax--yJADxalzas",
      'Content-Type: application/json'
      );

     $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
       $result = curl_exec($ch);           
       if ($result === FALSE) {
           die('Curl failed: ' . curl_error($ch));
       }
       var_dump($result);
       curl_close($ch);
       return $result;
  }
  

  //데이터베이스에 접속해서 토큰들을 가져와서 FCM에 발신요청
  // $conn = mysqli_connect("http://52.79.64.192", "root", "password", "teampe");

  // $sql = "Select Token From usr Where id = 누른사람카톡아이디";

  // $result = mysqli_query($conn,$sql);


  if(isset($_POST["Token"])){
    $token = $_POST["Token"];
  }


  

  // $token = 'eVha9XVA2Ws:APA91bEAUZBSOjozqKtqPKv7Cozio9rec7EJaAeShhwP6YGLv8yNY5RGCqvelZ5xDTVbfLQW60zyhhfA0hIzXK5-9CLZT1-_Uh1iR6WKkx58yu_cMV7AXmyhiLXmUDsdMmmlF11zEgXf';
  // $tokens = array();

  // if(mysqli_num_rows($result) > 0 ){

  //   while ($row = mysqli_fetch_assoc($result)) {
  //     $tokens[] = $row["Token"];
  //   }
  // }

  // mysqli_close($conn);
  
//메시지가 투두리스트 해야할일 text, 
  $message_status = send_notification($token);


 ?>