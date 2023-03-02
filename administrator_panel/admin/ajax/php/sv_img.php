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
@$_POST['event_time']=strtotime(@$_POST['event_time']);
@$_POST['descp']=htmlentities(@$_POST['descp']);


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
                $invite_values='';
                $org_values='';
            if($t_name=='events'){
                
                if($_POST['event_type']=='private'){
                    
                    $private_event_recipient=' AND ID IN(';
                    //Inserting Participents
                    $inserted_id= mysql_insert_id();
                    $insert_invite="INSERT INTO `event_recipient` (`id`, `event_id`, `user_id`) VALUES ";
                    $data=$_POST['list'];
                    $data = explode('&', $data);
                    foreach($data as $d) {
                        $d = explode('=', $d);
                        $invite_values.="(NULL, '".$inserted_id."', '".$d[1]."'),";
                        $private_event_recipient.=$d[1].',';
                    }
                    
                    $private_event_recipient=substr($private_event_recipient,0,strlen($private_event_recipient)-1).')';
                    $invite_values=substr($invite_values,0,strlen($invite_values)-1);

                    $insert_invite=$insert_invite.$invite_values;
                    if(!mysql_query($insert_invite)){
                        die('Invitaion Error ' . mysql_error());
                        return false;
                    }
                    //Inserting Participents 
                    
                    //SENDING EMAILS TO PARTICIPENTS
                    $sql_user_email="select * from users where del='n'".$private_event_recipient;
                    $email_user_query=mysql_query($sql_user_email);
                    while($emails=mysql_fetch_array($email_user_query)){
                        
                        include ('../../plugin/php_mailer/Send_Mail.php');
                        $attachement = '';
                        //Email to Management
                        //$to='baxeth@gmail.com';
                        //$to='shasasif@gmail.com';
                        $to='yasir_u@yahoo.com';

                        $subject="PureHealth - New Event ".$_POST['title'];
                        $body='<a href=\'http://www.purehealth.ae/\'><img src=\'http://www.purehealth.ae/dashboard/images/logo.png\' alt=\'The PureHealth\' /></a>
                        <p><b>Dear Sir/Madam,</b>,<br><br>
                        <hr>

                        Have a great day!<br>
                        Pure Health Team<br><br><br>';
                        Send_Mail($to,$subject,$body,$attachement);  
                    }
                    //SENDING EMAILS TO PARTICIPENTS
                }
                
                
                if($_POST['list_org']!=''){
                    //Inserting Organizers
                    $insert_org="INSERT INTO `event_organizer` (`id`, `event_id`, `user_id`,`del`) VALUES ";
                    $data=$_POST['list_org'];
                    $data = explode('&', $data);
                    foreach($data as $d) {
                        $d = explode('=', $d);
                        $org_values.="(NULL, '".$inserted_id."', '".$d[1]."', 'n'),";
                    }
                    $org_values=substr($org_values,0,strlen($org_values)-1);

                    $insert_org=$insert_org.$org_values;
                    if(!mysql_query($insert_org)){
                        die('Invitaion Error ' . mysql_error());
                        return false;
                    }
                    //Inserting Organizers
                }
                
                $message = "New upcoming event";
                $data = array(
                                'title' => $message,
                                'body' => 'Check the EVENTS section in the app',
                                'launchArgs' => 'event',
                                'badge' => 1,
                                'sound' => "default"
                            );
                
            }else{
                $private_event_recipient='';
            }//end if t_name is event
            
            
            //Android START
                $apiKeyHR = 'AAAAvJvSSEw:APA91bEb4wDIvMQeXIynY_8PdVFcuJ9w7HZ1kwPQWUhnX9Tw2dAVQDtzxgX8pxHa3OxXuABpigoPyzxuzkIV1NRTkoQoEMxzO8avQsSecIAM8xciGXUl1HsB-pjb3mF_l-27xxQtLxF9';
                
                $apiKeyEX = 'AAAAyMkNpm8:APA91bHtMKJFwhm_qufCG597ct1s0l5kxc4f3sEIskGXnfBxkqPS6t31puyND1EmIjbA2eEEeC7YWuWfl6hB2izLwLHvZXqUrh8fhMweUYhmf0Zne-5pwXH0Ct9siIQxiqvdBWpgJrU1';
            
            //Configurations Android
                if($t_name =='events'){
                    $counter=2;
                    $category[1]=" and category <>'External' ";
                    $category[2]=" and category ='External' ";
                    $apiKey[1]=$apiKeyHR;
                    $apiKey[2]=$apiKeyEX;
                    
                }else if ($t_name =='news_letter'){
                    $counter=1;
                    $apiKey[1] = $apiKeyHR;
                    $category[1]=" and category <>'External' ";
                }else if($t_name =='announcement'){
                    $counter=1;
                    $apiKey[1] = $apiKeyHR;
                    $category[1]=" and category <>'External' ";
                    
                    
                    $message = "New Announcement";
                     $data = array(
                                'title' => $message,
                                'body' => 'Check the Announcement section in the app',
                                'launchArgs' => 'announcement',
                                'badge' => 1,
                                'sound' => "default"
                            );      
                }else{
                    $counter=0;
                    //no notifications
                }
                //Configurations Android
                
                
                for($x=1;$x<=$counter;$x++){
                        // The recipient registration tokens for this notification
                        $registrationIds=array();
                        $sql_push_notification="select app_id from users WHERE app_id <>'' ".$category[$x]." ".$private_event_recipient;
                        $query_push_notification=mysql_query($sql_push_notification);
                        while($push_notification=mysql_fetch_array($query_push_notification)){ 
                            array_push($registrationIds,$push_notification['app_id']);
                        }
                        // The recipient registration tokens for this notification

                        // Set POST request body
                        $fields = array(
                                        'registration_ids'  => $registrationIds,
                                        'notification'              => $data,
                                     );

                        // Set CURL request headers 
                        $headers = array( 
                                            'Authorization: key=' . $apiKey[$x],
                                            'Content-Type: application/json'
                                        );

                        // Initialize curl handle       
                        $ch = curl_init();
                        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
                        curl_setopt( $ch,CURLOPT_POST, true );
                        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
                        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
                        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
                        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
                        $result = curl_exec($ch );
                        echo "android:".$result;
                        curl_close( $ch );
                    }
                    // Debug GCM response       
                    

                    //Android END

                    for($x=1;$x<=$counter;$x++){
                        // The recipient registration tokens for this notification
                        $registrationIds=array();
                        $sql_push_notification="select app_id_ios from users WHERE app_id_ios <>''".$category[$x]." ".$private_event_recipient;
                        $query_push_notification=mysql_query($sql_push_notification);
                        while($push_notification=mysql_fetch_array($query_push_notification)){ 
                            array_push($registrationIds,$push_notification['app_id_ios']);
                        }
                        // The recipient registration tokens for this notification
                        
                         // Set POST request body
                        $fields = array(
                                        'registration_ids'  => $registrationIds,
                                        'notification'              => $data,
                                     );

                        // Set CURL request headers 
                        $headers = array( 
                                            'Authorization: key=' . $apiKey[$x],
                                            'Content-Type: application/json'
                                        );

                        // Initialize curl handle       
                        $ch = curl_init();
                        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
                        curl_setopt( $ch,CURLOPT_POST, true );
                        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
                        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
                        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
                        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
                        $result = curl_exec($ch );
                        echo "android:".$result;
                        curl_close( $ch );

                        
                    
                    }//End For loop
            
            
            
            
         echo "Saved.";
        }
	
}//if image upload was successfull
else{
	echo "There is Some problem, Please contact DIT";}
	
?>