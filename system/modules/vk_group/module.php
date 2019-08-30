<?if(! defined('BASEPATH') ){ exit('Unable to view file.'); }?>
<h2 class="title"><?=$lang['b_162']?> - VK Groups</h2>	
<div class="infobox"><div class="ucp_link" style="margin-right:5px;display:inline-block"><a href="p.php?p=vk">VK Pages</a></div><div class="ucp_link active" style="margin-right:5px;display:inline-block"><a href="p.php?p=vk_group">VK Groups</a></div></div><br />
<?
$dbt_value = '';
if($site['target_system'] != 2){
	$dbt_value = " AND (a.country = '".$data['country']."' OR a.country = '0') AND (a.sex = '".$data['sex']."' OR a.sex = '0')";
}

$sql = $db->Query("SELECT a.id, a.url, a.title, a.vk_photo, a.cpc, b.premium FROM vk_group a LEFT JOIN users b ON b.id = a.user LEFT JOIN vkg_done c ON c.user_id = '".$data['id']."' AND c.site_id = a.id WHERE a.active = '0' AND (b.coins >= a.cpc AND a.cpc >= '2') AND (c.site_id IS NULL AND a.user !='".$data['id']."')".$dbt_value." ORDER BY a.cpc DESC, b.premium DESC".($site['mysql_random'] == 1 ? ', RAND()' : '')." LIMIT 14");
$sites = $db->FetchArrayAll($sql);
if($sites != FALSE){
?>
<script type="text/javascript">
	msg1 = '<?=mysql_escape_string($lang['vkg_07'])?>';
	msg2 = '<?=mysql_escape_string($lang['vkg_08'])?>';
	msg3 = '<?=mysql_escape_string($lang['vkg_09'])?>';
	msg4 = '<?=mysql_escape_string($lang['vkg_10'])?>';
	msg5 = '<?=mysql_escape_string($lang['vkg_11'])?>';
	var report_msg1 = '<?=mysql_escape_string($lang['b_277'])?>';
	var report_msg2 = '<?=mysql_escape_string($lang['b_236'])?>';
	var report_msg3 = '<?=mysql_escape_string($lang['b_237'])?>';
	var report_msg4 = '<?=mysql_escape_string(lang_rep($lang['b_252'], array('-NUM-' => $site['report_limit'])))?>';
	hideref = <?=($site['hideref'] != '' ? $site['hideref'] : 0)?>;
	rs_key = '<?=($site['revshare_api'] != '' ? $site['revshare_api'] : 0)?>';
	var start_click = 1;
	var end_click = <?=$db->GetNumRows($sql)?>;
	eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('4 7(a,b,c){8 e=9(f);g(e){$.h({i:"j",5:"k/l.m",n:o,p:"q="+a+"&5="+b+"&r="+c+"&s="+e,t:4(d){u(d){6\'1\':0(v);w(a,\'1\');3;6\'2\':0(x);3;y:0(z);3}}})}}',36,36,'alert|||break|function|url|case|report_page|var|prompt||||||report_msg1|if|ajax|type|POST|system|report|php|cache|false|data|id|module|reason|success|switch|report_msg2|skipuser|report_msg4|default|report_msg3'.split('|'),0,{}))
	eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('4 B(){8(C<12){C=C+1}p{P.13(14)}}4 15(b,d){$("#6").5("<m D=\\"m/E.F\\" /><G>");$.u({v:"H",q:"x/I/J/K.y",L:"16=17&18="+b,s:4(a){$("#6").5(a);M(b);B()}})}n o;4 19(d,e,f,w,h,g,i){8(o&&!o.Q){}p{n j=R.S/2-w/2;n k=R.T/2-h/2;n l=\'t://N.O/\'+e;$("#6").5("<m D=\\"m/E.F\\" /><G>");$.u({v:"H",q:"x/I/J/K.y",L:"1a=1&q="+e+"&1b="+d,s:4(a){8(!1c(a)){$("#6").5("<3 7=\\"z\\"><3 7=\\"1d\\">"+1e+"</3></3>");n b=1f(4(){o.1g()},1h);n c=1i(4(){8(o.Q){U(c);U(b);V(d,g,i)}},1j)}p{$("#6").5("<3 7=\\"z\\"><3 7=\\"W\\">"+1k+"</3></3>")}}});8(A==1){l="t://A.X/?t://N.O/"+e}p 8(A==2&&Y!=\'0\'){l=\'t://1l.A.X/r/\'+Y+\'/t://N.O/\'+e}o=1m.1n(l,f,"1o=9, P=9, 1p=9, 1q=9, 1r=9, 1s=1t, 1u=9, 1v=9, S="+w+", T="+h+", 1w="+k+", 1x="+j)}}4 V(b,c,e){$("#6").5("<m D=\\"m/E.F\\" /><G>");$.u({v:"H",q:"x/I/J/K.y",Z:10,L:"1y="+b,s:4(a){8(a==1){$("#6").5("<3 7=\\"z\\"><3 7=\\"s\\">"+1z+" <b>"+c+"</b>"+1A+"</3></3>");M(b);B();11()}p{$("#6").5("<3 7=\\"z\\"><3 7=\\"W\\">"+1B+"</3></3>")}}})}4 M(a){1C.1D(a).1E.1F="1G"}4 11(){$.u({v:"1H",q:"x/1I.y",Z:10,s:4(a){$("#1J").5(a)}})}',62,108,'|||div|function|html|Hint|class|if|no|||||||||||||img|var|targetWin|else|url||success|http|ajax|type||system|php|msg|hideref|click_refresh|start_click|src|loader|gif|br|POST|modules|vk_group|process|data|remove|vk|com|location|closed|screen|width|height|clearTimeout|do_click|error|org|rs_key|cache|false|refresh_coins|end_click|reload|true|skipuser|step|skip|sid|ModulePopup|get|pid|isNaN|info|msg1|setTimeout|close|25000|setInterval|1000|msg2|rs|window|open|toolbar|directories|status|menubar|scrollbars|yes|resizable|copyhistory|top|left|id|msg4|msg5|msg3|document|getElementById|style|display|none|GET|uCoins|c_coins'.split('|'),0,{}))
</script>
<center><div id="Hint"></div></center>
<div id="tbl">
<?
	foreach($sites as $sit){
?>	
<div class="follow<?=($sit['premium'] > 0 ? '_vip' : '')?>" id="<?=$sit['id']?>">
	<center>
		<span style="display:block;height:50px"><img src="<?=$sit['vk_photo']?>" height="50" alt="<?=truncate($sit['title'], 50)?>" /></span><b><?=$lang['b_42']?></b>: <?=($sit['cpc']-1)?><br>
		<a href="javascript:void(0);" onclick="ModulePopup('<?=$sit['id']?>','<?=$sit['url']?>','VK','900','550','<?=($sit['cpc']-1)?>','1');" class="followbutton"><?=$lang['vkg_12']?></a>
		<font style="font-size:0.8em;">[<a href="javascript:void(0);" onclick="skipuser('<?=$sit['id']?>','1');" style="color: #999999;font-size:0.9em;"><?=$lang['vkg_14']?></a>]</font>
		<span style="position:absolute;bottom:1px;right:2px;"><a href="javascript:void(0);" onclick="report_page('<?=$sit['id']?>','<?=base64_encode('http://vk.com/'.$sit['url'])?>','vk_group');"><img src="img/report.png" alt="Report" title="Report" border="0" /></a></span>
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