<?php
function Send_Mail($to,$subject,$body,$attachment)
{
require_once('class.phpmailer.php');
$from       = "noreply@purehealth.ae";
$mail       = new PHPMailer();
$mail->IsSMTP(true);            // use SMTP
$mail->IsHTML(true);
//$mail->SMTPSecure = 'tls';
$mail->SMTPAuth   = true;                  // enable SMTP authentication
//$mail->Host       = "smtp.office365.com"; // SMTP host
//$mail->Port       = 587;                    // set the SMTP port
//$mail->Username   = "no-reply@purehealth.ae";  // SMTP  username
//$mail->Password   = "BH@12345";

$mail->Host       = "mail.purehealth.ae"; // SMTP host
$mail->Port       = 25;                    // set the SMTP port
$mail->Username   = "noreply@purehealth.ae";  // SMTP  username
$mail->Password   = "3i961NdB6vsU";  // SMTP password

$mail->SetFrom($from, 'Pure Health');
$mail->AddReplyTo($from,'No Reply');
$mail->Subject    = $subject;
$mail->MsgHTML($body);

    //making attachemtn if exist
    if($attachment!=''){ 
        $mail->AddAttachment($attachment);
    }
    
$address = $to;
$mail->AddAddress($address, $to);
//$mail->Send(); // Simple send without and message

if(!$mail->send()) {
        echo "Message could not be sent.<br>";
        echo "Mailer Error: " . $mail->ErrorInfo;
    }     
}
?>