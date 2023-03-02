<?php
include('../orna/db.php');

$name=$_POST['name'];
$c_nm=$_POST['c_nm'];
$cell=$_POST['cell'];
$land=$_POST['land'];
$eml=$_POST['eml'];
$today = date("d-m-Y H-i-s");
@$user=$_SESSION['myusername'];
$folder_name="visiting-cards";

if(isset($_FILES['files'])){
    $errors= array();
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
		$file_name = $key.$_FILES['files']['name'][$key];
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];
		$file_ext = end(explode('.', $file_name));
		$db_file_name = $name."-".$today."-".$key.".".$file_ext;
        if($file_size > 9097152){
			$errors[]='File size must be less than 2 MB';
        }		
        
        $desired_dir="../scanned/".$folder_name;
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);		// Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"$desired_dir/".$db_file_name);
				$query="INSERT INTO pbook2 (`id`, `name`, `c_nm`, `cell`, `land`, `eml`, `vcard`, `dt`, `user`) VALUES (NULL, '$name', '$c_nm', '$cell', '$land', '$eml', '$db_file_name', '$today', '$user')";
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
		print"<script language=\"javascript\" type=\"text/javascript\">
		alert(\"Records Applied And Saved\");
		window.history.back()
		</script>";
	}
}
else {
	echo "there is problem";}




?>