<?php
session_start();
if(!isset( $_SESSION['myusername'])){
header("location:../index.php");
}
include('db.php');

$t_name = $_GET['t_name'];
$id=$_GET['id'];

if(strlen(@$_POST['element_2_2'])==1){
	$day_fst=str_pad(@$_POST['element_2_2'],2,"0",STR_PAD_LEFT);}
	else{$day_fst=$_POST['element_2_2'];}

@$dt=$_POST['element_2_1'].'/'.$day_fst.'/'.$_POST['element_2_3'];

$myquery="UPDATE ".$t_name." SET dt='".$dt."' , lst_dt='".$dt."' WHERE id='".$id."'";

if(!mysql_query($myquery)){
	die('Error submitting data  please contact OrnamentSolutions '   .  mysql_error());
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