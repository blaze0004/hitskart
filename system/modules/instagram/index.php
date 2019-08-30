<?php
if(file_exists(realpath(dirname(__FILE__)).'/db_update.php')){
	include_once(realpath(dirname(__FILE__)).'/db_update.php');
}

register_filter('admin_u_settings','instagram_settings');
function instagram_settings($settings)
{
	global $db;
    $instagram_id = $db->QueryFetchArray("SELECT instagram_id FROM `site_config` LIMIT 1");
    return $settings . '<div class="row">
						<label><strong>Instagram Client ID</strong><small>(<a href="http://instagram.com/developer/clients/manage/" target="_blank">click here</a>)</small></label>
						<div><input type="text" name="instagram_id" value="'.$instagram_id['instagram_id'].'" required="required" /></div>
					</div>';
}

register_filter('admin_u_settings_post','instagram_settings_post');
function instagram_settings_post($settings)
{
    return $settings . ", `instagram_id`='{$_POST['instagram_id']}'";
}

register_filter('index_icons','instagram_icon_on');
function instagram_icon_on($icons) {
	return $icons . '<a href="p.php?p=instagram"><img class="exchange_icon" src="img/icons/instagram.png" alt="Instagram" border="0" /></a>';
}

register_filter('index_icons_off','instagram_icon_off');
function instagram_icon_off($icons) {
	return $icons . '<img class="exchange_icon" src="img/icons/instagram.png" alt="Instagram" />';
}
register_filter('free_coins','instagram_icon_free');
function instagram_icon_free($freeicons) {
	return $freeicons . '<th align="center"><a href="p.php?p=instagram"><img class="exchange_icon" src="img/icons/instagram.png" alt="Instagram" border="0" /><br/><p>Instagram Follower</p></a></th>';
}
register_filter('free_coins_main','instagram_icon_main');
function instagram_icon_main($freeicons) {
	return $freeicons . '<th align="center"><a href="p.php?p=instagram"><img class="exchange_icon" src="img/icons/instagram.png" alt="Instagram" border="0" /><br/><p>Instagram Follower</p></a></th>';
}
register_filter('site_menu','instagram_site_menu');
function instagram_site_menu($menu) {
    $selected = "";
    if(isset($_GET["p"]) && $_GET["p"] == "instagram")
    {
        $selected = 'selected';
    }
    else
    {
        $selected = 'value="instagram"';
    }
	return $menu . '<option '.$selected.'>Instagram Followers</a>';
}

register_filter('top_menu_earn','instagram_top_menu');
function instagram_top_menu($menu) {
	$selected = (isset($_GET["p"]) && $_GET["p"] == "instagram" ? ' active' : '');
	return $menu . '<div class="ucp_link'.$selected.'"><img class="exchange_icon" src="img/icons/instagram.png" alt="Instagram" align="left" border="0" /><a href="p.php?p=instagram"><div>Instagram Followers</div></a></div>';
}

register_filter('add_site_select','instagram_add_select');
function instagram_add_select($menu) {
    return $menu . "<option value='instagram'>Instagram Followers</option>";
}

register_filter('instagram_info','instagram_info');
function instagram_info($type) {
    if($type == "db")
    {
        return "instagram";
    }
    else if($type == "type")
    {
        return "Instagram";
    }
	else if($type == "name")
    {
        return "Instagram Followers";
    }
}

register_filter('instagram_dtf','instagram_dtf');
function instagram_dtf($type) {
    return "instagram";
}

register_filter('stats','instagram_stats');
function instagram_stats($stats) {
	global $db;
	$sql = $db->Query("SELECT module_name,value FROM `web_stats` WHERE `module_id`='instagram'");
	if($db->GetNumRows($sql) == 0){
		$clicks = $db->QueryFetchArray("SELECT SUM(`clicks`) AS `clicks` FROM `instagram`");
		$clicks = ($clicks['clicks'] > 0 ? $clicks['clicks'] : 0);
		$db->Query("INSERT INTO `web_stats` (`module_id`,`module_name`,`value`)VALUES('instagram','Instagram Followers','".$clicks."')");
	}else{
		$result = $db->FetchArray($sql);
		$clicks = ($result['value'] > 0 ? $result['value'] : 0);
	}

    $stat = $db->QueryFetchArray("SELECT COUNT(*) AS total FROM `instagram`");
    return $stats . "<tr><td>".$result['module_name']."</td><td>".number_format($stat['total'])."</td><td>".number_format($clicks)."</td></tr>";
}

register_filter('tot_clicks','instagram_tot_clicks');
function instagram_tot_clicks($stats) {
	global $db;
    $clicks = $db->QueryFetchArray("SELECT value FROM `web_stats` WHERE `module_id`='instagram'");
    if(empty($clicks['value']) && $clicks['value'] != '0'){
		$clicks = $db->QueryFetchArray("SELECT SUM(`clicks`) AS `value` FROM `instagram`");
	}
	return $stats += ($clicks['value'] > 0 ? $clicks['value'] : 0);
}

register_filter('tot_sites','instagram_tot_sites');
function instagram_tot_sites($stats) {
	global $db;
    $clicks = $db->QueryFetchArray("SELECT COUNT(*) AS total FROM `instagram`");
    return $stats += $clicks['total'];
}

//Admin
register_filter('admin_s_sites','instagram_admin_clicks');
function instagram_admin_clicks($stats) {
	global $db;
	$clicks = $db->QueryFetchArray("SELECT value FROM `web_stats` WHERE `module_id`='instagram'");
	$clicks = ($clicks['value'] > 0 ? $clicks['value'] : 0);
	$today_clicks = $db->QueryFetchArray("SELECT SUM(today_clicks) AS value FROM `user_clicks` WHERE `module`='instagram'");
	$today_clicks = ($today_clicks['value'] > 0 ? $today_clicks['value'] : 0);
	$active = $db->QueryFetchArray("SELECT COUNT(*) AS total FROM `instagram`");
	$active = $active['total'];
	$inactive = $db->QueryFetchArray("SELECT COUNT(*) AS total FROM `instagram` WHERE `active`!='0'");
	$inactive = $inactive['total'];
	return $stats . '<div class="full-stats">
							<h2 class="center">Instagram Followers</h2>
							<div class="stat circular" data-valueFormat="0,0" data-list=\'[{"title":"Pages","val":'.$active.',"percent":'.round((($active - $inactive)/$active)*100, 0).'},{"title":"Clicks","val":'.$clicks.',"percent":0},{"title":"Today Clicks","val":'.$today_clicks.',"percent":0}]\'></div>
						</div>';
}

register_filter('admin_s_menu','instagram_admin_menu');
function instagram_admin_menu($menu) {
	return $menu . '<li><a href="index.php?x=sites&s=instagram">Instagram Followers</a></li>';
}
?>