<?php

use Restserver\libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class User extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model', 'user'); // setelah koma alias
        //per method per jam
        //$this->methods['index_get']['limit'] = 100;
    }

    //GET


    public function index_post()
    {
        //get input
        $data = [
            'user_email' => $this->post('user_email')
        ];
        if ($this->user->createUser($data) > 0) {
            $this->response([
                'status' => TRUE,
                'message' => 'User created !'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Create failed!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function index_get()
    {

        $email = $this->get('user_email');
        $user = $this->user->getUser($email);
        if ($user) {
            $this->response([
                'status' => TRUE,
                'data' => [
                    'user_data' => $user,
                    'response' => "user found !"
                ]
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'Error' => 'user not found !'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function userid_get()
    {

        $email = $this->get('user_email');
        $uid = $this->user->getUserId($email);
        if ($uid) {
            $this->response([
                'status' => TRUE,
                'data' => $uid,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'Error' => 'user not found !'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function fwords_get()
    {
        $id = $this->get('user_id');
        $fwords = $this->report->getFwords($id);
        $user = $this->report->getUser($id);

        if ($fwords) {
            $this->response([
                'status' => TRUE,
                'data' => [
                    'fwords' => $fwords
                ]
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'data not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
