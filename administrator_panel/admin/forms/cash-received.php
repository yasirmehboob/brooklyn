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
<title>Received Cash Summary <?php echo $company;?></title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="calendar.js"></script>
</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Received Cash Summary <?php echo $company;?></a></h1>
		<form id="form_851158" class="appnitro"  method="post" action="../orna/ins-cash.php">
					<div class="form_description">
			<h2>Received Cash Summary <?php echo $company;?></h2>
			<p>Add cash received</p>
		</div>						
			<ul >
			
					<li id="li_6" >
		<label class="description" for="element_6">Date </label>
		<span>
			<input name="element_6_1" type="text" class="element text" id="element_6_1" value="" size="2" maxlength="2" readonly="readonly"> /
		<label for="element_6_1">MM</label>
		</span>
		<span>
			<input name="element_6_2" type="text" class="element text" id="element_6_2" value="" size="2" maxlength="2" readonly="readonly"> /
			<label for="element_6_2">DD</label>
		</span>
		<span>
	 		<input name="element_6_3" type="text" class="element text" id="element_6_3" value="" size="4" maxlength="4" readonly="readonly">
			<label for="element_6_3">YYYY</label>
		</span>
	
		<span id="calendar_6">
			<img id="cal_img_6" class="datepicker" src="calendar.gif" alt="Pick a date.">	
		</span>
		<script type="text/javascript">
			Calendar.setup({
			inputField	 : "element_6_3",
			baseField    : "element_6",
			displayArea  : "calendar_6",
			button		 : "cal_img_6",
			ifFormat	 : "%B %e, %Y",
			onSelect	 : selectDate
			});
		</script>
		 
		</li>		<li id="li_1" >
		<label class="description" for="fast_food">Cash from Fast Food </label>
		<div>
			<input id="fast_food" name="fast_food" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="rest">Cash from Restaurant </label>
		<div>
			<input id="rest" name="rest" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_3" >
		<label class="description" for="ho_cash">Cash from Head office </label>
		<div>
			<input id="ho_cash" name="ho_cash" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_4" >
		<label class="description" for="s_cash">Short Cash </label>
		<div>
			<input id="s_cash" name="s_cash" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_5" >
		<label class="description" for="oth_cash">Other Income / Loan </label>
		<div>
			<input id="oth_cash" name="oth_cash" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="851158" />
			    
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