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
	$sql = $db->Query("SELECT id FROM `facebook` WHERE `url` LIKE '".$url."'");
	if($db->GetNumRows($sql) > 0){
		$msg = '<div class="msg"><div class="error">'.$lang['fb_05'].'</div></div>';
	}elseif(preg_match("|^http(s)?://(www.)?facebook.([a-z]+)/photo.php(.*)?$|i", $url)){
		$msg = '<div class="msg"><div class="error">'.$lang['fb_01'].'</div></div>';
	}elseif(preg_match("|^http(s)?://(www.)?facebook.([a-z]+)/browse/fanned_pages/(.*)?$|i", $url)){
		$msg = '<div class="msg"><div class="error"><b>ERROR:</b> That facebook page cannot be used in our system!</div></div>';
	}else{
		$fbtype = (preg_match("%^http(s)?://(www.)?facebook.([a-z]+)/(.*)?$%i", $url) ? 1 : 0);
		
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
		
		function fb_check($fb_url){
			$type = (is_numeric($fb_url) ? 'page_id' : 'username');
			$fb_url = @get_data("https://graph.facebook.com/fql?q=SELECT+fan_count+FROM+page+WHERE+".$type."='".$fb_url."'");
			$likes = json_decode($fb_url, true);
			$likes = $likes['data'][0]['fan_count'];
			if($likes != ''){
				return 1;
			}else{
				return 0;
			}
		}

		if($fbtype == 1 && fb_check(get_fbuser($url)) == 0){
			$msg = '<div class="msg"><div class="error"><b>ERROR:</b> That facebook page cannot be used in our system!</div></div>';
		}elseif($fbtype == 0 && blacklist_check($url, 2) == 1){
			$msg = '<div class="msg"><div class="error">'.lang_rep($lang['b_296'], array('-URL-' => $url)).'</div></div>';
		}elseif($fbtype == 1 && $db->QueryGetNumRows("SELECT id FROM `facebook` WHERE `url` LIKE '%".get_fbuser($url)."%' AND `type`='1'") > 0){
			$msg = '<div class="msg"><div class="error">'.$lang['fb_05'].'</div></div>';
		}else{
			$db->Query("INSERT INTO `facebook` (user, url, title, cpc, type, country, sex) VALUES('".$data['id']."', '".$url."', '".$title."', '".$cpc."', '".$fbtype."', '".$country."', '".$gender."') ");
			$msg = '<div class="msg"><div class="success">'.$lang['fb_02'].$likes.'</div></div>';
			$error = 0;
		}
	}
}
?>