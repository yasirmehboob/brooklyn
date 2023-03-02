<?php

$path ='orna/';
//user
$user_enc = fread(fopen('orna/duf', "r"), filesize('orna/duf'));
$MySQL_username = base64_decode($user_enc);
fclose(fopen('orna/duf', "r"));
//pass
$pass_enc = fread(fopen('orna/dpf', "r"), filesize('orna/dpf'));
$MySQL_password = base64_decode($pass_enc);
fclose(fopen('orna/dpf', "r"));
//DB Name
$dbn_enc = fread(fopen('orna/dnf', "r"), filesize('orna/dnf'));
$MySQL_database = base64_decode($dbn_enc);
fclose(fopen('orna/dnf', "r"));

$MySQL_host= 'localhost';

if (!($connection = @mysql_connect($MySQL_host, $MySQL_username, $MySQL_password)))
	die('(Error-00DUP-E-ORNA) There is some problem in the Database server, please try again later or contact at error@ornamentsolutions.com'.mysql_error());
	
if (!@mysql_select_db($MySQL_database, $connection))
	die('There is some problem in the server, please come back later.. or contact www.ornamentsolutions.com for support. ERROR : DBN/A');

$tbl_name="users"; // Table name 

// username and password sent from form 
$myusername=$_POST['user']; 
$mypassword=$_POST['pass'];


// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$mypassword = md5($mypassword);

$login="SELECT * FROM $tbl_name WHERE name='$myusername' and password='$mypassword'";
$result=mysql_query($login);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

session_start();
$_SESSION['token']=$myusername; 
// Register $myusername, $mypassword and redirect to file "menu"
$_SESSION['myusername']=$myusername; // for new version
$_SESSION['mypassword']=$mypassword; // for new version

//session_start('myusername'); // for previous version of php lower then 5.3
//session_start('mypassword'); // for previous version of php lower then 5.3

header("location:../menu.php");
}
else {
echo "Wrong Username or Password ";
}
ob_end_flush();
?>