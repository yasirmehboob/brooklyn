<?php
session_start();
$user=$_SESSION['myusername'];
if(!isset( $_SESSION['myusername'])){
header("location:../index.php");
};
include('db.php');
$lnk='';
@$albm=$_POST['albm'];
@$name=$_POST['name'];
@$title=$_POST['title'];
@$cont_typ=$_POST['cont_typ'];
@$country=$_POST['country'];
$descp=@$_POST['descp'];
$descp=addslashes($descp);
@$date=date('m/d/Y');
@$video=$_POST['video'];

if(isset($_FILES['files'])){
    $errors= array();
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
		$file_name = $key.$_FILES['files']['name'][$key];
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];
		$file_ext = end(explode('.', $file_name));
		$db_file_name = $name."-".time().$key.".".$file_ext;
        if($file_size > 9097152){
			$errors[]='File size must be less than 2 MB';
        }		
        
        $desired_dir="../../images/contestants";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);		// Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"$desired_dir/".$db_file_name);
				$query="INSERT INTO contest (`id`,`hide`,`country`, `name`  , `descp`, `img`, `dt`, `user`, `albm_id`, `video`,`cont_typ`,`title`) VALUES (NULL, 'n', '$country', '$name', '$descp', '$db_file_name', '$date', '$user', '$albm', '$video','$cont_typ','$title')";
				
            }else{									// rename the file if another one exist
                $new_dir="$desired_dir/".$file_name.time();
                 rename($file_tmp,$new_dir) ;				
            }
		 mysql_query($query);
		 $cont_max_id ="select max(id) from contest";
		 $cont_id=mysql_query($cont_max_id);
		 $row_id=mysql_fetch_array($cont_id);
		 	
			if($cont_typ=="title holder"){$sql_update="update country set title_id = ".$row_id['max(id)']." where id =".$country;}
			
			else if($cont_typ=="mupho"){$sql_update="update country set mupho_id = ".$row_id['max(id)']." where id =".$country;}
			
			else{$sql_update="update country set cont_id = ".$row_id['max(id)']." where id =".$country;}
		 

		 mysql_query($sql_update);			
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
