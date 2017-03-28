<?php
require("customerInfo.php");
require("eventInfo.php");

function generateLinkFirstAuthen($user_id) {
	$prefix = 'http://10.104.140.84/streambot/verify.php?vid=';
	$vid = openssl_encrypt($user_id, 'AES-256-CFB1', $GLOBALS['secretKey']);

	return $link;
}

function checkAuthen($user_id) {
	#check exist database column relate non id
	return false;
}	
	
$lineAccessToken = 'HDiruK9K/K09WbejYErmIWSo9b/SsJN6N1QcqEScxLpMUcuUUtxffEje9mDQfFP69l+G7ZA687fov56fCi+R8iWD1PeomMhTf+SKRX1XYc121pIECUv1vLa8nFxiUN2Xp51LcxL6MwaUimegE/JviwdB04t89/1O/w1cDnyilFU=';
$secretKey = "M3jXaT8dExioP8v8kGurjeAveDdbh0TR14ePxySGO713Je";

$content = file_get_contents('php://input');
$events = json_decode($content, true);

$user_id = 'hiphip';
$customer_id = '8800000000';
$replyToken = '';


$myfile = fopen("ccc.txt", "a") or die("Unable to open file!");
fwrite($myfile, json_encode($events));
fclose($myfile);


if (!is_null($events['events'])) {
	foreach ($events['events'] as $event) {
		$event = new EventInfo($event);
		if(checkAuthen($user_id)) {
			$customer = new CustomerInfo($customer_id, $event->getReplyToken());
			$fault = $customer->getFault();
			$message = $fault;
			if($fault) {
				$event->responseChat($token, $message);
			} else {
				$event->responseChat($token, $message);
			}

		} else {

			$message = generateLinkFirstAuthen($event->getSourceUserId());
			echo $message;
			$event->responseChat($token, $message);

		}
	}
}



?>