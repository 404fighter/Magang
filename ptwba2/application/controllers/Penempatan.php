<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_DB $db
 * @property CI_Session $session
 * @property CI_Input $input
 * @property CI_Model $Penempatan_model
 * @property CI_Form_validation $form_validation
 */

class Penempatan extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penempatan_model');
        // $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('pdf');
    }

    public function index()
    {
        $data['title'] = 'Data Penempatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['penempatan'] = $this->Penempatan_model->get_all_penempatan();
        $data['roles'] = $this->Penempatan_model->get_roles();
        $data['lokasi'] = $this->Penempatan_model->get_lokasi();
        $data['karyawan'] = $this->Penempatan_model->get_karyawan();
        $data['cek_karyawan'] = $this->Penempatan_model->cek_penempatan_aktif();
        $data['jabatan'] = $this->Penempatan_model->get_jabatan();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('penempatan/index', $data);
        $this->load->view('template/footer', $data);
    }


    public function add_penempatan()
    {
        $role_id = $this->session->userdata('role_id');
        if ($role_id == 3) { // Operator role_id is 3
            return false; // Block operator
        }

        log_message('debug', 'add_penempatan called');
        $this->form_validation->set_rules('id_lokasi', 'ID Lokasi', 'required');
        $this->form_validation->set_rules('id_karyawan', 'ID Karyawan', 'required');
        $this->form_validation->set_rules('id_jabatan', 'ID Jabatan', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim');
        $this->form_validation->set_rules('tmt', 'TMT', 'required|trim');
        $this->form_validation->set_rules('status_penempatan', 'Status Penempatan', 'required');
        $this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai', 'required');

        if ($this->form_validation->run() == false) {
            $response = [
                'status' => 'error',
                'message' => validation_errors()
            ];
            log_message('error', 'Form validation errors: ' . validation_errors());
        } else {
            $id_karyawan = $this->input->post('id_karyawan');
            $status_penempatan = $this->input->post('status_penempatan');

            // Cek apakah karyawan sudah memiliki penempatan aktif
            if ($status_penempatan == 1 && $this->Penempatan_model->cek_penempatan_aktif($id_karyawan)) {
                $response = [
                    'status' => 'error',
                    'message' => 'Karyawan sudah memiliki penempatan aktif.'
                ];
                log_message('error', 'Karyawan sudah memiliki penempatan aktif.');
            } else {
                $data = [
                    'id_lokasi' => $this->input->post('id_lokasi'),
                    'id_karyawan' => $id_karyawan,
                    'id_jabatan' => $this->input->post('id_jabatan'),
                    'nik' => htmlspecialchars($this->input->post('nik', true)),
                    'tmt' => htmlspecialchars($this->input->post('tmt', true)),
                    'status_penempatan' => $status_penempatan,
                    'tgl_mulai' => $this->input->post('tgl_mulai', true),
                    'tgl_selesai' => $this->input->post('tgl_selesai', true)
                ];
                log_message('debug', 'Data to be inserted: ' . json_encode($data));

                if ($this->Penempatan_model->tambah_penempatan($data)) {
                    $response = [
                        'status' => 'success',
                        'message' => 'Berhasil menambahkan penempatan.'
                    ];
                    log_message('debug', 'Penempatan successfully added');
                } else {
                    $response = [
                        'status' => 'error',
                        'message' => 'Gagal menambahkan penempatan.'
                    ];
                    log_message('error', 'Failed to add penempatan');
                }
            }
        }
        echo json_encode($response);
        log_message('debug', 'Add penempatan response: ' . json_encode($response));
    }

    // public function edit_penempatan()
    // {
    //     $role_id = $this->session->userdata('role_id');
    //     if ($role_id == 3) { // Operator role_id is 3
    //         return false; // Block operator
    //     }

    //     $id = $this->input->post('id');

    //     $this->form_validation->set_rules('id_lokasi', 'ID Lokasi', 'required');
    //     $this->form_validation->set_rules('id_karyawan', 'ID Karyawan', 'required');
    //     $this->form_validation->set_rules('id_jabatan', 'ID Jabatan', 'required');
    //     $this->form_validation->set_rules('nik', 'NIK', 'required|trim');
    //     $this->form_validation->set_rules('tmt', 'TMT', 'required|trim');
    //     $this->form_validation->set_rules('status_penempatan', 'Status Penempatan', 'required');
    //     $this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai', 'required');
    //     $this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai', 'required');

    //     if ($this->form_validation->run() == false) {
    //         $response = [
    //             'status' => 'error',
    //             'message' => validation_errors()
    //         ];
    //     } else {
    //         $data = [
    //             'id_lokasi' => $this->input->post('id_lokasi'),
    //             'id_karyawan' => $this->input->post('id_karyawan'),
    //             'id_jabatan' => $this->input->post('id_jabatan'),
    //             'nik' => htmlspecialchars($this->input->post('nik', true)),
    //             'tmt' => htmlspecialchars($this->input->post('tmt', true)),
    //             'status_penempatan' => $this->input->post('status_penempatan', true),
    //             'tgl_mulai' => $this->input->post('tgl_mulai', true),
    //             'tgl_selesai' => $this->input->post('tgl_selesai', true)
    //         ];

    //         if ($this->Penempatan_model->update_penempatan($id, $data)) {
    //             $response = [
    //                 'status' => 'success',
    //                 'message' => 'Berhasil mengubah penempatan.'
    //             ];
    //         } else {
    //             $response = [
    //                 'status' => 'error',
    //                 'message' => 'Gagal mengubah penempatan.'
    //             ];
    //         }
    //     }
    //     echo json_encode($response);
    // }

    public function get_penempatan($id)
    {
        $penempatan = $this->Penempatan_model->get_penempatan_by_id($id);
        echo json_encode($penempatan);
    }

    public function edit_penempatan()
    {
        $this->form_validation->set_rules('id_lokasi', 'Nama Lokasi', 'required');
        // tambahkan validasi untuk field lain jika perlu

        if ($this->form_validation->run() == false) {
            $response = [
                'status' => 'error',
                'message' => validation_errors(),
            ];
        } else {
            $id = $this->input->post('id');
            $data = [
                'id_lokasi' => $this->input->post('id_lokasi'),
                'id_karyawan' => $this->input->post('id_karyawan'),
                'id_jabatan' => $this->input->post('id_jabatan'),
                'nik' => $this->input->post('nik'),
                'tmt' => $this->input->post('tmt'),
                'tgl_mulai' => $this->input->post('tgl_mulai'),
                'tgl_selesai' => $this->input->post('tgl_selesai'),
                'status_penempatan' => $this->input->post('status_penempatan'),
            ];

            if ($this->Penempatan_model->update_penempatan($id, $data)) {
                $response = [
                    'status' => 'success',
                    'message' => 'Data berhasil diupdate',
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Terjadi kesalahan saat mengupdate data',
                ];
            }
        }

        echo json_encode($response);
    }

    public function delete_penempatan()
    {
        $id = $this->input->post('id'); // Ambil ID dari POST request

        if ($this->Penempatan_model->delete_penempatan($id)) {
            $response = [
                'status' => 'success',
                'message' => 'Penempatan berhasil dihapus.'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal menghapus penempatan.'
            ];
        }

        echo json_encode($response); // Mengirimkan respons dalam format JSON
    }

    public function export_pdf($id)
    {
        // Ambil data penempatan dari model
        $penempatan = $this->Penempatan_model->get_penempatan_by_id($id);

        if (!$penempatan) {
            echo "Data penempatan tidak ditemukan.";
            return;
        }

        // Load view dan ambil HTML
        $view = 'pdf/penempatan_pdf'; // Sesuaikan dengan path view Anda
        $data = array('penempatan' => $penempatan);
        $filename = 'penempatan_' . $id;

        // Generate PDF dan tampilkan di browser
        $this->pdf->generate($view, $data, $filename);
    }
}
