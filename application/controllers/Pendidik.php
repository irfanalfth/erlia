<?php

class Pendidik extends CI_Controller
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
        $data['pendidik'] = $this->Global_model->get_data([], 'pendidik', true);
        
        $data['_view'] = 'pendidik/index';
        $this->load->view('layouts/main', $data);
    }
    
    function edit($pendidik_id)
    {
        $data['pendidik'] = $this->Global_model->get_data(['pendidik_id' => $pendidik_id], 'pendidik', false);
        $data['user'] = $this->Global_model->get_data(['user_id' => $data['pendidik']['user_id']], 'user', false);
        $data['lok']   = $this->db->join('kelurahan', 'kelurahan.idkelurahan=pendidik.kelurahan_id')->join('kecamatan', 'kelurahan.idkecamatan=kecamatan.idkecamatan')->join('kabupatenkota', 'kecamatan.idkabupatenkota=kabupatenkota.idkabupatenkota')->join('provinsi', 'kabupatenkota.idprovinsi=provinsi.idprovinsi')->get_where('pendidik', ['pendidik_id' => $pendidik_id])->row_array();

        $user_id = $data['pendidik']['user_id'];
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nuptk', 'NUPTK', 'required');
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

                $this->db->update('pendidik', $params, `pendidik_id = $pendidik_id`);

                $this->db->set('nama', $this->input->post('nama'));
                $this->db->where('user_id', $user_id);
                $this->db->update('user');

                redirect('pendidik/index/');
            } else {
                $data['_view'] = 'pendidik/edit';
                $this->load->view('layouts/main', $data);
            }
    }

    function remove($pendidik_id)
    {
        $data['pendidik'] = $this->Global_model->get_data(['pendidik_id' => $pendidik_id], 'pendidik', false);

        if (isset($data['pendidik']['pendidik_id'])) {
            $this->db->delete('pendidik', ['pendidik_id' => $pendidik_id]);
            redirect('pendidik/index');
        } else
            show_error('The pendidik you are trying to delete does not exist.');
    }

    function mapel($pendidik_id)
    {
        $data['pendidik'] = $this->Global_model->get_data(['pendidik_id' => $pendidik_id], 'pendidik', false);
        $data['user'] = $this->Global_model->get_data(['user_id' => $data['pendidik']['user_id']], 'user', false);
        $data['mapel'] = $this->Global_model->get_data([], 'mapel', true);
        $data['kelas'] = $this->Global_model->get_data([], 'kelas', true);
        $data['sub_kelas'] = $this->Global_model->get_data([], 'sub_kelas', true);

      
        $params = [
            'mapel_id' => $this->input->post('mapel'),
            'kelas_id' => $this->input->post('kelas'),
            'pendidik_id' => $this->input->post('pendidik'),
            'sub_kelas_id' => $this->input->post('sub_kelas')
        ];

        $data['_view'] = 'pendidik/mapel';
        $this->load->view('layouts/main', $data);
    }

    function addAmpu()
    {
        // buntu set ampu
    }
}