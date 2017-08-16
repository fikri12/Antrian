<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function pdf_create($html, $filename='', $stream=TRUE, $paper = "A4", $attach = false,$orientation = "portrait") 
{
    require_once("dompdf/dompdf_config.inc.php");

    $dompdf = new DOMPDF();
    $dompdf->set_paper($paper, $orientation);
    $dompdf->load_html($html);
    $dompdf->render();
	
    if ($stream) {
        $dompdf->stream($filename.".pdf", array("Attachment" => $attach));
    } else {
        return $dompdf->output();
    }
}
?>