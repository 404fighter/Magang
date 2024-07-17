<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPUnit\Framework\TestCase;

class AuthModelTest extends TestCase {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('unit_test');
    }

    public function index() {
        $this->test_get_user_by_email();
        $this->test_update_password();
        
        echo $this->unit->report();
    }

    private function test_get_user_by_email() {
        // Sample test data
        $email = 'test@example.com';
        
        // Mock the expected result
        $expected_result = (object) [
            'id' => 1,
            'email' => 'test@example.com',
            'password' => 'hashed_password'
        ];
        
        // Assuming you have a way to insert this test data into the database
        // Insert test user into database (make sure to handle this in your setup)
        $this->db->insert('users', [
            'id' => 1,
            'email' => $email,
            'password' => 'hashed_password'
        ]);
        
        // Run the test
        $result = $this->Auth_model->get_user_by_email($email);
        $this->unit->run($result, $expected_result, 'Test get_user_by_email()');
        
        // Clean up the test data
        $this->db->delete('users', ['id' => 1]);
    }

    private function test_update_password() {
        // Sample test data
        $user_id = 1;
        $new_password = 'new_password';
        
        // Insert test user into database
        $this->db->insert('users', [
            'id' => $user_id,
            'email' => 'test2@example.com',
            'password' => 'old_password'
        ]);
        
        // Run the test
        $result = $this->Auth_model->update_password($user_id, $new_password);
        $this->unit->run($result, true, 'Test update_password()');
        
        // Verify the password is updated
        $updated_user = $this->db->get_where('users', ['id' => $user_id])->row();
        $is_password_updated = password_verify($new_password, $updated_user->password);
        $this->unit->run($is_password_updated, true, 'Verify password update');
        
        // Clean up the test data
        $this->db->delete('users', ['id' => $user_id]);
    }
}
