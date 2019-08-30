<?php
if(!mysql_num_rows(mysql_query("SHOW TABLES LIKE 'pt_like'"))){executeSql("system/modules/pt_like/db.sql");}

register_filter('site_menu','pt_like_site_menu');
function pt_like_site_menu($menu) {
    $selected = "";
    if(isset($_GET["p"]) && $_GET["p"] == "pt_like")
    {
        $selected = 'selected';
    }
    else
    {
        $selected = 'value="pt_like"';
    }
	return $menu . '<option '.$selected.'>Pinterest Likes</a>';
}
register_filter('free_coins','pt_like_icon_free');
function pt_like_icon_free($freeicons) {
	return $freeicons . '<th align="center"><a href="p.php?p=pt_like"><img class="exchange_icon" src="img/icons/pinterest.png" alt="Pinterest" border="0" /><br/><p>Pinterest Likes</p></a></th></tr><tr>';
}
register_filter('free_coins_main','pt_like_icon_main');
function pt_like_icon_main($freeicons) {
	return $freeicons . '<th align="center"><a href="p.php?p=pt_like"><img class="exchange_icon" src="img/icons/pinterest.png" alt="Pinterest" border="0" /><br/><p>Pinterest Likes</p></a></th>';
}  
register_filter('add_site_select','pt_like_add_select');
function pt_like_add_select($menu) {
    if(isset($_POST["type"]) && $_POST["type"] == "pt_like")
    {
	    return $menu . "<option value='pt_like' selected>Pinterest Likes</option>";
    }
    else
    {
        return $menu . "<option value='pt_like'>Pinterest Likes</option>";
    }
}

register_filter('pt_like_info','pt_like_info');
function pt_like_info($type) {
    if($type == "db")
    {
        return "pt_like";
    }
    else if($type == "type")
    {
        return "Pinterest Likes";
    }
	else if($type == "name")
    {
        return "Pinterest Likes";
    }
}

register_filter('pt_like_dtf','pt_like_dtf');
function pt_like_dtf($type) {
    return "pt_like";
}

register_filter('stats','pt_like_stats');
function pt_like_stats($stats) {
	global $db;
	$sql = $db->Query("SELECT module_name,value FROM `web_stats` WHERE `module_id`='pt_like'");
	if($db->GetNumRows($sql) == 0){
		$result = $db->FetchArray($sql);
		$sql = $db->Query("SELECT SUM(`clicks`) AS `clicks` FROM `pt_like`");
		$clicks = $db->FetchArray($sql);
		$clicks = ($clicks['clicks'] > 0 ? $clicks['clicks'] : 0);
		$db->Query("INSERT INTO `web_stats` (`module_id`,`module_name`,`value`)VALUES('pt_like','Pinterest Likes','".$clicks."')");
	}else{
		$result = $db->FetchArray($sql);
		$clicks = ($result['value'] > 0 ? $result['value'] : 0);
	}

    $stat = $db->QueryGetNumRows("SELECT id FROM `pt_like`");
    return $stats . "<tr><td>".$result['module_name']."</td><td>".number_format($stat)."</td><td>".number_format($clicks)."</td></tr>";
}

register_filter('tot_clicks','pt_like_tot_clicks');
function pt_like_tot_clicks($stats) {
	global $db;
    $clicks = $db->FetchArray($db->Query("SELECT value FROM `web_stats` WHERE `module_id`='pt_like'"));
    if(empty($clicks['value']) && $clicks['value'] != '0'){
		$sql = $db->Query("SELECT SUM(`clicks`) AS `value` FROM `pt_like`");
		$clicks = $db->FetchArray($sql);
	}
	return $stats += ($clicks['value'] > 0 ? $clicks['value'] : 0);
}

register_filter('tot_sites','pt_like_tot_sites');
function pt_like_tot_sites($stats) {
	global $db;
    $clicks = $db->QueryGetNumRows("SELECT id FROM `pt_like`");
    return $stats += $clicks;
}

//Admin
register_filter('admin_s_sites','pt_like_admin_clicks');
function pt_like_admin_clicks($stats) {
	global $db;
	$clicks = $db->FetchArray($db->Query("SELECT value FROM `web_stats` WHERE `module_id`='pt_like'"));
	$clicks = ($clicks['value'] > 0 ? $clicks['value'] : 0);
	$today_clicks = $db->FetchArray($db->Query("SELECT SUM(today_clicks) AS value FROM `user_clicks` WHERE `module`='pt_like'"));
	$today_clicks = ($today_clicks['value'] > 0 ? $today_clicks['value'] : 0);
	$active = $db->QueryGetNumRows("SELECT id FROM `pt_like`");
	$inactive = $db->QueryGetNumRows("SELECT id FROM `pt_like` WHERE `active`!='0'");
	return $stats . '<div class="full-stats">
							<h2 class="center">Pinterest Likes</h2>
							<div class="stat circular" data-valueFormat="0,0" data-list=\'[{"title":"Pages","val":'.$active.',"percent":'.round((($active - $inactive)/$active)*100, 0).'},{"title":"Clicks","val":'.$clicks.',"percent":0},{"title":"Today Clicks","val":'.$today_clicks.',"percent":0}]\'></div>
						</div>';
}

register_filter('admin_s_menu','pt_like_admin_menu');
function pt_like_admin_menu($menu) {
	return $menu . '<li><a href="index.php?x=sites&s=pt_like">PT Likes</a></li>';
}
?>