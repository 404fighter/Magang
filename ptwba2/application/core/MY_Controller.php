<?php
class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');

        // Periksa apakah pengguna masih login
        if ($this->session->userdata('logged_in')) {
            $this->check_activity();
        } else {
            redirect('auth');
        }
    }

    public function check_activity() {
        // Ambil waktu terakhir aktivitas
        $last_activity = $this->session->userdata('last_activity');

        if ($last_activity) {
            // Hitung selisih waktu
            $inactive_time = time() - $last_activity;
            if ($inactive_time > $this->config->item('sess_expiration')) {
                // Jika waktu tidak aktif lebih dari batas, logout
                $this->session->sess_destroy();
                redirect('auth');
            } else {
                // Perbarui waktu aktivitas
                $this->session->set_userdata('last_activity', time());
            }
        }
    }
}
