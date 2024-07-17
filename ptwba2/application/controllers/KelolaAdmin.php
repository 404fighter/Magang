<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_DB $db
 * @property CI_Input $input
 * @property CI_Session $session
 * @property KelolaAdmin_model $KelolaAdmin_model
 * @property CI_Form_validation $form_validation
 */

class KelolaAdmin extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('KelolaAdmin_model');
    }

    public function index()
    {
        $data['title'] = 'Kelola Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['admins'] = $this->KelolaAdmin_model->get_all_admins();
        $data['roles'] = $this->KelolaAdmin_model->get_roles();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/navbar');
        $this->load->view('kelolaadmin/index', $data);
        $this->load->view('template/footer');
    }

    public function add_admin()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email ini telah terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password tidak cocok!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $response = [
                'status' => 'error',
                'message' => validation_errors()
            ];
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role'),
                'date_created' => time()
            ];

            if ($this->KelolaAdmin_model->tambah_admin($data)) {
                $response = [
                    'status' => 'success',
                    'message' => 'Admin berhasil ditambahkan.'
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Gagal menambahkan admin.'
                ];
            }
        }
        echo json_encode($response);
    }

    public function edit_admin()
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == false) {
            echo json_encode([
                'status' => 'error',
                'message' => validation_errors()
            ]);
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'role_id' => $this->input->post('role')
            ];
            if (empty($data['role_id'])) {
                $data['role_id'] = 3; // Default value
            }
        }

        if (!empty($this->input->post('password'))) {
            $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        }

        if ($this->KelolaAdmin_model->update_admin($id, $data)) {
            $response = [
                'status' => 'success',
                'message' => 'Admin berhasil diupdate.'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal mengupdate admin.'
            ];
        }

        echo json_encode($response);
    }

    public function delete_admin()
    {
        $id = $this->input->post('id');

        if ($this->KelolaAdmin_model->delete_admin($id)) {
            $response = [
                'status' => 'success',
                'message' => 'Admin berhasil dihapus.'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal menghapus admin.'
            ];
        }

        echo json_encode($response);
    }
}
