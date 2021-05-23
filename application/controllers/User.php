<?php

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    /*
     * Listing of user
     */
    function index()
    {
        $data['user'] = $this->User_model->get_all_user();
        $data['_view'] = 'user/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new user
     */
    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]|valid_email');
        $this->form_validation->set_rules('level', 'Level', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run()) {
            $params = array(
                'level' => $this->input->post('level'),
                'status' => $this->input->post('status'),
                'password' => md5('123'),
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
            );

            $user_id = $this->User_model->add_user($params);
            redirect('user/index');
        } else {
            $data['_view'] = 'user/add';
            $this->load->view('layouts/main', $data);
        }
    }

    function upFoto($id)
    {
        $config['upload_path']          = './assets/img/avatar/';
        $config['allowed_types']        = 'jpg|png';
        $config['encrypt_name']         = true;
        $config['overwrite']            = true;
        $config['max_size']             = 10000;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!empty($_FILES['foto']['name'])) {

            if ($this->upload->do_upload('foto')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/avatar/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '50%';
                $config['width'] = 400;
                $config['height'] = 400;
                $config['new_image'] = './assets/img/avatar/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar = $gbr['file_name'];
                $params = array(
                    'pict' => $gambar,
                );

                $upFoto = $this->User_model->update_user($id, $params);
                if ($upFoto) {
                    $this->session->set_flashdata('message', "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil...',
                        text: 'Berhasil upload foto..',
                    })
                </script>");
                } else {
                    $this->session->set_flashdata('message', "<script>
                    Swal.fire({
                            icon: 'error',
                            title: 'Gagal...',
                            text: 'Gagal upload foto..',
                        })
                    </script>");
                }
                redirect('user/edit/' . $id);
            }
        } else {
            $this->session->set_flashdata('message', "<script>
            Swal.fire({
                    icon: 'error',
                    title: 'Gagal...',
                    text: 'Foto kosong..',
                })
            </script>");
            redirect('user/edit/' . $id);
        }
    }
    function edit($user_id)
    {
        // check if the user exists before trying to edit it
        $data['user'] = $this->User_model->get_user($user_id);

        if (isset($data['user']['user_id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('level', 'Level', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');

            if ($this->form_validation->run()) {
                if ($this->input->post('email') == $data['user']['email']) {
                    $email = $data['user']['email'];
                } else {
                    $cek = $this->db->get_where('user', array('email' => $this->input->post('email')))->row_array();
                    if ($cek == null) {
                        $email = $this->input->post('email');
                    } else {
                        show_error('email sudah digunakan');
                    }
                }
                if ($this->input->post('password') == null) {
                    $password = $data['user']['password'];
                } else {
                    $password = md5($this->input->post('password'));
                }
                $params = array(
                    'level' => $this->input->post('level'),
                    'status' => $this->input->post('status'),
                    'password' => $password,
                    'nama' => $this->input->post('nama'),
                    'email' => $email,
                );

                $this->User_model->update_user($user_id, $params);
                redirect('user/index');
            } else {
                $data['_view'] = 'user/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The user you are trying to edit does not exist.');
    }

    /*
     * Deleting user
     */
    function remove($user_id)
    {
        $user = $this->User_model->get_user($user_id);

        // check if the user exists before trying to delete it
        if (isset($user['user_id'])) {
            $this->User_model->delete_user($user_id);
            redirect('user/index');
        } else
            show_error('The user you are trying to delete does not exist.');
    }
}
