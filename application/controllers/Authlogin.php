<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authlogin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth');
		$this->load->library('form_validation');
		// $this->title = $this->common_lib->getTitle();
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			// $data['title'] = "Login";
			$this->load->view('admin/auth/v_auth');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		// $this->load->library('form_validation');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('tb_pengguna', ['username' => $username])->row_array();
		// var_dump($user);

		// jika usernya ada
		if ($user) {
			// usernya aktif
			if ($user['status_aktif'] == 1) {
				// cek password
				// if (password_verify($password, $user['password'])) {
				if (md5($password) == $user['password']) {
					$data = [
						'id_pengguna'	=> $user['id_pengguna'],
						'username'	=> $user['username'],
						'level'		=> $user['level'],
						'nama_lengkap'		=> $user['nama_lengkap']
					];
					$this->session->set_userdata($data);
					if ($user['level'] == 'admin') {
						redirect('welcome');
						// echo "admin";
					} elseif ($user['level'] == 'petugas rm') {

						redirect('welcome');
						// echo "RM";
					} else {
						redirect('welcome');
						// echo "petugas";
					}
				} else {
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Password salah!</div>');
					redirect('authlogin');
				}
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Username tidak aktif!</div>');
				redirect('authlogin');
			}
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Username tidak ada!</div>');
			redirect('authlogin');
		}
	}

	// function aksi_login()
	// {
	// 	$username = $this->input->post('username');
	// 	$password = $this->input->post('password');
	// 	$where = array(
	// 		'username' => $username,
	// 		'password' => md5($password)
	// 	);
	// 	$cek = $this->Auth->cek_login("tb_pengguna", $where)->num_rows();
	// 	if ($cek > 0) {

	// 		$data_session = array(
	// 			'nama' => $username,
	// 			'status' => "login"
	// 		);

	// 		$this->session->set_userdata($data_session);

	// 		redirect(base_url("dashboard"));
	// 	} else {
	// 		// echo "Username dan password salah !";
	// 		redirect(base_url("authlogin"));
	// 	}
	// }

	// function login()
	// {
	// 	$this->load->library('form_validation');

	// 	$validasi = array(
	// 		array(
	// 			'field' => 'username',
	// 			'label' => 'Username',
	// 			'rules' => 'required',
	// 			'errors' => array(
	// 				'required'      => 'Wajib diisi'
	// 			),
	// 		),

	// 		array(
	// 			'field' => 'password',
	// 			'label' => 'Password',
	// 			'rules' => 'required',
	// 			'errors' => array(
	// 				'required'      => 'Wajib diisi'
	// 			),
	// 		)
	// 	);

	// 	$this->form_validation->set_rules($validasi);

	// 	if ($this->form_validation->run()) {

	// 		$uname =  $this->input->post('username', TRUE);
	// 		$passwd = $this->input->post('password', TRUE);
	// 		$hasil = $this->Auth->cek_user($uname, $passwd);
	// 		if ($hasil->num_rows() == 1) {
	// 			foreach ($hasil->result() as $sess) {
	// 				$sess_data['logged_in'] = 'Login';
	// 				$sess_data['username'] = $sess->username;
	// 				$sess_data['id_pengguna'] = $sess->id_pengguna;
	// 				$sess_data['nama'] = $sess->nama_lengkap;
	// 				$sess_data['level'] = $sess->level;
	// 				$sess_data['aktif'] = $sess->status_aktif;
	// 				$this->session->set_userdata($sess_data);
	// 			}

	// 			if ($this->session->userdata('aktif') != 0) {
	// 				redirect('dashboard');
	// 			} else {
	// 				redirect('authlogin/akun_belum_aktif');
	// 			}
	// 		} else {
	// 			redirect('Authlogin/error_login'); // mengalihkan halaman atau merefresh halaman 
	// 		}
	// 	} else {
	// 		$this->index();
	// 	}
	// }

	// function error_login()
	// {
	// 	$url = base_url('authlogin');
	// 	echo $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Username atau password salah!</div>'); // pesan yang ditampilkan
	// 	redirect($url);
	// }

	// function akun_belum_aktif()
	// {
	// 	$url = base_url('Authlogin');
	// 	echo $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Akun tidak aktif!</div>'); // pesan yang ditampilkan
	// 	redirect($url);
	// }

	function logout()
	{
		// $this->session->sess_destroy();
		// redirect(base_url('authlogin'));
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('nama_lengkap');
		$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Anda telah logout!</div>');
		redirect('authlogin');
	}
}
