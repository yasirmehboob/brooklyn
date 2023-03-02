<?php
session_start();
if(!isset( $_SESSION['myusername'])){
header("location:../index.php");
}
include('../orna/db.php');

@$user=$_SESSION['myusername'];
@$user=stripslashes($user);
@$opwd = $_POST['opwd'];
@$opwd = md5(mysql_real_escape_string($opwd));
@$pwd = $_POST['pwd'];
@$cpwd = $_POST['cpwd'];

$login="SELECT * FROM users WHERE name= '$user'";
$result=mysql_query($login);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){

if($pwd===$cpwd){
$pwd=md5($pwd);
$sql="UPDATE `users` SET `password`='$pwd' WHERE name='$user' and password = '$opwd'";

//echo $sql;
if(!mysql_query($sql)){
	die('error updating data  Please contact DIT Ornament Solutions '   .  mysql_error());
	}	
		
else {
echo $sql;
print"
<!--<script language=\"javascript\" type=\"text/javascript\">
alert(\"Password Successfully Changed! Please Login To Continue.\");
window.location = '../index.php'
</script>-->";}

}
else{echo "Password not Matched!";}
}

else{ echo 'Invalid Password, Please Enter Your Password Carefully!'; };

mysql_close();
ob_end_flush();
?>


