<?
define('BASEPATH', true);
include('../../config.php');
?>
<p>
	<label><?=$lang['likepin_url']?></label> <small style="float:right"><?=$lang['likepin_url_desc']?></small><br/>
	<input class="text-max" type="text" value="http://" name="url" />
</p>