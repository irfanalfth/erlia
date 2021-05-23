<?php

class Biodata extends CI_Controller
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
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->Global_model->get_data(['user_id' => $user_id], 'user', false);
        $data['siswa'] = $this->Global_model->get_data(['user_id' => $user_id], 'siswa', false);

        // var_dump($data['siswa']);
        // die;
        
        $data['_view'] = 'biodata/edit';
        
        $this->load->view('layouts/main', $data);
    }
    
    function edit()
    {
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->Global_model->get_data(['user_id' => $user_id], 'user', false);
        $data['siswa'] = $this->Global_model->get_data(['user_id' => $user_id], 'siswa', false);
        
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nisn', 'NISN', 'required|is_unique[siswa.nisn.siswa_id.'.$data['siswa']['siswa_id'].']');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tl', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'required');
        $this->form_validation->set_rules('pekerjaan_a', 'Pekerjaan Ayah', 'required');
        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
        $this->form_validation->set_rules('pekerjaan_i', 'Pekerjaan Ibu', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('asal_sekolah', 'Asal Sekolah', 'required');

        if ($this->form_validation->run()) {
            $params = array(
                'nisn' => $this->input->post('nisn'),
                'nama' => $this->input->post('nama'),
                'jk' => $this->input->post('jk'),
                'tempat_lahir' => $this->input->post('tl'),
                'tanggal_lahir' => $this->input->post('tgl'),
                'agama' => $this->input->post('agama'),
                'nama_ayah' => $this->input->post('nama_ayah'),
                'pekerjaan_ayah' => $this->input->post('pekerjaan_a'),
                'nama_ibu' => $this->input->post('nama_ibu'),
                'pekerjaan_ibu' => $this->input->post('pekerjaan_i'),
                'alamat' => $this->input->post('alamat'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'kelurahan_id' => $this->input->post('idkelurahan'),
                'sub_kelas_id' => 1,
                'user_id' => $user_id
            );

            $cek = $this->Global_model->get_data(['nisn' => $this->input->post('nisn')], 'siswa', false);

            if ($cek) {
                $this->db->update('siswa', $params, `user_id = $user_id`);
            } else {
                $this->db->insert('siswa', $params);
            }
            
            redirect('dashboardsiswa/index');
        } else {
            $user_id = $this->session->userdata('user_id');
            $data['user'] = $this->Global_model->get_data(['user_id' => $user_id], 'user', false);    
            $data['siswa'] = $this->Global_model->get_data(['user_id' => $user_id], 'siswa', false);
        
            $data['_view'] = 'biodata/edit';
            $this->load->view('layouts/main', $data);
        }
    }
}
