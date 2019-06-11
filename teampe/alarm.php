#!/usr/bin/php
<?php

function send_notification ($tokens,$message)
  {

    $url = 'https://fcm.googleapis.com/fcm/send';
    $fields = array(
       'registration_ids' => array($tokens),
       'notification' => array("sound" => "default" , "title" => "팀프" , "body" =>  $message)
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



$conn = mysqli_connect("localhost:3306", "root", "password", "teampe");
$sql = "SELECT *,DATEDIFF(now(), `date1`) as day FROM `todolist` JOIN `usr` USING (`id`)";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)) {
  if($row['day'] == 0 && $row['complete'] != 1){
    send_notification($row['token'],$row['content']);
  }
}


?>
