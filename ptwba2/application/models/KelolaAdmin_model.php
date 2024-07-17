<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_DB $db
 * @property CI_Session $session
*/

class KelolaAdmin_model extends CI_Model {

    public function get_roles() {
        $this->db->select('id, role');
        $query = $this->db->get('user_role');
        return $query->result();
    }

    public function get_all_admins() {
        $this->db->select('user.id, nama, email, user_role.role');
        $this->db->from('user');
        $this->db->join('user_role', 'user.role_id = user_role.id');
        return $this->db->get()->result_array();
    }

    public function tambah_admin($data) {
        return $this->db->insert('user', $data);
    }

    public function update_admin($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('user', $data);
    }

    public function delete_admin($id) {
        $this->db->where('id', $id);
        return $this->db->delete('user');
    }

}