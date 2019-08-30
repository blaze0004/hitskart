<?if(! defined('BASEPATH') ){ exit('Unable to view file.'); }?>
<h2 class="title"><?=$lang['b_162']?> - <?=$lang['ysub_10']?></h2>
<?
$dbt_value = '';
if($site['target_system'] != 2){
	$dbt_value = " AND (a.country = '0' OR FIND_IN_SET('".$data['country']."', a.country)) AND (a.sex = '".$data['sex']."' OR a.sex = '0')";
}

$sites = $db->QueryFetchArrayAll("SELECT a.id, a.url, a.title, a.y_av, a.cpc, b.premium FROM ysub a LEFT JOIN users b ON b.id = a.user LEFT JOIN ysubed c ON c.user_id = '".$data['id']."' AND c.site_id = a.id WHERE a.active = '0' AND (a.max_clicks > a.clicks OR a.max_clicks = '0') AND (a.daily_clicks > a.today_clicks OR a.daily_clicks = '0') AND (b.coins >= a.cpc AND a.cpc >= '2') AND (c.site_id IS NULL AND a.user !='".$data['id']."')".$dbt_value." ORDER BY a.cpc DESC, b.premium DESC".($site['mysql_random'] == 1 ? ', RAND()' : '')." LIMIT 14");

if(empty($site['yt_api'])){
	echo ($data['admin'] > 0 ? '<div class="msg"><div class="error"><a href="admin-panel/index.php?x=ytset">To enable this module you have to configure it on Admin Panel -> Settings -> Youtube Settings!</a></div></div>' : '<div class="msg"><div class="error">That section is currently unavailable!</div></div>');
}elseif($sites){
?>
<p class="infobox"><?=$lang['ysub_11']?></p>
<script>
	msg1 = '<?=mysql_escape_string($lang['ysub_17'])?>';
	msg2 = '<?=mysql_escape_string($lang['ysub_18'])?>';
	msg3 = '<?=mysql_escape_string($lang['ysub_19'])?>';
	msg4 = '<?=mysql_escape_string($lang['ysub_14'])?>';
	msg5 = 'We cannot contact Youtube...';
	msg6 = '<?=mysql_escape_string($lang['b_300'])?>';
	var report_msg1 = '<?=mysql_escape_string($lang['b_277'])?>';
	var report_msg2 = '<?=mysql_escape_string($lang['b_236'])?>';
	var report_msg3 = '<?=mysql_escape_string($lang['b_237'])?>';
	var report_msg4 = '<?=mysql_escape_string(lang_rep($lang['b_252'], array('-NUM-' => $site['report_limit'])))?>';
	var hideref = '<?=hideref('', $site['hideref'], ($site['revshare_api'] != '' ? $site['revshare_api'] : 0))?>';
	var start_click = 1;
	var end_click = <?=count($sites)?>;
	eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('3 19(a,b,c){9 e=14(15);p(e){$.y({A:"z",s:"t/1q.v",X:W,u:"U="+a+"&s="+b+"&1r="+c+"&1t="+e,q:3(d){Q(d){C\'1\':D(1h);R(a,\'1\');l;C\'2\':D(1i);l;Z:D(1j);l}}})}}3 O(){p(M<1l){M=M+1}H{S.1k(1f)}}3 R(b,c){$("#8").7("<h I=\\"h/K.F\\" /><L>");$.y({A:"z",s:"t/E/J/N.v",u:"1g=1d&1m="+b,q:3(a){$("#8").7(a);B(b);O()}})}9 m;3 1s(a,b,c,d,e){p(m&&!m.P){}H{9 f=(o.x/2)-(o.x/4);9 g=(o.w/2)-(o.w/4);9 k=1n+"1o://1p.1u.1a/13/"+b;$("#8").7("<h I=\\"h/K.F\\" /><L>");$.y({A:"z",s:"t/E/J/N.v",u:"12=1&11="+a,q:3(b){p(!10(b)){$("#8").7("<0 6=\\"r\\"><0 6=\\"1c\\">"+1b+"</0></0>");9 i=18(3(){m.17()},16);9 j=1e(3(){p(m.P){Y(j);Y(i);V(a,d,e)}},1N)}H{$("#8").7("<0 6=\\"r\\"><0 6=\\"G\\">"+1M+"</0></0>")}}});m=1L.1J(k,c,"1P=n, S=n, 1O=n, 1Q=n, 1K=n, 1H=T, 1A=T, 1v=n, x="+o.x/2+", w="+o.w/2+", 1I="+g+", 1y="+f)}}3 V(b,c,e){$("#8").7("<h I=\\"h/K.F\\" /><L>");$.y({A:"z",s:"t/E/J/N.v",X:W,u:"U="+b,q:3(a){Q(a){C\'1\':$("#8").7("<0 6=\\"r\\"><0 6=\\"q\\">"+1w+" <b>"+c+"</b>"+1x+"</0></0>");B(b);O();l;C\'5\':$("#8").7("<0 6=\\"r\\"><0 6=\\"G\\">"+1B+"</0></0>");B(b);l;Z:$("#8").7("<0 6=\\"r\\"><0 6=\\"G\\">"+1C+"</0></0>");l}}})}3 B(a){1G.1F(a).1E.1D="1z"}',62,115,'div|||function|||class|html|Hint|var||||||||img||||break|targetWin|no|screen|if|success|msg|url|system|data|php|height|width|ajax|POST|type|remove|case|alert|modules|gif|error|else|src|ysub|loader|br|start_click|process|click_refresh|closed|switch|skipuser|location|yes|id|do_click|false|cache|clearTimeout|default|isNaN|pid|get|channel|prompt|report_msg1|30000|close|setTimeout|report_page|com|msg4|info|skip|setInterval|true|step|report_msg2|report_msg4|report_msg3|reload|end_click|sid|hideref|http|www|report|module|ModulePopup|reason|youtube|copyhistory|msg2|msg3|left|none|resizable|msg6|msg1|display|style|getElementById|document|scrollbars|top|open|menubar|window|msg5|1000|directories|toolbar|status'.split('|'),0,{}))
</script>
<center><div id="Hint"></div></center>
<div id="getpoints">
<?foreach($sites as $sit){?>	
<div class="follow<?=($sit['premium'] > 0 ? '_vip' : '')?>" id="<?=$sit['id']?>">
	<center>
		<img src="<?=$sit['y_av']?>" border="0" alt="<?=$sit['title']?>" width="48" height="48" class="follower"><br><b><?=$lang['b_42']?></b>: <?=($sit['cpc']-1)?><br>
		<a href="javascript:void(0);" onclick="ModulePopup('<?=$sit['id']?>','<?=$sit['url']?>','Youtube','<?=($sit['cpc']-1)?>','1');" class="followbutton"><?=$lang['ysub_13']?></a>
		<font style="font-size:0.8em;">[<a href="javascript:void(0);" onclick="skipuser('<?=$sit['id']?>','1');" style="color: #666666;font-size:0.9em;"><?=$lang['ysub_15']?></a>]</font>
		<span style="position:absolute;bottom:1px;right:2px;"><a href="javascript:void(0);" onclick="report_page('<?=$sit['id']?>','<?=base64_encode($sit['url'])?>','ysub');"><img src="img/report.png" alt="Report" title="Report" border="0" /></a></span>
	</center>
</div>
<?}?>
</div>
<?}else{?>
<div class="msg">
<div class="error"><?=$lang['b_163']?></div>
<div class="info"><a href="buy.php"><b><?=$lang['b_164']?></b></a></div></div>
<?}?>