<?php
session_start();
if(!isset( $_SESSION['myusername'])){
header("location:../index.php");
};
include('../orna/db.php');

$lnk='';
$id=$_GET['id'];
$t_name=$_GET['t_name'];
$file_exist="true";
$file_count=1;

if($file_exist=="true"){
	for($x=1; $x<=$file_count; $x++){		
		$temp_name=$_FILES['files_'.$x]['tmp_name'];
		$file_name =$_FILES['files_'.$x]['name'];
		$file_ext = end(explode('.', $file_name));
		$target_dir = "../../images/application/".$_GET['name']."-".date('m-d-Y'); 
		$file_nm=date('m-d-Y')."-".time().'.'.$file_ext;
			if(is_dir($target_dir)==false){// Create directory if it does not exist
                mkdir($target_dir, 0700);
            }
		//Writes the photo to the server 
		$path=$target_dir.'/'.$file_nm;
			if(move_uploaded_file($temp_name,$path)){ 
				echo "Uploaded Successfully";
			} 
			else{ //Gives an error
				echo "Problem uploading your file."; 
				}//end else
		} //end loop
 }//end if

	
ob_end_flush();	
?>
