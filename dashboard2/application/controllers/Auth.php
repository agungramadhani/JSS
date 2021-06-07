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
        $this->load->view('_partials/head');
        $this->load->view('login');
        $this->load->view('_partials/js');

        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        if ($this->form_validation->run() == true) {
            $this->_login();
        }
    }
    public function weekRange()
    {
        echo $_GET['date'];
        $dt = strtotime('06/22/2009');
    }
    public function monthRange(){
        echo $_GET['date'];
    }
    private function _login()
    {
        $email = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('operators', ['username' => $email])->row_array();

        if ($user) {
            if ($password == $user['password']) {
                $data = [
                    'username' => $user['username'],
                    'password' => $user['password']

                ];

                $this->session->set_userdata($data);
                $this->db->set($user);
                $this->db->where('username', $user['username']);
                $this->db->update('operators');
                $this->session->set_userdata('masuk', 'telah login');
                redirect('home/login2');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong passsword!</div>');
                // redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
            // redirect('login');
        }
    }
}
