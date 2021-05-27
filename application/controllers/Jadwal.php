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
        $data['pendidik'] = $this->Global_model->get_data([], 'pendidik');
        // $data['jadwal'] = $this->Global_model->get_data([], 'jadwal');
        $data['_view'] = 'jadwal/index';

        $this->load->view('layouts/main', $data);
    }

    function upload()
    {
        $upload_image = $_FILES['foto']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name']     = 'Jadwal.png';
            $config['max_size']      = '10000';
            $config['upload_path']   = './assets/jadwal/';

            unlink(FCPATH . './assets/jadwal/Jadwal.png');
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                $this->session->set_flashdata('message', "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal...',
                    text: 'Gagal upload foto..',
                })
                </script>");

                redirect('jadwal');
            } else {
                $this->session->set_flashdata('message', "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil...',
                    text: 'Berhasil upload foto..',
                })
                </script>");
                

                redirect('dashboard');
            }  
        } else {
            $this->session->set_flashdata('message', "<script>
            Swal.fire({
                    icon: 'error',
                    title: 'Gagal...',
                    text: 'Foto kosong..',
                })
            </script>");

            redirect('jadwal');
        }
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
