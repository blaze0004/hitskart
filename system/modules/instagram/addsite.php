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


	function getInstaID($username){
		global $site;
		$username = strtolower($username);
		$url = "https://api.instagram.com/v1/users/search?q=".$username."&client_id=".$site['instagram_id'];
		$get = @get_data($url);
		$json = json_decode($get);

		foreach($json->data as $user){
			if($user->username == $username){
				return $user->id;
			}
		}
		return 0;
	}

	$instaID = getInstaID($url);
	if(!$instaID){
		$msg = '<div class="msg"><div class="error">'.$lang['inst_03'].'</div></div>';
	}else{
		$get = @get_data("https://api.instagram.com/v1/users/".$instaID."?client_id=".$site['instagram_id']);
		$iRes = json_decode($get, true);
		$follow_valid = ''.$iRes['data']['counts']['followed_by'].'';
		
		$num = $db->QueryGetNumRows("SELECT id FROM `instagram` WHERE `inst_id`='".$instaID."'");
		if($num > 0){
			$msg = '<div class="msg"><div class="error">'.$lang['inst_02'].'</div></div>';
		}elseif($follow_valid == ''){
			$msg = '<div class="msg"><div class="error">'.$lang['inst_01'].'</div></div>';
		}else{
			$db->Query("INSERT INTO `instagram` (user, inst_id, url, title, p_av, cpc, country, sex) VALUES('".$data['id']."', '".$instaID."', '".$db->EscapeString($iRes['data']['username'])."', '".$db->EscapeString($iRes['data']['full_name'])."', '".$iRes['data']['profile_picture']."', '".$cpc."', '".$country."', '".$gender."') ");
			$msg = '<div class="msg"><div class="success">'.$lang['inst_04'].'</div></div>';
			$error = 0;
		}
	}
}
?>