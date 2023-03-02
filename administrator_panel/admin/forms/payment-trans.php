<?php
include('../orna/ornasys.inc');
session_start();
if(!isset( $_SESSION['myusername'])){
header("location:../restricted/error.php");
};
include('../orna/db.php');
$id=$_GET['id'];
$t_name=$_GET['t_name'];

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
		<form id="form" class="appnitro"  method="post" action="../orna/ed-pay-transf.php?t_name=<?php echo $t_name?>&id=<?php echo $id?>">
					<div class="form_description">
			<h2>Payment Re-Schedule <?php echo $company;?></h2>
			<p>Re-Schedule existing payment</p>
		</div>	
        <br>
        <br>					
			<ul >
            <?php 
			$today_query="Select * from ".$t_name." where id='".$id."'";
			$sql_today=mysql_query($today_query);
			while($today=mysql_fetch_array($sql_today)){
            print "
					<tr id=\"fix_height\">
					<td><div><strong>Description :</strong>"; echo $today['descp']; print "</div></td>
					<td><div><strong>Amount :</strong>"; echo $today['amt']; print "/-</div></td>
					<td><div><strong>Last Payment Date :</strong>"; echo date('d-M-Y D', strtotime($today['lst_dt'])); print "</div></td>";
			};
			?>
            <br>
            <br>
            <li id="li_2" >
		<label class="description" for="element_2">Transfer To</label>
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