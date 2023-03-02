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
                                'title' => $message,
                                'body' => 'Check the FUN section in the app',
                                'sound' => 'default',
                                'launchArgs' => 'fun',
                                'badge' => 1
                            );
                 $data2 =  array(
                                'launchArgs' => 'fun',
                            );            
                
                //Android START
                $apiKeyHR = 'AAAAvJvSSEw:APA91bEb4wDIvMQeXIynY_8PdVFcuJ9w7HZ1kwPQWUhnX9Tw2dAVQDtzxgX8pxHa3OxXuABpigoPyzxuzkIV1NRTkoQoEMxzO8avQsSecIAM8xciGXUl1HsB-pjb3mF_l-27xxQtLxF9';
                
                $apiKeyEX = 'AAAAyMkNpm8:APA91bHtMKJFwhm_qufCG597ct1s0l5kxc4f3sEIskGXnfBxkqPS6t31puyND1EmIjbA2eEEeC7YWuWfl6hB2izLwLHvZXqUrh8fhMweUYhmf0Zne-5pwXH0Ct9siIQxiqvdBWpgJrU1';
                
                //Configurations Android
                if($t_name == 'fun'){
                    $counter=1;
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
                                    'notification'              => $data,
                                    'data'              => $data2,
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
                    $counter=1;
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
                        array_push($registrationIds,$push_notification['app_id_ios']);
                    }
                    // The recipient registration tokens for this notification

                     // Set POST request body
                        $fields = array(
                                        'registration_ids'  => $registrationIds,
                                        'notification'              => $data,
                                        'data'              => $data2,
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
                
                }//End For loop
        
        return "updated";
	}
}
//update function ends

echo update($_POST['table'],$_POST['field'],$_POST['condition']);
?>