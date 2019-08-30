<?php
if(file_exists(realpath(dirname(__FILE__)).'/db_update.php')){
	include_once(realpath(dirname(__FILE__)).'/db_update.php');
}

register_filter('index_icons','yousecond_icon_on');
function yousecond_icon_on($icons) {
	return $icons . '<a href="p.php?p=yousecond"><img class="exchange_icon" src="img/icons/yousecond.png" alt="YouSecond" border="0" /></a>';
}

register_filter('index_icons_off','yousecond_icon_off');
function yousecond_icon_off($icons) {
	return $icons . '<img class="exchange_icon" src="img/icons/yousecond.png" alt="YouSecond" />';
}
register_filter('free_coins','yousecond_icon_free');
function yousecond_icon_free($freeicons) {
	return $freeicons . '<th align="center"><a href="p.php?p=yousecond"><img class="exchange_icon" src="img/icons/yousecond.png" alt="YouSecond" border="0" /><br/><p>Yousecond Friends</p></a></th>';
}   
register_filter('free_coins_main','yousecond_icon_main');
function yousecond_icon_main($freeicons) {
	return $freeicons . '<th align="center"><a href="p.php?p=yousecond"><img class="exchange_icon" src="img/icons/yousecond.png" alt="YouSecond" border="0" /><br/><p>Yousecond Friends</p></a></th>';
}   
register_filter('site_menu','yousecond_site_menu');
function yousecond_site_menu($menu) {
    $selected = "";
    if(isset($_GET["p"]) && $_GET["p"] == "yousecond")
    {
        $selected = 'selected';
    }
    else
    {
        $selected = 'value="yousecond"';
    }
	return $menu . '<option '.$selected.'>YouSecond Friends</a>';
}

register_filter('top_menu_earn','yousecond_top_menu');
function yousecond_top_menu($menu) {
	$selected = (isset($_GET["p"]) && $_GET["p"] == "yousecond" ? ' active' : '');
	return $menu . '<div class="ucp_link'.$selected.'"><img class="exchange_icon" src="img/icons/yousecond.png" alt="YouSecond" align="left" border="0" /><a href="p.php?p=yousecond"><div>YouSecond Friends</div></a></div>';
}

register_filter('add_site_select','yousecond_add_select');
function yousecond_add_select($menu) {
    return $menu . "<option value='yousecond'>YouSecond Friends</option>";
}

register_filter('yousecond_info','yousecond_info');
function yousecond_info($type) {
    if($type == "db")
    {
        return "yousecond";
    }
    else if($type == "type")
    {
        return "YouSecond";
    }
	else if($type == "name")
    {
        return "YouSecond Friends";
    }
}

register_filter('yousecond_dtf','yousecond_dtf');
function yousecond_dtf($type) {
    return "yousecond";
}

register_filter('stats','yousecond_stats');
function yousecond_stats($stats) {
	global $db;
	$sql = $db->Query("SELECT module_name,value FROM `web_stats` WHERE `module_id`='yousecond'");
	if($db->GetNumRows($sql) == 0){
		$clicks = $db->QueryFetchArray("SELECT SUM(`clicks`) AS `clicks` FROM `yousecond`");
		$clicks = ($clicks['clicks'] > 0 ? $clicks['clicks'] : 0);
		$db->Query("INSERT INTO `web_stats` (`module_id`,`module_name`,`value`)VALUES('yousecond','YouSecond Friends','".$clicks."')");
	}else{
		$result = $db->FetchArray($sql);
		$clicks = ($result['value'] > 0 ? $result['value'] : 0);
	}

    $stat = $db->QueryFetchArray("SELECT COUNT(*) AS total FROM `yousecond`");
    return $stats . "<tr><td>".$result['module_name']."</td><td>".number_format($stat['total'])."</td><td>".number_format($clicks)."</td></tr>";
}

register_filter('tot_clicks','yousecond_tot_clicks');
function yousecond_tot_clicks($stats) {
	global $db;
    $clicks = $db->QueryFetchArray("SELECT value FROM `web_stats` WHERE `module_id`='yousecond'");
    if(empty($clicks['value']) && $clicks['value'] != '0'){
		$clicks = $db->QueryFetchArray("SELECT SUM(`clicks`) AS `value` FROM `yousecond`");
	}
	return $stats += ($clicks['value'] > 0 ? $clicks['value'] : 0);
}

register_filter('tot_sites','yousecond_tot_sites');
function yousecond_tot_sites($stats) {
	global $db;
    $clicks = $db->QueryFetchArray("SELECT COUNT(*) AS total FROM `yousecond`");
    return $stats += $clicks['total'];
}

register_filter('module_tables','yousecond_module_tables');
function yousecond_module_tables($table) {
	return $table.'yousecond---yousecond_done(||)';
}

//Admin
register_filter('admin_s_sites','yousecond_admin_clicks');
function yousecond_admin_clicks($stats) {
	global $db;
	$clicks = $db->QueryFetchArray("SELECT value FROM `web_stats` WHERE `module_id`='yousecond'");
	$clicks = ($clicks['value'] > 0 ? $clicks['value'] : 0);
	$today_clicks = $db->QueryFetchArray("SELECT SUM(today_clicks) AS value FROM `user_clicks` WHERE `module`='yousecond'");
	$today_clicks = ($today_clicks['value'] > 0 ? $today_clicks['value'] : 0);
	$active = $db->QueryFetchArray("SELECT COUNT(*) AS total FROM `yousecond`");
	$active = $active['total'];
	$inactive = $db->QueryFetchArray("SELECT COUNT(*) AS total FROM `yousecond` WHERE `active`!='0'");
	$inactive = $inactive['total'];
	return $stats . '<div class="full-stats">
							<h2 class="center">YouSecond Friends</h2>
							<div class="stat circular" data-valueFormat="0,0" data-list=\'[{"title":"Pages","val":'.$active.',"percent":'.round((($active - $inactive)/$active)*100, 0).'},{"title":"Clicks","val":'.$clicks.',"percent":0},{"title":"Today Clicks","val":'.$today_clicks.',"percent":0}]\'></div>
						</div>';
}

register_filter('admin_s_menu','yousecond_admin_menu');
function yousecond_admin_menu($menu) {
	return $menu . '<li><a href="index.php?x=sites&s=yousecond">YouSecond Friends</a></li>';
}
?>