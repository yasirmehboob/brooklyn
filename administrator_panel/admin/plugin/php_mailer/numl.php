<?php 
$MySQL_host     = 'localhost';
$MySQL_username = 'jjsyktdv_root';
$MySQL_password = 'CdyxPpJ@3#en';
$MySQL_database = 'jjsyktdv_bigbook';
if (!($connection = @mysql_connect($MySQL_host, $MySQL_username, $MySQL_password)))
	die('(Error-00DUP-E-ORNA) There is some problem in the Database server, please try again later or contact at error@ornamentsolutions.com');
if (!@mysql_select_db($MySQL_database, $connection))
	die('There is some problem in the server, please come back later.. or contact http://www.bigbookcloud.com/#contact for support. ERROR : DBN/A');

include 'Send_Mail.php';

$dt=date('d-M-Y');
$count=mysql_query("SELECT id,first_name,Email FROM client WHERE eml_log='1'");
while($result=mysql_fetch_array($count)){
// sending email
	$to=$result['Email'];
	$subject="Hello from Amey at BigBook!";
	$body='<a href=\'http://www.bigbookcloud.com/\'><img src=\'http://www.bigbookcloud.com/images/bigbook-c.png\' alt=\'BigBook\' /></a>
<p><b>Hey '.$result['first_name'].'</b>,<br><br>
Thanks for signing up with BigBook!  I\'m Amey,  BigBook\'s Customer Success Manager, and I wanted to reach out and see if I can help you get the ball rolling with your new BigBook account. As a new user, I figure you might have a couple of questions...and lucky for you, I have answers!<br><br>
Would you be up for a 20 minute walkthrough for you (and your team) this week? Please feel comfortable reaching out to me as a resource any time, too: consider me your personal BigBook consultant :)! If you can\'t find what you\'re looking for on our site, just shoot me a email.<br><br>
Let me know if we can set something up and if there is anything else I can do to help get you started.</p>
<hr>
<b>Thank you for choosing BigBook!</b><br><br>

Have a great day!<br>
Amey<br>
Customer Success Manager<br>
amey@bigbookcloud.com<br>
BigBook';
	Send_Mail($to,$subject,$body);
	
	$sql="update client set eml_log='2' where id='".$result['id']."'";
	mysql_query($sql);
	
	echo "Sent to ".$result['Email']."<br>";
	
};   
 ?>