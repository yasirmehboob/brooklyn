<?php
include('../orna/ornasys.inc');
session_start();
if(!isset( $_SESSION['myusername'])){
header("location:../restricted/error.php");
};
include('../orna/db.php');
@$id=$_POST['id'];

if (!isset($id)){
	header("location:summary-para.php");}
else{$id=$_POST['id'];}
$namequery="select * from install_mast where plan_id ='".$id."'";
$myname=mysql_query($namequery);
$install_detail=mysql_fetch_array($myname);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Installment  Summary <?php echo $company;?> </title>
<link rel="stylesheet" type="text/css" href="view-ornasys.css" media="all">
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="../script/jq.js"></script>
<script type="text/javascript" src="calendar.js"></script>
<?php 
$down_sql="select * from install_mast where plan_id = '".$id."'";
$down_query=mysql_query($down_sql);
$down_amt=mysql_fetch_array($down_query);

$paid_sql="select sum(rec_amt) from install_trans where plan_id = '".$id."' and p_yn ='y'";
$paid_query=mysql_query($paid_sql);
$paid_amt=mysql_fetch_array($paid_query);

$rem_amt=($down_amt['tot_amt']-$down_amt['down_amt'])-$paid_amt['sum(rec_amt)']+$down_amt['int_amt'];

?>


</head>	
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	

<form id="form_806184" class="appnitro"  method="post" action="install-detail.php">
    <div class="form_description">
        <h2>Installment Summary <span style="float:right;font-size:14px;">( <?php echo $install_detail['name'] .") ". $install_detail['plan_id'];?>  </span>
        </h2> 
    </div>						
    <div class="form_description">
        <h2>
      	        <center>
                Total Amount = <span style="color:#F09;"> <?php echo number_format($down_amt['tot_amt']);?></span>
                Markup = <span style="color:#F09;"> <?php echo number_format($down_amt['int_amt']);?></span>
                Down Payment = <span style="color:#F09;"> <?php echo number_format($down_amt['down_amt']);?></span>
                Paid Installment = <span style="color:#F09;"> <?php echo number_format($paid_amt['sum(rec_amt)']);?></span>
                Remaining Installments =<span style="color:#F09;"> <?php echo number_format($rem_amt);?></span>
                </center>
        </h2> 
    </div>						
    
    <ul>
    <table align="center"><tr><td>        
        <td width="400">
            <li id="li_3" >
            <label class="description" for="element_3">Select Installment</label>
            <div>
            <select class="element select large" id="id" name="id" required x-moz-errormessage=""> 
			<option value="" selected="selected"></option>
			<?php
			$mast_query="Select plan_id,name from install_mast";
			$sql_mast=mysql_query($mast_query);
			while($mast_name=mysql_fetch_array($sql_mast)){
            print "<option value=\""; echo $mast_name['plan_id']; print "\" >"; echo $mast_name['name']; print "</option>";
			}
            ?>

		</select>
            </div> 
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
                <td width="150"><strong>Due Date</strong></td>
                <td ><b>Description<b></td>
                <td width="150"><strong>Installment Amount</strong></td>
                <td width="150"><strong>Remaining Amount</strong></td>
                <td colspan="2" width="150"><strong>Status / Action</strong></td>
             </tr>
            
            	
            <?php 
			$install_query="Select * from install_trans where plan_id = '".$id."'";
			$sql_install=mysql_query($install_query);
			while($install=mysql_fetch_array($sql_install)){
				if ($install['p_yn']=="y"){$link="#.php"; $img="lock.png"; $class="highlight";}
					else{$link="rec-install.php?id=".$install['install_id']."&user=".$_SESSION['myusername']; 
					;$img="cash-received.png";
					$class="";}
            print "
					<tr class=\"fix_height "; echo $class; print"\">
					<td><div>"; echo date('d-M-Y D', strtotime($install['dt'])); print "</div></td>
					<td><div>"; echo $install['descp']; print "</div></td>
					<td><div>"; echo number_format($install['amt']+$install['int_amt']); print "/-</div></td>
					<td><div>"; echo number_format($install['rem_amt']); print "/-</div></td>
					<td class=\"icon\"><img src=\"../menu/images/"; echo $install['p_yn']; print".png\"  alt\"Status\" /></td>
					<td class=\"icon\">
						<a href=\"";echo $link; print"\">
							<img src=\"../menu/images/"; echo $img; print "\"  title=\"Receive Cash\" alt\"receive\" />
						</a>
					</td>
					</tr>
					";
			}
						
			$paid_sum_query="Select SUM(amt) from install_trans where plan_id = '".$id."'";
			$sql_sum_paid=mysql_query($paid_sum_query);
			$paid_sum=mysql_fetch_array($sql_sum_paid);
			if($paid_sum['SUM(amt)']==""){$paid_sum['SUM(amt)']="0";}//total paid amount
						
			print "<tr>
				<td></td>
				<td align=\"right\"><strong>Total Installments =</strong></td>
				<td class=\"red\"><strong >"; echo number_format($paid_sum['SUM(amt)']+$down_amt['int_amt']); print "/-</strong></td>
				</tr>";
			?>
            </table>
          </div>
        </li>
    </ul>
</form>	
		<div id="footer">
			Powered by <a href="http://www.ornamentsolutions.com">Ornament</a> Registered to <?php echo $company;  mysql_close(); unset($_POST['id']);?>
		</div>
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
 
</html>