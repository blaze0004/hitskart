<?php
$starttime = microtime(true);
define('BASEPATH', true);
include('system/config.php');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type');

$check_value = $_SERVER['REMOTE_ADDR']; //lets use the customers ip to check for leads with.

$feedurl = 'http://www.cpagrip.com/common/lead_check_rss.php?user_id=9428&key=03c44cd9328863945e48667d13f43075&time=1day&check=ip&value='.$check_value;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $feedurl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$xml_string = curl_exec($ch);
curl_close($ch);
if($xml = simplexml_load_string($xml_string, 'SimpleXMLElement', LIBXML_NOCDATA)) {
	if($xml->lead_info->lead_found == 'true'){
		//we found a lead for the customer, lets tell the ajax caller script to redirect them.
		echo 'clearInterval(lead_check_timer);';
		echo 'alert("Lead completed, you may proceed.");'; //display a message box.
		if($data['offerreward'] == 0){$db->Query("UPDATE `users` SET `coins`='".$data['coins']."'+'points' WHERE `id`='".$data['id']."'");}
		if($data['offerreward'] == 1){{$db->Query("UPDATE `users` SET `account_balance`='".$data['account_balance']."'+'points' WHERE `id`='".$data['id']."'");}}
		echo 'location.reload();'; //redirect them to google.com.
	}else{
		echo 'alert("lead not found, "+ $points +" rechecking..");'; //not required but useful for debugging.
	}
}else{
	echo 'alert("Sorry, an error occured in lead check system, please try again later or contact the site administrator.");';
	echo 'clearInterval(lead_check_timer);';
}
?>
