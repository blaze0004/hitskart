<?php
include('header.php');
if(!$is_online){
	redirect('index.php');
}
$db->Query("UPDATE `users` SET `offerclick`='".$data['offerclick']."'+'1' WHERE `id`='".$data['id']."'");
if(isset($_POST['switch_coins'])){
	$_POST['switch_coins'];
	$rewardcoin = 0; 
		if($data['offerreward'] == 1){ $db->Query("UPDATE `users` SET `offerreward`='.$rewardcoin.' WHERE `id`='".$data['id']."'");location.reload();}
		}
if(isset($_POST['switch_money'])){
		alert($_POST['switch_money']);
	$rewardmoney = 1; 
		if($data['offerreward'] == 0){ $db->Query("UPDATE `users` SET `offerreward`='.$rewardmoney.' WHERE `id`='".$data['id']."'");location.reload();}
		}
	
?>

<div class="content">
<h2 class="title"><?=$lang['b_350']?></h2>
<div class="switch">
    <input type="radio" class="switch-input" name="switch_coins" value="Coins" id="coins">
    <label for="coins" class="switch-label switch-label-off" >Coins</label>
    <input type="radio" class="switch-input" name="switch_money" value="Money" id="money">
    <label for="money" class="switch-label switch-label-on">Money</label>
      <span class="switch-selection"></span>
</div>
<div id="wcomp"><p>Please do not close and refresh this window</p><div class="spinner">
  <div class="bounce1"></div>
  <div class="bounce2"></div>
  <div class="bounce3"></div>
</div><p>Waiting For Offer Completion..</p>
</div>
<div id="offercheck"><table id="offercname">
  <tr>
    <th scope="col">Preview</th>
    <th scope="col">Name</th>
    <th scope="col">Description</th>
    <th scope="col" class="reward">Rewards</th>
  </tr>
</table>

<?php
$reward_type = $data['offerreward'];
$tracking_id = $data['login'].' '.$data['offerclick']; //This is used to track the user doing the offer. can be email, clickid, subid.. etc
$userip = $_SERVER['REMOTE_ADDR']; //We need to get the users ip, so the rss feed can display the correct offers for their country.
$user_agent = $_SERVER['HTTP_USER_AGENT']; //lets collect their user agent to pass along.
$max_offers = 30; //max number of offers to display.

$offer_cnt = 0;
$feedurl = 'http://www.cpagrip.com/common/offer_feed_rss.php?user_id=9428&key=03c44cd9328863945e48667d13f43075&ip='.$userip.'&ua='.urlencode($user_agent).'&tracking_id='.urlencode($tracking_id);
if($xml = simplexml_load_file($feedurl, 'SimpleXMLElement', LIBXML_NOCDATA)) {
	foreach($xml->offers->offer as $offeritem) {
		$offer_cnt++;
		$points = floatval(($offeritem->payout)); //lets make offers worth $1.20 appear as 120 points.
		//lets use a custom tracking domain for the links :)
		if(!$reward_type){
			$points = floatval($points*200);
			$rewardtype = 'coins';
			echo '<script>document.getElementById("coins").checked = true;</script>';
			}
		else{
			$points = floatval(10/100*$points);
			$rewardtype = '$';
			echo '<script>document.getElementById("money").checked = true;</script>';
			}
		$offeritem->offerlink = str_replace('www.cpagrip.com','filetrkr.com',$offeritem->offerlink);
		
		echo '<div id="offershow"><hr>
		<table>
  <tr>
    <th scope="col">
		<section class="oimg"><img src="'.$offeritem->offerphoto.'"></section></th>
    <th scope="col"><section class="offername">'.$offeritem->title.'</section></th>
    <th scope="col"><section class="odesc">'.$offeritem->description.'</section></th>
    <th scope="col">
		<section class="coin"><a target="_blank" href="'.$offeritem->offerlink.'" id="offerbtnlink"><input type="button" onclick="start_lead_check('.$points.');" value="Earn '.$points.' '.$rewardtype.'" id="offerbtn"/></a></section></th>
  </tr>
</table><hr></div>';
		
		
		
		if($offer_cnt>=$max_offers){
			break; //lets stop listing offers and exit the loop.
		}
	}
	if($offer_cnt==0){
		echo 'Sorry there are no offers available for your region at this time.';
	}
}else{
	echo 'error fetching xml offer feed.';
}
?>

</div></div>	
<?include('footer.php');?>