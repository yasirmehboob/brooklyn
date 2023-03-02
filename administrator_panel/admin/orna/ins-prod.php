<?php
session_start();
if(!isset( $_SESSION['myusername'])){
header("location:../index.php");
}
include('../news/database.php');
$db = new Database;

/*?>$max_id="SELECT * FROM  `prod` ORDER BY  `PR_ID` DESC LIMIT 0 , 1";
$max_id= mysql_query($max_id);
$max_id=mysql_fetch_array($max_id);
$max_id=$max_id['PR_ID']; 
$max_id=$max_id+1;<?php */

$max_id=mysql_insert_id();

$target = "../../uploads/prod/"; 
$file_name =$_FILES['photo']['name'];
$file_ext = end(explode('.', $file_name));
$photo_name= time()."-".$max_id.".".$file_ext;
$target = $target.$photo_name;


@$Brand_NM=addslashes($_POST['Brand_NM']);
@$typ=$_POST['typ'];
@$Pack=$_POST['Pack'];
@$user=$_SESSION['myusername'];
@$gross_wt=$_POST['gross_wt'];
@$price=$_POST['price'];
@$desc=addslashes($_POST['desc']);

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

$sql="INSERT INTO `prod` (`Brand_NM`, `typ`, `Pack`, `dt`, `user`, `gross_wt`, `img`, `price`,`descp`,`ID`) VALUES ('$Brand_NM','$typ', '$Pack', CURRENT_TIMESTAMP, '$user', '$gross_wt', '$photo_name', '$price','$desc','null');";


if(!mysql_query($sql)){
	die('error submitting data  Please contact OrnamentSolutions'   .  mysql_error());
	}	
		
else {echo'Uploaded Successfully';}

mysql_close();
ob_end_flush();
?>


