<?php 

$path="../../orna/";
require_once('../../orna/db.php');
$count=$_GET['count'];

$dt=date('m/d/Y');
$file_exist=@$_GET['file'];
$file_count=@$_GET['flimit'];
$log=@$_GET['log'];
@$ai=@$_GET['ai'];
@$_POST['password']=md5(@$_POST['password']);

$ip = $_SERVER["REMOTE_ADDR"];
$_POST['ip']=$_SERVER["REMOTE_ADDR"];

if(!isset($_POST['dt'][0]) && (@$_POST['dt'][0]=='')){
    $_POST['dt']=date('m/d/Y');
    @$_POST['user']=$_SESSION['myusername'];
    @$_POST['del']='N';
    @$_POST['pnt']='N';
}

//echo ini_get('upload_max_filesize'), ", " , ini_get('post_max_size'), ", ", ini_get('memory_limit');

//get max vnumb
function vnumb($db='acc'){
$sql_vnumb="SELECT `AUTO_INCREMENT` FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '".$db."' AND   TABLE_NAME   = 'vnumb'";
$ai_vnumb=mysql_fetch_array(mysql_query($sql_vnumb));
$vnumb= str_pad($ai_vnumb['AUTO_INCREMENT'], 6 , "0", STR_PAD_LEFT);
return $vnumb;}

//@$_POST['vnumb']=vnumb($MySQL_database); //generating new voucher number *



//check if there is any auto increment value 
if($ai=='y'){
$sql_ai="SELECT `AUTO_INCREMENT` FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '".$MySQL_database."' AND   TABLE_NAME   = '".$_GET['t_name1']."'";
$ai=mysql_fetch_array(mysql_query($sql_ai));
$ai=str_pad($ai['AUTO_INCREMENT'], 4 , "0", STR_PAD_LEFT);
@$_POST['ai']=@$_POST['acc_nm_h']."-".@$_POST['acc_nm_s']."-".@$ai;
@$_POST['acc_nm']=@$_POST['ai'];
}//end auto increment if

if($file_exist=="true"){
	for($x=1; $x<=$file_count; $x++){		
		$temp_name=$_FILES['files_'.$x]['tmp_name'];
		$file_name =$_FILES['files_'.$x]['name'];
        $file_explode=explode('.', $file_name);
		$file_ext = end($file_explode);
		$new_dir=$_POST['name']."-".date('m-d-Y');
        $target_dir = $_POST['path'].'/'.$new_dir;
		$file_nm=date('m-d-Y')."-".time().'.'.$file_ext;
			if(is_dir($target_dir)==false){// Create directory if it does not exist
                mkdir($target_dir, 0755);
            }
		//Writes the photo to the server 
		$path=$target_dir.'/'.$file_nm;
			if(move_uploaded_file($temp_name,$path)){ 
				@$_POST['files_'.$x]=$file_nm;
				@$_POST['dir']=$new_dir;
			} 
			else{ //Gives an error
				echo "Problem uploading your file."; 
				}//end else
		} //end loop
 }//end if

if(@$_GET['row']=="single"){
	for($x=1; $x<=$count; $x++){
    
	$t_name=$_GET['t_name'.$x];
	$sv_query = "INSERT INTO ".$t_name." (".substr(field_nm($t_name),0,strlen(field_nm($t_name))-1).") VALUES (".substr(field_val($t_name),0,strlen(field_val($t_name))-1).")";
	if(!mysql_query($sv_query)){
		die('Please Try Again ' . mysql_error());
		}
		else {
			if($log=='y'){
				$id = mysql_insert_id();
				$user=$_SESSION['myusername'];
				$act_query="INSERT INTO act (`id`, `t_ref`, `r_ref`, `act`, `user`, `ip`, `status`, `dt`) VALUES (NULL, '$t_name', '$id', 'rec', '$user', '$ip', 'l', '$dt')";
				mysql_query($act_query);
				}
				//auto increment rownumber
				if(@$_GET['aiu']=='y'){
					auto_increment($_GET['ait']);
					}
			if(@$_GET['no_reply']=='true'){
			}else{
                if($t_name=='announcement'){
                    
                    $message = "New Organizational Announcement";
                    $data = array(
                                    'message' => $message,
                                    'launchArgs' => 'announcement',
                                    'badge' => 1
                                );
                    //Android START
                    $apiKeyHR = 'AAAAvJvSSEw:APA91bEb4wDIvMQeXIynY_8PdVFcuJ9w7HZ1kwPQWUhnX9Tw2dAVQDtzxgX8pxHa3OxXuABpigoPyzxuzkIV1NRTkoQoEMxzO8avQsSecIAM8xciGXUl1HsB-pjb3mF_l-27xxQtLxF9';
                    
                    $apiKeyEX = 'AAAASPgbMKg:APA91bGamMxpR05FjxaamQo9NIgiKukk0FTv4ddXtSOQT0j7m2zR0WIIHifa7cg4hOaOBK5z8JzkqagDoOVaHprnr-qwTHh80TMr8pLSmDGA9EXdbbttxDbpglX2pbtyI_31Nr8RfGpb';
                    
                    //Configurations Android
                    if($t_name =='events'){
                        $counter=2;
                        $category[1]=" and category <> 'External' ";
                        $category[2]=" and category <> 'External' ";
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
                        $category[1]=" and category <>'External' ";
                        $category[2]=" and category ='External' ";
                        $cer[1]='phhr.pem';
                        $cer[2]='phex.pem';

                    }else if ($t_name =='news_letter'){
                        $counter=1;
                        $cer[1] = 'phhr.pem';
                        $category[1]=" and category <>'External' ";
                    }else if($t_name =='announcement'){
                        $counter=1;
                        $cer[1] = 'phhr.pem';
                        $category[1]=" and category <>'External' ";
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
                          'launchArgs' => 'announcement',
                          'badge' => 1
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


                }//end if t_name is event
				echo 'Saved.';}
			}
	}
}//end for loop and if(row=single)

//making multiple rows 
elseif($_GET['row']=="multi"){
	//get max no of rows from form
	$rows=0;
	foreach($_POST['mul'] as $key=>$v){
	$rows=$rows+1;}
	
	$t_name=$_GET['t_name1'];
	
		if(field_val_multi($t_name,$rows)!="error"){
		
				if(field_val_multi($t_name,$rows)!="error_vtype"){
					
					if(field_val_multi($t_name,$rows)!="error_empty"){
				
					$sv_query = "INSERT INTO ".$t_name." (".substr(field_nm($t_name),0,strlen(field_nm($t_name))-1).") VALUES " .field_val_multi($t_name,$rows)."";
					if(!mysql_query($sv_query)){
						die('Please Try Again ' . mysql_error());
					}//end nested else
					else{
						//auto increment rownumber
						if($_GET['aiu']=='y'){
							auto_increment($_GET['ait']);}
						
                            if($t_name=='survey_trans'){
                                $message = "New Survey available";
                                $data = array(
                                                'message' => $message,
                                                'launchArgs' => 'survey',
                                                'badge' => 1
                                            );

                                //Android START
                                $apiKeyHR = 'AAAAtoftuWA:APA91bEKK4CNe72MhI8jiexa6YmF9DGPZi5ByQc4iQz9hI_ZanVYXrelcgfVWTwVakXc_Kl3ZJlYnsWJyHM-HPFBgkJLjoJQiDUqaD0IMPjFVaHC10u1UnBdZVhs4hswS6vDYgptdbU6';

                                $apiKeyEX = 'AAAAyMkNpm8:APA91bHtMKJFwhm_qufCG597ct1s0l5kxc4f3sEIskGXnfBxkqPS6t31puyND1EmIjbA2eEEeC7YWuWfl6hB2izLwLHvZXqUrh8fhMweUYhmf0Zne-5pwXH0Ct9siIQxiqvdBWpgJrU1';

                                //Configurations Android
                                if($t_name='survey_trans'){
                                    $counter=1;
                                    $apiKey[1] = $apiKeyEX;
                                    $category[1]=" and category ='External' ";
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
                                if($t_name='survey_trans'){
                                    $counter=1;
                                    $cer[1] = 'phex.pem';
                                    $category[1]=" and category ='External' ";
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
                                      'ssl://gateway.sandbox.push.apple.com:2195', $err,
                                      $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

                                    if (!$fp)
                                      exit("Failed to connect: $err $errstr" . PHP_EOL);

                                        //echo 'Connected to APNS' . PHP_EOL;

                                    // Create the payload body
                                    $body['aps'] = array(
                                      'alert' => $message,
                                      'sound' => 'default',
                                      'link_url' => "https://purehealth.ae",
                                      'launchArgs' => 'survey',
                                      'badge' => 1
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


                            }//end if t_name is event
                        
                        
                        
                        
                        echo 'Saved.';}//end nested else
					}//voucher is empty
					else { echo "Voucher can not be empty.";}
				}//if vtype is null
				else {echo "Please Select Voucher Type.";}
			
			}//end if debit and credit are not eql
		else{
			echo "Sorry Debit Value is not Equal to Credit Value.";}//end else		
	}

if(@$_GET['auto_acc']=='true'){
echo new_acc($_GET['acc_nm_s'],$_GET['title'],$currency='PAK',$opbal=0,$MySQL_database);
}

if(isset($_GET['av'])){
	if($_GET['av']='y'){
		echo auto_voucher(
		$_POST['vdate'],
		$_POST['vtype'],
		$_POST['debit'],
		$_POST['crdit'],
		$_POST['descp'],
		$_POST['chq_no'],
		$_POST['chq_dt'],
		$_POST['pyee'],
		$MySQL_database);
	}
}

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


//auto increment function
function auto_increment($ai_tname=''){
$ai_sql="insert into ".$ai_tname." values (NULL);";
$ai_query=mysql_query($ai_sql);
	};

//multi value funcaion start
function field_val_multi($t_name='',$key=''){
	$new_row=" ";
	$tot_credit=0;$tot_debit=0;
		//retriving values name from db
		for($r=0;$r<$key;$r++){
			$field_val="desc ".$t_name;
			$field_val_query=mysql_query($field_val);
			$f_val = " ";
			if($r>0){
            $_POST['dt'][$r]=@$_POST['dt'][0];
			@$_POST['brand_id'][$r]=@$_POST['brand_id'][0];
			@$_POST['car_brand_id'][$r]=@$_POST['car_brand_id'][0];
            $_POST['user'][$r]=@$_POST['user'][0];
			$_POST['del'][$r]=@$_POST['del'][0];
            $_POST['category'][$r]=@$_POST['category'][0];
			}
				while($fields_val=mysql_fetch_array($field_val_query)){
				$val=$fields_val['Field'];
				$f_val.="'".@mysql_real_escape_string($_POST[$val][$r])."',";
				}//while end
		$f_val=substr($f_val,0,strlen($f_val)-1);
		$new_row.="(".$f_val."),";
		
		}//for end
		$new_row=substr($new_row,0,strlen($new_row)-1);
		return $new_row;
		
	
};//function end

//create account function start
function new_acc($acc_nm_s,$title,$currency='PAK',$opbal=0,$db='acc'){
$dt=date('m/d/Y');
//get the relative head from db
$sql_head="select acc_nm_h from acc_sub where acc_nm_s ='".$acc_nm_s."'";
$head_query=mysql_query($sql_head);
$acc_nm_h=mysql_fetch_array($head_query);
$acc_nm_h=$acc_nm_h['acc_nm_h'];
//get the lasted acc_nm id from the db
$sql_ai="SELECT `AUTO_INCREMENT` FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '".$db."' AND   TABLE_NAME = 'acc_mast'";
$ai=mysql_fetch_array(mysql_query($sql_ai));
$ai=str_pad($ai['AUTO_INCREMENT'], 4 , "0", STR_PAD_LEFT);
$acc_nm=$acc_nm_h."-".$acc_nm_s."-".@$ai;
//insert record in db
$sql_insert="INSERT INTO `acc_mast` (`id`, `acc_nm_h`, `acc_nm_s`, `acc_nm`, `sort`, `title`, `cont_per`, `comp_nm`, `currency`, `folio`, `tel`, `cell`, `email`, `ntn`, `gst`, `dt`, `user`, `opbal`, `clbal`, `b_sheet`) VALUES (NULL, '$acc_nm_h', '$acc_nm_s', '$acc_nm', '0', '$title', 'N/A', 'N/A', 'PAK', '0', '', '', '', '', '', '$dt', 'System', '0', '0', '');";
//return success on insertion
if(!mysql_query($sql_insert)){
	die("Error");}
	else{
		return json_encode(
				array('action' => 'success', 'acc_nm' => $acc_nm, 'title'=>$title)
				);
		}
}
//create account function ends


//insert auto voucher function start
function auto_voucher($vdate,$vtype,$debit,$crdit,$descp,$chq_no='N/A',$chq_dt='N/A',$pyee='N/A',$db='acc'){

//get max vnumb
$sql_vnumb="SELECT `AUTO_INCREMENT` FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '".$db."' AND   TABLE_NAME   = 'vnumb'";
$ai_vnumb=mysql_fetch_array(mysql_query($sql_vnumb));
$vnumb= str_pad($ai_vnumb['AUTO_INCREMENT'], 6 , "0", STR_PAD_LEFT);

$sys_dt=date('m/d/Y');
	//function to explod the string
	function multiexplode ($delimiters,$string) {
	$ready = str_replace($delimiters, $delimiters[0], $string);
	$launch = explode($delimiters[0], $ready);
	return  $launch;
	}//function to explod the string
	
//spliting values start
$sql_insert="INSERT INTO `acc_trans` (`id`, `vnumb`, `vtype`, `vdate`, `sys_dt`, `acc_nm`, `debit`, `crdit`, `descp`, `user`, `chq_no`, `chq_dt`, `pyee`, `del`, `pnt`, `lst_upd`) VALUES ";
$tot_debit=0;
$tot_crdit=0;
for($z=0;$z<=1;$z++){
	if($z==0){
	$input=$debit;
	$prefix="debit";}
		else{
		$input=$crdit;
		$prefix="credit";}
	$exploded = multiexplode(array("|"),$input);
	$length=sizeof($exploded);
		for($v=0;$v<$length;$v++){
				$each=multiexplode(array(":"),$exploded[$v]);
					for($y=0;$y<=1;$y++){
						if($y==0){
						$sufix="_acc_nm";}
							else{
							$sufix="_amt";}
						${"$prefix$sufix$v"} = $each[$y];
					}
			if($prefix=="debit"){
			$acc_nm=${$prefix."_acc_nm".$v};
			$debit_amt=${$prefix."_amt".$v};
			$crdit_amt=0;
			$tot_debit+=$debit_amt;
			}
				else{
				$acc_nm=${$prefix."_acc_nm".$v};
				$debit_amt=0;
				$crdit_amt=${$prefix."_amt".$v};
				$tot_crdit+=$crdit_amt;
				}
			@$sql_insert.="(NULL, '$vnumb', '$vtype', '$vdate', '$sys_dt', '$acc_nm', '$debit_amt', '$crdit_amt', '$descp', 'System', '$chq_no', '$chq_dt', '$pyee', 'n', 'n', CURRENT_TIMESTAMP),";
		}
}
//spliting values ends
$sql_insert=substr($sql_insert,0,strlen($sql_insert)-1);
if($tot_debit==$tot_crdit){
	if(!mysql_query($sql_insert)){
		die("Unable able to insert auto Voucher ").mysql_error();}
		else{
			auto_increment("vnumb");
			return json_encode(
				array('vnumb' => $vnumb, 'status'=> 'Saved.')
				);
			}
}else{
	return json_encode(
				array('status'=> 'not_equal')
				);
}
}
//insert auto voucher function ends

mysql_close();	
?>