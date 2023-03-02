<?php
$MySQL_host     = 'localhost';
$MySQL_username = 'jjsyktdv_root';
$MySQL_password = 'CdyxPpJ@3#en';
$MySQL_database = 'jjsyktdv_bigbook';
$MySQL_database2 = 'jjsyktdv_acc';

if (!($connection = @mysql_connect($MySQL_host, $MySQL_username, $MySQL_password)))
	die('(Error-00DUP-E-ORNA) There is some problem in the Database server, please try again later or contact at error@ornamentsolutions.com');
if (!@mysql_select_db($MySQL_database, $connection))
	die('There is some problem in the server, please come back later.. or contact www.ornamentsolutions.com for support. ERROR : DBN/A');


@$dt=date('d-M-Y');
@$first_name=mysql_real_escape_string($_POST['first_name']);
@$last_name=mysql_real_escape_string($_POST['last_name']);
@$business_name=mysql_real_escape_string($_POST['business_name']);
@$email=mysql_real_escape_string($_POST['email']);
@$country=mysql_real_escape_string($_POST['country']);
@$city=mysql_real_escape_string($_POST['city']);
@$gender=mysql_real_escape_string($_POST['gender']);
@$username=mysql_real_escape_string($_POST['username']);
@$password=mysql_real_escape_string($_POST['password']);
@$agree=mysql_real_escape_string($_POST['agree']);
@$ip = $_SERVER["REMOTE_ADDR"];
$activation=md5($email.time()); // encrypted email+timestamp


if(isset($_POST['agree'])){
$sql_query="INSERT INTO `client` (`id`, `first_name`, `last_name`, `Business_name`, `Email`, `Country`, `City`, `Gender`, `Username`, `Password`, `agree`, `ip`, `dt`,`act_code`,`status`,`eml_log`) VALUES (NULL, '$first_name', '$last_name', '$business_name', '$email', '$country', '$city', '$gender', '$username', '$password', '$agree', '$ip', '$dt','$activation','n','1')";
if(!mysql_query($sql_query)){
	die( "There is some problem ". mysql_error());
	}
	else{
	// sending email
	include('Send_Mail.php');
	$to=$email;
	$subject="BigBook Email verification";
	$body='<a href=\'http://www.bigbookcloud.com/\'><img src=\'http://www.bigbookcloud.com/images/bigbook-c.png\' alt=\'BigBook\' /></a>
<h1>Thank you for signing up for BigBook!</h1><p> 
<b>Dear '.$first_name.' </b>,<br><br>
BigBook wishes you a warm welcome! You have just joined one of the most compelling communities of Cloud Accounting. <br>
First things first - Please verify your registration, To activate your account and verify your email address, please click the following link:<br><br>
<a href=\'http://www.ornamentsolutions.com/bigbook/admin/orna/activation/'.$activation.'\'>
http://www.ornamentsolutions.com/bigbook/admin/orna/activation/'.$activation.'</a><br><br>
<i>Note: Please keep this E-mail for your records. You\'ll need your verification link if you lose access to your account (for example, if you forget your username or password).</i><br><br>
If you\'ve received this mail in error, it\'s likely that another user entered your email address while trying to create an account for a different email address. If you don\'t click the verification link, the account won\'t be activated.<br>
</p><hr>
<b>Thank you for choosing BigBook!</b><br><br>
Please do not reply to this message. This email address is not monitored so we are unable to respond to any messages sent to this address.<br>
Please Check BigBook Web Site for information <a href=\'http://www.Bigbookcloud.com\'>www.Bigbookcloud.com</a><br><br>
Become our Fan <a href=\'http://facebook.com/bigbookcloud\'>Facebook.com/BigBookCloud</a><br>
BigBook Support.<br>
Info@bigbookcloud.com';
	
// To send HTML mail, the Content-type header must be set
$headers = 'From: BigBook <info@bigbookcloud.com>' . "\n";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Mail it
Send_Mail($to,$subject,$body);

//notification email to Founder	Start
$to="yasir_u@yahoo.com";
$subject="New BigBook Account Request";
$body='Hi BigBook, <br/> <br/> There is a new BookBook Account Request<br> Created by: '.$first_name.'<br>Business Title: '.$business_name.'<br> Having email: '.$email.'<br> Created on dated: '.$dt.'<br> From IP: '.$ip.'<br> Country: '.$country;
Send_Mail($to,$subject,$body);
//notification email to Founder	Ends
	
	
//sending SMS Start		
$ch = curl_init();
$text='BookBook Account Request From: '.$first_name.' Business: '.$business_name.' Email: '.$email.' Dated: '.$dt.' From IP: '.$ip.' Country: '.$country;
$text = str_replace(' ', '%20', $text);
$url='http://182.180.66.193/sendsms?phone=03465134970&text='.$text;
curl_setopt($ch, CURLOPT_URL, $url);
//return the transfer as a string 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 		
// close curl resource to free up system resources
curl_close($ch);
//sending SMS End	
	
	$pass=md5($password);
	 if (!@mysql_select_db($MySQL_database2, $connection)){
		 die(mysql_error());}
	$sql_query2="INSERT INTO `users` (`id`, `name`, `password`,`status`) VALUES (NULL, '$username', '$pass','n')";
	if(!mysql_query($sql_query2)){
		die( "There is some problem ". mysql_error());
		}
		else{
		echo "created";
		}
	}
	
}//if agree ends
	
if(isset($_POST['username_check'])){
	$name=$_POST['username_check'];
	$login="SELECT * FROM `client` WHERE Username='$name'";
	$result=mysql_query($login);
	$count=mysql_num_rows($result);	
	if($count>=1){
		die("exist");}
}

if(isset($_POST['eml_check'])){
	$eml=$_POST['eml_check'];
	$login="SELECT * FROM `client` WHERE Email='$eml'";
	$result=mysql_query($login);
	$count=mysql_num_rows($result);	
	if($count>=1){
		die("exist");}
}

mysql_close();
?>