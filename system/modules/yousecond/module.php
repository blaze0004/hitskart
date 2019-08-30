<?if(! defined('BASEPATH') ){ exit('Unable to view file.'); }?>
<h2 class="title"><?=$lang['b_162']?> - YouSecond</h2>
<?
$dbt_value = '';
if($site['target_system'] != 2){
	$dbt_value = " AND (a.country = '".$data['country']."' OR a.country = '0') AND (a.sex = '".$data['sex']."' OR a.sex = '0')";
}

$sql = $db->Query("SELECT a.id, a.url, a.title, a.p_av, a.cpc, b.premium FROM yousecond a LEFT JOIN users b ON b.id = a.user LEFT JOIN yousecond_done c ON c.user_id = '".$data['id']."' AND c.site_id = a.id WHERE a.active = '0' AND (b.coins >= a.cpc AND a.cpc >= '2') AND (c.site_id IS NULL AND a.user !='".$data['id']."')".$dbt_value." ORDER BY a.cpc DESC, b.premium DESC".($site['mysql_random'] == 1 ? ', RAND()' : '')." LIMIT 14");
$sites = $db->FetchArrayAll($sql);

if($sites != FALSE){
?>
<script type="text/javascript">
	msg1 = '<?=mysql_escape_string($lang['ys_08'])?>';
	msg2 = '<?=mysql_escape_string($lang['ys_09'])?>';
	msg3 = '<?=mysql_escape_string($lang['ys_10'])?>';
	msg4 = '<?=mysql_escape_string($lang['ys_11'])?>';
	msg5 = '<?=mysql_escape_string($lang['ys_12'])?>';
	var report_msg1 = '<?=mysql_escape_string($lang['b_277'])?>';
	var report_msg2 = '<?=mysql_escape_string($lang['b_236'])?>';
	var report_msg3 = '<?=mysql_escape_string($lang['b_237'])?>';
	var report_msg4 = '<?=mysql_escape_string(lang_rep($lang['b_252'], array('-NUM-' => $site['report_limit'])))?>';
	hideref = <?=($site['hideref'] != '' ? $site['hideref'] : 0)?>;
	rs_key = '<?=($site['revshare_api'] != '' ? $site['revshare_api'] : 0)?>';
	var start_click = 1;
	var end_click = <?=$db->GetNumRows($sql)?>;
	eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('4 7(a,b,c){8 e=9(f);g(e){$.h({i:"j",5:"k/l.m",n:o,p:"q="+a+"&5="+b+"&r="+c+"&s="+e,t:4(d){u(d){6\'1\':0(v);w(a,\'1\');3;6\'2\':0(x);3;y:0(z);3}}})}}',36,36,'alert|||break|function|url|case|report_page|var|prompt||||||report_msg1|if|ajax|type|POST|system|report|php|cache|false|data|id|module|reason|success|switch|report_msg2|skipuser|report_msg4|default|report_msg3'.split('|'),0,{}))
	eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('4 x(){8(y<Y){y=y+1}q{O.Z(10)}}4 11(b,d){$("#5").6("<m z=\\"m/A.B\\" /><C>");$.D({E:"F",G:"H/I/n/J.K",L:"12=13&14="+b,t:4(a){$("#5").6(a);M(b);x()}})}o p;4 15(d,e,f,w,h,g,i){8(p&&!p.P){}q{o j=Q.R/2-w/2;o k=Q.S/2-h/2;o l="s://n.N/"+e;$("#5").6("<m z=\\"m/A.B\\" /><C>");$.D({E:"F",G:"H/I/n/J.K",L:"16=1&17="+d,t:4(a){8(!18(a)){$("#5").6("<3 7=\\"u\\"><3 7=\\"19\\">"+1a+"</3></3>");o b=1b(4(){p.1c()},1d);o c=1e(4(){8(p.P){T(c);T(b);U(d,g,i)}},1f)}q{$("#5").6("<3 7=\\"u\\"><3 7=\\"V\\">"+1g+"</3></3>")}}});8(v==1){l=\'s://v.W/?s://n.N/\'+e}q 8(v==2&&X!=\'0\'){l=\'s://1h.v.W/r/\'+X+\'/s://n.N/\'+e}p=1i.1j(l,f,"1k=9, O=9, 1l=9, 1m=9, 1n=9, 1o=1p, 1q=9, 1r=9, R="+w+", S="+h+", 1s="+k+", 1t="+j)}}4 U(b,c,e){$("#5").6("<m z=\\"m/A.B\\" /><C>");$.D({E:"F",G:"H/I/n/J.K",1u:1v,L:"1w="+b,t:4(a){8(a==1){$("#5").6("<3 7=\\"u\\"><3 7=\\"t\\">"+1x+" <b>"+c+"</b>"+1y+"</3></3>");M(b);x()}q{$("#5").6("<3 7=\\"u\\"><3 7=\\"V\\">"+1z+"</3></3>")}}})}4 M(a){1A.1B(a).1C.1D="1E"}',62,103,'|||div|function|Hint|html|class|if|no|||||||||||||img|yousecond|var|targetWin|else||http|success|msg|hideref||click_refresh|start_click|src|loader|gif|br|ajax|type|POST|url|system|modules|process|php|data|remove|net|location|closed|screen|width|height|clearTimeout|do_click|error|org|rs_key|end_click|reload|true|skipuser|step|skip|sid|ModulePopup|get|pid|isNaN|info|msg1|setTimeout|close|25000|setInterval|1000|msg2|rs|window|open|toolbar|directories|status|menubar|scrollbars|yes|resizable|copyhistory|top|left|cache|false|id|msg3|msg4|msg5|document|getElementById|style|display|none'.split('|'),0,{}))
</script>
<div id="Hint"></div>
<div id="getpoints">
<?
  foreach($sites as $sit){
?>	
<div class="follow<?=($sit['premium'] > 0 ? '_vip' : '')?>" id="<?=$sit['id']?>">
	<center>
		<img src="<?=$sit['p_av']?>" width="48" height="48" alt="<?=truncate($sit['title'], 10)?>" title="<?=truncate($sit['title'], 10)?>" border="0" /><br /><b><?=$lang['b_42']?></b>: <?=($sit['cpc']-1)?><br>
		<a href="javascript:void(0);" onclick="ModulePopup('<?=$sit['id']?>','<?=$sit['url']?>','YouSecond','900','450','<?=($sit['cpc']-1)?>','1');" class="followbutton"><?=$lang['inst_05']?></a>
		<font style="font-size:0.8em;">[<a href="javascript:void(0);" onclick="skipuser('<?=$sit['id']?>','1');" style="color: #999999;font-size:0.9em;"><?=$lang['inst_07']?></a>]</font>
		<span style="position:absolute;bottom:1px;right:2px;"><a href="javascript:void(0);" onclick="report_page('<?=$sit['id']?>','<?=base64_encode('http://yousecond.net/'.$sit['url'].'/')?>','yousecond');"><img src="img/report.png" alt="Report" title="Report" border="0" /></a></span>
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