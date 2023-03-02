<?php
session_start();
if(!isset( $_SESSION['myusername'])){
header("location:../index.php");
}
include('db.php');


@$user=$_POST['user'];
@$pwd=$_POST['pwd'];
@$cpwd=$_POST['cpwd'];

$login="SELECT * FROM users WHERE name='$user'";
$result=mysql_query($login);
// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If user not already exixts and passwords matched then 
if(($pwd===$cpwd) and ($count==0)){
$pwd=md5($pwd);
$sql="INSERT INTO `users` (`id`, `name`, `password`) VALUES (NULL, '$user', '$pwd');";


if(!mysql_query($sql)){
	die('error submitting data  Please contact OrnamentSolutions '   .  mysql_error());
	}	
		
else {print"
<script language=\"javascript\" type=\"text/javascript\">
alert(\"New User Created Successfully\");
window.location = '../forms/user.php'
</script>";
}}

else { die("Password Not Matched Or Username Already Existed ").error();}

mysql_close();
ob_end_flush();
?>


