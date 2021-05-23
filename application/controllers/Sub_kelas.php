<?php

class Sub_kelas extends CI_Controller
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
        $data['sub_kelas'] = $this->Global_model->get_data([], 'sub_kelas');
        $data['_view'] = 'sub_kelas/index';
        $this->load->view('layouts/main', $data);
    }

    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('kelas_id', 'Kelas', 'required');

        if ($this->form_validation->run()) {
            $params = array(
                'nama' => $this->input->post('nama'),
                'kelas_id' => $this->input->post('kelas_id')
            );

            $action = $this->Global_model->insert($params, 'sub_kelas');
            if ($action) {
                $this->session->set_flashdata('message', "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil...',
                            text: 'Berhasil menambahkan data sub kelas..',
                        })
                    </script>");
            } else {
                $this->session->set_flashdata('message', "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal...',
                            text: 'Gagal menambahkan data sub kelas..',
                        })
                    </script>");
            }
            redirect('sub_kelas/index');
        } else {
            $data['kelas'] = $this->Global_model->get_data([], 'kelas');
            $data['_view'] = 'sub_kelas/add';
            $this->load->view('layouts/main', $data);
        }
    }

    function edit($sub_kelas_id)
    {
        $data['sub_kelas'] = $this->Global_model->get_data(['sub_kelas_id' => $sub_kelas_id], 'sub_kelas', false);

        if (isset($data['sub_kelas']['sub_kelas_id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('kelas_id', 'Kelas', 'required');

            if ($this->form_validation->run()) {
                $params = array(
                    'nama' => $this->input->post('nama'),
                    'kelas_id' => $this->input->post('kelas_id')
                );

                $action = $this->Global_model->update($params, 'sub_kelas', ['sub_kelas_id' => $sub_kelas_id]);
                if ($action) {
                    $this->session->set_flashdata('message', "<script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil...',
                                text: 'Berhasil mengubah data sub kelas..',
                            })
                        </script>");
                } else {
                    $this->session->set_flashdata('message', "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal...',
                                text: 'Gagal mengubah data sub kelas..',
                            })
                        </script>");
                }
                redirect('sub_kelas/index');
            } else {
                $data['kelas'] = $this->Global_model->get_data([], 'kelas');
                $data['_view'] = 'sub_kelas/edit';
                $this->load->view('layouts/main', $data);
            }
        } else {
            $this->session->set_flashdata('message', "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal...',
                    text: 'Gagal mengubah data sub kelas, data yang ingin diubah tidak ditemukan..',
                })
            </script>");
            redirect('sub_kelas/index');
        }
    }

    function remove($sub_kelas_id)
    {
        $sub_kelas = $this->Global_model->get_data(['sub_kelas_id' => $sub_kelas_id], 'sub_kelas', false);

        if (isset($sub_kelas['sub_kelas_id'])) {
            $cekOne = $this->Global_model->get_data(['sub_kelas_id' => $sub_kelas_id], 'siswa', false);
            $cekTwo = $this->Global_model->get_data(['sub_kelas_id' => $sub_kelas_id], 'ampu', false);
            if ($cekOne == null && $cekTwo == null) {
                $action = $this->Global_model->delete('sub_kelas', ['sub_kelas_id' => $sub_kelas_id]);
                if ($action) {
                    $this->session->set_flashdata('message', "<script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil...',
                                text: 'Berhasil menghapus data sub_kelas..',
                            })
                        </script>");
                } else {
                    $this->session->set_flashdata('message', "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal...',
                                text: 'Gagal menghapus data sub kelas..',
                            })
                        </script>");
                }
                redirect('sub_kelas/index');
            } else {
                $this->session->set_flashdata('message', "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal...',
                        text: 'Gagal menghapus data sub kelas, data yang ingin dihapus sedang digunakan..',
                    })
                </script>");
                redirect('sub_kelas/index');
            }
        } else
            $this->session->set_flashdata('message', "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal...',
                    text: 'Gagal menghapus data sub kelas, data yang ingin dihapus tidak ditemukan..',
                })
            </script>");
        redirect('sub_kelas/index');
    }

    function wali($sub_kelas_id)
    {
        $data['sub_kelas'] = $this->Global_model->get_data(['sub_kelas_id' => $sub_kelas_id], 'sub_kelas', false);

        if (isset($data['sub_kelas']['sub_kelas_id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('pendidik_id', 'Wali Kelas', 'required');

            if ($this->form_validation->run()) {
                $params = array(
                    'pendidik_id' => $this->input->post('pendidik_id')
                );

                $action = $this->Global_model->update($params, 'sub_kelas', ['sub_kelas_id' => $sub_kelas_id]);
                if ($action) {
                    $this->session->set_flashdata('message', "<script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil...',
                                text: 'Berhasil mengubah data wali kelas..',
                            })
                        </script>");
                } else {
                    $this->session->set_flashdata('message', "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal...',
                                text: 'Gagal mengubah data wali kelas..',
                            })
                        </script>");
                }
                redirect('sub_kelas/index');
            } else {
                $data['pendidik'] = $this->Global_model->get_data([], 'pendidik');
                $data['_view'] = 'sub_kelas/wali';
                $this->load->view('layouts/main', $data);
            }
        } else {
            $this->session->set_flashdata('message', "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal...',
                    text: 'Gagal mengubah data wali kelas, data yang ingin diset tidak ditemukan..',
                })
            </script>");
            redirect('sub_kelas/index');
        }
    }
}
