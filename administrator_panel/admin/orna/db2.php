<?php
header("Access-Control-Allow-Origin: *");
$user_enc = fread(fopen($path."duf", "r"), filesize($path."duf"));
$MySQL_username = $user_enc;
//pass
$pass_enc = fread(fopen($path."dpf", "r"), filesize($path."dpf"));
$MySQL_password =$pass_enc;
//DB Name
$dbn_enc = fread(fopen($path."dnf", "r"), filesize($path."dnf"));
$MySQL_database = $dbn_enc;
$MySQL_host= 'localhost';

if (!($connection = @mysql_connect($MySQL_host, $MySQL_username, $MySQL_password)))
	die('(Error-00DUP-E-ORNA) There is some problem in the server, pleae come back later');
if (!@mysql_select_db($MySQL_database, $connection))
	die('There is some problem in the server, please come back later.. or contact www.ornamentsolutions.com for support. ERROR : DBN/A');
	
    date_default_timezone_set('Asia/Dubai');   
    mysql_query("set time_zone='+04:00'");

	$mysql_query = mysql_query("select * from ornasys");
	$co_nnarray=mysql_fetch_array($mysql_query);
	 	$company = $co_nnarray['user'];
		$logo = $co_nnarray['logo'];
		$domain = $co_nnarray['domain'];
	
?>