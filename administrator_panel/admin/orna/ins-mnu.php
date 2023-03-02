<?php
include('../orna/db.php');
@$reg_id=$_POST['reg_id'];
@$f_nm=$_POST['f_nm'];
@$f_lnk=$_POST['f_lnk'];
@$user=$_POST['user'];
@$icon=$_POST['icon'];
@$dt=date('d-M-Y D');

$sql_query="INSERT INTO ornasys_mnu (`id`, `reg_id`, `f_nm`, `f_lnk`, `user`, `dt`, `icon`) VALUES (NULL, '$reg_id', '$f_nm', '$f_lnk', '$user', '$dt', '$icon');";
if(!mysql_query($sql_query)){
	die( "There is some problem ". mysql_error());
	}
else{
		print"<script language=\"javascript\" type=\"text/javascript\">
		alert(\"Records Applied And Saved\");
		window.history.back()
		</script>";
	};
?>