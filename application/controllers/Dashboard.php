<?php

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'Admin') {
            redirect('auth/logout');
            die;
        }
        $this->load->model('Global_model');
    }

    function index()
    {
        $data['user'] = count($this->Global_model->get_data(['level !=' => 'Admin'], 'user', true));
        $data['_view'] = 'dashboard';
        $this->load->view('layouts/main', $data);
    }
}