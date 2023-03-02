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
<title>Cash Details<?php echo $company;?></title>
<link rel="stylesheet" type="text/css" href="view-ornasys.css" media="all">
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="../script/jq.js"></script>

</head>	
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	

<form id="form_806184" class="appnitro"  method="post" action="../orna/ins-type.php">
    <div class="form_description">
        <h2>Cash Flow Summary
			<span style="float:right;">
				<?php echo date('d-M-Y D');?>
			</span>
		</h2> 
    </div>						
    <ul >
        <li id="li_2" >
          <div>	
            <table width="100%">
            <tr style="background-color:#ccc;">
                <td width="650"><b>Description<b></td>
                <td width="150"><strong>Amount</strong></td>
             </tr>
            
            	
            <?php 
			$today_sum_query="Select SUM(amt) from payment where dt='".date('m/d/Y')."'";
			$sql_sum=mysql_query($today_sum_query);
			$today_sum=mysql_fetch_array($sql_sum);//net total amount
			
			$paid_sum_query="Select SUM(amt) from payment where dt='".date('m/d/Y')."' and p_yn='y'";
			$sql_sum_paid=mysql_query($paid_sum_query);
			$paid_sum=mysql_fetch_array($sql_sum_paid);
			if($paid_sum['SUM(amt)']==""){$paid_sum['SUM(amt)']="0";}//total paid amount
			
			
			$rec_sum_query="Select(sum(fast_food)+sum(rest)+sum(s_cash)+sum(ho_cash)+sum(oth_cash)) as rec from cash where dt='".date('m/d/Y')."'";
			$sql_sum_rec=mysql_query($rec_sum_query);
			$rec_sum=mysql_fetch_array($sql_sum_rec);
			if($rec_sum['rec']==""){$rec_sum['rec']="0";}//total cash received
			
			$paid_sum_query_pre="Select SUM(amt) from payment where dt>='07/01/2014' and dt<='".date('m/d/Y' ,time()-86400)."' and p_yn='y'";
			$sql_sum_paid_pre=mysql_query($paid_sum_query_pre);
			$paid_sum_pre=mysql_fetch_array($sql_sum_paid_pre);
			if($paid_sum_pre['SUM(amt)']==""){$paid_sum_pre['SUM(amt)']="0";}//total paid amount from 1-jul-14 to previous day
			
			
			$rec_sum_query_pre="Select sum(fast_food+rest+s_cash+ho_cash+oth_cash) as total from cash where dt>='07/01/2014' and dt<='".date('m/d/Y' ,time()-86400)."'";
			$sql_sum_rec_pre=mysql_query($rec_sum_query_pre);
			$rec_sum_pre=mysql_fetch_array($sql_sum_rec_pre);
			if($rec_sum_pre['total']==""){$rec_sum_pre['total']="0";}//total cash received from 1-jul-14 to previous day
			
			//opening balace calculation opeinig balance of 30-june-14 and rec cash - paid exp
			$op_bal=183570+$rec_sum_pre['total']-$paid_sum_pre['SUM(amt)'];
			
			
			//current day cash received query
			$fst_sum_query="Select * from cash where dt='".date('m/d/Y')."'";
			$sql_sum_fst=mysql_query($fst_sum_query);
			$fst_sum=mysql_fetch_array($sql_sum_fst);
			
			
			
			
			print " <tr id=\"fix_height\">
					<td ><div>Opening Balance</div></td>
					<td ><div>"; echo number_format($op_bal);  print "/-</div></td>
					</tr>
					
					<tr id=\"fix_height\">
					<td ><div>Cash From Fast Food</div></td>
					<td ><div>"; echo number_format($fst_sum['fast_food']); print "/-</div></td>
					<td align=\"right\"><strong>Required Cash = </strong></td>
				<td class=\"red\"><strong >"; echo number_format($today_sum['SUM(amt)']); print "/-</td>
					</tr>
					
					<tr id=\"fix_height\">
					<td><div>Cash From Hotel</div></td>
					<td><div>"; echo number_format($fst_sum['rest']); print "/-</div></td>
					</tr>
					
					<tr id=\"fix_height\">
					<td><div>Cash Head Office</div></td>
					<td ><div>"; echo number_format($fst_sum['ho_cash']); print "/-</div></td>
					</tr>
					
					
					<tr id=\"fix_height\">
					<td><div>Short Cash</div></td>
					<td ><div>"; echo number_format($fst_sum['s_cash']); print "/-</div></td>
					</tr>
					
					<tr id=\"fix_height\">
					<td><div>Other Income / Loan </div></td>
					<td ><div>"; echo number_format($fst_sum['oth_cash']); print "/-</div></td>
					<td align=\"left\"><strong>Received Cash</strong></td>
				<td class=\"red\"><strong >"; echo number_format($rec_sum['rec']+$op_bal); print "/-</td>
					</tr>
					
					<tr id=\"fix_height\">
					<td><div>Total Cash Paid</div></td>
					<td ><div>"; echo number_format($paid_sum['SUM(amt)']); print "/-</div></td>
					<td align=\"left\"><strong>Less Expences </strong></td>
				<td class=\"red\"><strong >("; echo number_format($paid_sum['SUM(amt)']); print "/-)</td>
					</tr>
					
					<tr id=\"fix_height\">
					<td><div></div></td>
					<td ><div></div></td>
					<td align=\"left\"><strong>Balance Cash</strong></td>
				<td class=\"red\"><strong >"; echo number_format($rec_sum['rec']+$op_bal-$paid_sum['SUM(amt)']); print "/-</td>
					</tr>
					";
					
			
			print "<tr>
				
				
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