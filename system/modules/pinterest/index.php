<?php
if(!mysql_num_rows(mysql_query("SHOW TABLES LIKE 'pinterest'"))){executeSql("system/modules/pinterest/db.sql");}

register_filter('index_icons','pinterest_icon_on');
function pinterest_icon_on($icons) {
	return $icons . '<a href="p.php?p=pinterest"><img class="exchange_icon" src="img/icons/pinterest.png" alt="Pinterest" border="0" /></a>';
}

register_filter('index_icons_off','pinterest_icon_off');
function pinterest_icon_off($icons) {
	return $icons . '<img class="exchange_icon" src="img/icons/pinterest.png" alt="Pinterest" />';
}
register_filter('free_coins','pinterest_icon_free');
function pinterest_icon_free($freeicons) {
	return $freeicons . '<th align="center"><a href="p.php?p=pinterest"><img class="exchange_icon" src="img/icons/pinterest.png" alt="Pinterest" border="0" /><br/><p>Pinterest</p></a></th>';
}
register_filter('free_coins_main','pinterest_icon_main');
function pinterest_icon_main($freeicons) {
	return $freeicons . '<th align="center"><a href="p.php?p=pinterest"><img class="exchange_icon" src="img/icons/pinterest.png" alt="Pinterest" border="0" /><br/><p>Pinterest</p></a></th></tr><tr>';
}  
register_filter('site_menu','pinterest_site_menu');
function pinterest_site_menu($menu) {
    $selected = "";
    if(isset($_GET["p"]) && $_GET["p"] == "pinterest")
    {
        $selected = 'selected';
    }
    else
    {
        $selected = 'value="pinterest"';
    }
	return $menu . '<option '.$selected.'>Pinterest Followers</a>';
}

register_filter('top_menu_earn','pinterest_top_menu');
function pinterest_top_menu($menu) {
	$selected = (isset($_GET["p"]) && $_GET["p"] == "pinterest" ? ' active' : '');
	return $menu . '<div class="ucp_link'.$selected.'"><img class="exchange_icon" src="img/icons/pinterest.png" alt="Pinterest" align="left" border="0" /><a href="p.php?p=pinterest"><div>Pinterest</div></a></div>';
}

register_filter('add_site_select','pinterest_add_select');
function pinterest_add_select($menu) {
    return $menu . "<option value='pinterest'>Pinterest Followers</option>";
}

register_filter('pinterest_info','pinterest_info');
function pinterest_info($type) {
    if($type == "db")
    {
        return "pinterest";
    }
    else if($type == "type")
    {
        return "Pinterest";
    }
	else if($type == "name")
    {
        return "Pinterest Followers";
    }
}

register_filter('pinterest_dtf','pinterest_dtf');
function pinterest_dtf($type) {
    return "pinterest";
}

register_filter('stats','pinterest_stats');
function pinterest_stats($stats) {
	global $db;
	$sql = $db->Query("SELECT module_name,value FROM `web_stats` WHERE `module_id`='pinterest'");
	if($db->GetNumRows($sql) == 0){
		$result = $db->FetchArray($sql);
		$sql = $db->Query("SELECT SUM(`clicks`) AS `clicks` FROM `pinterest`");
		$clicks = $db->FetchArray($sql);
		$clicks = ($clicks['clicks'] > 0 ? $clicks['clicks'] : 0);
		$db->Query("INSERT INTO `web_stats` (`module_id`,`module_name`,`value`)VALUES('pinterest','Pinterest Followers','".$clicks."')");
	}else{
		$result = $db->FetchArray($sql);
		$clicks = ($result['value'] > 0 ? $result['value'] : 0);
	}

    $stat = $db->QueryGetNumRows("SELECT id FROM `pinterest`");
    return $stats . "<tr><td>".$result['module_name']."</td><td>".number_format($stat)."</td><td>".number_format($clicks)."</td></tr>";
}

register_filter('tot_clicks','pinterest_tot_clicks');
function pinterest_tot_clicks($stats) {
	global $db;
    $clicks = $db->FetchArray($db->Query("SELECT value FROM `web_stats` WHERE `module_id`='pinterest'"));
    if(empty($clicks['value']) && $clicks['value'] != '0'){
		$sql = $db->Query("SELECT SUM(`clicks`) AS `value` FROM `pinterest`");
		$clicks = $db->FetchArray($sql);
	}
	return $stats += ($clicks['value'] > 0 ? $clicks['value'] : 0);
}

register_filter('tot_sites','pinterest_tot_sites');
function pinterest_tot_sites($stats) {
	global $db;
    $clicks = $db->QueryGetNumRows("SELECT id FROM `pinterest`");
    return $stats += $clicks;
}

//Admin
register_filter('admin_s_sites','pinterest_admin_clicks');
function pinterest_admin_clicks($stats) {
	global $db;
	$clicks = $db->FetchArray($db->Query("SELECT value FROM `web_stats` WHERE `module_id`='pinterest'"));
	$clicks = ($clicks['value'] > 0 ? $clicks['value'] : 0);
	$today_clicks = $db->FetchArray($db->Query("SELECT SUM(today_clicks) AS value FROM `user_clicks` WHERE `module`='pinterest'"));
	$today_clicks = ($today_clicks['value'] > 0 ? $today_clicks['value'] : 0);
	$active = $db->QueryGetNumRows("SELECT id FROM `pinterest`");
	$inactive = $db->QueryGetNumRows("SELECT id FROM `pinterest` WHERE `active`!='0'");
	return $stats . '<div class="full-stats">
							<h2 class="center">Pinterest Followers</h2>
							<div class="stat circular" data-valueFormat="0,0" data-list=\'[{"title":"Pages","val":'.$active.',"percent":'.round((($active - $inactive)/$active)*100, 0).'},{"title":"Clicks","val":'.$clicks.',"percent":0},{"title":"Today Clicks","val":'.$today_clicks.',"percent":0}]\'></div>
						</div>';
}

register_filter('admin_s_menu','pinterest_admin_menu');
function pinterest_admin_menu($menu) {
	return $menu . '<li><a href="index.php?x=sites&s=pinterest">Pinterest Followers</a></li>';
}
?>