<?php
session_start();
if(!isset( $_SESSION['myusername'])){
header("location:../index.php");
}
include('db.php');
@$albm_nm=$_POST['albm_nm'];
@$descp=$_POST['descp'];
$sql="INSERT INTO `albm`(`id`, `albm_nm`,`descp`) VALUES 
('', '$albm_nm','$descp')";

if(!mysql_query($sql)){
	die('error submitting data  Please contact DIT Ornament Solutions'   .  mysql_error());
	}	
else echo'Uploaded Successfully ';

mysql_close();
	
?>


