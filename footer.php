<?php
if(! defined('BASEPATH') ){ exit('Unable to view file.'); }
?>
<?if($is_online){?>
<div class="sidebar-right">
					<div class="ucp_inner right">
				<div class="affiliate">Affiliate Programs<br /><p>Share us using our affiliate program and earn <strong>300 Coins</strong> for user reffer by you.Check your refferal from <a href="refer.php">here</a></p><center><input type="text" value="<?=$site['site_url']?>/?ref=<?=$data['id']?>" onclick="this.select()" style="font-size:11px;padding:4px;width:200px;margin:0 auto;" readonly /></center><div class="sharebtn"><a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?=$site['site_url']?>/?ref=<?=$data['id']?>">Share on Facebook</a><a class="google" href="https://plus.google.com/share?url=<?=$site['site_url']?>/?ref=<?=$data['id']?>">Share on Google+</a><a class="twitter" href="https://twitter.com/home?status=Check%20out%20<?=$site['site_url']?>/?ref=<?=$data['id']?>%20%23hitskart">Share on Twitter</a></div></div></div></div></div><?}?>
<?php if($is_online){
if($site['banner_system'] != 0 && $data['premium'] == 0){
	$sizes = $db->QueryFetchArrayAll("SELECT `type`, COUNT(*) AS `total` FROM `banners` WHERE `expiration`>'0' GROUP BY `type`");

	$size = array();
	foreach($sizes as $s) { $size[$s['type']] = $s['total']; }
	
	$type = 0;
	$bActive = 1;
	$bwidth = 943;
	if(!empty($size[0]) && !empty($size[1])){
		$type = rand(0,1);
	}elseif(!empty($size[1]) && empty($size[0])){
		$type = 1;
	}elseif(empty($size[0]) && empty($size[1])){
		$bActive = 0;
	}

	if($bActive){
		$banners = $db->QueryFetchArrayAll("SELECT id,banner_url FROM `banners` WHERE `type`='".$type."' AND `expiration`>'0' ORDER BY rand() LIMIT ".($type == 1 ? 1 : 2));
		if(!empty($banners)){
			$db->Query("UPDATE `banners` SET `expiration`='0' WHERE `expiration`<'".time()."' AND `expiration`!='0'");
			echo '<div class="footer_banners" style=" width:'.($type == 1 ? 940 : 485).'px">';
			foreach($banners as $banner){
				$db->Query("UPDATE `banners` SET `views`=`views`+'1' WHERE `id`='".$banner['id']."'");
				echo '<span style="margin: 0 10px 0 10px"><a href="'.$site['site_url'].'/go_banner.php?go='.$banner['id'].'" target="_blank"><img src="'.$banner['banner_url'].'" width="'.($type == 1 ? 728 : 468).'" height="'.($type == 1 ? 90 : 60).'" alt="Banner - '.$site['site_url'].'" border="0" /></a></span>';
			}
			echo '</div>';
		}
	}
}}?>
	</div>
</div>
<script type="text/javascript"> function langSelect(selectobj){ window.location.href='?peslang='+selectobj } </script>
<div id="footer"><div id="footer_content"><?=eval(base64_decode('ZWNobyAnPHNwYW4gc3R5bGU9ImZsb2F0OmxlZnQ7bWFyZ2luLWxlZnQ6MTVweCI+QWxsIHJpZ2h0cyByZXNlcnZlZCAmY29weTsgJy5kYXRlKCdZJykuJzwvc3Bhbj4nOw=='));?>
    <ul class="footer_links" style="float:right;margin-right:15px;">
		<li class="lang"><div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script></select></li>
		<li><a href="contact.php"><?=$lang['b_47']?></a> |</li>
    	<li><a href="faq.php"><?=$lang['b_06']?></a> |</li>
        <li><a href="blog.php"><?=$lang['b_287']?></a> |</li>
		<?if($site['allow_withdraw'] == 1){?><li><a href="proof.php"><?=$lang['b_303']?></a> |</li><?}?>
		<?=($data['admin'] > 0 ? '<li><a href="admin-panel" target="_blank"><b>Control Panel</b></a> |</li>' : '')?>
    </ul></div>
</div>
<?if($data['admin'] == 1){?><p align="center" style="font-size:11px">Script: <?=(round(microtime(true)-$starttime - $db->UsedTime, 4))?> sec - Database: <?=(round($db->UsedTime, 4))?> sec - MySQL Queries: <?=$db->GetNumberOfQueries()?> - Memory Usage: <?=MemoryUsage()?> MB</p><?}?>
<?if($is_online){?>

<?}
if(!empty($site['analytics_id'])){?>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?=$site['analytics_id']?>']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script><?}?>
<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//analytics.xdhax.com/piwik/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 3]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//analytics.xdhax.com/piwik/piwik.php?idsite=3" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->
</body>
</html><? $db->Close(); ob_end_flush(); ?>