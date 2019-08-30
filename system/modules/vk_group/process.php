<?
define('BASEPATH', true);
require_once('../../config.php');
if(!$is_online){ echo '<div class="msg"><div class="error">'.$lang['vk_06'].'</div></div>'; exit; }

function get_followers($uid){
	$get = get_data('https://api.vk.com/method/groups.getById?gid='.$uid.'&fields=members_count');
	$result = json_decode($get, true);
	
	return $result['response'][0]['members_count'];
}

if(isset($_POST['get']) && $_POST['url'] != '' && $_POST['pid'] > 0){
	$pid = $db->EscapeString($_POST['pid']);
	$sit = $db->QueryFetchArray("SELECT vk_id FROM `vk_group` WHERE `id`='".$pid."'");
	$key = get_followers($sit['vk_id']);
	
	$ses_check = $db->QueryFetchArray("SELECT COUNT(*) AS `total` FROM `module_session` WHERE `user_id`='".$data['id']."' AND `page_id`='".$pid."' AND `module`='vk_group'");
	if($ses_check['total'] == 0){
		$result	= $db->Query("INSERT INTO `module_session` (`user_id`,`page_id`,`ses_key`,`module`,`timestamp`)VALUES('".$data['id']."','".$pid."','".$key."','vk_group','".time()."')");
	}else{
		$result	= $db->Query("UPDATE `module_session` SET `ses_key`='".$key."' WHERE `user_id`='".$data['id']."' AND `page_id`='".$pid."' AND `module`='vk_group'");
	}

	if($result){
		echo '1';
	}
}elseif(isset($_POST['step']) && $_POST['step'] == "skip" && is_numeric($_POST['sid']) && !empty($data['id'])){
	$id = $db->EscapeString($_POST['sid']);

	if($db->QueryGetNumRows("SELECT site_id FROM `vkg_done` WHERE `user_id`='".$data['id']."' AND `site_id`='".$id."'") == 0){
		$db->Query("INSERT INTO `vkg_done` (user_id, site_id) VALUES('".$data['id']."', '".$id."')");
		echo '<div class="msg"><div class="info">'.$lang['vk_03'].'</div></div>';
	}
}

if(isset($_POST['id'])){
	$id = $db->EscapeString($_POST['id']);
	$sit = $db->QueryFetchArray("SELECT id,user,url,vk_id,cpc FROM `vk_group` WHERE `id`='".$id."'");

	$mod_ses = $db->QueryFetchArray("SELECT ses_key FROM `module_session` WHERE `user_id`='".$data['id']."' AND `page_id`='".$sit['id']."' AND `module`='vk_group'");
	$ses_key = get_followers($sit['vk_id']);
	
	$valid = false;
	if($mod_ses['ses_key'] != '' && $ses_key > $mod_ses['ses_key']){
		$valid = true;
	}

	if($valid && !empty($id) && !empty($data['id']) && $sit['cpc'] >= 2){
		$check = $db->QueryGetNumRows("SELECT site_id FROM `vkg_done` WHERE `user_id`='".$data['id']."' AND `site_id`='".$sit['id']."'");
		
		if($check == 0){
			$db->Query("UPDATE `users` SET `coins`=`coins`+'".($sit['cpc']-1)."' WHERE `id`='".$data['id']."'");
			$db->Query("UPDATE `users` SET `coins`=`coins`-'".$sit['cpc']."' WHERE `id`='".$sit['user']."'");
			$db->Query("UPDATE `vk_group` SET `clicks`=`clicks`+'1' WHERE `id`='".$id."'");
			$db->Query("UPDATE `web_stats` SET `value`=`value`+'1' WHERE `module_id`='vk_group'");
			$db->Query("INSERT INTO `vkg_done` (user_id, site_id) VALUES('".$data['id']."','".$sit['id']."')");
			$db->Query("DELETE FROM `module_session` WHERE `user_id`='".$data['id']."' AND `page_id`='".$sit['id']."' AND `module`='vk_group'");
			$db->Query("UPDATE `module_session` SET `ses_key`='".$ses_key."' WHERE (`page_id`='".$sit['id']."' AND `module`='vk_group') AND `ses_key`='".($ses_key-1)."'");

			if($db->QueryGetNumRows("SELECT uid FROM `user_clicks` WHERE `uid`='".$data['id']."' AND `module`='vk_group' LIMIT 1") == 0){
				$db->Query("INSERT INTO `user_clicks` (`uid`,`module`,`total_clicks`,`today_clicks`)VALUES('".$data['id']."','vk_group','1','1')");
			}else{
				$db->Query("UPDATE `user_clicks` SET `total_clicks`=`total_clicks`+'1', `today_clicks`=`today_clicks`+'1' WHERE `uid`='".$data['id']."' AND `module`='vk_group'");
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