<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_DB $db
 * @property CI_Session $session
 * @property Jabatan_model $Jabatan_model
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 */

class Jabatan extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jabatan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Data Jabatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jabatan'] = $this->Jabatan_model->get_all_jabatan();
        $data['role'] = $this->Jabatan_model->get_roles();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('jabatan/index', $data);
        $this->load->view('template/footer', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
        } else {
            $data = [
                'jabatan' => $this->input->post('jabatan')
            ];
            if ($this->Jabatan_model->insert_jabatan($data)) {
                $this->session->set_flashdata('success', 'Jabatan berhasil ditambahkan.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan jabatan.');
            }
        }

        redirect('jabatan');
    }

    public function edit()
    {
        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
        } else {
            $id = $this->input->post('id');
            $data = [
                'jabatan' => $this->input->post('jabatan')
            ];
            if ($this->Jabatan_model->update_jabatan($id, $data)) {
                $this->session->set_flashdata('success', 'Jabatan berhasil diubah.');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengubah jabatan.');
            }
        }

        redirect('jabatan');
    }

    public function delete()
    {
        $id = $this->input->post('id'); // Ambil ID dari POST request

        if ($this->Jabatan_model->delete_jabatan($id)) {
            $response = [
                'status' => 'success',
                'message' => 'Jabatan berhasil dihapus.'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal menghapus jabatan.'
            ];
        }

        echo json_encode($response); // Mengirimkan respons dalam format JSON
    }
}
