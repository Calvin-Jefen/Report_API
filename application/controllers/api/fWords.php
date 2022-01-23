<?php

use Restserver\libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class fWords extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('fWords_model', 'fwords'); // setelah koma = alias
        //per method per jam
        //$this->methods['index_get']['limit'] = 100;
    }




    public function index_post()
    {

        //get input
        $data = [
            'user_id' => $this->post('user_id'),
            'fwords' => $this->post('fwords'),

        ];

        //check duplicate data
        $is_exist = $this->fwords->checkfwords($data);
        //if not exist
        if ($is_exist == 0) {
            //insert report
            if ($this->fwords->inserFwords($data) > 0) {
                $this->response([
                    'status' => TRUE,
                    'message' => 'fwords inserted !'
                ], REST_Controller::HTTP_CREATED);
            } else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'insert failed!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'user with this fwords exist!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function index_get()
    {

        $id = $this->get('user_id');
        $fwords = $this->fwords->getfWords($id);
        if ($fwords) {
            $this->response([
                'status' => TRUE,
                'data' => [
                    'user_data' => $fwords,
                    'response' => "fwords found !"
                ]
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'Error' => 'fwords not found !'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
