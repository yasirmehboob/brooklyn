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
<title>Upload new Document</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Upload new Document</a></h1>

		<form id="form_841875" class="appnitro" enctype="multipart/form-data" method="post" action="../orna/ins-doc.php">
					<div class="form_description">
			<h2>Upload new Document</h2>
			<p>File Management System</p>
		</div>						
			<ul >
			
					<li id="li_3" >
		<label class="description" for="rack">Rack </label>
		<div>
		<select class="element select medium" id="rack" name="rack"  required x-moz-errormessage=""> 
			<option value="" selected="selected">Select Rack</option>
            <?php
			$rack_query="Select * from rack";
			$sql_rack=mysql_query($rack_query);
			while($rack_name=mysql_fetch_array($sql_rack)){
            print "<option value=\""; echo $rack_name['id']; print "\" >"; echo $rack_name['rack_nm']; print "</option>";
			}
            ?>

		</select>
		</div> 
		</li>		<li id="li_4" >
		<label class="description" for="file" >File </label>
		<div>
		<select class="element select medium file" id="file" name="file" required x-moz-errormessage=""> 
			<option selected="selected"></option>
		</select>
		</div> 
		</li>		<li id="li_5" >
		<label class="description" for="section">Section </label>
		<div>
		<select class="element select medium" id="section" name="section" required x-moz-errormessage=""> 
			<option value="" selected="selected"></option>
		</select>
		</div> 
		</li>		<li id="li_1" >
		<label class="description" for="name">Document Name/Subject/Tag/Keyword etc... </label>
		<div>
			<textarea id="name" name="name" class="element textarea medium" required x-moz-errormessage=""></textarea> 
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="scanned">Upload Document </label>
		<div>
			<input id="files[]" name="files[]" class="element file files[]" type="file" required x-moz-errormessage=""/> 
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
    
<script type="text/javascript" src="../script/jq.js"></script>
<script type="text/javascript" src="../script/jq_ui.js"></script>
<script type="text/javascript" src="../ajax/js/process.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	document.getElementById("rack").focus();
	});
</script>
	</body>
</html>