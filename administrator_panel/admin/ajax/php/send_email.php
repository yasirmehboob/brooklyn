<?php
$path = '../../orna/';
require_once('../../orna/db.php');

require_once("../../../pdf/dompdf/autoload.inc.php");

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

//Getting Host  
$host = "http://".$_SERVER['HTTP_HOST'];

//this will be something like: http://www.yourapp.com/templates/log.php
$fileUrl = $host.'/erp/reports/'.urldecode($_POST['url_parameters']).'&type='.$_POST['type'];

//get file content after the script is server-side interpreted
$fileContent = file_get_contents( $fileUrl ) ;

//load stored html string
$dompdf->load_html($fileContent);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

//seting the page resolution
$dompdf->set_option("DOMPDF_DPI", 300);

// Render the HTML as PDF
$dompdf->render();

//making output directory path with file name
$pdfroot= '../../../pdf/reports/'.$_POST['file_name'].'.pdf';

//save the pdf file on the server
$pdf_string =   $dompdf->output();
file_put_contents($pdfroot, $pdf_string );

//-----------------------------------------------------------------------


include '../../plugin/php_mailer/Send_Mail.php';

$dt=date('d-M-Y');
$attachement = $pdfroot;
$count=mysql_query("SELECT * FROM  supplier WHERE id='".$_POST['supplier_id']."'");
while($result=mysql_fetch_array($count)){
    // sending email
	$to=$result['email'];
	$subject="Itarat Al Jawdah - Inquiry";
	$body='<a href=\'http://www.itarataljawdah.com/\'><img src=\'http://www.bragntag.com/erp/images/logo 2.jpeg\' alt=\'Itarat Al Jawdah\' /></a>
<p><b>Dear '.$result['cont_person'].'('.$result['name'].')</b>,<br><br>

Please find the file attached.<br>

Let me know if we can set something up and if there is anything else I can do to help get you started.</p>
<hr>

Have a great day!<br>
Husnain Raheel<br>
Itarat Al Jawdah';
    
    Send_Mail($to,$subject,$body,$attachement);
    
	$sql="update inquiry_mast set email = '".$_POST['type']."', status = 'Email Sent' where id = '".$_POST['inquiry_mast']."'";
    mysql_query($sql);
    echo "Email Sent";
};   
?>