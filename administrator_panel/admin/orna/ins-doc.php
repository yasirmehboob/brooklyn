<?php
include('../orna/db.php');
@$rack=$_POST['rack'];
@$file=$_POST['file'];
@$section=$_POST['section'];
@$name=$_POST['name'];
@$today = date("d-m-Y H-i-s");
@$user=$_SESSION['myusername'];
//getting file name from database

			$fi_nm="Select * from file where id='".$file."'";
			$sql_fi=mysql_query($fi_nm);
			$file_name=mysql_fetch_array($sql_fi);
			$folder_name=$file_name['file_nm'];
			
//getting rack name from database
			$all_rack="select rack_nm from rack where id='".$rack."'";
			$q_rack=mysql_query($all_rack);
			$q_racks=mysql_fetch_array($q_rack);
			$rack_name=$q_racks['rack_nm'];
//getting section name from database
			$all_section="select section_nm from section where id='".$section."'";
			$q_section=mysql_query($all_section);
			$q_sections=mysql_fetch_array($q_section);
			$section_name=$q_sections['section_nm'];			

$name=$name ." - ".$rack_name." - ".$folder_name." - ".$section_name;

if(isset($_FILES['files'])){
    $errors= array();
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
		$file_name = $key.$_FILES['files']['name'][$key];
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];
		$file_ext = end(explode('.', $file_name));
		$db_file_name = $folder_name."-".$today."-".$key.".".$file_ext;
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
				$query="INSERT INTO doc (`id`, `rack_id`, `file_id`, `section_id`, `doc_nm`, `doc_link`, `dt`, `user`) VALUES (NULL, '$rack', '$file', '$section', '$name', '$db_file_name', '$today', '$user');";
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