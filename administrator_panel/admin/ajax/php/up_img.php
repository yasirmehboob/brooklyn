<?php
$path = '../../orna/';
require_once('../../orna/db.php');
$dt= time();
$user=@$_SESSION['myusername'];
$table=$_POST['table'];    
$condition = "`id`='".$_POST['id']."'";

//making fields whose are existed in the table
$fields  = '';
foreach($_POST as $key=>$value)
{
    $sql_col_check = "SELECT * FROM information_schema.COLUMNS
                         WHERE COLUMN_NAME = '$key'
                         and TABLE_NAME = '$table'
                         and TABLE_SCHEMA = '$MySQL_database'"; 
    $count_col = mysql_num_rows(mysql_query($sql_col_check));
    if($count_col>0){
        //Formating Values
        if($key=='event_time'){$value=strtotime($value);}
        else if($key=='descp'){$value=htmlentities($value);}
        else if(($key=='dt')){
            if($value==''){
                $value = time();    
            }else{$value=strtotime($value);}
        }
        //Formating Values
        $fields.="`$key`='$value',";
    }
}
$fields=substr($fields,0,strlen($fields)-1);
//making fields whose are existed in the table



//update function start
function update($table,$fields,$condition){
$sql='update '.stripslashes($table).' set '.stripslashes($fields).' where '.stripslashes($condition);
if(!mysql_query($sql)){
	die("Error Updating Data. <center> Check Manuals or Contact DBA/Administrator for Assistance." . mysql_error());
	}
	else{return "updated";
	}
}
//update function ends



//Upload Image
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
//file crop and upload
$valid_exts = array('jpeg', 'jpg', 'png', 'gif');
$max_file_size = 1000 * 10000; #10000kb
$nw = 800;  # image with
$nh = 800;  # height
     if($_FILES['files_1']['name']!=''){
		if (! $_FILES['files_1']['error'] && $_FILES['files_1']['size'] < $max_file_size) {
			$ext = strtolower(pathinfo($_FILES['files_1']['name'], PATHINFO_EXTENSION));
			if (in_array($ext, $valid_exts)) {
                    
                    $sql_path="SELECT `dir`,`files_1` FROM ".$table." WHERE ".$condition;
            
                    $db_path=mysql_fetch_array(mysql_query($sql_path));
				    
                    $img_name_db=str_replace('/','',$table).'-'.date('d-m-y-H-i-s').'.'.$ext;
					$dir='../../../images/'.$table;
                    
                    if(is_dir($dir)==false){//Create directory if it does not exist
						mkdir($dir, 0755);
					}
                
                    $path_img = $dir.'/'.$img_name_db;
                    
                    $previous_image=$dir.'/'.$db_path['files_1'];
                
					//$_POST['files_1']=$new_directory.$img_name_db;
					
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
                    
                    if($db_path['files_1']!=''){        
                        if(file_exists($previous_image)){
                            unlink($previous_image);
                        }
                    }
                
                    move_uploaded_file($img_name_db,$dir);
                    $fields.=", `files_1`='$img_name_db', `dir`='$table'";

                      
					
				} else {
					echo 'unknown problem!';
				} 
		} else {
			echo 'file is too small or large';
		}
	
    }//end file crop and upload
}
//Upload Image

//call update function
echo update($table,$fields,$condition);
?>