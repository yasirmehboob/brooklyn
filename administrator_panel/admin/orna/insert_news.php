<?php
session_start();
if(!isset( $_SESSION['myusername'])){
header("location:../index.php");
}
include('db.php');

$max_id="SELECT * FROM  `news` ORDER BY  `id` DESC LIMIT 0 , 1";
$max_id= mysql_query($max_id);
$max_id=mysql_fetch_array($max_id);
$max_id=$max_id['id']; 
$max_id=$max_id+1;

$target = "../../images/news/"; 
$file_name =$_FILES['photo']['name'];
$file_ext = end(explode('.', $file_name));
$photo_name= "news-".time()."-".$max_id.".".$file_ext;
$target = $target.$photo_name;



@$m_hd=addslashes($_POST['m_hd']);
@$s_hd=$m_hd;
@$del_yn="n";
@$news_detail=addslashes($_POST['news_detail']);
@$news_short=addslashes($news_detail);
@$post_by=$_SESSION['myusername'];
@$photo=$photo_name;
@$photo1=$photo;
@$nws_position="1";

if(isset($_FILES['photo'])){
if(move_uploaded_file($_FILES['photo']['tmp_name'],$target))
{ //Tells you if its all oke
echo ""; } 
else { 
//Gives and error if its not 
echo "Sorry, there was a problem uploading Display Image (Home Page)."; 
} }
else{
	echo "Display Image (Home Page) not Selected";}
	
//multiple images for news
if(isset($_FILES['photo_news_gallery'])){
    $errors_ni= array();
	foreach($_FILES['photo_news_gallery']['tmp_name'] as $key => $tmp_name_ni){
		$file_name_ni = $key.$_FILES['photo_news_gallery']['name'][$key];
		$file_size_ni =$_FILES['photo_news_gallery']['size'][$key];
		$file_tmp_ni =$_FILES['photo_news_gallery']['tmp_name'][$key];
		$file_type_ni=$_FILES['photo_news_gallery']['type'][$key];
		$file_ext_ni = end(explode('.', $file_name_ni));
		$db_file_name_ni = time().$key.".".$file_ext_ni;
        if($file_size_ni > 9097152){
			$errors_ni[]='File size must be less than 2 MB';
        }		
        
        $desired_dir_ni="../../images/news/";
        if(empty($errors_ni)==true){
            if(is_dir($desired_dir_ni)==false){
                mkdir("$desired_dir_ni", 0700);		// Create directory if it does not exist
            }
            if(is_dir("$desired_dir_ni/".$file_name_ni)==false){
                move_uploaded_file($file_tmp_ni,"$desired_dir_ni/".$db_file_name_ni);
				$query_ni="INSERT into img (`id`,`img_nm`,`tbl_ref`) VALUES('','$db_file_name_ni','$max_id'); ";
            }else{									// rename the file if another one exist
                $new_dir_ni="$desired_dir_ni/".$file_name_ni.time();
                 rename($file_tmp_ni,$new_dir_ni) ;				
            }
		 mysql_query($query_ni);			
        }
		else{
                print_r($errors_ni);
        }
    }
}
else{
	echo "There is Some problem, uploading \"Related Photos\" Please contact DIT";}
	
//multiple images for news


$sql="INSERT INTO `news`(`id`, `m_hd`, `s_hd`, `dt`, `del_yn`, `news_detail`, `news_short`, `post_by`, `img_sml`, `img_lrg`, `nws_position`,`img_id`) VALUES 
('', '$m_hd', '$s_hd', CURRENT_TIMESTAMP(), '$del_yn', '$news_detail', '$news_short', '$post_by', '$photo1', '$photo', '$nws_position','1')";
if(!mysql_query($sql)){
	die('error submitting data  Please contact DIT Crystolite Pharma'   .  mysql_error());
	}	
		
else {echo'Uploaded Successfully';}

mysql_close();
ob_end_flush();
?>


