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
<title>New Installment <?php echo $company; ?></title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="../script/jq.js"></script>
<script type="text/javascript" src="calendar.js"></script>
</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
		<h1><a>New Installment Plan</a></h1>
		<form id="form_853657" class="appnitro"  method="post" action="../orna/ins-install.php?user=<?php echo $_SESSION['myusername'];?>">
					<div class="form_description">
			<h2>New Installment Plan</h2>
			<p>Create new Instalment Payment Plan, <?php echo $company; ?></p>
		</div>						
			<ul >
					<table width="100%"><tr>
                    <td>
					<li id="li_1" >
		<label class="description" for="name">Name </label>
		<div>
			<input id="name" name="name" class="element text large" type="text" maxlength="255" value=""/> 
		</div> 
		</li></td>		
        <td><li id="li_2" >
		<label class="description" for="contact">Contact No. </label>
		<div>
			<input id="contact" name="contact" class="element text large" type="text" maxlength="255" value=""/> 
		</div> 
		</li></td>
        </tr>
        <tr>
        <td colspan="2">
        <li id="li_6" >
		<label class="description" for="descp">Description </label>
		<div>
			<textarea id="descp" name="descp" class="element textarea medium"></textarea> 
		</div> 
		</li></td></tr>
        
        <tr>
        <td><li id="li_3" >
		<label class="description" for="tot_amt">Total Amount Of Plan </label>
		<div>
			<input id="tot_amt" name="tot_amt" class="element text large" type="text" maxlength="255" value=""/> 
		</div> 
		</li></td>
        
        <td><li id="li_4" >
		<label class="description" for="down_amt">Down Payment</label>
		<div>
			<input id="down_amt" name="down_amt" class="element text large" type="text" maxlength="255" value=""/> 
		</div> 
		</li></td>	
		
        </tr>
        
        <tr>
        <td><li id="li_4" >
		<label class="description" for="install_amt">Installment Amount</label>
		<div>
			<input id="install_amt" name="install_amt" class="element text large" type="text" maxlength="255" value=""/> 
		</div> 
		</li></td>
        
        <td><li id="li_4" >
		<label class="description" for="int_rate">Interest Rate %</label>
		<div>
			<input id="int_rate" name="int_rate" class="element text large" type="text" maxlength="255" value="33"/> 
		</div> 
		</li></td>
        </tr>
        <tr>
        
        <td><li id="li_2" >
		<label class="description" for="element_2">Effective From </label>
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
		 
		</li></td>
        
        <td>
		<li id="li_2" >
		<label class="description" for="element_2">Select Interval </label>
		<div>
		<select class="element select medium" id="interval" name="interval" required x-moz-errormessage=""> 
			<option value="1" >Daily </option>
			<option value="7" >Weekly </option>
			<option value="30" >Monthly</option>
			<option value="90" >Quarterly</option>
			<option value="180" >Semi Aanually</option>
			<option value="360" >Yearly</option>
		</select>
		</div> 
		</li>
		</td>
        
        </tr>
        </table>	
					<li class="buttons">
			    <input type="hidden" name="form_id" value="853657" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
		</form>	
		<div id="footer">
			Powered by <a href="http://www.ornamentsolutions.com">Ornament</a> Registered to <?php echo $company;?>
		</div>
	</div>
	<img id="bottom" src="bottom.png" alt="">
    
<script type="text/javascript"> 
$(document).ready(function(){
	$('form:input').val('');
	})
</script>
	</body>
</html>