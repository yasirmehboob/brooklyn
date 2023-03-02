<?php
include('../orna/db.php');
@$rack_nm=$_POST['rack_nm'];
$sql_query="INSERT INTO rack (`id`, `rack_nm`) VALUES (NULL, '$rack_nm')";
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