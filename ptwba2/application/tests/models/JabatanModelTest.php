<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JabatanModelTest extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Jabatan_model');
        $this->load->library('unit_test');
        $this->load->library('session');
    }

    public function index() {
        $this->test_get_roles();
        $this->test_get_all_jabatan();
        $this->test_get_count();
        $this->test_insert_jabatan();
        $this->test_update_jabatan();
        $this->test_delete_jabatan();
        
        echo $this->unit->report();
    }

    private function test_get_roles() {
        // Insert test roles into database
        $this->db->insert('user_role', ['id' => 1, 'role' => 'Admin']);
        $this->db->insert('user_role', ['id' => 2, 'role' => 'User']);
        
        // Expected result
        $expected_result = [
            (object) ['id' => 1, 'role' => 'Admin'],
            (object) ['id' => 2, 'role' => 'User']
        ];
        
        // Run the test
        $result = $this->Jabatan_model->get_roles();
        $this->unit->run($result, $expected_result, 'Test get_roles()');
        
        // Clean up the test data
        $this->db->delete('user_role', ['id' => 1]);
        $this->db->delete('user_role', ['id' => 2]);
    }

    private function test_get_all_jabatan() {
        // Insert test jabatan into database
        $this->db->insert('jabatan', ['id' => 1, 'jabatan' => 'Manager']);
        $this->db->insert('jabatan', ['id' => 2, 'jabatan' => 'Staff']);
        
        // Expected result
        $expected_result = [
            ['id' => 1, 'jabatan' => 'Manager'],
            ['id' => 2, 'jabatan' => 'Staff']
        ];
        
        // Run the test
        $result = $this->Jabatan_model->get_all_jabatan();
        $this->unit->run($result, $expected_result, 'Test get_all_jabatan()');
        
        // Clean up the test data
        $this->db->delete('jabatan', ['id' => 1]);
        $this->db->delete('jabatan', ['id' => 2]);
    }

    private function test_get_count() {
        // Insert test jabatan into database
        $this->db->insert('jabatan', ['id' => 1, 'jabatan' => 'Manager']);
        $this->db->insert('jabatan', ['id' => 2, 'jabatan' => 'Staff']);
        
        // Expected result
        $expected_result = 2;
        
        // Run the test
        $result = $this->Jabatan_model->get_count();
        $this->unit->run($result, $expected_result, 'Test get_count()');
        
        // Clean up the test data
        $this->db->delete('jabatan', ['id' => 1]);
        $this->db->delete('jabatan', ['id' => 2]);
    }

    private function test_insert_jabatan() {
        // Set session data
        $this->session->set_userdata('role_id', 1); // Admin role_id is 1
        
        // Test data
        $data = ['id' => 1, 'jabatan' => 'Manager'];
        
        // Run the test
        $result = $this->Jabatan_model->insert_jabatan($data);
        $this->unit->run($result, true, 'Test insert_jabatan() as Admin');
        
        // Verify the data is inserted
        $inserted_data = $this->db->get_where('jabatan', ['id' => 1])->row();
        $this->unit->run($inserted_data != null, true, 'Verify data insertion');
        
        // Clean up the test data
        $this->db->delete('jabatan', ['id' => 1]);
    }

    private function test_update_jabatan() {
        // Insert test jabatan into database
        $this->db->insert('jabatan', ['id' => 1, 'jabatan' => 'Manager']);
        
        // Set session data
        $this->session->set_userdata('role_id', 1); // Admin role_id is 1
        
        // Test data
        $data = ['jabatan' => 'Director'];
        
        // Run the test
        $result = $this->Jabatan_model->update_jabatan(1, $data);
        $this->unit->run($result, true, 'Test update_jabatan() as Admin');
        
        // Verify the data is updated
        $updated_data = $this->db->get_where('jabatan', ['id' => 1])->row();
        $this->unit->run($updated_data->jabatan, 'Director', 'Verify data update');
        
        // Clean up the test data
        $this->db->delete('jabatan', ['id' => 1]);
    }

    private function test_delete_jabatan() {
        // Insert test jabatan into database
        $this->db->insert('jabatan', ['id' => 1, 'jabatan' => 'Manager']);
        
        // Run the test
        $result = $this->Jabatan_model->delete_jabatan(1);
        $this->unit->run($result, true, 'Test delete_jabatan()');
        
        // Verify the data is deleted
        $deleted_data = $this->db->get_where('jabatan', ['id' => 1])->row();
        $this->unit->run($deleted_data == null, true, 'Verify data deletion');
    }
}
