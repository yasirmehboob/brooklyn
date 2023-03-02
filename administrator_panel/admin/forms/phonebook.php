<?php
include('../orna/ornasys.inc');
session_start();
if(!isset( $_SESSION['myusername'])){
header("location:../restricted/error.php");
};
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Phone Book</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="../script/jq.js"></script>
<script type="text/javascript" src="../script/jq_ui.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	document.getElementById("name").focus();
	});
</script>
</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Phone Book</a></h1>
		<form id="form_844680" class="appnitro" enctype="multipart/form-data" method="post" action="../orna/ins-vcard.php">
					<div class="form_description">
			<h2>Phone Book</h2>
			<p>PhoneBook Management System</p>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="name">Name </label>
		<div>
			<input id="name" name="name" class="element text medium" type="text" maxlength="255" value="" required x-moz-errormessage=""/> 
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="c_nm">Company Name </label>
		<div>
			<input id="c_nm" name="c_nm" class="element text medium" type="text" maxlength="255" value="" /> 
		</div> 
		</li>		<li id="li_3" >
		<label class="description" for="cell">Cell Number </label>
		<div>
			<input id="cell" name="cell" class="element text medium" type="text" maxlength="255" value="" required x-moz-errormessage=""/> 
		</div> 
		</li>		<li id="li_4" >
		<label class="description" for="land">Landline </label>
		<div>
			<input id="land" name="land" class="element text medium" type="text" maxlength="255" value="" /> 
		</div> 
		</li>		<li id="li_5" >
		<label class="description" for="eml">Email </label>
		<div>
			<input id="eml" name="eml" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_6" >
		<label class="description" for="scanned">Visiting card Scanned </label>
		<div>
			<input id="files[]" name="files[]" class="element file files[]" type="file"/> 
		</div>  
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="844680" />
			    
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