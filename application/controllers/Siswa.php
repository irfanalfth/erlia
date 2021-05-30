<?php

class Siswa extends CI_Controller
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
        $data['siswa'] = $this->Global_model->get_data([], 'siswa', true);
        
        $data['_view'] = 'siswa/index';
        $this->load->view('layouts/main', $data);
    }
    
    function edit($siswa_id)
    {
        $data['siswa'] = $this->Global_model->get_data(['siswa_id' => $siswa_id], 'siswa', false);
        $data['user'] = $this->Global_model->get_data(['user_id' => $data['siswa']['user_id']], 'user', false);
        $data['lok']   = $this->db->join('kelurahan', 'kelurahan.idkelurahan=siswa.kelurahan_id')->join('kecamatan', 'kelurahan.idkecamatan=kecamatan.idkecamatan')->join('kabupatenkota', 'kecamatan.idkabupatenkota=kabupatenkota.idkabupatenkota')->join('provinsi', 'kabupatenkota.idprovinsi=provinsi.idprovinsi')->get_where('siswa', ['siswa_id' => $siswa_id])->row_array();

        $user_id = $data['siswa']['user_id'];
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nisn', 'NISN', 'required');
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

                $this->db->update('siswa', $params, `siswa_id = $siswa_id`);

                $this->db->set('nama', $this->input->post('nama'));
                $this->db->where('user_id', $user_id);
                $this->db->update('user');

                redirect('siswa/index/');
            } else {
                $data['_view'] = 'siswa/edit';
                $this->load->view('layouts/main', $data);
            }
    }

    function remove($siswa_id)
    {
        $data['siswa'] = $this->Global_model->get_data(['siswa_id' => $siswa_id], 'siswa', false);

        if (isset($data['siswa']['siswa_id'])) {
            $this->db->delete('siswa', ['siswa_id' => $siswa_id]);
            redirect('siswa/index');
        } else
            show_error('The siswa you are trying to delete does not exist.');
    }

    function mapel($siswa_id)
    {
        $data['pendidik'] = $this->Global_model->get_data(['siswa_id' => $siswa_id], 'pendidik', false);
        $data['user'] = $this->Global_model->get_data(['user_id' => $data['pendidik']['user_id']], 'user', false);
        $data['mapel'] = $this->Global_model->get_data([], 'mapel', true);
        $data['kelas'] = $this->Global_model->get_data([], 'kelas', true);
        $data['sub_kelas'] = $this->Global_model->get_data([], 'sub_kelas', true);

      
        $params = [
            'mapel_id' => $this->input->post('mapel'),
            'kelas_id' => $this->input->post('kelas'),
            'siswa_id' => $this->input->post('pendidik'),
            'sub_kelas_id' => $this->input->post('sub_kelas')
        ];

        $data['_view'] = 'pendidik/mapel';
        $this->load->view('layouts/main', $data);
    }

    function addAmpu()
    {
        // buntu set ampu nya
    }
}