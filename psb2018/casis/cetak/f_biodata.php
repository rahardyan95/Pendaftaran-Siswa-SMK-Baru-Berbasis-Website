<?php
ob_start();
include (dirname(__FILE__).'/cetak_biodata.php');
$content = ob_get_clean();

	// conversion HTML => PDF
 	require_once (dirname(__FILE__).'/../html2pdf/html2pdf.class.php');
 	try
 	{
 		$html2pdf = new HTML2PDF('P', 'A4', 'en');
 		$html2pdf->writeHTML($content);
 		$html2pdf->Output('biodata.pdf');
 	}
 	catch(HTML2PDF_exception $e) { echo $e; }
?>