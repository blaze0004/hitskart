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


	function getYS($username){
		global $site;
		$get = @get_data("http://yousecond.net/api_v2.php?method=getUser&username=".$username);
		$return = json_decode($get, true);

		return $return;
	}

	$YSData = getYS($url);
	if(!$YSData['user_id']){
		$msg = '<div class="msg"><div class="error">'.$lang['ys_03'].'</div></div>';
	}else{
		$num = $db->QueryGetNumRows("SELECT id FROM `yousecond` WHERE `ys_id`='".$YSData['user_id']."'");
		if($num > 0){
			$msg = '<div class="msg"><div class="error">'.$lang['ys_02'].'</div></div>';
		}else{
			$db->Query("INSERT INTO `yousecond` (user, ys_id, url, title, p_av, cpc, country, sex) VALUES('".$data['id']."', '".$YSData['user_id']."', '".$YSData['user_name']."', '".$YSData['full_name']."', '".$YSData['photo_50']."', '".$cpc."', '".$country."', '".$gender."') ");
			$msg = '<div class="msg"><div class="success">'.$lang['ys_04'].'</div></div>';
			$error = 0;
		}
	}
}
?>