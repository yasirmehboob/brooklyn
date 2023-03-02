<?php
include('../orna/ornasys.inc');
session_start();
if(!isset( $_SESSION['myusername'])){
header("location:../restricted/error.php");
};
include('../orna/db.php');
if((!isset($_POST['element_2_2'])) || (!isset($_POST['element_3_2']))){
	$dt=date('m/d/Y');
	$lst_dt=date('m/d/Y');}
	
	else{
if(strlen(@$_POST['element_2_2'])==1){
	$day_fst=str_pad(@$_POST['element_2_2'],2,"0",STR_PAD_LEFT);}
	else{$day_fst=$_POST['element_2_2'];}
if(strlen(@$_POST['element_3_2'])==1){
	$day_nxt=str_pad(@$_POST['element_3_2'],2,"0",STR_PAD_LEFT);}
	else{$day_nxt=$_POST['element_3_2'];}
@$dt=@$_POST['element_2_1'].'/'.$day_fst.'/'.@$_POST['element_2_3'];
@$lst_dt=@$_POST['element_3_1'].'/'.$day_nxt.'/'.@$_POST['element_3_3'];
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Expense Summary<?php echo $company;?></title>
<link rel="stylesheet" type="text/css" href="view-ornasys.css" media="all">
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="../script/jq.js"></script>
<script type="text/javascript" src="calendar.js"></script>

</head>	
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	

<form id="form_806184" class="appnitro"  method="post" action="exp-detail.php">
    <div class="form_description">
        <h2>Paid Expense Summary</h2> 
    </div>						
    
    <ul>
    <table align="center"><tr><td>
<li id="li_2" >
		<label class="description" for="element_2">From </label>
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
            <li id="li_3" >
		<label class="description" for="element_3">To</label>
		
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
		 
		</li></td>
        
        <td><li class="buttons">
			    <input type="hidden" name="form_id" value="849410" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Search" />
		</li></td>
        </tr></table>
        
        <li id="li_2" >
          <div>	
            <table width="100%">
            <tr style="background-color:#ccc;">
                <td width="150"><strong>Date</strong></td>
                <td ><b>Description<b></td>
                <td width="150"><strong>Amount</strong></td>
             </tr>
            
            	
            <?php 
			$today_query="Select * from payment where dt>='".$dt."' and dt<='".$lst_dt."' and p_yn='y' Order by dt";
			$sql_today=mysql_query($today_query);
			while($today=mysql_fetch_array($sql_today)){
            print "
					<tr id=\"fix_height\">
					<td><div>"; echo date('d-M-Y D', strtotime($today['dt'])); print "</div></td>
					<td><div>"; echo $today['descp']; print "</div></td>
					<td><div>"; echo number_format($today['amt']); print "/-</div></td>
					</tr>
					";
			}
						
			$paid_sum_query="Select SUM(amt) from payment where dt>='".$dt."' and dt<='".$lst_dt."' and p_yn='y'";
			$sql_sum_paid=mysql_query($paid_sum_query);
			$paid_sum=mysql_fetch_array($sql_sum_paid);
			if($paid_sum['SUM(amt)']==""){$paid_sum['SUM(amt)']="0";}//total paid amount
			
			print "<tr>
				<td></td>
				<td align=\"right\"><strong>Total Exp =</strong></td>
				<td class=\"red\"><strong >"; echo number_format($paid_sum['SUM(amt)']); print "/-</strong></td>
				</tr>";
			?>
            </table>
          </div>
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