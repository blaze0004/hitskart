<?php
if(! defined('BASEPATH') ){ exit('Unable to view file.'); }
$url = $db->EscapeString($_POST['url']);

if(empty($url)){
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
	if(!preg_match("|^http(s)?://pinterest.com/(.*)?$|i", $url)){
		$msg = '<div class="msg"><div class="error">'.$lang['pin_01'].'</div></div>';
	}else{
		$pins = @get_data($url);
		$match = array(); 
		preg_match('/<meta property="og:image" name="og:image" content="(.*?)"/',$pins,$match);
		$puser['av'] = $match[1];
		preg_match('/<meta property="og:title" name="og:title" content="(.*?)"/',$pins,$match);
		$puser['title'] = $match[1];
		preg_match('/<meta property="og:url" name="og:url" content="(.*?)"/',$pins,$match);
		$extract = explode("/", $match[1]);
		$puser['url'] = $extract[3];

		if($db->QueryGetNumRows("SELECT id FROM `pinterest` WHERE `url`='".$puser['url']."'") > 0){
			$msg = '<div class="msg"><div class="error">'.$lang['pin_02'].'</div></div>';
		}elseif($puser['url'] == '' || $puser['title'] == ''){
			$msg = '<div class="msg"><div class="error">'.$lang['pin_03'].'</div></div>';
		}else{
			$db->Query("INSERT INTO `pinterest` (user, url, title, p_av, cpc) VALUES('".$data['id']."', '".$puser['url']."', '".$puser['title']."', '".$puser['av']."', '".$cpc."') ");
			$msg = '<div class="msg"><div class="success">'.$lang['pin_04'].'</div></div>';
			$error = 0;
		}
	}
}
?>