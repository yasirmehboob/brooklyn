<?php
$path = '../../orna/';

function field_nm($t_name=''){
$field="desc ".$t_name;
$field_query=mysql_query($field);
$f_nm="";
	while($fields=mysql_fetch_array($field_query)){
	$f_nm.=@$fields['Field'].",";};
	return $f_nm;
	};

function field_val($t_name=''){
$field_val="desc ".$t_name;
$field_val_query=mysql_query($field_val);
$f_val = " ";
	while($fields_val=mysql_fetch_array($field_val_query)){
	if($fields_val['Field']=='id'){
		$f_val.="Null,";
	}else{	
		$val=mysql_real_escape_string($fields_val['Field']);
		$f_val.="'".mysql_real_escape_string(@$_POST[$val])."',";
		}
	};	
	return $f_val;
};



require_once('../../orna/db.php');
$lnk='';
@$name=$_GET['t_name'];
$t_name = $_GET['t_name'];
@$dir=@$_POST['dir'];
@$_POST['user']=@$_SESSION['myusername'];
@$_POST['dt']=time();
@$_POST['password']=md5(@$_POST['password']);
@$_POST['descp']=htmlentities(@$_POST['descp']);
@$_POST['status']="approval-pending";
@$_POST['category']="Uncategorized";


@$int_status='N';
//file crop and upload
$valid_exts = array('jpeg', 'jpg', 'png', 'gif');
$max_file_size = 1000 * 10000; #10000kb
$nw = 800;  # image with
$nh = 800;  # height

if(isset($_POST['no_image']) && $_POST['no_image']=='no_image'){
    
    $_POST['files_1']='logo.png';
    $_POST['dir']='';
    $upload=true;
    
}else{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ( isset($_FILES['files_1']) ) {
            if (! $_FILES['files_1']['error'] && $_FILES['files_1']['size'] < $max_file_size) {
                $ext = strtolower(pathinfo($_FILES['files_1']['name'], PATHINFO_EXTENSION));
                if (in_array($ext, $valid_exts)) {
                        $img_name_db=$name.'-'.date('d-m-y-H-i-s').'.'.$ext;
                        $dir = $_POST['dir'];
                        if(is_dir($dir)==false){// Create directory if it does not exist
                            mkdir($dir, 0755);
                        }
                        $path_img = $dir.$img_name_db;

                        $size = getimagesize($_FILES['files_1']['tmp_name']);

                        $x = (int) $_POST['x'];
                        $y = (int) $_POST['y'];
                        $w = (int) $_POST['w'] ? $_POST['w'] : $size[0];
                        $h = (int) $_POST['h'] ? $_POST['h'] : $size[0];

                        $data = file_get_contents($_FILES['files_1']['tmp_name']);
                        $vImg = imagecreatefromstring($data);
                        $dstImg = imagecreatetruecolor($nw, $nh);
                        imagecopyresampled($dstImg, $vImg, 0, 0, $x, $y, $nw, $nh, $w, $h);
                        imagejpeg($dstImg, $path_img);
                        imagedestroy($dstImg);
                        $_POST['files_1']=$img_name_db;
                        $_POST['dir']=$t_name;
                        $upload=true;
                        move_uploaded_file($dir,$img_name_db);
                    } else {
                        echo 'unknown problem!';
                    } 
            } else {
                echo 'file is too small or large';
            }
        } else {
            echo 'file not set';
        }
    }//end file crop and upload
}//END ELSE

if($upload==true){
   $sv_query = "INSERT INTO ".$t_name." (".substr(field_nm($t_name),0,strlen(field_nm($t_name))-1).") VALUES (".substr(field_val($t_name),0,strlen(field_val($t_name))-1).")";
	
    if(!mysql_query($sv_query)){
		die('Please Try Again ' . mysql_error());
		}
		else {
			
			$last_id= mysql_insert_id();
			$sql_insert="INSERT INTO `schedule_m` (`id`, `cust_id`, `month`, `day`, `dt`, `status`) VALUES ";
			for($d=1;$d<=31;$d++){
				
				$month_is=date('n', strtotime(' + '.$d.' days'));
				$day_is=date('d', strtotime(' + '.$d.' days'));
				$date_is=date('Y-m-d', strtotime(' + '.$d.' days'));
				
				$sql_insert.="(NULL, '".$last_id."', '".$month_is."', '".$day_is."', '".$date_is."', 'active'),";
			}
			$sql_insert=substr($sql_insert,0,strlen($sql_insert)-1);
			
			mysql_query($sql_insert);
			
         	echo "Saved.";
        }
	
}//if image upload was successfull
else{
	echo "There is Some problem, Please contact DIT";}
	
?>