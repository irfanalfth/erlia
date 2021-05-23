<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
	}

	public function index()
	{
		$this->load->view('auth/login');
	}

	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$cek = $this->Auth_model->login($email, md5($password));
		if (!empty($cek)) {
			if ($cek['status'] != 'aktif') {
				echo "Akun Belum Aktif";
			} else {
				$data_session = array(
					'email' => $email,
					'level' => $cek['level'],
					'nama' => $cek['nama'],
					'user_id' => $cek['user_id'],
					'login' => true,
					'pict' => $cek['pict'],
				);

				$this->session->set_userdata($data_session);
				if ($cek['level'] == 'Admin') {
					redirect(base_url("dashboard"));
				} elseif ($cek['level'] == 'Pendidik') {
					redirect(base_url("dashboardpendidik"));
				} elseif ($cek['level'] == 'Siswa') {
					redirect(base_url("dashboardsiswa"));
				}
			}
		} else {
			$this->session->set_flashdata('message', "<script>
                    Swal.fire({
                            icon: 'error',
                            title: 'Gagal...',
                            text: 'Email atau password salah..',
                        })
					</script>");
			redirect('auth/index');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
}