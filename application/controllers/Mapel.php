<?php

class Mapel extends CI_Controller
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
        $data['mapel'] = $this->Global_model->get_data([], 'mapel');
        $data['_view'] = 'mapel/index';
        $this->load->view('layouts/main', $data);
    }

    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run()) {
            $params = array(
                'nama' => $this->input->post('nama'),
            );

            $action = $this->Global_model->insert($params, 'mapel');
            if ($action) {
                $this->session->set_flashdata('message', "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil...',
                            text: 'Berhasil menambahkan data mapel..',
                        })
                    </script>");
            } else {
                $this->session->set_flashdata('message', "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal...',
                            text: 'Gagal menambahkan data mapel..',
                        })
                    </script>");
            }
            redirect('mapel/index');
        } else {
            $data['_view'] = 'mapel/add';
            $this->load->view('layouts/main', $data);
        }
    }

    function edit($mapel_id)
    {
        $data['mapel'] = $this->Global_model->get_data(['mapel_id' => $mapel_id], 'mapel', false);

        if (isset($data['mapel']['mapel_id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama', 'Nama', 'required');

            if ($this->form_validation->run()) {
                $params = array(
                    'nama' => $this->input->post('nama'),
                );

                $action = $this->Global_model->update($params, 'mapel', ['mapel_id' => $mapel_id]);
                if ($action) {
                    $this->session->set_flashdata('message', "<script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil...',
                                text: 'Berhasil mengubah data mapel..',
                            })
                        </script>");
                } else {
                    $this->session->set_flashdata('message', "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal...',
                                text: 'Gagal mengubah data mapel..',
                            })
                        </script>");
                }
                redirect('mapel/index');
            } else {
                $data['_view'] = 'mapel/edit';
                $this->load->view('layouts/main', $data);
            }
        } else {
            $this->session->set_flashdata('message', "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal...',
                    text: 'Gagal mengubah data mapel, data yang ingin diubah tidak ditemukan..',
                })
            </script>");
            redirect('mapel/index');
        }
    }

    function remove($mapel_id)
    {
        $mapel = $this->Global_model->get_data(['mapel_id' => $mapel_id], 'mapel', false);

        if (isset($mapel['mapel_id'])) {
            $cekOne = $this->Global_model->get_data(['mapel_id' => $mapel_id], 'ampu', false);
            if ($cekOne == null) {
                $action = $this->Global_model->delete('mapel', ['mapel_id' => $mapel_id]);
                if ($action) {
                    $this->session->set_flashdata('message', "<script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil...',
                                text: 'Berhasil menghapus data mapel..',
                            })
                        </script>");
                } else {
                    $this->session->set_flashdata('message', "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal...',
                                text: 'Gagal menghapus data mapel..',
                            })
                        </script>");
                }
                redirect('mapel/index');
            } else {
                $this->session->set_flashdata('message', "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal...',
                        text: 'Gagal menghapus data mapel, data yang ingin dihapus sedang digunakan..',
                    })
                </script>");
                redirect('mapel/index');
            }
        } else
            $this->session->set_flashdata('message', "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal...',
                    text: 'Gagal menghapus data mapel, data yang ingin dihapus tidak ditemukan..',
                })
            </script>");
        redirect('mapel/index');
    }
}
