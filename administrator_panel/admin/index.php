<?php  
$path="orna/";
require_once('orna/db2.php');?>
<html>
<head>
<link rel="shortcut icon" href="../images/icon-Crystolite Pharma.PNG" type="image/png">
	<title><?php echo bn ?> Login</title>
	<style>
		#cont{
		margin-top:15%;
		box-shadow:0 0 20px #ccc;
		padding:5%;
		background-color:#fff;}
		
		table tr td{
		text-align:center;}
		
	</style>
    <script type="text/javascript">
	window.onload = function() {
  document.getElementById("user").focus();
}
	</script>
</head>
<body oncontextmenu="return false">

<?php
if(isset( $_SESSION['myusername'])){session_destroy();}

print "<table id=\"cont\" width=\"300\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"1\" >
	<form name=\"form1\" method=\"post\" action=\"check.php\">
		<tr>
			<td>
				<table width=\"300\" align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"1\" bgcolor=\"#FFFFFF\">
				<tr>
					<td><img src=\"menu/images/"; echo $logo; print "\" alt=\"Welcom to Admin Panel\" /></td>
				</tr>
				
				<tr>
					<td>";  echo $company; print " <br><strong>Please verify your identity (Member's Login) </strong></td>
				</tr>
				</table>
				
				<table align=\"center\" width=\"300\">
					<tr>
						<td width=\"78\">Username</td>
						<td width=\"6\">:</td>
						<td width=\"294\"><input name=\"user\" type=\"text\" id=\"user\"></td>
					</tr>
					<tr>
						<td>Password</td>
						<td>:</td>
						<td><input name=\"pass\" type=\"password\" id=\"pass\"></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><input type=\"submit\" name=\"Submit\" value=\"Login\"></td>
					</tr>
				</table>
			
			
			</td>
		</tr>
	</form>
</table>";
?>
</body>
</html>