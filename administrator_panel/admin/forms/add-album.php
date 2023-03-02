<?php
include('../orna/ornasys.inc');
session_start();
if(!isset( $_SESSION['myusername'])){
header("location:../restricted/error.php");
};
include('../orna/db.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="../images/icon-ihrc.PNG" type="image/png">
<title>Add New Photo Album</title> 
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" oncontextmenu="return false" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Add New Photo Album</a></h1>
		<form id="form_737051" class="appnitro"  method="post" action="../orna/ins-albm.php">
					<div class="form_description">
			<h2>Add New Photo Album</h2>
			<p>create new album.</p>
		</div>						
			<ul >
			
					<li id="li_2" >
		<label class="description" for="albm_nm">New Album Name </label>
		<div>
			<input required x-moz-errormessage="" id="albm_nm" name="albm_nm" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Album Description (Optional) </label>
		<div>
			<textarea id="descp" name="descp" class="element textarea medium"></textarea> 
		</div> 
		</li>
        <li>
        	<div>
			<a href="image-gallery.php">Upload Images</a>
		</div> 
        </li>
					<li class="buttons">
			    <input type="hidden" name="form_id" value="737051" />
			    
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