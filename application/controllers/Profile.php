<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') != true) {
            redirect('auth/logout');
            die;
        }
        $this->load->model('Data_user_model');
    }

    function index()
    {
        $data['user'] = $this->Data_user_model->get_data_user($this->session->userdata('user_id'));
        $data['_view'] = 'profile';
        $this->load->view('layouts/main', $data);
    }

    function upFoto()
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

                $upFoto = $this->Data_user_model->update_data_user($this->session->userdata('user_id'), $params);
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
                redirect('profile/index');
            }
        } else {
            $this->session->set_flashdata('message', "<script>
            Swal.fire({
                    icon: 'error',
                    title: 'Gagal...',
                    text: 'Foto kosong..',
                })
            </script>");
            redirect('profile/index');
        }
    }

    function edit()
    {
        $data['data_user'] = $this->Data_user_model->get_data_user($this->session->userdata('user_id'));
        if (isset($data['data_user']['user_id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('nama', 'Nama', 'required');

            if ($this->form_validation->run()) {
                if ($data['data_user']['email'] == $this->input->post('email')) {
                    $email = $data['data_user']['email'];
                } else {
                    $cek = $this->Data_user_model->cekEmail($this->input->post('email'));
                    if ($cek['email'] == null) {
                        $email = $this->input->post('email');
                    } else {
                        $this->session->set_flashdata('message', "<script>
                        Swal.fire({
                                icon: 'error',
                                title: 'Gagal...',
                                text: 'Email sudah digunakan user lain..',
                            })
                        </script>");
                        redirect('profile/index');
                        die;
                    }
                }
                $params = array(
                    'nama' => $this->input->post('nama'),
                    'email' => $email,
                );

                $edit = $this->Data_user_model->update_data_user($this->session->userdata('user_id'), $params);
                if ($edit) {
                    $this->session->set_flashdata('message', "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil...',
                        text: 'Berhasil ubah data..',
                    })
                </script>");
                } else {
                    $this->session->set_flashdata('message', "<script>
                    Swal.fire({
                            icon: 'error',
                            title: 'Gagal...',
                            text: 'Gagal ubah data..',
                        })
                    </script>");
                }
                redirect('profile/index');
            } else {
                redirect('profile/index');
            }
        } else
            show_error('The profile you are trying to edit does not exist.');
    }

    function ubahpass()
    {
        $data['data_user'] = $this->Data_user_model->get_data_user($this->session->userdata('user_id'));

        if (isset($data['data_user']['user_id'])) {
            if ($this->input->post('password') == '' || $this->input->post('password') == null || empty($this->input->post('password'))) {
                $this->session->set_flashdata('message', "<script>
                    Swal.fire({
                            icon: 'error',
                            title: 'Gagal...',
                            text: 'Password harus diisi',
                        })
                    </script>");
                redirect('profile/index');
                die;
            }

            if (strlen($this->input->post('password')) < 8) {
                $this->session->set_flashdata('message', "<script>
                    Swal.fire({
                            icon: 'error',
                            title: 'Gagal...',
                            text: 'Password min.8 karakter',
                        })
                    </script>");
                redirect('profile/index');
                die;
            }
            $params = array(
                'password' => md5($this->input->post('password')),
            );

            $edit = $this->Data_user_model->update_data_user($this->session->userdata('user_id'), $params);
            if ($edit) {
                $this->session->set_flashdata('message', "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil...',
                        text: 'Berhasil ubah password..',
                    })
                </script>");
            } else {
                $this->session->set_flashdata('message', "<script>
                    Swal.fire({
                            icon: 'error',
                            title: 'Gagal...',
                            text: 'Gagal ubah password..',
                        })
                    </script>");
            }
            redirect('profile/index');
        } else
            show_error('The profile you are trying to edit does not exist.');
    }
}
