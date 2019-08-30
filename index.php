<?php
include('header.php');
if(!$is_online){?>
<div class="content home">
	<section class="s1">
    <aside class="top"><table border="0">
  <tr>
   <?=hook_filter('free_coins_main',"")?>
  
</table></aside>
    <aside class="left">
    <p class="p2"><?=$lang['index_desc']?><br><?=$lang['index_desc_1']?></p></aside>
    <aside class="right"><p class="p1">Register Now And <br> Get First Free <strong>50 Coins</strong></p>
    <a href="register.php" ><div class="rbtn"><p class="register">TRY FOR FREE NOW</p></div></a>
    
    </aside>
    </section>
	
	</div>
</div>
<?
}else{
$warn_active = 0;
if($data['warn_message'] != ''){
	$warn_active = 1;
	if($data['warn_expire'] < time()){
		$db->Query("UPDATE `users` SET `warn_message`='', `warn_expire`='0' WHERE `id`='".$data['id']."'");
		$warn_active = 0;
	}
}

$total_clicks = $db->QueryFetchArray("SELECT SUM(`total_clicks`) AS `clicks` FROM `user_clicks` WHERE `uid`='".$data['id']."'");
?>
<script type="text/javascript"> function open_popup(a,b,c,d){var e=(screen.width-c)/2;var f=(screen.height-d)/2;var g='width='+c+', height='+d;g+=', top='+f+', left='+e;g+=', directories=no';g+=', location=no';g+=', menubar=no';g+=', resizable=no';g+=', scrollbars=no';g+=', status=no';g+=', toolbar=no';newwin=window.open(a,b,g);if(window.focus){newwin.focus()}return false} </script>
<div class="content">
	<?if($warn_active){?><div class="msg"><div class="error"><?=$data['warn_message']?></div></div><?}elseif($site['c_show_msg'] == 1 && $site['c_text_index'] != ''){?><a href="buy.php"><div class="msg"><div class="info"><?=$site['c_text_index']?></div></div></a><?}?>
<div class="topcontent"><script>$(function() {

    $('.title').after('<img src="img/coins.png" class="after"/>');
	$('.title').before('<img src="img/coins.png" class="before"/>');

});</script>
<span class="title">Free Coins</span></div>
<div class="free_coins"><table border="0">
  <tr>
   <?=hook_filter('free_coins',"")?>
  
</table>
</div>	
	
		
	</div>			
</div>
<?if($site['fb_fan_url'] != ''){?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id; js.async = true;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div style="margin:0 0 20px 20px;float:left;position:relative;border:1px solid #000;border-radius:8px;background:#17262d;width:715px;">
	<div id="club_menu_div" style="position:absolute;z-index:2;margin-left:245px;top:0px;background:#17262d;text-align:center;padding:5px;border-radius:8px;width:220px">
		<a href="http://www.facebook.com/<?=$site['fb_fan_url']?>" target="_blank" style="text-decoration:none;color:#efefef"><b><?=$lang['b_90']?></b></a>   
	</div>
	<div style="position:absolute;width:270px;height:20px;left:220px;z-index:2;bottom:0px;border-radius:10px;border-top:1px solid #999;background:#17262d;text-align:center;padding:5px;">  
		<fb:like href="http://www.facebook.com/<?=$site['fb_fan_url']?>" send="true" layout="button_count" width="150" show_faces="false"></fb:like>
	</div>
	<div style="overflow:hidden;position:relative;width:691px;height:90px;border:1px solid #CCCCCC;display:inline-block;border-radius:10px;margin:10px;">
		<div style="position:absolute;">
			<div style="background:url(theme/<?=$site['theme']?>/images/bg-sign.jpg) repeat scroll right top;width:695px;height:90px;font-size:21px;text-align:center;display:table-cell;vertical-align:middle"><a href="http://www.facebook.com/<?=$site['fb_fan_url']?>" target="_blank" style="color:#fff;text-decoration:none">fb.com/<?=$site['fb_fan_url']?></a></div>
		</div>
	</div>
</div>
<?}}
include('footer.php');?>