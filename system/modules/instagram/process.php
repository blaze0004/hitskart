<?
define('BASEPATH', true);
require_once('../../config.php');
if(!$is_online){exit;}

function get_followers($instaID){
	global $site;
	$get = @get_data("https://api.instagram.com/v1/users/".$instaID."?client_id=".$site['instagram_id']);
	$get = json_decode($get, true);
	return $get['data']['counts']['followed_by'];
}

if(isset($_POST['get']) && $_POST['pid'] > 0){
	$pid = $db->EscapeString($_POST['pid']);
	$sit = $db->QueryFetchArray("SELECT inst_id FROM `instagram` WHERE `id`='".$pid."'");
	$key = get_followers($sit['inst_id']);

	if($db->QueryGetNumRows("SELECT ses_key FROM `module_session` WHERE `user_id`='".$data['id']."' AND `page_id`='".$pid."' AND `module`='instagram'") == 0){
		$result	= $db->Query("INSERT INTO `module_session` (`user_id`,`page_id`,`ses_key`,`module`,`timestamp`)VALUES('".$data['id']."','".$pid."','".$key."','instagram','".time()."')");
	}else{
		$result	= $db->Query("UPDATE `module_session` SET `ses_key`='".$key."' WHERE `user_id`='".$data['id']."' AND `page_id`='".$pid."' AND `module`='instagram'");
	}

	if($result){
		echo '1';
	}
}elseif(isset($_POST['step']) && $_POST['step'] == "skip" && is_numeric($_POST['sid']) && !empty($data['id'])){
	$id = $db->EscapeString($_POST['sid']);

	if($db->QueryGetNumRows("SELECT site_id FROM `instagram_done` WHERE `user_id`='".$data['id']."' AND `site_id`='".$id."'") == 0){
		$db->Query("INSERT INTO `instagram_done` (user_id, site_id) VALUES('".$data['id']."', '".$id."')");
		echo '<div class="msg"><div class="info">'.$lang['inst_13'].'</div></div>';
	}
}

if(isset($_POST['id'])){
	$uid = $db->EscapeString($_POST['id']);
	$sit = $db->QueryFetchArray("SELECT id,user,inst_id,url,cpc FROM `instagram` WHERE `id`='".$uid."'");
	
	$mod_ses = $db->QueryFetchArray("SELECT ses_key FROM `module_session` WHERE `user_id`='".$data['id']."' AND `page_id`='".$sit['id']."' AND `module`='instagram'");
	$ses_key = get_followers($sit['inst_id']);

	$valid = false;
	if($mod_ses['ses_key'] != '' && $ses_key > $mod_ses['ses_key']){
		$valid = true;
	}
	
	if($valid && !empty($uid) && !empty($data['id']) && $sit['cpc'] >= 2){	
		$plused = $db->QueryGetNumRows("SELECT site_id FROM `instagram_done` WHERE `site_id`='".$uid."' AND `user_id`='".$data['id']."'");

		if($plused == 0) {
			$db->Query("UPDATE `users` SET `coins`=`coins`+'".($sit['cpc']-1)."' WHERE `id`='".$data['id']."'");
			$db->Query("UPDATE `users` SET `coins`=`coins`-'".$sit['cpc']."' WHERE `id`='".$sit['user']."'");
			$db->Query("UPDATE `instagram` SET `clicks`=`clicks`+'1' WHERE `id`='".$uid."'");
			$db->Query("UPDATE `web_stats` SET `value`=`value`+'1' WHERE `module_id`='instagram'");
			$db->Query("INSERT INTO `instagram_done` (user_id, site_id) VALUES('".$data['id']."', '".$uid."')");
			$db->Query("DELETE FROM `module_session` WHERE `user_id`='".$data['id']."' AND `page_id`='".$sit['id']."' AND `module`='instagram'");
			$db->Query("UPDATE `module_session` SET `ses_key`='".$ses_key."' WHERE (`page_id`='".$sit['id']."' AND `module`='instagram') AND `ses_key`='".($ses_key-1)."'");

			if($db->QueryGetNumRows("SELECT uid FROM `user_clicks` WHERE `uid`='".$data['id']."' AND `module`='instagram' LIMIT 1") == 0){
				$db->Query("INSERT INTO `user_clicks` (`uid`,`module`,`total_clicks`,`today_clicks`)VALUES('".$data['id']."','instagram','1','1')");
			}else{
				$db->Query("UPDATE `user_clicks` SET `total_clicks`=`total_clicks`+'1', `today_clicks`=`today_clicks`+'1' WHERE `uid`='".$data['id']."' AND `module`='instagram'");
			}
			echo '1';
		}else{
			echo '2';
		}
	}else{
		echo '0';
	}
}
$db->Close();
?>