<?php
include('../orna/ornasys.inc');
session_start();
if(!isset( $_SESSION['myusername'])){
header("location:../restricted/error.php");
};
include('../orna/db.php');
$id=$_GET['id'];
$fine=0;
$trans_query="Select * from install_trans where install_id='".$id."'";
$sql_trans=mysql_query($trans_query);
$trans=mysql_fetch_array($sql_trans);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Receive Payment <?php echo $company;?></title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Receive Payment <?php echo $company;?></a></h1>
		<form id="form_856674" class="appnitro"  method="post" action="../orna/rec-install.php?id=<?php echo $id."&sur=".$fine."&user=".$_SESSION['myusername']; ?>">
					<div class="form_description">
			<h2>Receive Payment <span style="float:right"> <?php echo $trans['install_id'];?></span></h2>
			<p>Receive Payment Against Installment</p>
		</div>						
			<ul >
             <?php 
			 
			$today_query="Select * from install_trans where install_id='".$id."'";
			$sql_today=mysql_query($today_query);
			
			while($today=mysql_fetch_array($sql_today)){
            print "
					<tr id=\"fix_height\">
					<td><div><strong>Installment Amount : </strong>"; echo number_format($today['amt'])."/-"; print "</div></td>
					<td><div><strong>Surcharge : </strong>"; echo $fine."/-"; print "</div></td>
					<td><div><strong>Due Date: </strong>"; echo date('d-M-Y D', strtotime($today['dt'])); print "</div></td>
					<td><div><strong>Reciving Date :</strong>"; echo date('d-M-Y D'); print "</div></td>";
			};
			?>
            <br>
            <br>
			<table width="100%"><tr>
            <td><li id="li_4" >
		<label class="description" for="pay_mod">Payment Mode </label>
		<div>
		<select class="element select large" id="pay_mod" name="pay_mod"> 
			<option value="" selected="selected"></option>
<option value="Cash" >Cash</option>
<option value="Cheque" >Cheque</option>
<option value="PayOrder" >Payorder</option>
<option value="online" >Online Transfer</option>
<option value="Easypaisa" >EasyPaisa</option>
<option value="Mobicash" >Mobicash</option>
<option value="Upaisa" >Upaisa</option>
<option value="Other" >Others</option>

		</select>
		</div> 
		</li></td>
            <td><li id="li_2" >
		<label class="description" for="chq_no">Transaction Id / Cheque No. </label>
		<div>
			<input id="chq_no" name="chq_no" class="element text large" type="text" maxlength="255" value=""/> 
		</div> 
		</li></td>
            </tr></table>
									<li id="li_1" >
		<label class="description" for="descp">Description </label>
		<div>
			<textarea id="descp" name="descp" class="element textarea medium"></textarea> 
		</div> 
		</li>		<li id="li_3" >
		<label class="description" for="rec_amt">Amount (PKR)</label>
		<div>
        
			<input id="rec_amt" name="rec_amt" class="element text medium" type="text" maxlength="255" value="<?php 
			$total_query="Select * from install_trans where install_id='".$id."'";
			$sql_total=mysql_query($total_query);
			$total=mysql_fetch_array($sql_total);
			echo $total['amt']+$fine;?>"/>Rupees Only.
		</div> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="856674" />
			    
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