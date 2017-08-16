<?php

require_once("../dompdf_config.inc.php");

// We check wether the user is accessing the demo locally
$local = array("::1", "127.0.0.1");
$is_local = in_array($_SERVER['REMOTE_ADDR'], $local);

if ( $is_local ) {

  if ( get_magic_quotes_gpc() )
    
  
  $dompdf = new DOMPDF();
  $dompdf->load_html("abasjdaksjdhajskhdsa");
  $dompdf->set_paper("letter", "potrait");
  $dompdf->render();

  $dompdf->stream("dompdf_out.pdf", array("Attachment" => false));

  exit(0);
}