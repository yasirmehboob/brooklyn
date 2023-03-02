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
<title>Payment Schedule <?php echo $company; ?></title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="calendar.js"></script>
</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Payment Schedule</a></h1>
		<form id="form" class="appnitro"  method="post" action="../orna/ins-pay.php">
					<div class="form_description">
			<h2>Payment Schedule <?php echo $company;?></h2>
			<p>Schedule new payment </p>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="descp">Description </label>
		<div>
			<textarea id="descp" name="descp" class="element textarea medium"></textarea> 
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Payment Date </label>
        		<span>
			<input name="element_2_2" type="text" class="element text" id="element_2_2" value="" size="2" maxlength="2" readonly="readonly"> /
			<label for="element_2_2">DD</label>
		</span>
		<span>
			<input name="element_2_1" type="text" class="element text" id="element_2_1" value="" size="2" maxlength="2" readonly="readonly"> /
			<label for="element_2_1">MM</label>
		</span>
		<span>
	 		<input name="element_2_3" type="text" class="element text" id="element_2_3" value="" size="4" maxlength="4" readonly="readonly">
			<label for="element_2_3">YYYY</label>
		</span>
	
		<span id="calendar_2">
			<img id="cal_img_2" class="datepicker" src="calendar.gif" alt="Pick a date.">	
		</span>
		<script type="text/javascript">
			Calendar.setup({
			inputField	 : "element_2_3",
			baseField    : "element_2",
			displayArea  : "calendar_2",
			button		 : "cal_img_2",
			ifFormat	 : "%e %B, %Y",
			onSelect	 : selectDate
			});
		</script>
		 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Last Date </label>
		
		<span>
			<input name="element_3_2" type="text" class="element text" id="element_3_2" value="" size="2" maxlength="2" readonly="readonly"> /
		<label for="element_3_2">DD</label>
		</span>
        <span>
			<input name="element_3_1" type="text" class="element text" id="element_3_1" value="" size="2" maxlength="2" readonly="readonly"> /
			<label for="element_3_1">MM</label>
		</span>
		<span>
	 		<input name="element_3_3" type="text" class="element text" id="element_3_3" value="" size="4" maxlength="4" readonly="readonly">
			<label for="element_3_3">YYYY</label>
		</span>
	
		<span id="calendar_3">
			<img id="cal_img_3" class="datepicker" src="calendar.gif" alt="Pick a date.">	
		</span>
		<script type="text/javascript">
			Calendar.setup({
			inputField	 : "element_3_3",
			baseField    : "element_3",
			displayArea  : "calendar_3",
			button		 : "cal_img_3",
			ifFormat	 : "%B %e, %Y",
			onSelect	 : selectDate
			});
		</script>
		 
		</li>		<li id="li_4" >
		<label class="description" for="amt">Amount </label>
		<div>
			<input id="amt" name="amt" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		
        </li>
        
        <li id="li_2" >
		<label class="description" for="rack_id">Status</label>
		<div>
		<select class="element select medium" id="p_yn" name="p_yn" required x-moz-errormessage=""> 
			<option value="N" selected="selected">Unpaid</option>
			<option value="Y">Paid</option>
		</select>
		</div> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="849410" />
			    
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