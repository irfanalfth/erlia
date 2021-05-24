<?php

class Biodata extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('level')) {
            redirect('auth/logout');
            die;
        }
        $this->load->model('Global_model');
    }

    function index()
    {
        $user_id = $this->session->userdata('user_id');
        $data['user']  = $this->Global_model->get_data(['user_id' => $user_id], 'user', false);
        $data['siswa'] = $this->Global_model->get_data(['user_id' => $user_id], 'siswa', false);
        $data['lok']   = $this->db->join('kelurahan', 'kelurahan.idkelurahan=siswa.kelurahan_id')->join('kecamatan', 'kelurahan.idkecamatan=kecamatan.idkecamatan')->join('kabupatenkota', 'kecamatan.idkabupatenkota=kabupatenkota.idkabupatenkota')->join('provinsi', 'kabupatenkota.idprovinsi=provinsi.idprovinsi')->get_where('siswa', ['user_id' => $user_id])->row_array();
    
        $data['_view'] = 'biodata/bioSiswa';
        $this->load->view('layouts/main', $data);
    }
    
    function editSiswa()
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

            $this->session->set_userdata('nama', $this->input->post('nama'));

            $this->db->set('nama', $this->input->post('nama'));
            $this->db->where('user_id', $user_id);
            $this->db->update('user');
            
            redirect('dashboardsiswa/index');
        } else {
            $user_id = $this->session->userdata('user_id');
            $data['user'] = $this->Global_model->get_data(['user_id' => $user_id], 'user', false);    
            $data['siswa'] = $this->Global_model->get_data(['user_id' => $user_id], 'siswa', false);
        
            $data['_view'] = 'biodata/bioSiswa';
            $this->load->view('layouts/main', $data);
        }
    }

    function bioPendidik()
    {
        $user_id = $this->session->userdata('user_id');
        $data['user']  = $this->Global_model->get_data(['user_id' => $user_id], 'user', false);
        $data['pendidik'] = $this->Global_model->get_data(['user_id' => $user_id], 'pendidik', false);
        $data['lok']   = $this->db->join('kelurahan', 'kelurahan.idkelurahan=pendidik.kelurahan_id')->join('kecamatan', 'kelurahan.idkecamatan=kecamatan.idkecamatan')->join('kabupatenkota', 'kecamatan.idkabupatenkota=kabupatenkota.idkabupatenkota')->join('provinsi', 'kabupatenkota.idprovinsi=provinsi.idprovinsi')->get_where('pendidik', ['user_id' => $user_id])->row_array();
    
        $data['_view'] = 'biodata/bioPendidik';
        $this->load->view('layouts/main', $data);
    }
    
    function editPendidik()
    {
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->Global_model->get_data(['user_id' => $user_id], 'user', false);
        $data['pendidik'] = $this->Global_model->get_data(['user_id' => $user_id], 'pendidik', false);
        
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nuptk', 'NUPTK', 'required|is_unique[pendidik.nuptk.pendidik_id.'.$data['pendidik']['pendidik_id'].']');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tl', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('status_kepegawaian', 'Status Kepegawaian', 'required');
        $this->form_validation->set_rules('jenis_ptk', 'Jenis PTK', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('rt', 'RT', 'required');
        $this->form_validation->set_rules('rw', 'RW', 'required');
        $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required');

        if ($this->form_validation->run()) {
            $params = array(
                'nama' => $this->input->post('nama'),
                'nuptk' => $this->input->post('nuptk'),
                'jk' => $this->input->post('jk'),
                'tempat_lahir' => $this->input->post('tl'),
                'tanggal_lahir' => $this->input->post('tgl'),
                'status_kepegawaian' => $this->input->post('status_kepegawaian'),
                'jenis_ptk' => $this->input->post('jenis_ptk'),
                'agama' => $this->input->post('agama'),
                'alamat' => $this->input->post('alamat'),
                'rt' => $this->input->post('rt'),
                'rw' => $this->input->post('rw'),
                'kode_pos' => $this->input->post('kode_pos'),
                'kelurahan_id' => $this->input->post('idkelurahan'),
                'user_id' => $user_id,
                'is_tu' => 0
            );

            $cek = $this->Global_model->get_data(['nuptk' => $this->input->post('nuptk')], 'pendidik', false);

            if ($cek) {
                $this->db->update('pendidik', $params, `user_id = $user_id`);
            } else {
                $this->db->insert('pendidik', $params);
            }

            $this->session->set_userdata('nama', $this->input->post('nama'));

            $this->db->set('nama', $this->input->post('nama'));
            $this->db->where('user_id', $user_id);
            $this->db->update('user');
            
            redirect('dashboardpendidik/index');
        } else {
            $user_id = $this->session->userdata('user_id');
            $data['user'] = $this->Global_model->get_data(['user_id' => $user_id], 'user', false);    
            $data['siswa'] = $this->Global_model->get_data(['user_id' => $user_id], 'siswa', false);
        
            $data['_view'] = 'biodata/bioPendidik';
            $this->load->view('layouts/main', $data);
        }
    }
}
