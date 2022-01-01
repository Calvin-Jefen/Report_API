<?php
class controlPanel extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    function index()
    {
        $email = $this->session->userdata('email');
        if ($email) {
            $data['user'] = $this->db->get_where('users', ['user_email' => $email])->row_array();
            $userId = $data['user']['user_id'];
            $date = $this->input->post("reportDate");
            if (!$date) {
                $today = date('Y-m-ds');
            }

            $data['Report'] = $this->db->query("SELECT report_date, report FROM report WHERE user_id ='$userId' AND report_date = '$date' ")->result_array();

            $userName = $data['user']['user_name'];
            $userEmail = $data['user']['user_email'];
            $report  = $data['Report'];

            $userId = !$userId ? '<i>NULL</i>' : $userId;
            $userName = !$userName ? '<i>NULL</i>' : $userName;
            $userEmail = !$userEmail ? '<i>NULL</i>' : $userEmail;

            $datauser = array(
                'USER_ID' =>  $userId,
                'USER_NAME' => $userName,
                'USER_EMAIL' =>  $userEmail,
                'REPORT' => $report
            );
            // var_dump($datauser['REPORT']);
            // die;

            $data['title'] = 'PCAP CONTROL PANEL';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('controlPanel', $datauser);
        } else {
            redirect(base_url());
        }
    }
}
