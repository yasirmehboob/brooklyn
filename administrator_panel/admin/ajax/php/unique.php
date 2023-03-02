<?php
$path = '../../orna/';
require_once('../../orna/db.php');

$table=@$_POST['table'];
$field=@$_POST['field'];
$value=@$_POST['value'];

$sql="SELECT * FROM `".$table."` WHERE `".$field."`='$value'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);	
if($count>=1){
    die("exist");}

?>