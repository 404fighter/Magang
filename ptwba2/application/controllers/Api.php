<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\REST_Controller;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Api extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function users_get()
    {
        $users = $this->User_model->get_users();

        if ($users) {
            $this->response($users, REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'No users were found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

}
?>
