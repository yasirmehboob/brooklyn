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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Form Controls</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Form Controls</a></h1>
		<form id="form_870964" class="appnitro"  method="post" action="../orna/ins-mnu.php?user=<?php echo $_SESSION['myusername'];?>">
					<div class="form_description">
			<h2>Form Controls
            <span style="float:right;">
			<img src="../menu/images/logo - Copy.png" width="115" height="30" alt="Ornament Solutions" /> </span>
            </h2>
			<p>Ornament Forms control oxide</p>
		</div>						
			<ul >
			
					<li id="li_3" >
		<label class="description" for="reg_id">Registered To: </label>
		<div>
			<input id="reg_id" name="reg_id" class="element text medium" type="text" maxlength="255" value="f24h2014"/> 
		</div> 
		</li>		<li id="li_1" >
		<label class="description" for="f_nm">Display Name </label>
		<div>
			<input id="f_nm" name="f_nm" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="folder">Folder Path </label>
		<div>
			<input id="folder" name="folder" class="element text medium" type="text" maxlength="255" value="../forms/"/> 
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="f_lnk">Form name/link name </label>
		<div>
			<input id="f_lnk" name="f_lnk" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_4" >
		<label class="description" for="user">Access to</label>
		<div>
		<select class="element select medium" id="user" name="user" required x-moz-errormessage=""> 
			<option value="All" selected="selected">All Users</option>
			<?php
			$user_query="Select name from users";
			$sql_user=mysql_query($user_query);
			while($user_name=mysql_fetch_array($sql_user)){
            print "<option value=\""; echo $user_name['name']; print "\" >"; echo $user_name['name']; print "</option>";
			}
            ?>

		</select>
		</div> 
		</li>		<li id="li_5" >
		<label class="description" for="icon">Icon Name: </label>
		<div>
			<input id="icon" name="icon" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="870964" />
			    
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