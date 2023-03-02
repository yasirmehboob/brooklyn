<?php
include('../orna/db.php');
@$file_nm=$_POST['file_nm'];
@$rack_id=$_POST['rack_id'];
$sql_query="INSERT INTO file (`id`,`file_nm` ,`rack_id`) VALUES (NULL, '$file_nm',  '$rack_id')";
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