<?php
if(! defined('BASEPATH') ){ exit('Unable to view file.'); }
$url = $db->EscapeString($_POST['url']);
$title = $db->EscapeString($_POST['title']);

if(empty($title) || empty($url)){
	$msg = '<div class="msg"><div class="error">'.$lang['b_25'].'</div></div>';
}elseif(!preg_match('/^(http|https):\/\/[a-z0-9_]+([\-\.]{1}[a-z_0-9]+)*\.[_a-z]{2,5}'.'((:[0-9]{1,5})?\/.*)?$/i', $url)){
	$msg = '<div class="msg"><div class="error">'.$lang['b_27'].'</div></div>';
}elseif(!preg_match("/^[A-Za-z0-9-_.!?]([A-Za-z\s]*[A-Za-z0-9-_.!?()])*$/", $title)){
	$msg = '<div class="msg"><div class="error">'.$lang['b_28'].'</div></div>';
}elseif($_POST['cpc'] < 2 || $_POST['cpc'] > $maxcpc){
	$msg = '<div class="msg"><div class="error">'.lang_rep($lang['b_29'], array('-MIN-' => '2', '-MAX-' => $maxcpc)).'</div></div>';
}elseif($gender < 0 || $gender > 2) {
	$msg = '<div class="msg"><div class="error">'.$lang['b_219'].'</div></div>';
}elseif(!in_array($country, $ctrs) && $country != '0') {
	$msg = '<div class="msg"><div class="error">'.$lang['b_220'].'</div></div>';
}else{
	function getPhotoId($url)
	{
		$url_string = parse_url($url, PHP_URL_QUERY);
		parse_str($url_string, $args);
		return isset($args['fbid']) ? $args['fbid'] : false;
	}

	$pid = getPhotoId($url);
	if(!preg_match("|^http(s)?://(www.)?facebook.com/photo.php(.*)?$|i", $url) || !$pid){
		$msg = '<div class="msg"><div class="error">'.$lang['fbp_13'].'</div></div>';
	}elseif($db->GetNumRows($db->Query("SELECT * FROM `fb_photo` WHERE `url`='".$pid."'")) > 0){
		$msg = '<div class="msg"><div class="error">'.$lang['fbp_05'].'</div></div>';
	}else{

		function check_page($id){
			$url = get_data('https://graph.facebook.com/fql?q=SELECT+like_info+FROM+photo+WHERE+object_id='.$id);
			$result = json_decode($url, true);
			$likes = $result['data'][0]['like_info']['like_count'];
			if(is_numeric($likes) && $likes >= 0){
				return true;
			}else{
				return false;
			}
		}
		
		function get_img($id){
			$url = get_data('https://graph.facebook.com/fql?q=SELECT+src_small+FROM+photo+WHERE+object_id='.$id);
			$result = json_decode($url, true);
			return $result['data'][0]['src_small'];
		}

		if(!check_page($pid)){
			$msg = '<div class="msg"><div class="error">'.$lang['fbp_01'].'</div></div>';
		}else{
			$img = get_img($pid);
			$db->Query("INSERT INTO `fb_photo` (user, url, title, img, cpc, country, sex) VALUES('".$data['id']."', '".$pid."', '".$title."', '".$img."', '".$cpc."', '".$country."', '".$gender."') ");
			$msg = '<div class="msg"><div class="success">'.$lang['fbp_02'].'</div></div>';
			$error = 0;
		}
	}
}
?>