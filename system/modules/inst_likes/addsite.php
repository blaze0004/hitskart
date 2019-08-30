<?php
if(! defined('BASEPATH') ){ exit('Unable to view file.'); }
$url = $db->EscapeString($_POST['url']);
$title = $db->EscapeString($_POST['title']);

if(empty($title) || empty($url)){
	$msg = '<div class="msg"><div class="error">'.$lang['b_25'].'</div></div>';
}elseif(!preg_match('/^(http|https):\/\/[a-z0-9_]+([\-\.]{1}[a-z_0-9]+)*\.[_a-z]{2,5}'.'((:[0-9]{1,5})?\/.*)?$/i', $url)){
	$msg = '<div class="msg"><div class="error">'.$lang['b_27'].'</div></div>';
}elseif($_POST['cpc'] < 2 || $_POST['cpc'] > $maxcpc){
	$msg = '<div class="msg"><div class="error">'.lang_rep($lang['b_29'], array('-MIN-' => '2', '-MAX-' => $maxcpc)).'</div></div>';
}elseif($gender < 0 || $gender > 2) {
	$msg = '<div class="msg"><div class="error">'.$lang['b_219'].'</div></div>';
}elseif(!in_array($country, $ctrs) && $country != '0') {
	$msg = '<div class="msg"><div class="error">'.$lang['b_220'].'</div></div>';
}else{


	function get_info($url){
		global $site;
		$get = @get_data("http://api.instagram.com/oembed?url=".$url."?client_id=".$site['instagram_id']);
		$get = json_decode($get, true);
		return $get['media_id'].'(||)'.$get['url'].'(||)'.$get['thumbnail_url'];
	}

	$instaInfo = get_info($url);
	$instaInfo = explode('(||)', $instaInfo);
	if(!$instaInfo[0]){
		$msg = '<div class="msg"><div class="error">'.$lang['inst_likes_03'].'</div></div>';
	}else{
		$get = @get_data("https://api.instagram.com/v1/media/".$instaInfo[0]."?client_id=".$site['instagram_id']);
		$iRes = json_decode($get, true);
		$likes_valid = ''.$iRes['data']['likes']['count'].'';
		
		$num = $db->QueryGetNumRows("SELECT id FROM `inst_likes` WHERE `inst_id`='".$instaInfo[0]."'");
		if($num > 0){
			$msg = '<div class="msg"><div class="error">'.$lang['inst_likes_02'].'</div></div>';
		}elseif($likes_valid == ''){
			$msg = '<div class="msg"><div class="error">'.$lang['inst_likes_01'].'</div></div>';
		}else{
			$db->Query("INSERT INTO `inst_likes` (user, inst_id, url, title, photo, cpc, country, sex) VALUES('".$data['id']."', '".$instaInfo[0]."', '".$iRes['data']['link']."', '".$title."', '".$instaInfo[2]."', '".$cpc."', '".$country."', '".$gender."') ");
			$msg = '<div class="msg"><div class="success">'.$lang['inst_likes_04'].'</div></div>';
			$error = 0;
		}
	}
}
?>