<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_DB $db
 * @property CI_Session $session
 * @property Auth_model $Auth_model
*/

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Auth_model');
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run() == false) {
			$data['title'] = 'Login';

			$this->load->view('template/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('template/auth_footer');
		}
		else {
			$this->_login();
		}
	}

	private function check_timeout()
    {
        $inactive_timeout = 300; // Timeout dalam detik (300 detik = 5 menit)

        if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $inactive_timeout)) {
            $this->logout(); // Memanggil fungsi logout jika timeout tercapai
        }

        $_SESSION['last_activity'] = time(); // Meng-update waktu aktivitas terakhir
    }

	private function _login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'role_id' => $user['role_id'],
                    'logged_in' => true,
                    'last_activity' => time() // Set last activity time
                ];
                $this->session->set_userdata($data);

                if ($user['role_id'] == 1) {
                    redirect('superadmin');
                } elseif ($user['role_id'] == 2) {
                    redirect('admin');
                } else {
                    redirect('operator');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="form-floating mb-3"><div class="form-control"><div class="alert alert-danger" role="alert">Wrong password!</div></div></div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="form-floating mb-3"><div class="form-control"><div class="alert alert-danger" role="alert">Email is not registered!</div></div></div>');
            redirect('auth');
        }
    }

	// public function registration()
	// {
	// 	$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
	// 	$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
	// 		'is_unique' => 'Email ini telah terdaftar!'
	// 	]);
	// 	$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
	// 		'matches' => 'Password tidak cocok!',
	// 		'min_length' => 'Password terlalu pendek!'
	// 	]);
	// 	$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


	// 	if($this->form_validation->run() == false) {

	// 		$data['title'] = 'Tambah Admin';
	// 		$data['roles'] = $this->Auth_model->get_roles();

	// 		$this->load->view('template/auth_header', $data);
	// 		$this->load->view('auth/registration', $data);
	// 		$this->load->view('template/auth_footer');
	// 	}
	// 	else {
	// 		$data = [
	// 			'nama' => htmlspecialchars($this->input->post('nama', true)),
	// 			'email' => htmlspecialchars($this->input->post('email', true)),
	// 			'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
	// 			'role_id' => $this->input->post('role'),
	// 			'status_user' => $this->input->post('status_user'),
	// 			'date_created' => time()
	// 		];

	// 		$this->Auth_model->tambah_admin($data);
	// 		$this->session->set_flashdata('success', 'Admin berhasil ditambahkan.');
	// 		redirect('auth');
	// 	}
	// }

	public function change_password() {
		$data['title'] = 'Ubah Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/navbar');
      	$this->load->view('auth/change_password_modal');
        $this->load->view('template/footer');
    }

    public function update_password() {
        $this->form_validation->set_rules('old_password', 'Old Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('change_password_modal');
        } else {
            $email = $this->session->userdata('email');
            $user = $this->Auth_model->get_user_by_email($email);

            if ($user && password_verify($this->input->post('old_password'), $user->password)) {
                if ($this->Auth_model->update_password($user->id, $this->input->post('new_password'))) {
                    $this->session->set_flashdata('message', 'Password successfully updated.');
                } else {
                    $this->session->set_flashdata('message', 'Failed to update password.');
                }
            } else {
                $this->session->set_flashdata('message', 'Old password is incorrect.');
            }

            redirect('auth/change_password');
        }
    }

	public function logout()
	{
		//$this->session->unset_userdata('email');
		//$this->session->unset_userdata('role_id');
		$this->session->sess_destroy();
		$this->session->set_flashdata('message', '<div class="form-floating mb-3"><div class="form-control"><div class="alert alert-success" role="alert">
		You have been logged out!</div></div></div>');
		redirect('auth');
	}

}