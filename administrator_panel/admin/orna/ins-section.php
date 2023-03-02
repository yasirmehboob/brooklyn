<?php
include('../orna/db.php');
@$section_nm=$_POST['section_nm'];
@$file_id=$_POST['file_id'];

$sql_query="INSERT INTO section (`id`,`section_nm` ,`file_id`) VALUES (NULL, '$section_nm',  '$file_id')";
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