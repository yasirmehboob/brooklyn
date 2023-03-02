<?php
include('db.php');
$mysql_query = mysql_query("select * from ornasys");
	$co_nnarray=mysql_fetch_array($mysql_query);
	 	$company = $co_nnarray['user'];
		$logo = $co_nnarray['logo'];
		$domain = $co_nnarray['domain'];
?>