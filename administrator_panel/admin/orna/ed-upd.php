<?php
session_start();
if(!isset( $_SESSION['myusername'])){
header("location:../index.php");
}
include('db.php');

$t_name = $_GET['t_name'];
$id=$_GET['id'];




//function
function upd_query(){
$t_name = $_GET['t_name'];
$t_field='desc '.$t_name;
$ed_desc_query=mysql_query($t_field);
$result=" ";
	while($ed_desc=mysql_fetch_array($ed_desc_query)){
		$ed_value=@$_POST[$ed_desc['Field']];
		$result.=$ed_desc['Field']."='".addslashes($ed_value)."',";
		};

//update table set field=value, field=value wher id= 1111;
return $result;

};
//function end
$comma_rem= substr(upd_query(),0,strlen(upd_query())-1);

$myquery="update ".$t_name." set ". $comma_rem ." where id = " . $id;


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