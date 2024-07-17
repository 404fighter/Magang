<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_DB $db
 * @property CI_Session $session
*/

class Auth_model extends CI_Model {

    // public function get_roles() {
    //     $this->db->select('id, role');
    //     $query = $this->db->get('user_role');
    //     return $query->result();
    // }

    // public function tambah_admin($data) {
    //     return $this->db->insert('user', $data);
    // }

    public function get_user_by_email($email) {
        $this->db->where('email', $email);
        return $this->db->get('users')->row();
    }

    public function update_password($user_id, $new_password) {
        $this->db->where('id', $user_id);
        $this->db->update('users', ['password' => password_hash($new_password, PASSWORD_BCRYPT)]);
        return $this->db->affected_rows() > 0;
    }

}
