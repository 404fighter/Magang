<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_users()
    {
        // Select query dengan join user_role
        $this->db->select('user.id, user.nama, user.email, user.password, user.role_id, user.date_created, user_role.role');
        $this->db->from('user');
        $this->db->join('user_role', 'user.role_id = user_role.id');
        $query = $this->db->get();
        return $query->result_array();
    }

}
?>
