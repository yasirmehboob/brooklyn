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
<meta http-equiv="refresh" content="10" />
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
                <td colspan="5"><b>Description<b></td>
                <td width="150"><strong>Amount</strong></td>
                <td width="150"><strong>Last Date</strong></td>
                <td width="150" colspan="3"><strong>status / Action</strong></td>
             </tr>
            
            	
            <?php 
			$today_query="Select * from payment where dt='".date('m/d/Y')."'";
			$sql_today=mysql_query($today_query);
			while($today=mysql_fetch_array($sql_today)){
            print "
					<tr id=\"fix_height\">
					<td colspan=\"5\"><div>"; echo $today['descp']; print "</div></td>
					<td><div>"; echo number_format($today['amt']); print "/-</div></td>
					<td><div>"; echo date('d-M-Y D', strtotime($today['lst_dt'])); print "</div></td>
					<td class=\"icon\"><img src=\"../menu/images/"; echo $today['p_yn']; print".png\"  alt\"Status\" /></td>
					<td class=\"icon\">
						<a href=\"payment-trans.php?id=";echo $today['id']; print "&t_name=payment\">
						<img src=\"../menu/images/re schedule.png\"  alt\"Transfer\" /></a></td>
					<td class=\"icon\">
						<a href=\"ed_data.php?id=";echo $today['id']; print "&t_name=payment\">
						<img src=\"../menu/images/edit.png\"  alt\"Modify\" /></a></td>
					</tr>
					";
			}
			
			$today_sum_query="Select SUM(amt) from payment where dt='".date('m/d/Y')."'";
			$sql_sum=mysql_query($today_sum_query);
			$today_sum=mysql_fetch_array($sql_sum);//net total amount
			
			$paid_sum_query="Select SUM(amt) from payment where dt='".date('m/d/Y')."' and p_yn='y'";
			$sql_sum_paid=mysql_query($paid_sum_query);
			$paid_sum=mysql_fetch_array($sql_sum_paid);
			if($paid_sum['SUM(amt)']==""){$paid_sum['SUM(amt)']="No Payment Made!";}//total paid amount
			
			$rec_sum_query="Select(sum(fast_food)+sum(rest)+sum(s_cash)+sum(ho_cash)+sum(oth_cash)) as rec from cash where dt='".date('m/d/Y')."'";
			$sql_sum_rec=mysql_query($rec_sum_query);
			$rec_sum=mysql_fetch_array($sql_sum_rec);
			if($rec_sum['rec']==""){$rec_sum['rec']="No Cash Received";}//total paid amount
			
			print "<tr>
				<td align=\"right\"><strong>Received Cash=</strong></td>
				<td class=\"red\"><strong >"; echo number_format($rec_sum['rec']); print "/-</td>
				
				<td align=\"right\"><strong>Paid Exp =</strong></td>
				<td class=\"red\"><strong >"; echo number_format($paid_sum['SUM(amt)']); print "/-</td>
				
				<td align=\"right\"><strong>Total Exp =</strong></td>
				<td class=\"red\"><strong >"; echo number_format($today_sum['SUM(amt)']); print "/-</strong></td>
				
				<td align=\"right\"><strong>Balance Cash=</strong></td>
				<td class=\"red\"><strong >"; echo number_format($rec_sum['rec']-$paid_sum['SUM(amt)']); print "/-</td>
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