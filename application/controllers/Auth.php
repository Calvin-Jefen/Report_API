<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim'
        );
        if ($this->form_validation->run() == false) {
            $data['title'] = 'PCAP User Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/cplogin');
        } else {
            $this->_login();
        }
    }


    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user   = $this->db->get_where('users', ['user_email' => $email])->row_array();

        if ($user) {

            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['user_name'],
                    'email' => $user['user_email']
                ];
                $this->session->set_userdata($data);
                redirect(base_url('pcap/controlpanel'));
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
            Password incorrect !</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
            Email not registered !</div>');
            redirect('auth');
        }
    }


    public function registration()
    {
        $this->form_validation->set_rules('username', 'Name', 'required|trim');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|callback_email_exist|callback_email_active'
        );
        $this->form_validation->set_rules(
            'password',
            'Password 1',
            'required|trim|min_length[6]|matches[password2]',
            [
                'matches' => 'Password does not match !',
                'min_length' => 'Passowrd too short !'
            ]
        );
        $this->form_validation->set_rules('password2', 'Password 2', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'PCAP User Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/cpregistration');
        } else {
            $uname = htmlspecialchars($this->input->post('username', true));
            $email = htmlspecialchars($this->input->post('email', true));
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            $data = [
                'user_name' => $uname,
                'user_email' => $email,
                'password' => $password,
                'is_active' => "1"
            ];
            $this->db->where('user_email', $email);
            $this->db->update('users', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            Account Registered ! Please login.</div>');
            redirect('auth');
        }
    }

    public function email_exist($key)
    {
        $this->db->where('user_email', $key);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            $this->form_validation->set_message('email_exist', 'Email has not been registered !');
            return false;
        }
    }
    public function email_active($key)
    {
        $this->db->where('user_email', $key)->where('is_active', "0");
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            $this->form_validation->set_message('email_active', 'Email has been activated !');
            return false;
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('rep_time');

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            Logged out succesfully !</div>');
        redirect('auth');
    }
}
