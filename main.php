<?php
require("customerInfo.php");
require("eventInfo.php");

function generateLinkFirstAuthen($user_id) {
	$prefix = 'http://10.104.140.84/streambot/verify.php?vid=';
	$vid = openssl_encrypt($user_id, 'AES-256-CFB1', $GLOBALS['secretKey']);
	$link = $prefix . $vid;
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


$myfile = fopen("event.txt", "a") or die("Unable to open file!");
fwrite($myfile, json_encode($events));
fclose($myfile);


if (!is_null($events['events'])) {
	foreach ($events['events'] as $event) {
		$event = new EventInfo($event);
		if(checkAuthen($user_id)) {
			$customer = new CustomerInfo($customer_id, $event->getReplyToken());

			$myfile = fopen("customer.txt", "a") or die("Unable to open file!");
			fwrite($myfile, json_encode($customer));
			fclose($myfile);

			$fault = $customer->getFault();
			$message = $fault;
			if($fault) {
				$event->responseChat($lineAccessToken, $message);
			} else {
				$event->responseChat($lineAccessToken, $message);
			}

		} else {

			$message = generateLinkFirstAuthen($event->getSourceUserId());
			$myfile = fopen("m.txt", "a") or die("Unable to open file!");
			fwrite($myfile, json_encode($message));
			fclose($myfile);
			$event->responseChat($lineAccessToken, $message);

		}
	}
}



?>