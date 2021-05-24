<?php

class Dashboardsiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'Siswa') {
            redirect('auth/logout');
            die;
        }
        $this->load->model('Global_model');
    }

    function index()
    {
        $data['siswa'] = $this->Global_model->get_data(['user_id' => $this->session->userdata('user_id')], 'user', false);

        $data['_view'] = 'dashboardsiswa/index';

        $this->load->view('layouts/main', $data);
    }
}
