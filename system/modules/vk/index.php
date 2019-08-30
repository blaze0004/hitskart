<?php
if(file_exists(realpath(dirname(__FILE__)).'/db_update.php')){
	include_once(realpath(dirname(__FILE__)).'/db_update.php');
}

register_filter('index_icons','vk_icon_on');
function vk_icon_on($icons) {
	return $icons . '<a href="p.php?p=vk"><img class="exchange_icon" src="img/icons/vk.png" alt="VK" /></a>';
}

register_filter('index_icons_off','vk_icon_off');
function vk_icon_off($icons) {
	return $icons . '<img class="exchange_icon" src="img/icons/vk.png" alt="VK" />';
}
register_filter('free_coins','vk_icon_free');
function vk_icon_free($freeicons) {
	return $freeicons . '<th align="center"><a href="p.php?p=vk"><img class="exchange_icon" src="img/icons/vk.png" alt="VK" /><br/><p>VK Pages</p></a></th>';
}
register_filter('free_coins_main','vk_icon_main');
function vk_icon_main($freeicons) {
	return $freeicons . '<th align="center"><a href="p.php?p=vk"><img class="exchange_icon" src="img/icons/vk.png" alt="VK" /><br/><p>VK Pages</p></a></th>';
}
register_filter('top_menu_earn','vk_top_menu');
function vk_top_menu($menu) {
	$selected = (isset($_GET["p"]) && $_GET["p"] == "vk" ? ' active' : '');
	return $menu . '<div class="ucp_link'.$selected.'"><img class="exchange_icon" src="img/icons/vk.png" align="left" alt="VK" /><a href="p.php?p=vk"><div>VK Pages / Groups</div></a></div>';
}

register_filter('site_menu','vk_site_menu');
function vk_site_menu($menu) {
    $selected = "";
    if(isset($_GET["p"]) && $_GET["p"] == "vk")
    {
        $selected = 'selected';
    }
    else
    {
        $selected = 'value="vk"';
    }
	return $menu . '<option '.$selected.'>VK Pages</a>';
}

register_filter('vk_info','vk_info');
function vk_info($type) {
    if($type == "db")
    {
        return "vk";
    }
    else if($type == "type")
    {
        return "VK Pages";
    }
	else if($type == "name")
    {
        return "VK Pages";
    }
}

register_filter('vk_dtf','vk_dtf');
function vk_dtf($type) {
    return "vk";
}

register_filter('add_site_select','vk_add_select');
function vk_add_select($menu) {
     return $menu . "<option value='vk'>VK Pages</option>";
}

register_filter('stats','vk_stats');
function vk_stats($stats) {
	global $db;
	$sql = $db->Query("SELECT module_name,value FROM `web_stats` WHERE `module_id`='vk'");
	if($db->GetNumRows($sql) == 0){
		$clicks = $db->QueryFetchArray("SELECT SUM(`clicks`) AS `clicks` FROM `vk`");
		$clicks = ($clicks['clicks'] > 0 ? $clicks['clicks'] : 0);
		$db->Query("INSERT INTO `web_stats` (`module_id`,`module_name`,`value`)VALUES('vk','VK Pages','".$clicks."')");
	}else{
		$result = $db->FetchArray($sql);
		$clicks = ($result['value'] > 0 ? $result['value'] : 0);
	}

    $stat = $db->QueryFetchArray("SELECT COUNT(*) AS total FROM `vk`");
    return $stats . "<tr><td>".$result['module_name']."</td><td>".number_format($stat['total'])."</td><td>".number_format($clicks)."</td></tr>";
}

register_filter('tot_clicks','vk_tot_clicks');
function vk_tot_clicks($stats) {
	global $db;
    $clicks = $db->QueryFetchArray("SELECT value FROM `web_stats` WHERE `module_id`='vk'");
    if(empty($clicks['value']) && $clicks['value'] != '0'){
		$clicks = $db->QueryFetchArray("SELECT SUM(`clicks`) AS `value` FROM `vk`");
	}
	return $stats += ($clicks['value'] > 0 ? $clicks['value'] : 0);
}

register_filter('tot_sites','vk_tot_sites');
function vk_tot_sites($stats) {
	global $db;
    $clicks = $db->QueryFetchArray("SELECT COUNT(*) AS total FROM `vk`");
    return $stats += $clicks['total'];
}

register_filter('module_tables','vk_module_tables');
function vk_module_tables($table) {
	return $table.'vk---vk_done(||)';
}

//Admin
register_filter('admin_s_sites','vk_admin_sites');
function vk_admin_sites($stats) {
	global $db;
	$clicks = $db->QueryFetchArray("SELECT value FROM `web_stats` WHERE `module_id`='vk'");
	$clicks = ($clicks['value'] > 0 ? $clicks['value'] : 0);
	$today_clicks = $db->QueryFetchArray("SELECT SUM(today_clicks) AS value FROM `user_clicks` WHERE `module`='vk'");
	$today_clicks = ($today_clicks['value'] > 0 ? $today_clicks['value'] : 0);
	$active = $db->QueryFetchArray("SELECT COUNT(*) AS total FROM `vk`");
	$active = $active['total'];
	$inactive = $db->QueryFetchArray("SELECT COUNT(*) AS total FROM `vk` WHERE `active`!='0'");
	$inactive = $inactive['total'];
	return $stats . '<div class="full-stats">
							<h2 class="center">VK Pages</h2>
							<div class="stat circular" data-valueFormat="0,0" data-list=\'[{"title":"Pages","val":'.$active.',"percent":'.round((($active - $inactive)/$active)*100, 0).'},{"title":"Clicks","val":'.$clicks.',"percent":0},{"title":"Today Clicks","val":'.$today_clicks.',"percent":0}]\'></div>
						</div>';
}

register_filter('admin_s_menu','vk_admin_menu');
function vk_admin_menu($menu) {
	return $menu . '<li><a href="index.php?x=sites&s=vk">VK Pages</a></li>';
}
?>