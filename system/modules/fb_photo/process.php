<?
define('BASEPATH', true);
include('../../config.php');
if(!$is_online){ echo '<div class="msg"><div class="error">'.$lang['fbp_06'].'</div></div>'; exit; }

if(!empty($site['fb_app_id']) && !empty($site['fb_app_secret'])){
	require_once('../../libs/fb/facebook.php');
	$facebook = new Facebook(array(
		   'appId'  => $site['fb_app_id'],
		   'secret' => $site['fb_app_secret'],
	));
	function get_likes($id){
		global $facebook;
		try {
			$param = array(
				'method'   => 'fql.query',
				'query'    => "SELECT like_info FROM photo WHERE object_id='".$id."'",
				'callback' => ''
			);
			$response = $facebook->api($param);
			$likes = $response[0]['like_info']['like_count'];
		} catch (FacebookApiException $e) {
			$url = get_data('https://graph.facebook.com/fql?q=SELECT+like_info+FROM+photo+WHERE+object_id='.$id);
			$result = json_decode($url, true);
			$likes = $result['data'][0]['like_info']['like_count'];
		}
		return (empty($likes) ? '0' : $likes);
	}
}else{
	function get_likes($id){
		$url = get_data('https://graph.facebook.com/fql?q=SELECT+like_info+FROM+photo+WHERE+object_id='.$id);
		$result = json_decode($url, true);
		$likes = $result['data'][0]['like_info']['like_count'];
		return (empty($likes) ? '0' : $likes);
	}
}

if(isset($_POST['get']) && $_POST['pid'] > 0){
	$pid = $db->EscapeString($_POST['pid']);
	$sit = $db->QueryFetchArray("SELECT url FROM `fb_photo` WHERE `id`='".$pid."'");
	$key = get_likes($sit['url']);

	$ses_check = $db->QueryFetchArray("SELECT COUNT(*) AS `total` FROM `module_session` WHERE `user_id`='".$data['id']."' AND `page_id`='".$pid."' AND `module`='fb_photo'");
	if($ses_check['total'] == 0){
		$result	= $db->Query("INSERT INTO `module_session` (`user_id`,`page_id`,`ses_key`,`module`,`timestamp`)VALUES('".$data['id']."','".$pid."','".$key."','fb_photo','".time()."')");
	}else{
		$result	= $db->Query("UPDATE `module_session` SET `ses_key`='".$key."' WHERE `user_id`='".$data['id']."' AND `page_id`='".$pid."' AND `module`='fb_photo'");
	}

	if($result){
		echo '1';
	}
}elseif(isset($_POST['step']) && $_POST['step'] == "skip" && is_numeric($_POST['sid']) && !empty($data['id'])){
	$id = $db->EscapeString($_POST['sid']);

	if($db->QueryGetNumRows("SELECT site_id FROM `fbp_liked` WHERE `user_id`='".$data['id']."' AND `site_id`='".$id."'") == 0){
		$db->Query("INSERT INTO `fbp_liked` (user_id, site_id) VALUES('".$data['id']."', '".$id."')");
		echo '<div class="msg"><div class="info">'.$lang['fbp_03'].'</div></div>';
	}
}

if(isset($_POST['id'])){
	$id = $db->EscapeString($_POST['id']);
	$sit = $db->QueryFetchArray("SELECT id,user,url,cpc FROM `fb_photo` WHERE `id`='".$id."'");
	
	$mod_ses = $db->QueryFetchArray("SELECT ses_key FROM `module_session` WHERE `user_id`='".$data['id']."' AND `page_id`='".$sit['id']."' AND `module`='fb_photo'");
	$ses_key = get_likes($sit['url']);
	
	$valid = false;
	if($mod_ses['ses_key'] != '' && $ses_key > $mod_ses['ses_key']){
		$valid = true;
	}

	if($valid && !empty($id) && !empty($data['id']) && $sit['cpc'] >= 2){
		$check = $db->QueryGetNumRows("SELECT site_id FROM `fbp_liked` WHERE `user_id`='".$data['id']."' AND `site_id`='".$sit['id']."'");

		if($check == 0){
			$db->Query("UPDATE `users` SET `coins`=`coins`+'".($sit['cpc']-1)."' WHERE `id`='".$data['id']."'");
			$db->Query("UPDATE `users` SET `coins`=`coins`-'".$sit['cpc']."' WHERE `id`='".$sit['user']."'");
			$db->Query("UPDATE `fb_photo` SET `clicks`=`clicks`+'1' WHERE `id`='".$id."'");
			$db->Query("UPDATE `web_stats` SET `value`=`value`+'1' WHERE `module_id`='fb_photo'");
			$db->Query("INSERT INTO `fbp_liked` (user_id, site_id) VALUES('".$data['id']."','".$sit['id']."')");
			$db->Query("DELETE FROM `module_session` WHERE `user_id`='".$data['id']."' AND `page_id`='".$sit['id']."' AND `module`='fb_photo'");
			$db->Query("UPDATE `module_session` SET `ses_key`='".$ses_key."' WHERE (`page_id`='".$sit['id']."' AND `module`='fb_photo') AND `ses_key`='".($ses_key-1)."'");

			if($db->QueryGetNumRows("SELECT uid FROM `user_clicks` WHERE `uid`='".$data['id']."' AND `module`='fb_photo' LIMIT 1") == 0){
				$db->Query("INSERT INTO `user_clicks` (`uid`,`module`,`total_clicks`,`today_clicks`)VALUES('".$data['id']."','fb_photo','1','1')");
			}else{
				$db->Query("UPDATE `user_clicks` SET `total_clicks`=`total_clicks`+'1', `today_clicks`=`today_clicks`+'1' WHERE `uid`='".$data['id']."' AND `module`='fb_photo'");
			}
			echo '1';
		}else{
			echo '0';
		}
	}else{
		echo '0';
	}
}
$db->Close();
?>