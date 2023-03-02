<?php
session_start();
$user=$_SESSION['myusername'];
if(!isset( $_SESSION['myusername'])){
header("location:../index.php");
};
include('db.php');
$lnk='';
@$albm=$_POST['albm'];
$descp=$_POST['descp'];
if(isset($_FILES['files'])){
    $errors= array();
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
		$file_name = $key.$_FILES['files']['name'][$key];
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];
		$file_ext = end(explode('.', $file_name));
		$db_file_name = time().$key.".".$file_ext;
        if($file_size > 9097152){
			$errors[]='File size must be less than 2 MB';
        }		
        
        $desired_dir="../../images/gallery";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);		// Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"$desired_dir/".$db_file_name);
				$query="INSERT into gallery (`id`,`link`,`albm_id`,`descp`) VALUES('','$db_file_name','$albm','$descp');";
            }else{									// rename the file if another one exist
                $new_dir="$desired_dir/".$file_name.time();
                 rename($file_tmp,$new_dir) ;				
            }
		 mysql_query($query);			
        }else{
                print_r($errors);
        }
    }
	if(empty($error)){
		echo "Successfully Uploaded";
	}
}
else{
	echo "There is Some problem, Please contact DIT";}
	
ob_end_flush();	
?>
