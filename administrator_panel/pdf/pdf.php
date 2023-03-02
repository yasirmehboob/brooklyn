<?php
require_once("dompdf/autoload.inc.php");

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

//this will be something like: http://www.yourapp.com/templates/log.php
$fileUrl = "http://localhost/erp/reports/template.php";

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
$pdfroot= 'reports/sample.pdf';

//save the pdf file on the server
$pdf_string =   $dompdf->output();
file_put_contents($pdfroot, $pdf_string );

// Output the generated PDF to Browser
//$dompdf->stream("sample");
?>