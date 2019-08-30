<?php
if(!mysql_num_rows(mysql_query("SHOW TABLES LIKE 'facebook'"))){
	executeSql("system/modules/facebook/db.sql");
}else{
	@unlink(realpath(dirname(__FILE__)).'/db.sql');
	@unlink(realpath(dirname(__FILE__)).'/db_update.php');
}
?>