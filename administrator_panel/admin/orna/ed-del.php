<?php
include('../orna/ornasys.inc');
session_start();
if(!isset( $_SESSION['myusername'])){
header("location:../restricted/error.php");
};
include('db.php');

$id=$_GET['id'];
$t_name=$_GET['t_name'];
$user=$_SESSION['myusername'];
$dt=date('m/d/Y m:i:s');
$ip = $_SERVER["REMOTE_ADDR"];

$sql='delete from '.$t_name.' where id='.$id;
$act_query="INSERT INTO act (`id`, `t_ref`, `r_ref`, `act`, `user`, `ip`, `status`, `dt`) VALUES (NULL, '$t_name', '$id', 'del', '$user', '$ip', 'l', '$dt');";

if(!mysql_query($sql) or !mysql_query($act_query)){
	die("Error Deleting Data. Please Contact www.OrnamentSolutions.com " . mysql_error());}
else {
	print"
<script language=\"javascript\" type=\"text/javascript\">
alert(\"Successfully Deleted\");
window.history.back()
</script>";}

?>