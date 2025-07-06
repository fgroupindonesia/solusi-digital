<?php
namespace App\Libraries;
use Dompdf\Dompdf;
use Dompdf\Options;
class PDFGenerator {
    public function generate($html, $filename='', $paper = '', $orientation = '', $stream=TRUE)
    {   
        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        if ($stream) {
            $dompdf->stream($filename.".pdf", array("Attachment" => 1));
            exit();
        } else {
            return $dompdf->output();
        }
    }
}