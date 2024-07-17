<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf
{
    protected $CI;
    protected $dompdf;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->dompdf = new Dompdf();
    }

    public function generate($view, $data = array(), $filename = 'exported_pdf', $stream = TRUE)
    {
        $html = $this->CI->load->view($view, $data, TRUE);
        $this->dompdf->loadHtml($html);

        // (Opsional) Konfigurasi PDF seperti ukuran kertas dan orientasi
        $this->dompdf->setPaper('A4', 'portrait');

        // Render PDF (Opsional: save to file atau stream ke browser)
        $this->dompdf->render();

        // Tampilkan PDF dalam browser
        if ($stream) {
            $this->dompdf->stream($filename . '.pdf', array('Attachment' => 0));
        } else {
            return $this->dompdf->output();
        }
    }
}
