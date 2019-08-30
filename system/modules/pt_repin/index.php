<?php
if(!mysql_num_rows(mysql_query("SHOW TABLES LIKE 'pt_repin'"))){executeSql("system/modules/pt_repin/db.sql");}

register_filter('site_menu','pt_repin_site_menu');
function pt_repin_site_menu($menu) {
    $selected = "";
    if(isset($_GET["p"]) && $_GET["p"] == "pt_repin")
    {
        $selected = 'selected';
    }
    else
    {
        $selected = 'value="pt_repin"';
    }
	return $menu . '<option '.$selected.'>Pinterest Repins</a>';
}
register_filter('free_coins','pt_icon_free');
function pt_icon_free($freeicons) {
	return $freeicons . '<th align="center"><a href="p.php?p=pt_repin"><img class="exchange_icon" src="img/icons/pinterest.png" alt="Pinterest" border="0" /><br/><p>Pinterest Repins</p></a></th>';
}
register_filter('free_coins_main','pt_icon_main');
function pt_icon_main($freeicons) {
	return $freeicons . '<th align="center"><a href="p.php?p=pt_repin"><img class="exchange_icon" src="img/icons/pinterest.png" alt="Pinterest" border="0" /><br/><p>Pinterest Repins</p></a></th>';
}  
register_filter('add_site_select','pt_repin_add_select');
function pt_repin_add_select($menu) {
    if(isset($_POST["type"]) && $_POST["type"] == "pt_repin")
    {
	    return $menu . "<option value='pt_repin' selected>Pinterest Repins</option>";
    }
    else
    {
        return $menu . "<option value='pt_repin'>Pinterest Repins</option>";
    }
}

register_filter('pt_repin_info','pt_repin_info');
function pt_repin_info($type) {
    if($type == "db")
    {
        return "pt_repin";
    }
    else if($type == "type")
    {
        return "Pinterest Repins";
    }
	else if($type == "name")
    {
        return "Pinterest Repins";
    }
}

register_filter('pt_repin_dtf','pt_repin_dtf');
function pt_repin_dtf($type) {
    return "pt_repin";
}

register_filter('stats','pt_repin_stats');
function pt_repin_stats($stats) {
	global $db;
	$sql = $db->Query("SELECT module_name,value FROM `web_stats` WHERE `module_id`='pt_repin'");
	if($db->GetNumRows($sql) == 0){
		$result = $db->FetchArray($sql);
		$sql = $db->Query("SELECT SUM(`clicks`) AS `clicks` FROM `pt_repin`");
		$clicks = $db->FetchArray($sql);
		$clicks = ($clicks['clicks'] > 0 ? $clicks['clicks'] : 0);
		$db->Query("INSERT INTO `web_stats` (`module_id`,`module_name`,`value`)VALUES('pt_repin','Pinterest Repin','".$clicks."')");
	}else{
		$result = $db->FetchArray($sql);
		$clicks = ($result['value'] > 0 ? $result['value'] : 0);
	}

    $stat = $db->QueryGetNumRows("SELECT id FROM `pt_repin`");
    return $stats . "<tr><td>".$result['module_name']."</td><td>".number_format($stat)."</td><td>".number_format($clicks)."</td></tr>";
}

register_filter('tot_clicks','pt_repin_tot_clicks');
function pt_repin_tot_clicks($stats) {
	global $db;
    $clicks = $db->FetchArray($db->Query("SELECT value FROM `web_stats` WHERE `module_id`='pt_repin'"));
    if(empty($clicks['value']) && $clicks['value'] != '0'){
		$sql = $db->Query("SELECT SUM(`clicks`) AS `value` FROM `pt_repin`");
		$clicks = $db->FetchArray($sql);
	}
	return $stats += ($clicks['value'] > 0 ? $clicks['value'] : 0);
}

register_filter('tot_sites','pt_repin_tot_sites');
function pt_repin_tot_sites($stats) {
	global $db;
    $clicks = $db->QueryGetNumRows("SELECT id FROM `pt_repin`");
    return $stats += $clicks;
}

//Admin
register_filter('admin_s_sites','pt_repin_admin_clicks');
function pt_repin_admin_clicks($stats) {
	global $db;
	$clicks = $db->FetchArray($db->Query("SELECT value FROM `web_stats` WHERE `module_id`='pt_repin'"));
	$clicks = ($clicks['value'] > 0 ? $clicks['value'] : 0);
	$today_clicks = $db->FetchArray($db->Query("SELECT SUM(today_clicks) AS value FROM `user_clicks` WHERE `module`='pt_repin'"));
	$today_clicks = ($today_clicks['value'] > 0 ? $today_clicks['value'] : 0);
	$active = $db->QueryGetNumRows("SELECT id FROM `pt_repin`");
	$inactive = $db->QueryGetNumRows("SELECT id FROM `pt_repin` WHERE `active`!='0'");
	return $stats . '<div class="full-stats">
							<h2 class="center">Pinterest Repin</h2>
							<div class="stat circular" data-valueFormat="0,0" data-list=\'[{"title":"Pages","val":'.$active.',"percent":'.round((($active - $inactive)/$active)*100, 0).'},{"title":"Clicks","val":'.$clicks.',"percent":0},{"title":"Today Clicks","val":'.$today_clicks.',"percent":0}]\'></div>
						</div>';
}

register_filter('admin_s_menu','pt_repin_admin_menu');
function pt_repin_admin_menu($menu) {
	return $menu . '<li><a href="index.php?x=sites&s=pt_repin">PT Repins</a></li>';
}
?>