<?php
/*session_start();
if(!isset( $_SESSION['myusername'])){
header("location:index.php");}*/
$path = '../../orna/';
require_once('../../orna/db.php');

$id=$_POST['id'];
$t_name=$_POST['tname'];


$sql="delete from  ".$t_name." where id='".$id."'";


if(!mysql_query($sql)){
	die("Error Deleting Data. <center> Check Manuals or Contact DBA/Administrator for Assistance.</center> " . mysql_error());}
else {
	echo "Record ID ".$id ." Successfully Deleted";}

?>