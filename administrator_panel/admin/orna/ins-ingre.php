<?php
session_start();
if(!isset( $_SESSION['myusername'])){
header("location:../index.php");
}
include('../news/database.php');
$db = new Database;

$max_id=mysql_insert_id();

$target = "../../uploads/ingre/"; 
$file_name =$_FILES['photo']['name'];
$file_ext = end(explode('.', $file_name));
$photo_name= time()."-".$max_id.".".$file_ext;
$target = $target.$photo_name;


@$PD_ID=$_POST['PD_ID'];
@$name=$_POST['name'];
@$qty=$_POST['qty'];
@$detail=mysql_real_escape_string($_POST['detail']);

if(isset($_FILES['photo'])){
if(move_uploaded_file($_FILES['photo']['tmp_name'],$target))
{ //Tells you if its all oke
echo ""; } 
else { 
//Gives and error if its not 
echo "Sorry, there was a problem uploading Image."; 
} }
else{
	echo "Image not Selected";}

$sql="INSERT INTO `ingre` (`id` ,`pd_id` ,`name` ,`detail` ,`img`,`qty`)VALUES (NULL ,  '$PD_ID',  '$name',  '$detail',  '$photo_name','$qty')";


if(!mysql_query($sql)){
	die('error submitting data  Please contact OrnamentSolutions '   .  mysql_error());
	}	
		
else {echo'Uploaded Successfully';}

mysql_close();
ob_end_flush();
?>


