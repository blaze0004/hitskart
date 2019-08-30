<?
define('BASEPATH', true);
require_once('../../config.php');
if(!$is_online){exit;}

function get_followers($url){
	$url = 'http://pinterest.com/'.$url.'/';
	$url = get_data($url);
	preg_match('/<meta property="pinterestapp:followers" name="pinterestapp:followers" content="(.*?)"/',$url,$result);
	$return = preg_replace("/[^\d]/", "", $result[1]);
	return $return;
}

if(isset($_POST['get']) && !empty($_POST['url']) && $_POST['pid'] > 0){
	$pid = $db->EscapeString($_POST['pid']);
	$sit = $db->FetchArray($db->Query("SELECT url FROM `pinterest` WHERE `id`='".$pid."'"));
	$key = get_followers($sit['url']);

	if($db->QueryGetNumRows("SELECT ses_key FROM `module_session` WHERE `user_id`='".$data['id']."' AND `page_id`='".$pid."' AND `module`='pinterest'") == 0){
		$result	= $db->Query("INSERT INTO `module_session` (`user_id`,`page_id`,`ses_key`,`module`,`timestamp`)VALUES('".$data['id']."','".$pid."','".$key."','pinterest','".time()."')");
	}else{
		$result	= $db->Query("UPDATE `module_session` SET `ses_key`='".$key."' WHERE `user_id`='".$data['id']."' AND `page_id`='".$pid."' AND `module`='pinterest'");
	}

	if($result){
		echo '1';
	}
}elseif(isset($_POST['step']) && $_POST['step'] == "skip" && is_numeric($_POST['sid']) && !empty($data['id'])){
	$id = $db->EscapeString($_POST['sid']);
	if($db->QueryGetNumRows("SELECT site_id FROM `pinterested` WHERE `user_id`='".$data['id']."' AND `site_id`='".$id."'") == 0){
		$db->Query("INSERT INTO `pinterested` (user_id, site_id) VALUES('".$data['id']."', '".$id."')");
		echo '<div class="msg"><div class="info">'.$lang['pin_13'].'</div></div>';
	}
}

if(isset($_POST['id'])){
	$uid = $db->EscapeString($_POST['id']);
	$sit = $db->FetchArray($db->Query("SELECT id,user,url,cpc FROM `pinterest` WHERE `id`='".$uid."'"));

	$mod_ses = $db->FetchArray($db->Query("SELECT ses_key FROM `module_session` WHERE `user_id`='".$data['id']."' AND `page_id`='".$sit['id']."' AND `module`='pinterest'"));
	$valid = false;
	if($mod_ses['ses_key'] != '' && get_followers($sit['url']) > $mod_ses['ses_key']){
		$valid = true;
	}

	if($valid && !empty($uid) && !empty($data['id'])){	
		$plused = $db->QueryGetNumRows("SELECT site_id FROM `pinterested` WHERE `site_id`='".$uid."' AND `user_id`='".$data['id']."'");

		if($plused < 1 && $sit['cpc'] >= 2) {
			$db->Query("UPDATE `users` SET `coins`=`coins`+'".($sit['cpc']-1)."' WHERE `id`='".$data['id']."'");
			$db->Query("UPDATE `users` SET `coins`=`coins`-'".$sit['cpc']."' WHERE `id`='".$sit['user']."'");
			$db->Query("UPDATE `pinterest` SET `clicks`=`clicks`+'1' WHERE `id`='".$uid."'");
			$db->Query("UPDATE `web_stats` SET `value`=`value`+'1' WHERE `module_id`='pinterest'");
			$db->Query("INSERT INTO `pinterested` (user_id, site_id) VALUES('".$data['id']."', '".$uid."')");
			$db->Query("DELETE FROM `module_session` WHERE `user_id`='".$data['id']."' AND `page_id`='".$sit['id']."' AND `module`='pinterest'");

			if($db->QueryGetNumRows("SELECT uid FROM `user_clicks` WHERE `uid`='".$data['id']."' AND `module`='pinterest' LIMIT 1") == 0){
				$db->Query("INSERT INTO `user_clicks` (`uid`,`module`,`total_clicks`,`today_clicks`)VALUES('".$data['id']."','pinterest','1','1')");
			}else{
				$db->Query("UPDATE `user_clicks` SET `total_clicks`=`total_clicks`+'1', `today_clicks`=`today_clicks`+'1' WHERE `uid`='".$data['id']."' AND `module`='pinterest'");
			}
			echo '1';
		}else{
			echo '2';
		}
	}else{
		echo '0';
	}
}
?>