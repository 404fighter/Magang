<?php defined('BASEPATH') or exit('No direct script access allowed');

// Konfigurasi Dompdf
$config['dompdf'] = array(
    'chroot' => FCPATH,
    'enable_php' => true,
    'log_output_file' => FCPATH . 'application/logs/dompdf_log.txt',
    // Konfigurasi lainnya sesuai kebutuhan
);
