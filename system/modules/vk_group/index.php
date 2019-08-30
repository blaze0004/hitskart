<?php
if(file_exists(realpath(dirname(__FILE__)).'/db_update.php')){
	include_once(realpath(dirname(__FILE__)).'/db_update.php');
}

register_filter('site_menu','vk_group_site_menu');
function vk_group_site_menu($menu) {
    $selected = "";
    if(isset($_GET["p"]) && $_GET["p"] == "vk_group")
    {
        $selected = 'selected';
    }
    else
    {
        $selected = 'value="vk_group"';
    }
	return $menu . '<option '.$selected.'>VK Groups</a>';
}
register_filter('free_coins','vk_group_icon_free');
function vk_group_icon_free($freeicons) {
	return $freeicons . '<th align="center"><a href="p.php?p=vk_group"><img class="exchange_icon" src="img/icons/vk.png" alt="VK" /><br/><p>VK Groups</p></a></th></tr><tr>';
}
register_filter('free_coins_main','vk_group_icon_main');
function vk_group_icon_main($freeicons) {
	return $freeicons . '<th align="center"><a href="p.php?p=vk_group"><img class="exchange_icon" src="img/icons/vk.png" alt="VK" /><br/><p>VK Groups</p></a></th>';
}
register_filter('vk_group_info','vk_group_info');
function vk_group_info($type) {
    if($type == "db")
    {
        return "vk_group";
    }
    else if($type == "type")
    {
        return "VK Groups";
    }
	else if($type == "name")
    {
        return "VK Groups";
    }
}

register_filter('vk_group_dtf','vk_group_dtf');
function vk_group_dtf($type) {
    return "vk_group";
}

register_filter('add_site_select','vk_group_add_select');
function vk_group_add_select($menu) {
     return $menu . "<option value='vk_group'>VK Groups</option>";
}

register_filter('stats','vk_group_stats');
function vk_group_stats($stats) {
	global $db;
	$sql = $db->Query("SELECT module_name,value FROM `web_stats` WHERE `module_id`='vk_group'");
	if($db->GetNumRows($sql) == 0){
		$clicks = $db->QueryFetchArray("SELECT SUM(`clicks`) AS `clicks` FROM `vk_group`");
		$clicks = ($clicks['clicks'] > 0 ? $clicks['clicks'] : 0);
		$db->Query("INSERT INTO `web_stats` (`module_id`,`module_name`,`value`)VALUES('vk_group','VK Groups','".$clicks."')");
	}else{
		$result = $db->FetchArray($sql);
		$clicks = ($result['value'] > 0 ? $result['value'] : 0);
	}

    $stat = $db->QueryFetchArray("SELECT COUNT(*) AS total FROM `vk_group`");
    return $stats . "<tr><td>".$result['module_name']."</td><td>".number_format($stat['total'])."</td><td>".number_format($clicks)."</td></tr>";
}

register_filter('tot_clicks','vk_group_tot_clicks');
function vk_group_tot_clicks($stats) {
	global $db;
    $clicks = $db->QueryFetchArray("SELECT value FROM `web_stats` WHERE `module_id`='vk_group'");
    if(empty($clicks['value']) && $clicks['value'] != '0'){
		$clicks = $db->QueryFetchArray("SELECT SUM(`clicks`) AS `value` FROM `vk_group`");
	}
	return $stats += ($clicks['value'] > 0 ? $clicks['value'] : 0);
}

register_filter('tot_sites','vk_group_tot_sites');
function vk_group_tot_sites($stats) {
	global $db;
    $clicks = $db->QueryFetchArray("SELECT COUNT(*) AS total FROM `vk_group`");
    return $stats += $clicks['total'];
}

register_filter('module_tables','vk_group_module_tables');
function vk_group_module_tables($table) {
	return $table.'vk_group---vkg_done(||)';
}

//Admin
register_filter('admin_s_sites','vk_group_admin_sites');
function vk_group_admin_sites($stats) {
	global $db;
	$clicks = $db->QueryFetchArray("SELECT value FROM `web_stats` WHERE `module_id`='vk_group'");
	$clicks = ($clicks['value'] > 0 ? $clicks['value'] : 0);
	$today_clicks = $db->QueryFetchArray("SELECT SUM(today_clicks) AS value FROM `user_clicks` WHERE `module`='vk_group'");
	$today_clicks = ($today_clicks['value'] > 0 ? $today_clicks['value'] : 0);
	$active = $db->QueryFetchArray("SELECT COUNT(*) AS total FROM `vk_group`");
	$active = $active['total'];
	$inactive = $db->QueryFetchArray("SELECT COUNT(*) AS total FROM `vk_group` WHERE `active`!='0'");
	$inactive = $inactive['total'];
	return $stats . '<div class="full-stats">
							<h2 class="center">VK Groups</h2>
							<div class="stat circular" data-valueFormat="0,0" data-list=\'[{"title":"Pages","val":'.$active.',"percent":'.round((($active - $inactive)/$active)*100, 0).'},{"title":"Clicks","val":'.$clicks.',"percent":0},{"title":"Today Clicks","val":'.$today_clicks.',"percent":0}]\'></div>
						</div>';
}

register_filter('admin_s_menu','vk_group_admin_menu');
function vk_group_admin_menu($menu) {
	return $menu . '<li><a href="index.php?x=sites&s=vk_group">VK Groups</a></li>';
}
?>