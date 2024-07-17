<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_DB $db
 * @property CI_Session $session
 * @property CI_Input $input
 * @property Karyawan_model $Karyawan_model
 * @property CI_Form_validation $form_validation
 */

class Karyawan extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawan_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Data Karyawan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['karyawan'] = $this->Karyawan_model->get_all_karyawan();
        $data['roles'] = $this->Karyawan_model->get_roles();
        $data['agama'] = $this->Karyawan_model->get_agama();
        $data['jenis_kelamin'] = $this->Karyawan_model->get_jenis_kelamin();
        $data['pendidikan'] = $this->Karyawan_model->get_pendidikan();
        $data['kawin'] = $this->Karyawan_model->get_kawin();
        $data['gada'] = $this->Karyawan_model->get_gada();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('karyawan/index', $data);
        $this->load->view('template/footer', $data);
    }

    public function get_all_karyawan()
    {
        $karyawan = $this->Karyawan_model->get_all_karyawan();
        echo json_encode($karyawan);
    }

    public function get_karyawan_by_id($id)
    {
        $this->load->model('Karyawan_model');
        $data = $this->Karyawan_model->get_karyawan_by_id($id);

        if ($data) {
            echo json_encode([
                'status' => 'success',
                'karyawan' => $data
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Data tidak ditemukan.'
            ]);
        }
    }

    public function add_karyawan()
    {
        $this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'required|trim');
        $this->form_validation->set_rules('ttl', 'TTL', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required|trim');
        $this->form_validation->set_rules('tinggi_badan', 'Tinggi Badan', 'required|trim');
        $this->form_validation->set_rules('berat_badan', 'Berat Badan', 'required|trim');
        $this->form_validation->set_rules('no_kk', 'No KK', 'required|trim');
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'required|trim');
        $this->form_validation->set_rules('id_agama', 'Agama', 'required');
        $this->form_validation->set_rules('id_jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('id_pendidikan', 'Pendidikan', 'required');
        $this->form_validation->set_rules('id_kawin', 'Status Kawin', 'required');
        $this->form_validation->set_rules('id_gada', 'Status Gada', 'required');

        if ($this->form_validation->run() == false) {
            $response = [
                'status' => 'error',
                'message' => validation_errors()
            ];
        } else {
            $data = [
                'nama_karyawan' => htmlspecialchars($this->input->post('nama_karyawan', true)),
                'ttl' => htmlspecialchars($this->input->post('ttl', true)),
                'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'nama_ibu' => htmlspecialchars($this->input->post('nama_ibu', true)),
                'tinggi_badan' => htmlspecialchars($this->input->post('tinggi_badan', true)),
                'berat_badan' => htmlspecialchars($this->input->post('berat_badan', true)),
                'no_kk' => htmlspecialchars($this->input->post('no_kk', true)),
                'no_ktp' => htmlspecialchars($this->input->post('no_ktp', true)),
                'id_agama' => $this->input->post('id_agama'),
                'id_jenis_kelamin' => $this->input->post('id_jenis_kelamin'),
                'id_pendidikan' => $this->input->post('id_pendidikan'),
                'id_kawin' => $this->input->post('id_kawin'),
                'id_gada' => $this->input->post('id_gada')
            ];

            if ($this->Karyawan_model->insert_karyawan($data)) {
                $response = [
                    'status' => 'success',
                    'message' => 'Berhasil menambahkan karyawan.'
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Gagal menambahkan karyawan.'
                ];
            }
        }
        echo json_encode($response);
    }

    public function edit_karyawan()
    {
        $id = $this->input->post('id');

        $data['agama'] = $this->Karyawan_model->get_agama();
        $data['jenis_kelamin'] = $this->Karyawan_model->get_jenis_kelamin();
        $data['pendidikan'] = $this->Karyawan_model->get_pendidikan();
        $data['kawin'] = $this->Karyawan_model->get_kawin();
        $data['gada'] = $this->Karyawan_model->get_gada();

        $this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'required|trim');
        $this->form_validation->set_rules('ttl', 'TTL', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required|trim');
        $this->form_validation->set_rules('tinggi_badan', 'Tinggi Badan', 'required|trim');
        $this->form_validation->set_rules('berat_badan', 'Berat Badan', 'required|trim');
        $this->form_validation->set_rules('no_kk', 'No KK', 'required|trim');
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'required|trim');

        if ($this->form_validation->run() == false) {
            echo json_encode([
                'status' => 'error',
                'message' => validation_errors()
            ]);
        } else {
            $data = [
                'nama_karyawan' => htmlspecialchars($this->input->post('nama_karyawan', true)),
                'ttl' => htmlspecialchars($this->input->post('ttl', true)),
                'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'nama_ibu' => htmlspecialchars($this->input->post('nama_ibu', true)),
                'tinggi_badan' => htmlspecialchars($this->input->post('tinggi_badan', true)),
                'berat_badan' => htmlspecialchars($this->input->post('berat_badan', true)),
                'no_kk' => htmlspecialchars($this->input->post('no_kk', true)),
                'no_ktp' => htmlspecialchars($this->input->post('no_ktp', true)),
                'id_agama' => $this->input->post('id_agama'),
                'id_jenis_kelamin' => $this->input->post('id_jenis_kelamin'),
                'id_pendidikan' => $this->input->post('id_pendidikan'),
                'id_kawin' => $this->input->post('id_kawin'),
                'id_gada' => $this->input->post('id_gada')
            ];
        }

        if ($this->Karyawan_model->update_karyawan($id, $data)) {
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

    public function delete_karyawan($id)
    {
        // $result = $this->Karyawan_model->delete_karyawan($id);
        // if ($result) {
        //     $response = array('status' => 'success', 'message' => 'Karyawan berhasil dihapus');
        // } else {
        //     $response = array('status' => 'error', 'message' => 'Gagal menghapus karyawan');
        // }
        $id = $this->input->post('id');

        if ($this->Karyawan_model->delete_karyawan($id)) {
            $response = [
                'status' => 'success',
                'message' => 'Berhasil menghapus data karyawan.'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal menghapus data karyawan.'
            ];
        }

        echo json_encode($response);
    }
}
