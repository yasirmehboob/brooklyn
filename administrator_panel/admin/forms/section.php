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
<title>Add Section</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="../script/jq.js"></script>
<script type="text/javascript" src="../script/jq_ui.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	document.getElementById("file_id").focus();
	});
</script>
</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Add Section</a></h1>
		<form id="form_841875" class="appnitro"  method="post" action="../orna/ins-section.php">
					<div class="form_description">
			<h2>Add Section</h2>
			<p>File Management System</p>
		</div>						
			<ul >
			
					<li id="li_2" >
		<label class="description" for="element_2">Select File </label>
		<div>
		<select class="element select medium" id="file_id" name="file_id" required x-moz-errormessage=""> 
			<option value="" selected="selected"></option>
			<?php
			$file_query="Select * from file";
			$sql_file=mysql_query($file_query);
			while($file_name=mysql_fetch_array($sql_file)){
            print "<option value=\""; echo $file_name['id']; print "\" >"; echo $file_name['file_nm']; print "</option>";
			}
            ?>

		</select>
		</div> 
		</li>		<li id="li_1" >
		<label class="description" for="section_nm">Section Name </label>
		<div>
			<input id="section_nm" name="section_nm" class="element text medium" type="text" maxlength="255" value="" required x-moz-errormessage=""/> 
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