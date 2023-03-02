<?php
$path ='orna/';
require_once 'orna/db2.php';

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

header("location:menu/menu.php");
}
else {
echo "Wrong Username or Password ";
}
ob_end_flush();
?>