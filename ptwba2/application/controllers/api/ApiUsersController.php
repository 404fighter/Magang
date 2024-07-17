<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Load REST_Controller
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

use chriskacerguis\RestServer\RestController;

/**
 * @property KelolaAdmin_model $KelolaAdmin_model
*/
class ApiUsersController extends RestController {

    public function __construct() {
        parent::__construct();
        $this->load->model('KelolaAdmin_model');
    }

    public function indexuser_get() {
        $admins = $this->KelolaAdmin_model->get_all_admins();
        $this->response($admins, RestController::HTTP_OK);
    }

    public function storeuser_post() {
        $data = [
            'nama' => $this->post('nama'),
            'email' => $this->post('email'),
            'password' => password_hash($this->post('password'), PASSWORD_DEFAULT),
            'role_id' => $this->post('role_id')
        ];
        if ($this->KelolaAdmin_model->tambah_admin($data)) {
            $this->response(['status' => 'success', 'message' => 'Admin berhasil ditambahkan.'], RestController::HTTP_CREATED);
        } else {
            $this->response(['status' => 'error', 'message' => 'Gagal menambahkan admin.'], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function edituser_get($id) {
        $admin = $this->KelolaAdmin_model->get_admin_by_id($id);
        if ($admin) {
            $this->response($admin, RestController::HTTP_OK);
        } else {
            $this->response(['status' => 'error', 'message' => 'Admin tidak ditemukan.'], RestController::HTTP_NOT_FOUND);
        }
    }

    public function updateuser_put($id) {
        $data = [
            'nama' => $this->put('nama'),
            'email' => $this->put('email'),
            'role_id' => $this->put('role_id')
        ];
        if ($this->KelolaAdmin_model->update_admin($id, $data)) {
            $this->response(['status' => 'success', 'message' => 'Admin berhasil diupdate.'], RestController::HTTP_OK);
        } else {
            $this->response(['status' => 'error', 'message' => 'Gagal mengupdate admin.'], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function deleteuser_delete($id) {
        if ($this->KelolaAdmin_model->delete_admin($id)) {
            $this->response(['status' => 'success', 'message' => 'Admin berhasil dihapus.'], RestController::HTTP_NO_CONTENT);
        } else {
            $this->response(['status' => 'error', 'message' => 'Gagal menghapus admin.'], RestController::HTTP_BAD_REQUEST);
        }
    }
}
