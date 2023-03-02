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
@$dir=@$_POST['path'];
@$_POST['user']=@$_SESSION['myusername'];
@$_POST['dt']=time();
@$_POST['event_time']=strtotime(@$_POST['event_time']);
@$_POST['descp']=htmlentities(@$_POST['descp']);


if(isset($_FILES['files_1'])){
      $errors= array();
      $file_size = $_FILES['files_1']['size'];
      $file_tmp = $_FILES['files_1']['tmp_name'];
      $file_type = $_FILES['files_1']['type'];
      $file_ext=strtolower(pathinfo($_FILES['files_1']['name'], PATHINFO_EXTENSION));
     
      $img_name_db=$name.'-'.date('d-m-y-H-i-s').'.'.$file_ext;
      $dir = $_POST['path'];
    
      $expensions= array("pdf");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,$dir.$img_name_db);
         $_POST['files_1']=$img_name_db;
         $_POST['dir']=$t_name;
        $upload=true;
      }else{
         print_r($errors);
      }
   }

if($upload==true){

   $sv_query = "INSERT INTO ".$t_name." (".substr(field_nm($t_name),0,strlen(field_nm($t_name))-1).") VALUES (".substr(field_val($t_name),0,strlen(field_val($t_name))-1).")";
	
    if(!mysql_query($sv_query)){
		die('Please Try Again ' . mysql_error());
		}
		else {
                
                $message = "Our latest newsletter is available";
                $data = array(
                                'message' => $message,
                                'launchArgs' => 'newsletter'
                            );
                
                //Android START
                 $apiKeyHR = 'AAAAvJvSSEw:APA91bEb4wDIvMQeXIynY_8PdVFcuJ9w7HZ1kwPQWUhnX9Tw2dAVQDtzxgX8pxHa3OxXuABpigoPyzxuzkIV1NRTkoQoEMxzO8avQsSecIAM8xciGXUl1HsB-pjb3mF_l-27xxQtLxF9';
                    
                $apiKeyEX = 'AAAASPgbMKg:APA91bGamMxpR05FjxaamQo9NIgiKukk0FTv4ddXtSOQT0j7m2zR0WIIHifa7cg4hOaOBK5z8JzkqagDoOVaHprnr-qwTHh80TMr8pLSmDGA9EXdbbttxDbpglX2pbtyI_31Nr8RfGpb';
                
                //Configurations Android
                if($t_name == 'events'){
                    $counter=2;
                    $category[1]=" and category <>'External' ";
                    $category[2]=" and category ='External' ";
                    $apiKey[1]=$apiKeyHR;
                    $apiKey[2]=$apiKeyEX;
                    
                }else if ($t_name =='news_letter'){
                    $counter=1;
                    $apiKey[1] = $apiKeyHR;
                    $category[1]=" and category <> 'External' ";
                }else if($t_name =='announcement'){
                    $counter=1;
                    $apiKey[1] = $apiKeyHR;
                    $category[1]=" and category <> 'External' ";
                }
                //Configurations Android
                
                
                for($x=1;$x<=$counter;$x++){
                    // The recipient registration tokens for this notification
                    $registrationIds=array();
                    $sql_push_notification="select app_id from users WHERE app_id <>'' ".$category[$x];
                    $query_push_notification=mysql_query($sql_push_notification);
                    while($push_notification=mysql_fetch_array($query_push_notification)){ 
                        array_push($registrationIds,$push_notification['app_id']);
                    }
                    // The recipient registration tokens for this notification

                    // Set POST request body
                    $fields = array(
                                    'registration_ids'  => $registrationIds,
                                    'data'              => $data,
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
                    curl_close( $ch );
                }
                // Debug GCM response       
                //echo "android:".$result;
                
                //Android END
                
                
            
                // Put your private key's passphrase here:
                $passphrase = '1234';
                
                //Configurations IOS
                if($t_name =='events'){
                    $counter=2;
                    $category[1]=" and category <> 'External' ";
                    $category[2]=" and category = 'External' ";
                    $cer[1]='phhr.pem';
                    $cer[2]='phex.pem';
                    
                }else if ($t_name == 'news_letter'){
                    $counter=1;
                    $cer[1] = 'phhr.pem';
                    $category[1]=" and category <> 'External' ";
                }else if($t_name == 'announcement'){
                    $counter=1;
                    $cer[1] = 'phhr.pem';
                    $category[1]=" and category <> 'External' ";
                }
                //Configurations IOS
                
                
                for($x=1;$x<=$counter;$x++){
                    // The recipient registration tokens for this notification
                    $registrationIds=array();
                    $sql_push_notification="select app_id_ios from users WHERE app_id_ios <>''".$category[$x];
                    $query_push_notification=mysql_query($sql_push_notification);
                    while($push_notification=mysql_fetch_array($query_push_notification)){ 
                        //array_push($registrationIds,$push_notification['app_id_ios']);
                    
                    // The recipient registration tokens for this notification

                    $deviceToken = $push_notification['app_id_ios'];
                    
                    $ctx = stream_context_create();
                    stream_context_set_option($ctx, 'ssl', 'local_cert', $cer[$x]);
                    stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

                    // Open a connection to the APNS server
                    $fp = stream_socket_client(
                      'ssl://gateway.push.apple.com:2195', $err,
                      $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

                    if (!$fp)
                      exit("Failed to connect: $err $errstr" . PHP_EOL);

                        //echo 'Connected to APNS' . PHP_EOL;

                    // Create the payload body
                    $body['aps'] = array(
                      'alert' => $message,
                      'sound' => 'default',
                      'link_url' => "https://purehealth.ae",
                      'launchArgs' => 'newsletter'
                      );
                      

                    // Encode the payload as JSON
                    $payload = json_encode($body);

                    // Build the binary notification
                    $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

                    // Send it to the server
                    $result = fwrite($fp, $msg, strlen($msg));

                    if (!$result){
                      //echo 'Message not delivered' . PHP_EOL;
                    }else{
                      //echo 'Message successfully delivered' . PHP_EOL;
                        }
                    // Close the connection to the server
                    fclose($fp);
                }
                }//End For loop
                  
         echo "Saved.";
        }
	
}//if image upload was successfull
else{
	echo "There is Some problem, Please contact DIT";}
	
?>