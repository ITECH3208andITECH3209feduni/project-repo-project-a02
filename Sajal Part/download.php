<?php

$site_url = "http://localhost/cvBuilder";

$currentHTM = file_get_contents($site_url . '/cv.php?cv_id=50');
require "./vendor/autoload.php";
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->setFont('dejavusans', '', 14, '', true);
$pdf->AddPage();

$pdf->writeHTML($currentHTM);
$pdf->Output('test.pdf', 'I');
