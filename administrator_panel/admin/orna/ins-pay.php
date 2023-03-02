<?php
include('../orna/db.php');
if(strlen(@$_POST['element_2_2'])==1){
	$day_fst=str_pad(@$_POST['element_2_2'],2,"0",STR_PAD_LEFT);}
	else{$day_fst=$_POST['element_2_2'];}
if(strlen(@$_POST['element_3_2'])==1){
	$day_nxt=str_pad(@$_POST['element_3_2'],2,"0",STR_PAD_LEFT);}
	else{$day_nxt=$_POST['element_3_2'];}

@$dt=$_POST['element_2_1'].'/'.$day_fst.'/'.$_POST['element_2_3'];
@$lst_dt=$_POST['element_3_1'].'/'.$day_nxt.'/'.$_POST['element_3_3'];

@$descp=$_POST['descp'];
@$amt=$_POST['amt'];
@$p_yn=$_POST['p_yn'];
$sql_query="INSERT INTO payment (`id`, `descp`, `dt`, `lst_dt`, `p_yn`, `amt`) VALUES (NULL, '$descp', '$dt', '$lst_dt', '$p_yn', '$amt');";
if(!mysql_query($sql_query)){
	die( "There is some problem ". mysql_error());
	}
else{	
		print"<script language=\"javascript\" type=\"text/javascript\">
		alert(\"Records Applied And Saved\");
		window.history.back()
		</script>";
	};
?>