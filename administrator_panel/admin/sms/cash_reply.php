<?php
header("Content-Type: text/plain");

$text= rawurldecode(@$_REQUEST['text']);
//$text = $_GET['text'];

include('../orna/ornasys.inc');
include('../orna/db.php');

           
            	
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
			
							 
					echo "Opening Balance=".number_format($op_bal).PHP_EOL;
					 					 
					 echo "Fast Food=".number_format($fst_sum['fast_food']).PHP_EOL; 
					 					 
					 echo "Hotel=".number_format($fst_sum['rest']).PHP_EOL;
					 					 
					 echo "Head Office=".number_format($fst_sum['ho_cash']).PHP_EOL;
					 					 
					 echo "Short Cash=".number_format($fst_sum['s_cash']).PHP_EOL;
					 
					 echo "Other Income / Loan=".number_format($fst_sum['oth_cash']).PHP_EOL;
					 					 
					 echo "Received Cash=".number_format($rec_sum['rec']+$op_bal).PHP_EOL;
					 
					 //echo "Required Cash=".number_format($today_sum['SUM(amt)']).PHP_EOL;
					 
					//echo "Total Cash Paid=".number_format($paid_sum['SUM(amt)']).PHP_EOL;
					 
					echo "Less Expences=".number_format($paid_sum['SUM(amt)']).PHP_EOL;
					
					echo "Balance Cash=".number_format($rec_sum['rec']+$op_bal-$paid_sum['SUM(amt)']);

?>