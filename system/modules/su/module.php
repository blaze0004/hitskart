<?if(! defined('BASEPATH') ){ exit('Unable to view file.'); }?>
<h2 class="title"><?=$lang['b_162']?> - Stumbleupon</h2>
<?
$dbt_value = '';
if($site['target_system'] != 2){
	$dbt_value = " AND (a.country = '0' OR FIND_IN_SET('".$data['country']."', a.country)) AND (a.sex = '".$data['sex']."' OR a.sex = '0')";
}

$sites = $db->QueryFetchArrayAll("SELECT a.id, a.url, a.title, a.cpc, b.premium FROM stumble a LEFT JOIN users b ON b.id = a.user LEFT JOIN stumbled c ON c.user_id = '".$data['id']."' AND c.site_id = a.id WHERE a.active = '0' AND (a.max_clicks > a.clicks OR a.max_clicks = '0') AND (a.daily_clicks > a.today_clicks OR a.daily_clicks = '0') AND (b.coins >= a.cpc AND a.cpc >= '2') AND (c.site_id IS NULL AND a.user !='".$data['id']."')".$dbt_value." ORDER BY a.cpc DESC, b.premium DESC".($site['mysql_random'] == 1 ? ', RAND()' : '')." LIMIT 14");
if($sites){
?>
<script type="text/javascript">
	msg1 = '<?=mysql_escape_string($lang['su_08'])?>';
	msg2 = '<?=mysql_escape_string($lang['su_09'])?>';
	msg3 = '<?=mysql_escape_string($lang['su_10'])?>';
	msg4 = '<?=mysql_escape_string($lang['su_11'])?>';
	msg5 = '<?=mysql_escape_string($lang['su_12'])?>';
	msg6 = '<?=mysql_escape_string($lang['b_300'])?>';
	var report_msg1 = '<?=mysql_escape_string($lang['b_277'])?>';
	var report_msg2 = '<?=mysql_escape_string($lang['b_236'])?>';
	var report_msg3 = '<?=mysql_escape_string($lang['b_237'])?>';
	var report_msg4 = '<?=mysql_escape_string(lang_rep($lang['b_252'], array('-NUM-' => $site['report_limit'])))?>';
	var hideref = '<?=hideref('', $site['hideref'], ($site['revshare_api'] != '' ? $site['revshare_api'] : 0))?>';
	var start_click = 1;
	var end_click = <?=count($sites)?>;
	eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('4 7(a,b,c){8 e=9(f);g(e){$.h({i:"j",5:"k/l.m",n:o,p:"q="+a+"&5="+b+"&r="+c+"&s="+e,t:4(d){u(d){6\'1\':0(v);w(a,\'1\');3;6\'2\':0(x);3;y:0(z);3}}})}}',36,36,'alert|||break|function|url|case|report_page|var|prompt||||||report_msg1|if|ajax|type|POST|system|report|php|cache|false|data|id|module|reason|success|switch|report_msg2|skipuser|report_msg4|default|report_msg3'.split('|'),0,{}))
	eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('3 v(){p(w<T){w=w+1}x{N.U(V)}}3 W(b,c){$("#7").8("<9 y=\\"9/z.A\\" /><B>");$.C({D:"E",q:"F/G/H/I.J",K:"X=Y&Z="+b,r:3(a){$("#7").8(a);s(b);v()}})}h l;3 10(c,d,e,f,g){p(l&&!l.O){}x{h i=(m.t/2)-(m.t/4);h j=(m.u/2)-(m.u/4);h k=11+d;$("#7").8("<9 y=\\"9/z.A\\" /><B>");$.C({D:"E",q:"F/G/H/I.J",K:"12=1&q="+d+"&13="+c,r:3(a){p(!14(a)){$("#7").8("<0 6=\\"o\\"><0 6=\\"15\\">"+16+"</0></0>");h d=17(3(){l.18()},19);h b=1a(3(){p(l.O){P(b);P(d);Q(c,f,g)}},1b)}x{$("#7").8("<0 6=\\"o\\"><0 6=\\"L\\">"+1c+"</0></0>")}}});l=1d.1e(k,e,"1f=n, N=n, 1g=n, 1h=n, 1i=n, 1j=R, 1k=R, 1l=n, t="+m.t/2+", u="+m.u/2+", 1m="+j+", 1n="+i)}}3 Q(b,c,e){$("#7").8("<9 y=\\"9/z.A\\" /><B>");$.C({D:"E",q:"F/G/H/I.J",1o:1p,K:"1q="+b,r:3(a){1r(a){S\'1\':$("#7").8("<0 6=\\"o\\"><0 6=\\"r\\">"+1s+" <b>"+c+"</b>"+1t+"</0></0>");s(b);v();M;S\'5\':$("#7").8("<0 6=\\"o\\"><0 6=\\"L\\">"+1u+"</0></0>");s(b);M;1v:$("#7").8("<0 6=\\"o\\"><0 6=\\"L\\">"+1w+"</0></0>");M}}})}3 s(a){1x.1y(a).1z.1A="1B"}',62,100,'div|||function|||class|Hint|html|img||||||||var||||targetWin|screen|no|msg|if|url|success|remove|width|height|click_refresh|start_click|else|src|loader|gif|br|ajax|type|POST|system|modules|su|process|php|data|error|break|location|closed|clearTimeout|do_click|yes|case|end_click|reload|true|skipuser|step|skip|sid|ModulePopup|hideref|get|pid|isNaN|info|msg1|setTimeout|close|50000|setInterval|1000|msg2|window|open|toolbar|directories|status|menubar|scrollbars|resizable|copyhistory|top|left|cache|false|id|switch|msg4|msg5|msg6|default|msg3|document|getElementById|style|display|none'.split('|'),0,{}))
</script>
<div id="Hint"></div>
<div id="getpoints">
<?
  foreach($sites as $sit){
?>	
<div class="follow<?=($sit['premium'] > 0 ? '_vip' : '')?>" id="<?=$sit['id']?>">
	<center>
		<a href="<?=$sit['url']?>" target="_blank"><?=truncate($sit['title'], 10)?></a><br /><br /><b><?=$lang['b_42']?></b>: <?=($sit['cpc']-1)?><br>
		<a href="javascript:void(0);" onclick="ModulePopup('<?=$sit['id']?>','<?=$sit['url']?>','Stumbleupon','<?=($sit['cpc']-1)?>','1');" class="followbutton"><?=$lang['su_05']?></a>
		<font style="font-size:0.8em;">[<a href="javascript:void(0);" onclick="skipuser('<?=$sit['id']?>','<?=$sit['url']?>');remove('<?=$sit['id']?>');" style="color: #999999;font-size:0.9em;"><?=$lang['su_04']?></a>]</font>
		<span style="position:absolute;bottom:1px;right:2px;"><a href="javascript:void(0);" onclick="report_page('<?=$sit['id']?>','<?=base64_encode($sit['url'])?>','stumble');"><img src="img/report.png" alt="Report" title="Report" border="0" /></a></span>
	</center>
</div>
<?}?>
</div>
<?}else{?>
<div class="msg">
<div class="error"><?=$lang['b_163']?></div>
<div class="info"><a href="buy.php"><b><?=$lang['b_164']?></b></a></div></div>
<?}?>