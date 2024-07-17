<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_DB $db
 * @property CI_Session $session
 * @property Penempatan_model $Penempatan_model
*/

class EksporData extends MY_Controller {

    public function __construct() {
        parent::__construct();
        // Load model yang diperlukan
        $this->load->model('Penempatan_model');
        $this->load->model('Karyawan_model', 'karyawan');
    }

    public function index()
    {
        $data['title'] = 'Ekspor Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['lokasi'] = $this->Penempatan_model->get_lokasi();
        $data['data_penempatan'] = $this->Penempatan_model->getPenempatanKaryawan();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/navbar');
        $this->load->view('ekspordata/index', $data);
        $this->load->view('template/footer');
    }

}