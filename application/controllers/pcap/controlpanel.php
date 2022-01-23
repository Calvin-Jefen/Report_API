<?php
class Controlpanel extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('controlpanel_model', 'cp_model');
    }

    function index()
    {
        $email = $this->session->userdata('email');
        if ($email) {
            $data['user'] = $this->db->get_where('users', ['user_email' => $email])->row_array();
            $userId = $data['user']['user_id'];
            $frdate = $this->input->post("reportDateFR");
            $todate = $this->input->post("reportDateTO");

            if (!$frdate) {
                $frdate = date('Y-m-d');
            }
            if (!$todate) {
                $todate = date('Y-m-d');
            }

            $data['Report'] = $this->db->query("SELECT report_date, report FROM report WHERE user_id ='$userId' AND report_date BETWEEN '$frdate' AND '$todate' ")->result_array();
            $data['Fwords'] = $this->db->query("SELECT * FROM fwords WHERE user_id ='$userId'")->result_array();

            $userName = $data['user']['user_name'];
            $userEmail = $data['user']['user_email'];
            $report  = $data['Report'];
            $fwords = $data['Fwords'];

            $userId = !$userId ? '<i>NULL</i>' : $userId;
            $userName = !$userName ? '<i>NULL</i>' : $userName;
            $userEmail = !$userEmail ? '<i>NULL</i>' : $userEmail;
            $fwords = !$fwords ? '<i>NULL</i>' : $fwords;

            $datauser = array(
                'USER_ID' =>  $userId,
                'USER_NAME' => $userName,
                'USER_EMAIL' =>  $userEmail,
                'FWORDS' =>  $fwords,
                'REPORT' => $report
            );

            $data['datauser'] = $this->cp_model->getdatauser($datauser);

            $data['title'] = 'PCAP CONTROL PANEL';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('controlPanel', $datauser);
        } else {
            redirect(base_url());
        }
    }
    function insertFwords()
    {
        $email = $this->session->userdata('email');
        if ($email) {
            $data['user'] = $this->db->get_where('users', ['user_email' => $email])->row_array();
            $userId = $data['user']['user_id'];
            $fwords = $this->input->post('inputFwords');
            $exist = $this->db->query("SELECT user_id, fwords FROM fwords WHERE user_id ='$userId' AND fwords = '$fwords' ")->result_array();

            if ($exist) {
                echo "exist";
            } else {

                $data = [
                    'user_id' => $userId,
                    'fwords' => $fwords
                ];
                try {
                    $saveData = $this->db->insert('fwords', $data);
                    if (!$saveData) {
                        echo "failed";
                    } else {
                        echo "success";
                    }
                } catch (Exception $e) {
                    echo "error";
                }
            }
        } else {
            redirect(base_url('pcap/Controlpanel'));
        }
    }

    function deleteFwords($no)
    {
        $deletewords = $this->cp_model->deleteFwords($no);
        if ($deletewords) {
            echo "success";
        } else {
            echo "failed";
        }
        redirect(base_url('pcap/Controlpanel'));
    }
}
