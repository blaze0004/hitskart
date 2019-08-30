<?php
if(! defined('BASEPATH') ){ exit('Unable to view file.'); }
$url = $db->EscapeString($_POST['url']);

if(empty($url)){
	$msg = '<div class="msg"><div class="error">'.$lang['b_25'].'</div></div>';
}elseif($_POST['cpc'] < 2 || $_POST['cpc'] > $maxcpc){
	$msg = '<div class="msg"><div class="error">'.lang_rep($lang['b_29'], array('-MIN-' => '2', '-MAX-' => $maxcpc)).'</div></div>';
}elseif($gender < 0 || $gender > 2) {
	$msg = '<div class="msg"><div class="error">'.$lang['b_219'].'</div></div>';
}elseif(!in_array($country, $ctrs) && $country != '0') {
	$msg = '<div class="msg"><div class="error">'.$lang['b_220'].'</div></div>';
}else{
	function get_vk($username){
		$get = get_data('https://api.vk.com/method/groups.getById?gid='.$username.'');
		$result = json_decode($get, true);
		
		if(empty($result['response'][0]['gid']) || empty($result['response'][0]['screen_name'])){
			return false;
		}else{
			return $result;
		}
	}

	$vk_data = get_vk($url);
	if(!$vk_data){
		$msg = '<div class="msg"><div class="error">'.$lang['vkg_01'].'</div></div>';
	}elseif($vk_data['response'][0]['type'] != 'group'){
		$msg = '<div class="msg"><div class="error">'.$lang['vkg_13'].'</div></div>';
	}elseif($db->QueryGetNumRows("SELECT * FROM `vk_group` WHERE `vk_id`='".$vk_data['response'][0]['gid']."'") > 0){
		$msg = '<div class="msg"><div class="error">'.$lang['vkg_05'].'</div></div>';
	}else{
		$db->Query("INSERT INTO `vk_group` (user, url, vk_id, title, vk_photo, cpc, country, sex) VALUES('".$data['id']."', '".$vk_data['response'][0]['screen_name']."', '".$vk_data['response'][0]['gid']."', '".truncate($vk_data['response'][0]['name'], 50)."', '".$db->EscapeString($vk_data['response'][0]['photo'])."', '".$cpc."', '".$country."', '".$gender."')");
		$msg = '<div class="msg"><div class="success">'.$lang['vkg_02'].'</div></div>';
		$error = 0;
	}
}
?>