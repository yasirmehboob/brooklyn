<?php
include('../orna/db.php');
if(strlen(@$_POST['element_2_2'])==1){
	$day_fst=str_pad(@$_POST['element_2_2'],2,"0",STR_PAD_LEFT);}
	else{$day_fst=$_POST['element_2_2'];}
	
@$st_dt=@$_POST['element_2_1'].'/'.$day_fst.'/'.@$_POST['element_2_3'];
@$user=$_GET['user'];
$name=$_POST['name'];
@$descp=$_POST['descp'];
@$contact=$_POST['contact'];
@$tot_amt=$_POST['tot_amt'];
@$install_amt=$_POST['install_amt'];
@$interval=$_POST['interval'];
@$dt=date('m/d/Y');
@$down_amt=$_POST['down_amt'];
@$int_rate=$_POST['int_rate'];
//calculating intest 
	$int_amt=($tot_amt-$down_amt)*$int_rate;
	$tot_int_amt=$int_amt/100;
	
//make Pln id
$id_query="SELECT max(id) FROM install_mast";
		$sql=mysql_query($id_query);
		$sql=mysql_fetch_array($sql);
		if($sql['max(id)']==""){$sql['max(id)']=000000;}
		$new_num=substr($sql['max(id)'],-6)+1;
		$max_id="PLN-".date("ym").'-'.str_pad($new_num,6,"0",STR_PAD_LEFT);


//insert into master table 
$sql_query="INSERT INTO install_mast (`id`, `name`, `descp`, `contact`, `tot_amt`, `install_amt`, `duration`, `dt`, `user`,`st_dt`,`down_amt`,`int_rate`,`int_amt`,`plan_id`) VALUES (NULL, '$name', '$descp', '$contact', '$tot_amt', '$install_amt', '$interval', '$dt', '$user','$st_dt','$down_amt','$int_rate','$tot_int_amt','$max_id')";
if(!mysql_query($sql_query)){
	die( "There is some problem ". mysql_error());
	}//end if
	
else{
	echo $tot_amt."<br>". $down_amt; 
	$r=	$tot_amt-$down_amt;
	
	$rem_amt =$r+$tot_int_amt;
	$no_of_install=$rem_amt/$install_amt;
	//net remaing amount with interest amount
	
	$install_int_amt=$tot_int_amt/$no_of_install;
	
	//echo "rem amt ".$rem_amt."<br>". "install amt ". $install_amt. "<br>interst intallment".$install_int_amt."total ineret amt <br>".$tot_int_amt;
	
	
	for($x=1;$x<=$no_of_install;$x++){
	
	//make ins id	
	$id_ins="SELECT max(id) FROM install_trans";
	$sql_ins=mysql_query($id_ins);
	$sql_ins=mysql_fetch_array($sql_ins);
	if($sql_ins['max(id)']==""){$sql_ins['max(id)']=000000;}
	$new_num_ins=substr($sql_ins['max(id)'],-6)+1;
	$max_id_ins="INS-".date("ym").'-'.str_pad($new_num_ins,6,"0",STR_PAD_LEFT);

	$rem_amt=($rem_amt)-($install_amt-$install_int_amt);
	
	

	$trans_query="INSERT INTO install_trans (`id`, `plan_id`, `amt`, `dt`, `rem_amt`, `descp`, `p_yn`, `rec_dt`, `rec_amt`, `pay_mod`,`f_yn`,`chq_no`, `fine_amt`,`install_id`,`int_amt`) VALUES (NULL, '$max_id', '$install_amt', '$st_dt', '$rem_amt', 'Not Yet Paid', 	'N','N/A','N/A','N/A','N','N/A','N/A','$max_id_ins','$install_int_amt')";
	
	mysql_query($trans_query);
	$st_dt=date('m/d/Y' , strtotime("+".$interval." day", strtotime($st_dt)));
	}//end for

 print"<script language=\"javascript\" type=\"text/javascript\">
		alert(\"Records Applied And Saved\");
		window.history.back()</script>";
	
	};//end else
			
?>