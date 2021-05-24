<?php

class Dashboardpendidik extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'Pendidik') {
            redirect('auth/logout');
            die;
        }
        $this->load->model('Global_model');
    }

    function index()
    {
        $data['pendidik'] = $this->Global_model->get_data(['user_id' => $this->session->userdata('user_id')], 'user', false);

        $data['_view'] = 'dashboardpendidik/index';

        $this->load->view('layouts/main', $data);
    }
}
