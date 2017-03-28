<?php 
	
	# get ip query database get customer id 

	$secretKey = "M3jXaT8dExioP8v8kGurjeAveDdbh0TR14ePxySGO713Je";

	$vid = $_GET['vid'];
	$user_id = openssl_decrypt($vid, 'AES-256-CFB1', $GLOBALS['secretKey']);
	echo 'SUCCESS';

	# stamp user_id, customer_id 
?>