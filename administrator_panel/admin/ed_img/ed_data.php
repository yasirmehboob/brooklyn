<?php
include('../orna/ornasys.inc');
session_start();
if(!isset( $_SESSION['myusername'])){
header("location:../restricted/error.php");
};
$id=$_GET['id'];
$t_name=$_GET['t_name'];
$file=$_GET['file'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Edit Contant</title>
<link rel="stylesheet" type="text/css" href="../forms/view-ornasys.css" media="all">
<script type="text/javascript" src="../forms/view.js"></script>

</head>
<body id="main_body">
	
	<img id="top" src="../forms/top.png" alt="">
	<div id="form_container">
	
		<h1><a><?php echo $t_name;?></a></h1>
		<form id="form_806184" class="appnitro" enctype="multipart/form-data" method="post" action="upd_prod_img.php?t_name=<?php echo $t_name?>&id=<?php echo $id?>">
					<div class="form_description">
			<h2>Edit Content.. (<?php echo $company;?>)</h2>
			Make Changes and press save
		</div>						
			<ul >
            <li id="li_1" >
		<label class="description" for="files">Previous Image </label>
		<div>
			 <img src="../../images/application/<?php echo $file."/".$_GET['img'];?>" width="150" height="150" alt="---" />
		</div> <p class="guidelines" id="files[]"><small>Previous image</small></p> 
		</li>
            
			
					<li id="li_1" >
		<label class="description" for="files">Choose New images</label>
		<div>
			<input required x-moz-errormessage="" id="files_1" name="files_1" class="files_1" type="file" /> 
		</div> <p class="guidelines" id="files[]"><small>maximum image size should not be more then 1MB</small></p> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="737051" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Save" />
		</li>
			</ul>
		</form>	
		<div id="footer">
			Powered by <a href="http://www.ornamentsolutions.com">Ornament</a> Registered to <?php echo $company;?>
		</div>
	</div>
	<img id="bottom" src="../forms/bottom.png" alt="">
	</body>
</html>