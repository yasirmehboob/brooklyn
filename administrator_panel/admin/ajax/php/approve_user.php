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
        if($_POST['status']=='approved'){
            $sql_log ="INSERT INTO `users_log` (`id`, `user_id`, `action`, `action_user`, `ip`, `computer_name`, `dt`) VALUES (NULL, '".$_POST['id']."', 'Approved', '".$_SESSION['myusername']."', '".ip()."', '".gethostname()."', ".time()."')";
            mysql_query($sql_log);
            include '../../plugin/php_mailer/Send_Mail.php';
            $sql_user = "select * from users where id = '".$_POST['id']."'";
            $user=mysql_fetch_array(mysql_query($sql_user));
            // sending email
            $attachement='';
            $to=$user['email'];
            $subject="Metafitnosis - Signup Request Approved";
            $body='<a href=\'http://www.metafitnosis.com/\'><img src=\'http://www.metafitnosis.com/dashboard/images/logo.png\' alt=\'The Metafitnosis\' /></a>
            <p><b>Dear '.$user['f_name'].' '.$user['l_name'].'</b>,<br><br>
            Your registration has been approved for Metafitnosis Mobile App.<br>
            Your Email is: '.$user['email'].'<br><br>
            For security reasons, your password is not included in this email. If you forget your password, you may reset it by navigating to the "Forgot my password" link on the App login page.<br>
            Let us know if there is anything else we can do to help get you started. For any queries, please do not hesitate to contact us at app-support@metafitnosis.com</p>
            <hr>
            Have a great day!<br>
            Metafitnosis Family<br><br><br>';
            Send_Mail($to,$subject,$body,$attachement);    
            return "Successfully Approved";
        }
        if($_POST['status']=='suspended'){
            $sql_log ="INSERT INTO `users_log` (`id`, `user_id`, `action`, `action_user`, `ip`, `computer_name`, `dt`) VALUES (NULL, '".$_POST['id']."', 'Suspended', '".$_SESSION['myusername']."', '".ip()."', '".gethostname()."', '".time()."')";
            mysql_query($sql_log);
            return "User Suspended!";   
        }
        
        if($_POST['status']=='unsuspend'){
            $sql_log ="INSERT INTO `users_log` (`id`, `user_id`, `action`, `action_user`, `ip`, `computer_name`, `dt`) VALUES (NULL, '".$_POST['id']."', 'unsuspend', '".$_SESSION['myusername']."', '".ip()."', '".gethostname()."', '".time()."')";
            mysql_query($sql_log);
            return "User Unsuspended!";   
        }
        
	}
}
//update function ends


echo update($_POST['table'],$_POST['field'],$_POST['condition']);
?>