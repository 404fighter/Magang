<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_DB $db
 * @property CI_Session $session
 * @property Lokasi_model $Lokasi_model
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 */

class Lokasi extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lokasi_model');
        $this->load->library('session');
    }

    public function get_roles()
    {
        $this->db->select('id, role');
        $query = $this->db->get('user_role');
        return $query->result();
    }

    public function index()
    {
        $data['title'] = 'Data Lokasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['lokasi'] = $this->Lokasi_model->get_all_lokasi();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('lokasi/index', $data);
        $this->load->view('template/footer', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_lokasi', 'Nama Lokasi', 'required');
        $this->form_validation->set_rules('alamat_lokasi', 'Alamat Lokasi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Gagal menambahkan data lokasi.');
            redirect('lokasi');
        } else {
            $data = [
                'nama_lokasi' => $this->input->post('nama_lokasi'),
                'alamat_lokasi' => $this->input->post('alamat_lokasi')
            ];
            $this->Lokasi_model->add_lokasi($data);
            $this->session->set_flashdata('success', 'Berhasil menambahkan data lokasi.');
            redirect('lokasi');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('nama_lokasi', 'Nama Lokasi', 'required');
        $this->form_validation->set_rules('alamat_lokasi', 'Alamat Lokasi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Gagal mengedit data lokasi.');
            redirect('lokasi');
        } else {
            $id = $this->input->post('id');
            $data = [
                'nama_lokasi' => $this->input->post('nama_lokasi'),
                'alamat_lokasi' => $this->input->post('alamat_lokasi')
            ];
            $this->Lokasi_model->update_lokasi($id, $data);
            $this->session->set_flashdata('success', 'Berhasil mengedit data lokasi.');
            redirect('lokasi');
        }
    }

    public function delete()
    {
        $id = $this->input->post('id'); // Ambil ID dari POST request

        if ($this->Lokasi_model->delete_lokasi($id)) {
            $response = [
                'status' => 'success',
                'message' => 'Data lokasi berhasil dihapus.'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal menghapus data lokasi.'
            ];
        }

        echo json_encode($response); // Mengirimkan respons dalam format JSON
    }
}
