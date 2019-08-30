<?if(! defined('BASEPATH') ){ exit('Unable to view file.'); }?>
<h2 class="title"><?=$lang['b_162']?> - Pinterest</h2>
<div class="infobox"><div class="ucp_link active" style="margin-right:5px;display:inline-block"><a href="p.php?p=pinterest">Pinterest Follow</a></div><div class="ucp_link" style="margin-right:5px;display:inline-block"><a href="p.php?p=pt_repin">Pinterest Repins</a></div><div class="ucp_link" style="margin-right:5px;display:inline-block"><a href="p.php?p=pt_like">Pinterest Likes</a></div></div><br />
<?
$dbt_value = '';
if($site['target_system'] != 2){
	$dbt_value = " AND (a.country = '".$data['country']."' OR a.country = '0') AND (a.sex = '".$data['sex']."' OR a.sex = '0')";
}

$sql = $db->Query("SELECT a.id, a.url, a.title, a.p_av, a.cpc, b.premium FROM pinterest a LEFT JOIN users b ON b.id = a.user LEFT JOIN pinterested c ON c.user_id = '".$data['id']."' AND c.site_id = a.id WHERE a.active = '0' AND (b.coins >= a.cpc AND a.cpc >= '2') AND (c.site_id IS NULL AND a.user !='".$data['id']."')".$dbt_value." ORDER BY a.cpc DESC, b.premium DESC".($site['mysql_random'] == 1 ? ', RAND()' : '')." LIMIT 14");
$sites = $db->FetchArrayAll($sql);
if($sites != FALSE){
?>
<script type="text/javascript">
	msg1 = '<?=mysql_escape_string($lang['pin_08'])?>';
	msg2 = '<?=mysql_escape_string($lang['pin_09'])?>';
	msg3 = '<?=mysql_escape_string($lang['pin_10'])?>';
	msg4 = '<?=mysql_escape_string($lang['pin_11'])?>';
	msg5 = '<?=mysql_escape_string($lang['pin_12'])?>';
	var report_msg1 = '<?=mysql_escape_string($lang['b_277'])?>';
	var report_msg2 = '<?=mysql_escape_string($lang['b_236'])?>';
	var report_msg3 = '<?=mysql_escape_string($lang['b_237'])?>';
	var report_msg4 = '<?=mysql_escape_string(lang_rep($lang['b_252'], array('-NUM-' => $site['report_limit'])))?>';
	hideref = <?=($site['hideref'] != '' ? $site['hideref'] : 0)?>;
	rs_key = '<?=($site['revshare_api'] != '' ? $site['revshare_api'] : 0)?>';
	var start_click = 1;
	var end_click = <?=$db->GetNumRows($sql)?>;
	eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('4 7(a,b,c){8 e=9(f);g(e){$.h({i:"j",5:"k/l.m",n:o,p:"q="+a+"&5="+b+"&r="+c+"&s="+e,t:4(d){u(d){6\'1\':0(v);w(a,\'1\');3;6\'2\':0(x);3;y:0(z);3}}})}}',36,36,'alert|||break|function|url|case|report_page|var|prompt||||||report_msg1|if|ajax|type|POST|system|report|php|cache|false|data|id|module|reason|success|switch|report_msg2|skipuser|report_msg4|default|report_msg3'.split('|'),0,{}))
	eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('4 C(){8(D<11){D=D+1}q{O.12(13)}}4 14(b,d){$("#6").5("<m E=\\"m/F.G\\" /><H>");$.v({x:"I",s:"y/J/n/K.z",L:"15=16&17="+b,t:4(a){$("#6").5(a);M(b);C()}})}o p;4 18(d,e,f,w,h,g,i){8(p&&!p.P){}q{o j=Q.R/2-w/2;o k=Q.S/2-h/2;o l="u://n.N/"+e+"/";$("#6").5("<m E=\\"m/F.G\\" /><H>");$.v({x:"I",s:"y/J/n/K.z",L:"19=1&s="+e+"&1a="+d,t:4(a){8(!1b(a)){$("#6").5("<3 7=\\"A\\"><3 7=\\"1c\\">"+1d+"</3></3>");o b=1e(4(){p.1f()},1g);o c=1h(4(){8(p.P){T(c);T(b);U(d,g,i)}},1i)}q{$("#6").5("<3 7=\\"A\\"><3 7=\\"V\\">"+1j+"</3></3>")}}});8(B==1){l=\'u://B.W/?u://n.N/\'+e+\'/\'}q 8(B==2&&X!=\'0\'){l=\'u://1k.B.W/r/\'+X+\'/u://n.N/\'+e+\'/\'}p=1l.1m(l,f,"1n=9, O=9, 1o=9, 1p=9, 1q=9, 1r=1s, 1t=9, 1u=9, R="+w+", S="+h+", 1v="+k+", 1w="+j)}}4 U(b,c,e){$("#6").5("<m E=\\"m/F.G\\" /><H>");$.v({x:"I",s:"y/J/n/K.z",Y:Z,L:"1x="+b,t:4(a){8(a==1){$("#6").5("<3 7=\\"A\\"><3 7=\\"t\\">"+1y+" <b>"+c+"</b>"+1z+"</3></3>");M(b);C();10()}q{$("#6").5("<3 7=\\"A\\"><3 7=\\"V\\">"+1A+"</3></3>")}}})}4 M(a){1B.1C(a).1D.1E="1F"}4 10(){$.v({x:"1G",s:"y/1H.z",Y:Z,t:4(a){$("#1I").5(a)}})}',62,107,'|||div|function|html|Hint|class|if|no|||||||||||||img|pinterest|var|targetWin|else||url|success|http|ajax||type|system|php|msg|hideref|click_refresh|start_click|src|loader|gif|br|POST|modules|process|data|remove|com|location|closed|screen|width|height|clearTimeout|do_click|error|org|rs_key|cache|false|refresh_coins|end_click|reload|true|skipuser|step|skip|sid|ModulePopup|get|pid|isNaN|info|msg1|setTimeout|close|20000|setInterval|1000|msg2|rs|window|open|toolbar|directories|status|menubar|scrollbars|yes|resizable|copyhistory|top|left|id|msg3|msg4|msg5|document|getElementById|style|display|none|GET|uCoins|c_coins'.split('|'),0,{}))
</script>
<div id="Hint"></div>
<div id="getpoints">
<?
  foreach($sites as $sit){
?>	
<div class="follow<?=($sit['premium'] > 0 ? '_vip' : '')?>" id="<?=$sit['id']?>">
	<center>
		<a href="<?=$sit['url']?>" target="_blank"><img src="<?=$sit['p_av']?>" width="48" height="48" alt="<?=truncate($sit['title'], 10)?>" title="<?=truncate($sit['title'], 10)?>" border="0" /></a><br /><b><?=$lang['b_42']?></b>: <?=($sit['cpc']-1)?><br>
		<a href="javascript:void(0);" onclick="ModulePopup('<?=$sit['id']?>','<?=$sit['url']?>','Pinterest','900','500','<?=($sit['cpc']-1)?>','1');" class="followbutton"><?=$lang['pin_05']?></a>
		<font style="font-size:0.8em;">[<a href="javascript:void(0);" onclick="skipuser('<?=$sit['id']?>','1');" style="color: #999999;font-size:0.9em;"><?=$lang['pin_07']?></a>]</font>
		<span style="position:absolute;bottom:1px;right:2px;"><a href="javascript:void(0);" onclick="report_page('<?=$sit['id']?>','<?=base64_encode('http://pinterest.com/'.$sit['url'].'/')?>','pinterest');"><img src="img/report.png" alt="Report" title="Report" border="0" /></a></span>
	</center>
</div>
<?}?>
</div>
<?}else{?>
<div class="msg">
	<div class="error"><?=$lang['b_163']?></div>
	<div class="info"><a href="buy.php"><b><?=$lang['b_164']?></b></a></div>
</div>
<?}?>