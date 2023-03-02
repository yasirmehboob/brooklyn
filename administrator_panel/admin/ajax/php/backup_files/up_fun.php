<?php

$path = '../../orna/';
require_once('../../orna/db.php');

//update function start
function update($table,$fields,$condition){

$sql='update '.stripslashes($table).' set '.stripslashes($fields).' where '.stripslashes($condition);

if(!mysql_query($sql)){
	die("Error Updating Data. <center> Check Manuals or Contact DBA/Administrator for Assistance." . mysql_error());
	}
	else{
                $t_name='fun';
                $message = "New image posted in Fun Feed";
                $data = array(
                                'message' => $message,
                                'launchArgs' => 'fun'
                            );
                
                //Android START
                $apiKeyHR = 'AAAAtoftuWA:APA91bEKK4CNe72MhI8jiexa6YmF9DGPZi5ByQc4iQz9hI_ZanVYXrelcgfVWTwVakXc_Kl3ZJlYnsWJyHM-HPFBgkJLjoJQiDUqaD0IMPjFVaHC10u1UnBdZVhs4hswS6vDYgptdbU6';
                
                $apiKeyEX = 'AAAAyMkNpm8:APA91bHtMKJFwhm_qufCG597ct1s0l5kxc4f3sEIskGXnfBxkqPS6t31puyND1EmIjbA2eEEeC7YWuWfl6hB2izLwLHvZXqUrh8fhMweUYhmf0Zne-5pwXH0Ct9siIQxiqvdBWpgJrU1';
                
                //Configurations Android
                if($t_name == 'fun'){
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
                if($t_name =='fun'){
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
                      'launchArgs' => 'fun'
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
        
        return "updated";
	}
}
//update function ends

echo update($_POST['table'],$_POST['field'],$_POST['condition']);
?>