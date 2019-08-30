<?if(! defined('BASEPATH') ){ exit('Unable to view file.'); }
$fbType = (isset($_GET['t']) && $_GET['t'] == 'web' ? 0 : 1);
function get_fb_id($page){
	$id = explode('/', $page);
	$id = (!empty($id[5]) ? $id[5] : $id[3]);
	$id = explode('?', $id);
	return $id[0];
}
?>
<h2 class="title"><?=$lang['b_162']?> - Facebook</h2>	
<div class="infobox"><div class="ucp_link<?=($fbType != 0 ? ' active' : '')?>" style="margin-right:5px;display:inline-block"><a href="p.php?p=facebook">Like Fanpages</a></div><div class="ucp_link<?=($fbType == 0 ? ' active' : '')?>" style="margin-right:5px;display:inline-block"><a href="p.php?p=facebook&t=web">Like Websites</a></div><div class="ucp_link" style="margin-right:5px;display:inline-block"><a href="p.php?p=fb_photo">Like Photos</a></div></div><br />
<?
$dbt_value = '';
if($site['target_system'] != 2){
	$dbt_value = " AND (a.country = '".$data['country']."' OR a.country = '0') AND (a.sex = '".$data['sex']."' OR a.sex = '0')";
}

$sql = $db->Query("SELECT a.id, a.url, a.title, a.cpc, b.premium FROM facebook a LEFT JOIN users b ON b.id = a.user LEFT JOIN liked c ON c.user_id = '".$data['id']."' AND c.site_id = a.id WHERE a.active = '0' AND (b.coins >= a.cpc AND a.cpc >= '2') AND (c.site_id IS NULL AND a.user !='".$data['id']."')".$dbt_value." AND a.type = '".$fbType."' ORDER BY a.cpc DESC, b.premium DESC".($site['mysql_random'] == 1 ? ', RAND()' : '')." LIMIT 14");
$sites = $db->FetchArrayAll($sql);
if($sites != FALSE){
?><div id="fb-root"></div>
<script type="text/javascript">
	msg1 = '<?=mysql_escape_string($lang['fb_07'])?>';
	msg2 = '<?=mysql_escape_string($lang['fb_08'])?>';
	msg3 = '<?=mysql_escape_string($lang['fb_09'])?>';
	msg4 = '<?=mysql_escape_string($lang['fb_10'])?>';
	msg5 = '<?=mysql_escape_string($lang['fb_11'])?>';
	var report_msg1 = '<?=mysql_escape_string($lang['b_277'])?>';
	var report_msg2 = '<?=mysql_escape_string($lang['b_236'])?>';
	var report_msg3 = '<?=mysql_escape_string($lang['b_237'])?>';
	var report_msg4 = '<?=mysql_escape_string(lang_rep($lang['b_252'], array('-NUM-' => $site['report_limit'])))?>';
	var start_click = 1;
	var end_click = <?=$db->GetNumRows($sql)?>;
	eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('4 7(a,b,c){8 e=9(f);g(e){$.h({i:"j",5:"k/l.m",n:o,p:"q="+a+"&5="+b+"&r="+c+"&s="+e,t:4(d){u(d){6\'1\':0(v);w(a,\'1\');3;6\'2\':0(x);3;y:0(z);3}}})}}',36,36,'alert|||break|function|url|case|report_page|var|prompt||||||report_msg1|if|ajax|type|POST|system|report|php|cache|false|data|id|module|reason|success|switch|report_msg2|skipuser|report_msg4|default|report_msg3'.split('|'),0,{}))
<?if($fbType == 0){?>
	eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('3 y(){l(z<U){z=z+1}r{I.V(W)}}3 X(b,d){$("#5").4("<8 A=\\"8/B.C\\" /><D>");$.s({t:"E",m:"n/u/v/F.o",G:"Y=Z&10="+b,p:3(a){$("#5").4(a);H(b);y()}})}q 9;3 11(d,e,f,w,h,g,i){l(9&&!9.J){}r{q j=K.L/2-w/2;q k=K.M/2-h/2;$("#5").4("<8 A=\\"8/B.C\\" /><D>");$.s({t:"E",m:"n/u/v/F.o",G:"12=2&m="+e+"&13="+d,p:3(a){l(!14(a)){$("#5").4("<0 6=\\"x\\"><0 6=\\"15\\">"+16+"</0></0>");q b=17(3(){9.18()},19);q c=1a(3(){l(9.J){N(c);N(b);O(d,g,i)}},1b)}r{$("#5").4("<0 6=\\"x\\"><0 6=\\"P\\">"+1c+"</0></0>")}}});9=1d.1e(\'n/u/v/1f.o?Q=\'+d,f,"1g=7, I=7, 1h=7, 1i=7, 1j=7, 1k=1l, 1m=7, 1n=7, L="+w+", M="+h+", 1o="+k+", 1p="+j)}}3 O(b,c,e){$("#5").4("<8 A=\\"8/B.C\\" /><D>");$.s({t:"E",m:"n/u/v/F.o",R:S,G:"Q="+b,p:3(a){l(a==1){$("#5").4("<0 6=\\"x\\"><0 6=\\"p\\">"+1q+" <b>"+c+"</b>"+1r+"</0></0>");H(b);y();T()}r{$("#5").4("<0 6=\\"x\\"><0 6=\\"P\\">"+1s+"</0></0>")}}})}3 H(a){1t.1u(a).1v.1w="1x"}3 T(){$.s({t:"1y",m:"n/1z.o",R:S,p:3(a){$("#1A").4(a)}})}',62,99,'div|||function|html|Hint|class|no|img|targetWin||||||||||||if|url|system|php|success|var|else|ajax|type|modules|facebook||msg|click_refresh|start_click|src|loader|gif|br|POST|process|data|remove|location|closed|screen|width|height|clearTimeout|do_click|error|id|cache|false|refresh_coins|end_click|reload|true|skipuser|step|skip|sid|ModulePopup|get|pid|isNaN|info|msg1|setTimeout|close|20000|setInterval|1000|msg2|window|open|like|toolbar|directories|status|menubar|scrollbars|yes|resizable|copyhistory|top|left|msg4|msg5|msg3|document|getElementById|style|display|none|GET|uCoins|c_coins'.split('|'),0,{}))
<?}else{?>
	hideref = <?=($site['hideref'] != '' ? $site['hideref'] : 0)?>;
	rs_key = '<?=($site['revshare_api'] != '' ? $site['revshare_api'] : 0)?>';
	eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('4 A(){8(B<10){B=B+1}p{M.11(12)}}4 13(b,d){$("#6").5("<m C=\\"m/D.E\\" /><F>");$.u({q:"G",s:"v/H/I/J.x",K:"14=15&16="+b,t:4(a){$("#6").5(a);L(b);A()}})}n o;4 17(d,e,f,w,h,g,i){8(o&&!o.N){}p{n j=O.P/2-w/2;n k=O.Q/2-h/2;n l=e;$("#6").5("<m C=\\"m/D.E\\" /><F>");$.u({q:"G",s:"v/H/I/J.x",K:"18=1&s="+e+"&19="+d,t:4(a){8(!1a(a)){$("#6").5("<3 7=\\"y\\"><3 7=\\"1b\\">"+1c+"</3></3>");n b=1d(4(){o.1e()},1f);n c=1g(4(){8(o.N){R(c);R(b);S(d,g,i)}},1h)}p{$("#6").5("<3 7=\\"y\\"><3 7=\\"T\\">"+1i+"</3></3>")}}});8(z==1){l=\'U://z.V/?\'+e}p 8(z==2&&W!=\'0\'){l=\'U://1j.z.V/r/\'+W+\'/\'+e}o=1k.1l(l,f,"1m=9, M=9, 1n=9, 1o=9, 1p=9, 1q=1r, 1s=9, 1t=9, P="+w+", Q="+h+", 1u="+k+", 1v="+j)}}4 S(b,c,e){$("#6").5("<m C=\\"m/D.E\\" /><F>");$.u({q:"G",s:"v/H/I/J.x",X:Y,K:"q=1&1w="+b,t:4(a){8(a==1){$("#6").5("<3 7=\\"y\\"><3 7=\\"t\\">"+1x+" <b>"+c+"</b>"+1y+"</3></3>");L(b);A();Z()}p{$("#6").5("<3 7=\\"y\\"><3 7=\\"T\\">"+1z+"</3></3>")}}})}4 L(a){1A.1B(a).1C.1D="1E"}4 Z(){$.u({q:"1F",s:"v/1G.x",X:Y,t:4(a){$("#1H").5(a)}})}',62,106,'|||div|function|html|Hint|class|if|no|||||||||||||img|var|targetWin|else|type||url|success|ajax|system||php|msg|hideref|click_refresh|start_click|src|loader|gif|br|POST|modules|facebook|process|data|remove|location|closed|screen|width|height|clearTimeout|do_click|error|http|org|rs_key|cache|false|refresh_coins|end_click|reload|true|skipuser|step|skip|sid|ModulePopup|get|pid|isNaN|info|msg1|setTimeout|close|25000|setInterval|1000|msg2|rs|window|open|toolbar|directories|status|menubar|scrollbars|yes|resizable|copyhistory|top|left|id|msg4|msg5|msg3|document|getElementById|style|display|none|GET|uCoins|c_coins'.split('|'),0,{}))
<?}?>
</script>
<center><div id="Hint"></div></center>
<div id="tbl">
<?
	foreach($sites as $sit){
	if($fbType == 0){
?>	
<div class="follow<?=($sit['premium'] > 0 ? '_vip' : '')?>" id="<?=$sit['id']?>">
	<center>
		<span style="display:block;height:50px"><img src="img/icons/facebook.png" height="48" alt="<?=truncate($sit['title'], 25)?>" title="<?=truncate($sit['title'], 25)?>" /></span><b><?=$lang['b_42']?></b>: <?=($sit['cpc']-1)?><br />
		<a href="javascript:void(0);" onclick="ModulePopup('<?=$sit['id']?>','<?=$sit['url']?>','Like','125','120','<?=($sit['cpc']-1)?>','1');" class="followbutton"><?=$lang['fb_12']?></a>
		<font style="font-size:0.8em;">[<a href="javascript:void(0);" onclick="skipuser('<?=$sit['id']?>','1');" style="color: #999999;font-size:0.9em;"><?=$lang['fb_14']?></a>]</font>
		<span style="position:absolute;bottom:1px;right:2px;"><a href="javascript:void(0);" onclick="report_page('<?=$sit['id']?>','<?=base64_encode($sit['url'])?>','facebook');"><img src="img/report.png" alt="Report" title="Report" border="0" /></a></span>
	</center>
</div>
	<?}else{?>
<div class="follow<?=($sit['premium'] > 0 ? '_vip' : '')?>" id="<?=$sit['id']?>">
	<center>
		<span style="display:block;height:50px"><img src="https://graph.facebook.com/<?=get_fb_id($sit['url'])?>/picture" height="50" alt="<?=truncate($sit['title'], 25)?>" /></span><b><?=$lang['b_42']?></b>: <?=($sit['cpc']-1)?><br />
		<a href="javascript:void(0);" onclick="ModulePopup('<?=$sit['id']?>','<?=$sit['url']?>','Facebook','900','500','<?=($sit['cpc']-1)?>','1');" class="followbutton"><?=$lang['fb_12']?></a>
		<font style="font-size:0.8em;">[<a href="javascript:void(0);" onclick="skipuser('<?=$sit['id']?>','1');" style="color: #999999;font-size:0.9em;"><?=$lang['fb_14']?></a>]</font>
		<span style="position:absolute;bottom:1px;right:2px;"><a href="javascript:void(0);" onclick="report_page('<?=$sit['id']?>','<?=base64_encode($sit['url'])?>','facebook');"><img src="img/report.png" alt="Report" title="Report" border="0" /></a></span>
	</center>
</div>
	<?}}?>
</div>
<?}else{?>
<div class="msg">
	<div class="error"><?=$lang['b_163']?></div>
	<div class="info"><a href="buy.php"><b><?=$lang['b_164']?></b></a></div>
</div>
<?}?>