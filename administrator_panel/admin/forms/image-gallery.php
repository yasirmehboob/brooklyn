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
<title>Image Gallery</title> 
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
</head>
<body id="main_body" oncontextmenu="return false" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Image Gallery</a></h1>
		<form id="form_737051" class="appnitro" enctype="multipart/form-data" method="post" action="../orna/ins-gall.php">
					<div class="form_description">
			<h2>Image Gallery</h2>
			<p>Upload new images / create new album.</p>
		</div>						
			<ul >
			
					<li id="li_2" >
		
		<div>
			<a href="add-album.php">Create New Album </a>
		</div> 
		</li>		<li id="li_3" >
		<label class="description" for="albm">Select Album </label>
		<div>
		<select class="element select large" id="albm" name="albm"> 
			<option required x-moz-errormessage="" value="" selected="selected">Choose Album</option>
			<?php					
                 $albm_query= mysql_query('SELECT * FROM albm ');
  				while( $albm = mysql_fetch_array($albm_query)){
				print "<option value=\"";echo $albm['id']; print "\" >"; echo  $albm['albm_nm'];  print "</option>";
			};
			?>

		</select>
		</div> 
		</li><li id="li_1" >
		<label class="description" for="file_nm">Title / Description </label>
		<div>
			<input id="descp" name="descp" class="element text large" type="text" maxlength="255" value="" required x-moz-errormessage=""/> 
		</div> 
		</li>		<li id="li_1" >
		<label class="description" for="files">Choose images</label>
		<div>
			<input required x-moz-errormessage="" id="files[]" name="files[]" class="files[]" type="file" multiple/> 
		</div> <p class="guidelines" id="files[]"><small>maximum image size should not be exceed then 1MB</small></p> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="737051" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Upload" />
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