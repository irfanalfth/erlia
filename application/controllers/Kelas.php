<?php

class Kelas extends CI_Controller
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
        $data['kelas'] = $this->Global_model->get_data([], 'kelas');
        $data['_view'] = 'kelas/index';
        $this->load->view('layouts/main', $data);
    }

    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run()) {
            $params = array(
                'nama' => $this->input->post('nama')
            );

            $action = $this->Global_model->insert($params, 'kelas');
            if ($action) {
                $this->session->set_flashdata('message', "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil...',
                            text: 'Berhasil menambahkan data kelas..',
                        })
                    </script>");
            } else {
                $this->session->set_flashdata('message', "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal...',
                            text: 'Gagal menambahkan data kelas..',
                        })
                    </script>");
            }
            redirect('kelas/index');
        } else {
            $data['_view'] = 'kelas/add';
            $this->load->view('layouts/main', $data);
        }
    }

    function edit($kelas_id)
    {
        $data['kelas'] = $this->Global_model->get_data(['kelas_id' => $kelas_id], 'kelas', false);

        if (isset($data['kelas']['kelas_id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama', 'Nama', 'required');

            if ($this->form_validation->run()) {
                $params = array(
                    'nama' => $this->input->post('nama')
                );

                $action = $this->Global_model->update($params, 'kelas', ['kelas_id' => $kelas_id]);
                if ($action) {
                    $this->session->set_flashdata('message', "<script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil...',
                                text: 'Berhasil mengubah data kelas..',
                            })
                        </script>");
                } else {
                    $this->session->set_flashdata('message', "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal...',
                                text: 'Gagal mengubah data kelas..',
                            })
                        </script>");
                }
                redirect('kelas/index');
            } else {
                $data['_view'] = 'kelas/edit';
                $this->load->view('layouts/main', $data);
            }
        } else {
            $this->session->set_flashdata('message', "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal...',
                    text: 'Gagal mengubah data kelas, data yang ingin diubah tidak ditemukan..',
                })
            </script>");
            redirect('kelas/index');
        }
    }

    function remove($kelas_id)
    {
        $kelas = $this->Global_model->get_data(['kelas_id' => $kelas_id], 'kelas', false);

        if (isset($kelas['kelas_id'])) {
            $cekOne = $this->Global_model->get_data(['kelas_id' => $kelas_id], 'sub_kelas', false);
            $cekTwo = $this->Global_model->get_data(['kelas_id' => $kelas_id], 'mapel', false);
            if ($cekOne == null && $cekTwo == null) {
                $action = $this->Global_model->delete('kelas', ['kelas_id' => $kelas_id]);
                if ($action) {
                    $this->session->set_flashdata('message', "<script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil...',
                                text: 'Berhasil menghapus data kelas..',
                            })
                        </script>");
                } else {
                    $this->session->set_flashdata('message', "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal...',
                                text: 'Gagal menghapus data kelas..',
                            })
                        </script>");
                }
                redirect('kelas/index');
            } else {
                $this->session->set_flashdata('message', "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal...',
                        text: 'Gagal menghapus data kelas, data yang ingin dihapus sedang digunakan..',
                    })
                </script>");
                redirect('kelas/index');
            }
        } else
            $this->session->set_flashdata('message', "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal...',
                    text: 'Gagal menghapus data kelas, data yang ingin dihapus tidak ditemukan..',
                })
            </script>");
        redirect('kelas/index');
    }
}
