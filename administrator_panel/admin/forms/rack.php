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
<title>Add Rack</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="../script/jq.js"></script>
<script type="text/javascript" src="../script/jq_ui.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	document.getElementById("rack_nm").focus();
	});
</script>
</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Add Rack</a></h1>
		<form  method="post" action="../orna/ins-rack.php">
					<div class="form_description">
			<h2>Add Rack</h2>
			<p>File Management System</p>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="rack_nm">Rack Name </label>
		<div>
			<input id="rack_nm" name="rack_nm" class="element text medium" type="text" maxlength="255" value="" required x-moz-errormessage=""/> 
		</div> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="841875" />
			    
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

