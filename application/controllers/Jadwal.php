<?php

class Jadwal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') != true) {
            redirect('auth/logout');
            die;
        }
        $this->load->model('Global_model');
    }
    function index()
    {
        $data['hari'] = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu'];
        $data['jadwal'] = $this->Global_model->get_data([], 'jadwal');
        $data['pendidik'] = $this->Global_model->get_data([], 'pendidik');
        $data['_view'] = 'jadwal/index';
        $this->load->view('layouts/main', $data);
    }

    function add($hari)
    {
        $data['kelas'] = $this->Global_model->get_data([], 'kelas', true);
        $data['sub_kelas'] = $this->Global_model->get_data([], 'sub_kelas', true);
        $data['pendidik'] = $this->Global_model->get_data([], 'pendidik');
        $data['_view'] = 'jadwal/add';
        $this->load->view('layouts/main', $data);
    }
}
