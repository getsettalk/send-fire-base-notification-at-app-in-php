<?php
$fcmToken = "e3itgNHdSb6bFhU3xhnalQ:APA91bEx43Z5FQ6HsoSqMP4GDNgOo9FZeSye7wqcYtmzBGf_NNKzcz2RXoxz-Ko7k7J2nMyDnJeln7Kb3AdaiUXGsVEXBC6QIoljjSFQRrfe8Z3FZQgWCw-lBbXJTpjKYCU7ZQb6sGGZ";
$fcmToken1="evRj4bfmTje42fqeRXxKkd:APA91bEtDDKUBQyy_4uOjeREfKsVagjEDZmII6SYjIqKSHwfmuPmL99Vprcz9euSp3niZJRKqESLS5PYSWDGWGGcbF8Iy25saLOfV9oOHSeOBU-oYaw4PbIv3DifrKyOIGESNJC1cxkn";
$serverKey = "AAAANhz38sE:APA91bG7SQYFBU8Fbg0rWyOK-L7aiN6k1RRpsbzmOjH-UZ3gDiPjbS-LGACcpulz0JJS6DsyF2GIxeXi9jrpYX_maDnnkq3HK-PBU5p7Qb9UxMavVB3vR51Jmc3NVRjtaGzy7mQDr6hi";

$url = "https://fcm.googleapis.com/fcm/send";
$token = array($fcmToken);
// $serverKey = $serverKey;
$title = "Notification title";
$body = "Hello I am from Sujeet";
$notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'badge' => '1');
$arrayToSend = array('to' => $fcmToken, 'notification' => $notification,'priority'=>'high');
// $arrayToSend = array('registration_ids' => $token, 'notification' => $notification,'priority'=>'high');  // when send multipal device than use ::registration_ids

$json = json_encode($arrayToSend);
$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization: key='. $serverKey;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
//Send the request
$response = curl_exec($ch);
//Close request
if ($response === FALSE) {
die('FCM Send Error: ' . curl_error($ch));
}
curl_close($ch);

