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
<title>Judges</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>CONTESTANTS</a></h1>
		<form id="form_895435" class="appnitro" enctype="multipart/form-data" method="post" action="../orna/ins-judg.php">
					<div class="form_description">
			<h2>Upload Judges</h2>
			<p>fill all the fields carefully</p>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="name">Name </label>
		<div>
			<input id="name" name="name" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="descp">Description </label>
		<div>
			<textarea id="descp" name="descp" class="element textarea medium"></textarea> 
		</div> 
		</li>
        		<li id="li_3" >
		<label class="description" for="element_3">Upload a Image </label>
		<div>
			<input required x-moz-errormessage="" id="files[]" name="files[]" class="files[]" type="file" multiple/> 
		</div>  
		</li>
		<li class="buttons">
	      <input type="hidden" name="form_id" value="895435" />
			    
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