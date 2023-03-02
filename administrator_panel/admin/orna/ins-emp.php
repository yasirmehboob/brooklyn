<?php
session_start();
if(!isset( $_SESSION['myusername'])){
header("location:../index.php");
}
include('../news/database.php');
$db = new Database;

$max_id=mysql_insert_id();

$target = "../../uploads/emp/"; 
$file_name =$_FILES['photo']['name'];
$file_ext = end(explode('.', $file_name));
$photo_name= time()."-".$max_id.".".$file_ext;
$target = $target.$photo_name;


@$profile=addslashes($_POST['profile']);
@$cell=$_POST['cell'];
@$emp_nm=$_POST['emp_nm'];
@$user=$_SESSION['myusername'];
@$desgi=$_POST['desgi'];
@$eml=$_POST['eml'];


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

$sql="INSERT INTO `emp` (`emp_id2`, `cell`, `emp_nm`, `desgi`, `brach_city`, `profile`, `eml`, `img`, `user`) VALUES (NULL, '$cell', '$emp_nm', '$desgi', 'n/a', '$profile', '$eml', '$photo_name','$user');";


if(!mysql_query($sql)){
	die('error submitting data  Please contact OrnamentSolutions'   .  mysql_error());
	}	
		
else {echo'Uploaded Successfully';}

mysql_close();
ob_end_flush();
?>


