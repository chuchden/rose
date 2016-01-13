<!DOCTYPE html>
<html>
<head>

  <title>Push Notification codelab</title>
  <link rel="manifest" href="manifest.json">
</head>

<body>

  <h1>Push Notification codelab</h1>

  <script src="main.js"></script>

</body>
</html>

<?php
//https://www.design19.org/blog/chrome-push-notifications/

ini_set('error_reporting', E_ALL);

define("GOOGLE_API_KEY", "AIzaSyBzgc8yiwKXDJK6B4gyl_B7qBPUQKarSlY");
define("GOOGLE_GCM_URL", "https://android.googleapis.com/gcm/send");



$reg_ids = 'fCwIM6rd2XM:APA91bFYFNsskN3NtZzxCb4qXDzZtz-e74yyhvkEn5d19kVja9WCyB7Xme3RScs0_Zu-2L1um_2YODC629vQp0LA1IfNV_zFE1iKhRfhRLwhcOY8JOu-wwjYoSe2CiuqP1VGCgLMMPK5';
$message = array(
	'name'=>'Push Demo',
	'short_name'=>'Push Demo'
);
	
	
	
	$url = 'https://android.googleapis.com/gcm/send';

        $fields = array(
            'registration_ids' => array($reg_ids),
            'data' => $message,
        );

        $headers = array(
            'Authorization: key='.GOOGLE_API_KEY,
            'Content-Type: application/json'
        );
        //print_r($headers);
        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        // Close connection
        curl_close($ch);
        echo $result;
?>


