<?php
include('database.php');
$db = new Database;

$max_id="SELECT * FROM  `noti` ORDER BY  `id` DESC LIMIT 0 , 1";
$max_id= mysql_query($max_id);
$max_id=mysql_fetch_array($max_id);
$max_id=$max_id['id'];
$max_id=$max_id+1;

@$m_hd=mysql_real_escape_string($_POST['m_hd']);
@$s_hd=mysql_real_escape_string($_POST['s_hd']);
@$del_yn="n";
@$noti_detail=mysql_real_escape_string($_POST['noti_detail']);
@$noti_short=mysql_real_escape_string($_POST['noti_short']);
@$post_by=$_POST['post_by'];
@$photo1="s".$max_id."-Crystolite Pharma.jpg";
@$photo="l".$max_id."-Crystolite Pharma.jpg";
@$noti_position=$_POST['noti_position'];

$target1 = "../../uploads/noti/"; 
$target = "../../uploads/noti/"; 
$target1 = $target1."s".$max_id."-".basename( $_FILES['photo1']['name']); 
$target = $target."l".$max_id."-".basename( $_FILES['photo']['name']);

if((move_uploaded_file($_FILES['photo']['tmp_name'],$target)) && (move_uploaded_file($_FILES['photo1']['tmp_name'],$target1))) 
{ //Tells you if its all oke
echo ""; } 
else { 
//Gives and error if its not 
echo "Sorry, there was a problem uploading your image file."; 
} 

$sql="INSERT INTO `noti`(`id`, `m_hd`, `s_hd`, `dt`, `del_yn`, `noti_detail`, `noti_short`, `post_by`, `img_sml`, `img_lrg`, `noti_position`,`img_id`) 

VALUES 

('', '$m_hd', '$s_hd', CURRENT_TIMESTAMP(), '$del_yn', '$noti_detail', '$noti_short', '$post_by', '$photo1', '$photo', '$noti_position','1')";
if(!mysql_query($sql)){
	die('error submitting data Please contact DIT Crystolite Pharma' .  mysql_error());
	}	
		
else{ echo'Uploaded Successfully ';}

mysql_close();
ob_end_flush();	
?>


