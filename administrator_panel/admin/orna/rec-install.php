<?php
session_start();
if(!isset( $_SESSION['myusername'])){
header("location:../index.php");
}
include('db.php');
$id=$_GET['id'];
$user=$_GET['user'];
$pay_mod=$_POST['pay_mod'];
$chq_no=$_POST['chq_no'];
$descp=$_POST['descp'];
$rec_amt=$_POST['rec_amt'];
$fine_amt=$_GET['sur'];
$rec_dt=date('m/d/Y');


$myquery="update install_trans set pay_mod='$pay_mod',chq_no='$chq_no',descp='$descp',rec_amt='$rec_amt',fine_amt='$fine_amt',rec_dt='$rec_dt',p_yn='y' where install_id='".$id."'";

$act_query="INSERT INTO act (`id`, `t_ref`, `r_ref`, `act`, `user`, `status`, `dt`) VALUES (NULL, 'install_trans', '$id', 'rec', '$user', 'l', '$rec_dt');";

if(!mysql_query($myquery) or !mysql_query($act_query)){
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