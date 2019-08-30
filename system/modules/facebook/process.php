<?
define('BASEPATH', true);
require_once('../../config.php');
if(!$is_online){ echo '<div class="msg"><div class="error">'.$lang['fb_06'].'</div></div>'; exit; }

function get_fbuser($fb_url){
	$url = explode('/', $fb_url);
	$url = (!empty($url[5]) ?$url[5] : $url[3]);
	if(preg_match("|^(.*)#(.*)|i", $url)){
		$id = explode('#', $url);
		$url = (!empty($id[0]) ? $id[0] : $url);
	}elseif(preg_match("|^(.*)?(.*)|i", $url)){
		$id = explode('?', $url);
		$url = (!empty($id[0]) ? $id[0] : $url);
	}
	return $url;
}

function rev_url($url, $dis = 1){
	if($dis == 0){
		$reverse = reverse_url($url);
		if(preg_match("/Location\:/",$reverse)){
			$url = explode("Location: ",$reverse);
			$url = explode("\r",$url[1]);
			$url = $url[0];
		}
	}
	return $url;
}

if(!empty($site['fb_app_id']) && !empty($site['fb_app_secret'])){
	require_once('../../libs/fb/facebook.php');
	$facebook = new Facebook(array(
		   'appId'  => $site['fb_app_id'],
		   'secret' => $site['fb_app_secret'],
		   'cookie' => true,
	));
	function get_likes($url, $type = 1){
		global $facebook;
		if($type == 2){
			$fbtype = (preg_match("|^http(s)?://(.*)facebook.([a-z]+)/(.*)?$|i", $url) ? 1 : 0);
			$url = rev_url($url, $fbtype);
			try {
				$param = array(
					'method'   => 'fql.query',
					'query'    => "SELECT like_count FROM link_stat WHERE url='".urlencode($url)."'",
					'callback' => ''
				);
				$response = $facebook->api($param);
				$likes = $response[0]['like_count'];
			} catch (FacebookApiException $e) {
				$url = get_data("https://graph.facebook.com/fql?q=SELECT+like_count+FROM+link_stat+WHERE+url='".urlencode($url)."'");
				$result = json_decode($url, true);
				$likes = $result['data'][0]['like_count'];
			}
			return (empty($likes) ? '0' : $likes);
		}else{
			$type = (is_numeric($url) ? 'page_id' : 'username');
			try {
				$param = array(
					'method'   => 'fql.query',
					'query'    => "SELECT fan_count FROM page WHERE ".$type."='".$url."'",
					'callback' => ''
				);
				$response = $facebook->api($param);
				$likes = $response[0]['fan_count'];
			} catch (FacebookApiException $e) {
				$url = get_data("https://graph.facebook.com/fql?q=SELECT+fan_count+FROM+page+WHERE+".$type."='".$url."'");
				$likes = json_decode($url, true);
				$likes = $likes['data'][0]['fan_count'];
			}
			return (empty($likes) ? '0' : $likes);
		}
	}
}else{
	function get_likes($url, $type = 1){
		if($type == 2){
			$fbtype = (preg_match("|^http(s)?://(.*)facebook.([a-z]+)/(.*)?$|i", $url) ? 1 : 0);
			$url = rev_url($url, $fbtype);
			$url = get_data("https://graph.facebook.com/fql?q=SELECT+like_count+FROM+link_stat+WHERE+url='".urlencode($url)."'");
			$result = json_decode($url, true);
			$likes = $result['data'][0]['like_count'];
			return (empty($likes) ? '0' : $likes);
		}else{
			$type = (is_numeric($url) ? 'page_id' : 'username');
			$url = get_data("https://graph.facebook.com/fql?q=SELECT+fan_count+FROM+page+WHERE+".$type."='".$url."'");
			$likes = json_decode($url, true);
			$likes = $likes['data'][0]['fan_count'];
			return (empty($likes) ? '0' : $likes);
		}
	}
}

if(isset($_POST['get']) && $_POST['get'] == 1 && $_POST['pid'] > 0){
	$pid = $db->EscapeString($_POST['pid']);
	$sit = $db->QueryFetchArray("SELECT url FROM `facebook` WHERE `id`='".$pid."'");
	$key = get_likes(get_fbuser($sit['url']), 1);

	$ses_check = $db->QueryFetchArray("SELECT COUNT(*) AS `total` FROM `module_session` WHERE `user_id`='".$data['id']."' AND `page_id`='".$pid."' AND `module`='facebook'");
	if($ses_check['total'] < 1){
		$result	= $db->Query("INSERT INTO `module_session` (`user_id`,`page_id`,`ses_key`,`module`,`timestamp`)VALUES('".$data['id']."','".$pid."','".$key."','facebook','".time()."')");
	}else{
		$result	= $db->Query("UPDATE `module_session` SET `ses_key`='".$key."' WHERE `user_id`='".$data['id']."' AND `page_id`='".$pid."' AND `module`='facebook'");
	}

	if($result){
		echo '1';
	}
}elseif(isset($_POST['get']) && $_POST['get'] == 2 && $_POST['pid'] > 0){
	$pid = $db->EscapeString($_POST['pid']);
	$sit = $db->QueryFetchArray("SELECT url FROM `facebook` WHERE `id`='".$pid."'");
	$key = get_likes($sit['url'], 2);

	$ses_check = $db->QueryFetchArray("SELECT COUNT(*) AS `total` FROM `module_session` WHERE `user_id`='".$data['id']."' AND `page_id`='".$pid."' AND `module`='fb_web'");
	if($ses_check['total'] < 1){
		$result	= $db->Query("INSERT INTO `module_session` (`user_id`,`page_id`,`ses_key`,`module`,`timestamp`)VALUES('".$data['id']."','".$pid."','".$key."','fb_web','".time()."')");
	}else{
		$result	= $db->Query("UPDATE `module_session` SET `ses_key`='".$key."' WHERE `user_id`='".$data['id']."' AND `page_id`='".$pid."' AND `module`='fb_web'");
	}

	if($result){
		echo '1';
	}
}elseif(isset($_POST['step']) && $_POST['step'] == "skip" && is_numeric($_POST['sid']) && !empty($data['id'])){
	$id = $db->EscapeString($_POST['sid']);
	$check = $db->QueryFetchArray("SELECT COUNT(*) AS `total` FROM `liked` WHERE `user_id`='".$data['id']."' AND `site_id`='".$id."'");

	if($check['total'] < 1){
		$db->Query("INSERT INTO `liked` (user_id, site_id) VALUES('".$data['id']."', '".$id."')");
		echo '<div class="msg"><div class="info">'.$lang['fb_03'].'</div></div>';
	}
}

if(isset($_POST['type']) && $_POST['type'] == 1){
	if(isset($_POST['id'])){
		$id = $db->EscapeString($_POST['id']);
		$sit = $db->QueryFetchArray("SELECT id,user,url,cpc FROM `facebook` WHERE `id`='".$id."'");
		
		$mod_ses = $db->QueryFetchArray("SELECT ses_key FROM `module_session` WHERE `user_id`='".$data['id']."' AND `page_id`='".$sit['id']."' AND `module`='facebook'");
		$ses_key = get_likes(get_fbuser($sit['url']), 1);
		
		$valid = false;
		if($mod_ses['ses_key'] != '' && $ses_key > $mod_ses['ses_key']){
			$valid = true;
		}

		if($valid && !empty($id) && !empty($data['id']) && $sit['cpc'] >= 2){
			$check = $db->QueryFetchArray("SELECT COUNT(*) AS `total` FROM `liked` WHERE `user_id`='".$data['id']."' AND `site_id`='".$sit['id']."'");

			if($check['total'] == 0){
				$db->Query("UPDATE `users` SET `coins`=`coins`+'".($sit['cpc']-1)."' WHERE `id`='".$data['id']."'");
				$db->Query("UPDATE `users` SET `coins`=`coins`-'".$sit['cpc']."' WHERE `id`='".$sit['user']."'");
				$db->Query("UPDATE `facebook` SET `clicks`=`clicks`+'1' WHERE `id`='".$id."'");
				$db->Query("UPDATE `web_stats` SET `value`=`value`+'1' WHERE `module_id`='facebook'");
				$db->Query("INSERT INTO `liked` (user_id, site_id) VALUES('".$data['id']."','".$sit['id']."')");
				$db->Query("DELETE FROM `module_session` WHERE `user_id`='".$data['id']."' AND `page_id`='".$sit['id']."' AND `module`='facebook'");
				$db->Query("UPDATE `module_session` SET `ses_key`='".$ses_key."' WHERE (`page_id`='".$sit['id']."' AND `module`='facebook') AND `ses_key`='".($ses_key-1)."'");

				if($db->QueryGetNumRows("SELECT uid FROM `user_clicks` WHERE `uid`='".$data['id']."' AND `module`='facebook' LIMIT 1") == 0){
					$result	= $db->Query("INSERT INTO `user_clicks` (`uid`,`module`,`total_clicks`,`today_clicks`)VALUES('".$data['id']."','facebook','1','1')");
				}else{
					$result	= $db->Query("UPDATE `user_clicks` SET `total_clicks`=`total_clicks`+'1', `today_clicks`=`today_clicks`+'1' WHERE `uid`='".$data['id']."' AND `module`='facebook'");
				}

				echo '1';
			}else{
				echo '0';
			}
		}else{
			echo '0';
		}
	}
}else{
	if(isset($_POST['id'])){
		$id = $db->EscapeString($_POST['id']);
		$sit = $db->QueryFetchArray("SELECT id,user,url,cpc FROM `facebook` WHERE `id`='".$id."'");
		
		$mod_ses = $db->QueryFetchArray("SELECT ses_key FROM `module_session` WHERE `user_id`='".$data['id']."' AND `page_id`='".$sit['id']."' AND `module`='fb_web'");
		$ses_key = get_likes($sit['url'], 2);
		
		$valid = false;
		if($mod_ses['ses_key'] != '' && $ses_key > $mod_ses['ses_key']){
			$valid = true;
		}

		if($valid && !empty($id) && !empty($data['id']) && $sit['cpc'] >= 2){
			$check = $db->QueryFetchArray("SELECT COUNT(*) AS `total` FROM `liked` WHERE `user_id`='".$data['id']."' AND `site_id`='".$sit['id']."'");

			if($check['total'] == 0){
				$db->Query("UPDATE `users` SET `coins`=`coins`+'".($sit['cpc']-1)."' WHERE `id`='".$data['id']."'");
				$db->Query("UPDATE `users` SET `coins`=`coins`-'".$sit['cpc']."' WHERE `id`='".$sit['user']."'");
				$db->Query("UPDATE `facebook` SET `clicks`=`clicks`+'1' WHERE `id`='".$id."'");
				$db->Query("UPDATE `web_stats` SET `value`=`value`+'1' WHERE `module_id`='facebook'");
				$db->Query("INSERT INTO `liked` (user_id, site_id) VALUES('".$data['id']."','".$sit['id']."')");
				$db->Query("DELETE FROM `module_session` WHERE `user_id`='".$data['id']."' AND `page_id`='".$sit['id']."' AND `module`='fb_web'");
				$db->Query("UPDATE `module_session` SET `ses_key`='".$ses_key."' WHERE (`page_id`='".$sit['id']."' AND `module`='fb_web') AND `ses_key`='".($ses_key-1)."'");

				if($db->QueryGetNumRows("SELECT uid FROM `user_clicks` WHERE `uid`='".$data['id']."' AND `module`='facebook' LIMIT 1") == 0){
					$db->Query("INSERT INTO `user_clicks` (`uid`,`module`,`total_clicks`,`today_clicks`)VALUES('".$data['id']."','facebook','1','1')");
				}else{
					$db->Query("UPDATE `user_clicks` SET `total_clicks`=`total_clicks`+'1', `today_clicks`=`today_clicks`+'1' WHERE `uid`='".$data['id']."' AND `module`='facebook'");
				}

				echo '1';
			}else{
				echo '0';
			}
		}else{
			echo '0';
		}
	}
}
$db->Close();
?>