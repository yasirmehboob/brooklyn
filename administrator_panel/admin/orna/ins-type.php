<?php
session_start();
if(!isset( $_SESSION['myusername'])){
header("location:../index.php");
}
include('../news/database.php');
$db = new Database;
@$type=$_POST['type'];

$sql="INSERT INTO `type` (`id`, `type`) VALUES (NULL, '$type');";


if(!mysql_query($sql)){
	die('error submitting data  Please contact OrnamentSolutions '   .  mysql_error());
	}	
		
else {print"
<script language=\"javascript\" type=\"text/javascript\">
alert(\"Registration Submitted Successfully\");
window.history.back()
</script>";
}

mysql_close();
ob_end_flush();
?>


