<?php
$path = '../../orna/';
require_once('../../orna/db.php');
$table=@$_POST['table'];
//get max vnumb
$sql="SELECT `AUTO_INCREMENT` FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '".$MySQL_database."' AND   TABLE_NAME   = '".$table."'";
$id=mysql_fetch_array(mysql_query($sql));
echo $id['AUTO_INCREMENT'];
?>