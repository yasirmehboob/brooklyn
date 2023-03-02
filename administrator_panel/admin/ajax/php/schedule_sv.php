<?php 
$path="../../orna/";
require_once('../../orna/db.php');
$count=$_GET['count'];

if(@$_GET['row']=="single"){
	for($x=1; $x<=$count; $x++){
    
	$t_name=$_GET['t_name'.$x];
	$sv_query = "INSERT INTO ".$t_name." (".substr(field_nm($t_name),0,strlen(field_nm($t_name))-1).") VALUES (".substr(field_val($t_name),0,strlen(field_val($t_name))-1).")";
	if(!mysql_query($sv_query)){
		die('Please Try Again ' . mysql_error());
		}
		else {
				echo 'Saved.';
			}
	}
}//end for loop and if(row=single)

//making multiple rows 
elseif($_GET['row']=="multi"){
	//get max no of rows from form
	$rows=0;
	foreach($_POST['mul'] as $key=>$v){
	$rows=$rows+1;}
	
	//Update Mast table set as active instead of holiday
	$sql_update_mast="update schedule_m set status='active' where id='".$_POST['schedule_m'][0]."'";
	mysql_query($sql_update_mast);
	
	//Delete old trans data before inserting new data
	$sql_delete_trans="delete from schedule_t where schedule_m='".$_POST['schedule_m'][0]."'";
	mysql_query($sql_delete_trans);
	
	
	$t_name=$_GET['t_name1'];
	
		$sv_query = "INSERT INTO ".$t_name." (".substr(field_nm($t_name),0,strlen(field_nm($t_name))-1).") VALUES " .field_val_multi($t_name,$rows)."";
		if(!mysql_query($sv_query)){
			die('Please Try Again ' . mysql_error());
		}//end nested else
		else{
			echo 'Saved.';}//end nested else
	}

function field_nm($t_name=''){
$field="desc ".$t_name;
$field_query=mysql_query($field);
$f_nm="";
	while($fields=mysql_fetch_array($field_query)){
	$f_nm.=@$fields['Field'].",";};
	return $f_nm;
	};

function field_val($t_name=''){
$field_val="desc ".$t_name;
$field_val_query=mysql_query($field_val);
$f_val = " ";
	while($fields_val=mysql_fetch_array($field_val_query)){
	if($fields_val['Field']=='id'){
		$f_val.="Null,";
	}else{	
		$val=mysql_real_escape_string($fields_val['Field']);
		$f_val.="'".mysql_real_escape_string(@$_POST[$val])."',";
		}
	};	
	return $f_val;
};

//multi value funcaion start
function field_val_multi($t_name='',$key=''){
	$new_row=" ";
	$tot_credit=0;$tot_debit=0;
		//retriving values name from db
		for($r=0;$r<$key;$r++){
			$field_val="desc ".$t_name;
			$field_val_query=mysql_query($field_val);
			$f_val = " ";
			if($r>0){
				//$_POST['dt'][$r]=@$_POST['dt'][0];
				//$_POST['user'][$r]=@$_POST['user'][0];
				//$_POST['del'][$r]=@$_POST['del'][0];
			}
				while($fields_val=mysql_fetch_array($field_val_query)){
				$val=$fields_val['Field'];
				$f_val.="'".@mysql_real_escape_string($_POST[$val][$r])."',";
				}//while end
		$f_val=substr($f_val,0,strlen($f_val)-1);
		$new_row.="(".$f_val."),";
		
		}//for end
		$new_row=substr($new_row,0,strlen($new_row)-1);
		return $new_row;
		
};//function end

mysql_close();	
?>