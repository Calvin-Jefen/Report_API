<?php

use Restserver\libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Report extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Report_model', 'report'); // setelah koma alias
        //per method per jam
        //$this->methods['index_get']['limit'] = 100;
    }

    //GET


    public function kdBarang_get()
    {

        $barang = $this->barang->getKodeBarang();

        if ($barang) {
            $this->response([
                'status' => TRUE,
                'data' => $barang
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'kd_barang not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function stokBarang_get()
    {

        $barang = $this->barang->getStokBarang();

        if ($barang) {
            $this->response([
                'status' => TRUE,
                'data' => $barang
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'stok barang not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    //AKHIR GET

    // public function index_delete()
    // {
    //     $id = $this->delete('kd_barang');

    //     if ($id === null) {
    //         $this->response([
    //             'status' => FALSE,
    //             'message' => 'provide an id'
    //         ], REST_Controller::HTTP_NO_CONTENT);
    //     } else {
    //         if ($this->barang->deleteBarang($id) > 0) {
    //             $this->response([
    //                 'status' => TRUE,
    //                 'id' => $id,
    //                 'message' => 'deleted'
    //             ], REST_Controller::HTTP_BAD_REQUEST);
    //         } else {
    //             $this->response([
    //                 'status' => FALSE,
    //                 'message' => 'id not found!'
    //             ], REST_Controller::HTTP_BAD_REQUEST);
    //         }
    //     }
    // }


    public function index_post()
    {

        //get input
        $data = [
            'user_id' => $this->post('user_id'),
            'report_date' => date('Y-m-d'),
            'report' => $this->post('report'),

        ];

        //check duplicate data
        $is_exist = $this->report->checkreport($data);
        //if not exist
        if ($is_exist == 0) {
            //insert report
            if ($this->report->createReport($data) > 0) {
                $this->response([
                    'status' => TRUE,
                    'message' => 'Report received !'
                ], REST_Controller::HTTP_CREATED);
            } else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'report failed!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'report exist!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function index_get()
    {

        $id = $this->get('user_id');
        $report = $this->report->getReport($id);
        $user = $this->report->getUser($id);

        if ($report) {
            $this->response([
                'status' => TRUE,
                'data' => [
                    'user' => $user,
                    'report' => $report
                ]
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'data not found'
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

    // public function index_put()
    // {
    //     $id = $this->put('kd_barang');
    //     $data = [
    //         'kd_barang' => $this->put('kd_barang'),
    //         'nama_barang' => $this->put('nama_barang'),
    //         'jml_barang' => $this->put('jml_barang'),
    //         'harga_pcs' => $this->put('harga_pcs')
    //     ];

    //     if ($this->barang->updateBarang($data, $id) > 0) {
    //         $this->response([
    //             'status' => TRUE,
    //             'message' => 'data updated!'
    //         ], REST_Controller::HTTP_CREATED);
    //     } else {
    //         $this->response([
    //             'status' => FALSE,
    //             'message' => 'failed to update data!'
    //         ], REST_Controller::HTTP_BAD_REQUEST);
    //     }
    // }
}
