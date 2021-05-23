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
        $data['mahasiswa'] = count($this->Global_model->get_data([], 'mahasiswa', true));
        $data['dosen'] = count($this->Global_model->get_data([],'dosen', true));
        $data['_view'] = 'dashboardakademik';
        $this->load->view('layouts/main', $data);
    }
}
