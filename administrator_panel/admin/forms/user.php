<?php
session_start();
if(!isset( $_SESSION['myusername'])){
header("location:../restricted/error.php");
};
$path="../orna/";
include('../orna/db.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Create new user</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="view.js"></script>
    <script type="text/javascript">
	window.onload = function() {
  document.getElementById("user").focus();
}



	</script>
</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Create new user</a></h1>
		<form id="form_806276" class="appnitro"  method="post" action="../orna/ins-user.php">
					<div class="form_description">
			<h2>Create new user</h2>
			<p>New user for Website CRM</p>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="user">Username </label>
		<div>
			<input required x-moz-errormessage="" name="user" type="text" class="element text medium" id="user" value="" maxlength="255"/> 
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="pwd">Password </label>
		<div>
			<input required x-moz-errormessage="" name="pwd" type="password" class="element text medium" id="pwd" value="" maxlength="255"/> 
		</div> 
		</li>		<li id="li_3" >
		<label required x-moz-errormessage="" class="description" for="cpwd">Confirm Password </label>
		<div>
			<input name="cpwd" type="password" class="element text medium" id="cpwd" value="" maxlength="255"/> 
		</div> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="806276" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
		</form>	
		<div id="footer">
			Powered by <a href="http://www.ornamentsolutions.com">Ornament</a> Registered to <?php echo $company;?>
		</div>
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>