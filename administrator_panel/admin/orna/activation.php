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

$msg='';
if(!empty($_GET['code']) && isset($_GET['code']))
{
$code=mysql_real_escape_string($_GET['code']);
$c=mysql_query("SELECT id FROM client WHERE act_code='$code'");
if(mysql_num_rows($c) > 0)
{
$count=mysql_query("SELECT id,first_name,Email,Username,Password FROM client WHERE act_code='$code' and status='n'");
$result=mysql_fetch_array($count);
if(mysql_num_rows($count) == 1)
{
mysql_query("UPDATE client SET status='y' WHERE act_code='$code'");
// sending email
	include 'Send_Mail.php';
	$to=$result['Email'];
	$subject="Account Activated";
	$body='<a href=\'http://www.bigbookcloud.com/\'><img src=\'http://www.bigbookcloud.com/images/bigbook-c.png\' alt=\'BigBook\' /></a>
<h1 style=\'text-transform:capitalize;\'>Congratulations '.$result['first_name'].'!</h1>

<p> 
The following product(s) have been successfully registered to your BigBook account.<br>
BigBook Cloud - V1.0C<br><br>
Your login details are:<br>
User Name: <b>'.$result['Username'].'</b> <br>
Password: <b>'.$result['Password'].'</b><br>
Your BigBook account provides access to your BigBook products and services such as:</p>
<ul>
<li>Simple management of all your BigBook subscriptions in one place</li>
<li>Faster free customer support*</li>
<li>Easy access to the latest BigBook updates</li>
<li>Special offers for BigBook customers only</li>
<li>Access to your online services: BigBook Online Recovery, BigBook Online Backup</li>
</ul>
<br>
To access your BigBook account, please visit <a href=\'https://bigbookcloud.com\' title=\'BigBook Website\'>https://bigbookcloud.com</a> and sign in with your email address: '.$result['Email'].'
<hr>
 
<b>* Regular Internet connection fees and call charges apply in certain countries</b><br><br>

<b>Thank you for choosing BigBook!</b><br><br>

Please do not reply to this message. This email address is not monitored so we are unable to respond to any messages sent to this address.<br>

Please Check BigBook Web Site for information <a href=\'http://www.Bigbookcloud.com\'>www.Bigbookcloud.com</a><br><br>

BigBook Cloud.<br>
Info@bigbookcloud.com';
	Send_Mail($to,$subject,$body);
	
	$username=$result['Username'];
	$pass=md5($result['Password']);
	$conn2=mysql_select_db($MySQL_database2, $connection);
	$sql2="update `users` set status='y' where name='".$username."' and password='".$pass."'";
	mysql_query($sql2);
	
$msg="<h3>Congratulations, your account has been activated!</h3>
<p>Your user name and password which you selected during your registration process has been sent to your email.<br>

If you have any questions, contact the BigBook at support@bigbookcloud.com</p>
"; 
}
else
{
$msg ="<h3>Your account is already active, no need to activate again</h3>
<p>You may now log onto BigBook (either now or anytime in the future) to access many of its wonderful features. To log in simply click on the \"login Button\" given below and then enter the user name and password which you selected during your registration process.<br>

If you have any questions, contact the BigBook by at support@bigbookcloud.com</p>";
}

}
else
{
$msg ="<h1>Error: 404 Page Not Found!</h1> <p>Wrong activation code.</p>";
}

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Sign up For BigBook</title>
    <!-- Bootstrap core CSS -->
    <link href="../../../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../../../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="../../../assets/css/style.css" rel="stylesheet">
    <link href="../../../assets/css/style-responsive.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>      
	  <!--main content start-->
          <section style="padding:10px 50px;" >
			<a href="http://www.bigbookcloud.com"><img src="../../../assets/img/logo.png"></a>
			<h4>Email Verification!</h4>
          	<div class="row">
				<!-- INLINE FORM ELELEMNTS -->
				<div class="form-panel" >
				<?php echo $msg; ?>
				<div class="col-sm-12" style="padding:20px 0;">
				<center>
				<a href="../../../index.php"><button type="button" class="btn btn-theme03">Login</button></a>
				<a href="../../../sign-up.php"><button type="button" class="btn btn-theme">Sign up</button></a>
				
				</center>
			  </div>
				</div>
				</div><!-- row -->
		</section><!--/wrapper -->
      <!--footer start-->
      <footer class="site-footer"> 
          <div class="text-center">
              BigBook Sign up its Free - Powered By Ornament Solutions.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../../../assets/js/jquery.js"></script>
    <script src="../../../assets/js/bootstrap.min.js"></script>
    <script src="../../../assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="../../../assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="../../../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../../../assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <!--common script for all pages-->
    <script src="../../../assets/js/common-scripts-old.js"></script>
  </body>
</html>