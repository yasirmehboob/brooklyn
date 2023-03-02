<?php
/*session_start();
if(!isset( $_SESSION['myusername'])){
header("location:index.php");}*/
$path = '../../orna/';

require_once('../../orna/db.php');

//update function start
function update($table,$fields,$condition){

$sql='update '.stripslashes($table).' set '.stripslashes($fields).' where '.stripslashes($condition);

if(!mysql_query($sql)){
	die("Error Updating Data. <center> Check Manuals or Contact DBA/Administrator for Assistance." . mysql_error());
	}
	else{return "updated";
	}
}
//update function ends


if(isset($_POST['unit_price']) && @$_POST['unit_price']!='null'){
    
    $brand_id=explode('=',$_POST['condition']);
    
    $sql_last_price = "select unit_price from brand_item where ".$_POST['condition'];
    $last_price=mysql_fetch_array(mysql_query($sql_last_price));
    
        //check if the last price is same or different
        if($last_price['unit_price']==$_POST['unit_price']){
            //if the last price is same then do nothing
        }//if last price is not same with the curently updated price then make the log
        else{
            $dt=time();
            //insert new log
            $insert_log="INSERT INTO `unit_price_log` (`id`, `unit_price`, `brand_id`, `dt`, `user`) VALUES (NULL, '".$last_price['unit_price']."', ".$brand_id[1].", '".$dt."', 'system')";
            mysql_query($insert_log);
        }
}

echo update($_POST['table'],$_POST['field'],$_POST['condition']);
?>