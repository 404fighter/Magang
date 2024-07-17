<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_DB $db
 * @property CI_Session $session
 * @property Karyawan_model $Karyawan_model
 * @property Jabatan_model $Jabatan_model
 * @property Lokasi_model $Lokasi_model
 * @property Penempatan_model $Penempatan_model
*/

class Operator extends MY_Controller {

    public function __construct() {
        parent::__construct();
        // Load the models
        $this->load->model('Karyawan_model');
        $this->load->model('Jabatan_model');
        $this->load->model('Lokasi_model');
        $this->load->model('Penempatan_model');
    }

    public function index()
    {
        $data['title'] = 'Beranda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['jumlah_karyawan'] = $this->Karyawan_model->get_count();
        $data['jumlah_jabatan'] = $this->Jabatan_model->get_count();
        $data['jumlah_lokasi'] = $this->Lokasi_model->get_count();
        $data['penempatan'] = $this->Penempatan_model->get_all_penempatan();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/navbar');
        $this->load->view('beranda/index', $data);
        $this->load->view('template/footer');
    }

}