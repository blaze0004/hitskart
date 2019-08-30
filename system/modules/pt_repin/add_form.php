<?
define('BASEPATH', true);
include('../../config.php');
?>
<p>
	<label><?=$lang['repin_url']?></label> <small style="float:right"><?=$lang['repin_url_desc']?></small><br/>
	<input class="text-max" type="text" value="http://" name="url" />
</p>