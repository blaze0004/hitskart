<?
$starttime = microtime(true);
define('BASEPATH', true);
include('system/config.php');

if($site['maintenance'] > 0){$site['site_name'] .= ' - '.$lang['b_01']; if($data['admin'] < 1){redirect('maintenance');}}
if(!$is_online && isset($_SERVER['HTTP_REFERER']) && !isset($_COOKIE['PESRefSource'])){
	setcookie("PESRefSource", $db->EscapeString($_SERVER['HTTP_REFERER']), time()+1800);
}

if(isset($_GET['unsubscribe']) && isset($_GET['um'])){
	$uid = $db->EscapeString($_GET['unsubscribe']);
	$um = $db->EscapeString($_GET['um']);
	if($db->QueryGetNumRows("SELECT id FROM `users` WHERE `id`='".$uid."' AND MD5(`email`)='".$um."'") > 0){
		$db->Query("UPDATE `users` SET `newsletter`='0' WHERE `id`='".$uid."' AND MD5(`email`)='".$um."'");
		echo '<center><b style="color:green">You was successfully unsubscribed from newsletters!</b></center>';
		redirect('index.php');
		exit;
	}
}

$errMsg = '';
if(isset($_POST['connect'])) {
	if(blacklist_check(VisitorIP(), 3)){
		$errMsg = '<div class="msg"><div class="error">'.lang_rep($lang['b_295'], array('-IP-' => VisitorIP())).'</div></div>';
	}else{
		$login = $db->EscapeString($_POST['login']);
		$pass = MD5($_POST['pass']);
		$data = $db->QueryFetchArray("SELECT id,login,banned,activate FROM `users` WHERE (`login`='".$login."' OR `email`='".$login."') AND `pass`='".$pass."'");

		if($data['banned'] > 0){
			$errMsg = '<div class="msg"><div class="error">'.$lang['b_02'].'</div></div>';
			$sql = $db->Query("SELECT id,reason FROM `ban_reasons` WHERE `user`='".$data['id']."'");
			if($db->GetNumRows($sql) > 0){
				$ban = $db->FetchArray($sql);
				if(!empty($ban['reason'])){
					$_SESSION['PES_Banned'] = $data['id'];
					redirect('banned.php?id='.$data['id']);
				}
			}
		}elseif($data['activate'] > 0){
			$errMsg = '<a href="register.php?resend" title="Click here" style="text-decoration:none;color:#a32326"><div class="msg"><div class="error">'.$lang['b_03'].'</div></div></a>';
		}elseif($data['id'] != '') {
			if(isset($_POST['remember'])){
				setcookie('PESAutoLogin', 'ses_user='.$data['login'].'&ses_hash='.$pass, time()+604800, '/');
			}
			$db->Query("UPDATE `users` SET `log_ip`='".VisitorIP()."', `online`=NOW() WHERE `id`='".$data['id']."'");
			$_SESSION['EX_login'] = $data['id'];
			redirect('index.php');
		}else{
			$errMsg = '<div class="msg"><div class="error">'.$lang['b_04'].'</div></div>';
		}
	}
}
if($is_online){
	$total_clicks = $db->QueryFetchArray("SELECT SUM(`total_clicks`) AS `clicks` FROM `user_clicks` WHERE `uid`='".$data['id']."'");}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title><?=$site['site_name']?></title>
<meta http-equiv="Content-type" content="text/html; charset=<?=$conf['lang_charset']?>" />
<meta name="description" content="<?=$site['site_description']?>" />
<meta name="keywords" content="free twitter followers, free facebook likes, twitter followers, facebook likes, get free followers, follower exchange, social media exchange, stumbleupon followers, social exchange system, digg exchange, free youtube views, youtube views" />
<meta name="author" content="Hitskart.com" />
<meta name="version" content="<?=$config['version']?>" />
<link rel="stylesheet" href="theme/<?=$site['theme']?>/style.css?v=<?=$config['version']?>" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.0.js"></script>
<!--[if lte IE 9]><script src="js/jquery.placeholder.min.js"></script><![endif]-->
<?if($is_online){?><script type="text/javascript"> $(document).ready(function() { $.ajaxSetup({ cache: false }); setInterval( function() { $('#c_coins').load('system/ajax.php?a=getCoins'); }, 10000); }); </script>

<script src="theme/dark/bigSlide.js"></script>
<script>
    $(document).ready(function() {
        $('.menu-link').bigSlide();
    });
	
</script><?}?>
<?if($is_online && stripos($_SERVER['REQUEST_URI'], 'offer.php')){?>
<script type="text/javascript">
var labelID;
$('switchcoins').click(function() {
       labelID = $(this).attr('for');
       $('#'+labelID).trigger('click');
});
$('switchmoney').click(function() {
       labelID = $(this).attr('for');
       $('#'+labelID).trigger('click');
$('submit').click(function() {
       labelID = $(this).attr('for');
       $('#'+labelID).trigger('click');
});	</script>
<script type="text/javascript">
	var path_to_php_checker = '<?=$site['site_url']?>/ajax_check_lead.php'; //This is the path to your php lead checker script.
	var lead_check_timer;
	var points;
	function start_lead_check(points){
		offerreward = points;
		console.log("Starting lead check timer."); //not required but useful for debugging.
		check_lead(); //lets have it run a check right away for testing purposes.
		clearInterval(lead_check_timer); //lets make sure we dont start multiple timers by clearing the existing timer here.
		lead_check_timer = setInterval("check_lead(points);", 30000); //set up new timer that runs every 30 seconds or 30,000 miliseconds (do not set lower then 20 seconds.)
		$('#offercheck').css("display", "none");
		$('#wcomp').css("display", "block");
		
	}
	function check_lead(points){
		console.log("Checking lead system now."); //not required but useful for debugging.
		$.ajax({
			type: "POST",
			url: path_to_php_checker,
			success: function(msg){
				eval(msg); //lets execute the javascript that is returned from the php lead checker script. (if any)
			},
			error: function (xhr, ajaxOptions, thrownError) {
				clearInterval(lead_check_timer);
				if(thrownError==''){
					thrownError = 'Please check your path_to_php_checker variable to ensure you entered the correct url.';
				}
				alert("Ajax Error: ("+path_to_php_checker+") ("+xhr.status+"): "+thrownError);
			}
		});
	}
</script>
<?}?>
</head>
<body>
<div class="header">
	<div class="header-content"> <?if($is_online){?><div class="leftslide"><nav id="menu" class="panel" role="navigation"><img src="http://www.gravatar.com/avatar/<?=md5(strtolower(trim($data['email'])))?>?s=45" style="border-radius:150px"><p><?=$data['login']?></p>
    <ul>
       <li><a href="edit_acc.php"><?=$lang['b_86']?></a></li>
			<?if($site['refsys'] == 1){?><li><a href="refer.php"><?=$lang['b_12']?></a></li><?}?>
        	<li><a href="buy.php"><?=$lang['b_07']?></a></li>
			<li><a href="vip.php"><?=$lang['b_08']?></a></li>
			<?if($site['daily_bonus'] > 0){?><li><a href="rewards.php"><?=$lang['b_326']?></a></li><?}?>
			<li><a href="coupons.php"><?=$lang['b_10']?></a></li>
			<?if($site['transfer_status'] != 1){?><li><a href="transfer.php"><?=$lang['b_11']?></a></li><?}?>
            <li><a href="faq.php"><?=$lang['b_06']?></a></li>
            <li><a href="logout.php"><?=$lang['b_87']?></a></li>
            
    </ul>
</nav><div class="wrap push "><a href="#menu" class="menu-link">&#9776;</a></div></div><?}?><ul id="navigation">
		<div class="logo_m" align="center"><a class="logo" href="<?=$site['site_url']?>"><img src="theme/<?=$site['theme']?>/images/logo.png" alt="PES Pro" border="0" /></a></div>
        
		<?if(!$is_online){?>
			<?if($site['reg_status'] == 0){?><form method="post" action=""><li class="first"><input class="login login_user" name="login" type="text" placeholder="<?=$lang['b_14']?>" /><input type="checkbox" name="remember" /> <span style="color:#5d5d5d;font-family: Arial;font-size:9.4px;"><?=$lang['b_229']?></span>|<a href="register.php"><?=$lang['b_05']?></a></li>
				<li class="middle"><input class="login login_password" name="pass" type="password" placeholder="<?=$lang['b_15']?>" /><a href="recover.php" style="margin: 6px 3px 3px 4px;"><?=$lang['b_16']?></a></li>	 						
				
				<?=$errMsg?>
				<li class="last"><div class="buttons">
					<input class="gbut" name="connect" value="<?=$lang['b_13']?>" type="submit" /><br /><br />
					
				</div>						  				  
			</form></li><?}?>
		<?}else{?>
		<?}?>
			
        </ul>
	</div>
</div><?if($is_online){?>
<div class="Welcome"><div class="wbox"><span class="d01"><h2><?=$lang['b_83'].' '.$data['login']?></h2></span>
	<div class="udata"><span class="d02"><b><?=$lang['b_200']?>:</b> <?=number_format($data['coins']).' '.$lang['b_156']?></span>
    <span class="d03"><b><?=$lang['b_255']?>:</b> <?=$data['account_balance'].' '.get_currency_symbol($site['currency_code'])?></span>
    <span class="d04"><b><?=$lang['b_192']?>:</b> <?=($data['premium'] > 0 ? $lang['b_194'] : $lang['b_193'])?></span>
<span class="d05"><b><?=$lang['b_290']?>:</b> <?=number_format($total_clicks['clicks'])?></span></div></div></div><?}?>
<div class="container">
	<div class="main"><?if(!$is_online){?>
	<div class="sidebar nob">
	
		
	<?}else{?>
	<div class="sidebar">
		<div class="ucp_inner">
			<div class="addsite"><a href="addurl.php"><div class="addbtn"><?=$lang['b_19']?></div></a></div>
			<div class="ucp_link"><a href="mysites.php"><div><?=$lang['b_20']?></div></a></div>
			<?if($site['banner_system'] != 0){?><div class="ucp_link"><div><a href="banners.php"> <?=$lang['b_189']?></div></a></div><?}?>
            <?if($site['daily_bonus'] > 0){?><div class="ucp_link"><div><a href="rewards.php"><?=$lang['b_326']?></div></a></div><?}?>
            <div class="ucp_link"><div><a href="offer.php"><?=$lang['b_349']?></div></a></div>
			<div class="ucp_link"><div><a href="buy.php"><?=$lang['b_07']?></div></a></div>
			<div class="ucp_link"><div><a href="bank.php" style="color:gold"> <?=$lang['b_256']?></div></a></div>
		</div>

	<div class="ucp_menu"> 
		<div class="ucp_inner">
			<h2><?=$lang['b_351']?></h2>
			<?=hook_filter('top_menu_earn',"")?>
		</div>
	</div>
</div></div><?}?>