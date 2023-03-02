<?php
function Send_Mail($to,$subject,$body)
{
require_once('class.phpmailer.php');
$from       = "info@ornamentsolutions.com";
$mail       = new PHPMailer();
$mail->IsSMTP(true);            // use SMTP
$mail->IsHTML(true);
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "mail.ornamentsolutions.com"; // SMTP host
$mail->Port       =26;                    // set the SMTP port
$mail->Username   = "info@ornamentsolutions.com";  // SMTP  username
$mail->Password   = "66379Canadaa";  // SMTP password
$mail->SetFrom($from, 'BigBook');
$mail->AddReplyTo($from,'No Reply');
$mail->Subject    = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);
$mail->Send(); 
}
?>