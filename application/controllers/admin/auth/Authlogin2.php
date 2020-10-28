<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authlogin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Auth");
	}

	public function index()
	{
		$data['title'] = "Login";
		$this->load->view('admin/auth/v_login', $data);
	}

	function auth()
	{

		$this->load->library('form_validation');

		$validasi = array(
			array(
				'field' => 'fusername',
				'label' => 'Username',
				'rules' => 'required',
				'errors' => array(
					'required'      => 'Wajib diisi'
				),
			),

			array(
				'field' => 'fpassword',
				'label' => 'Password',
				'rules' => 'required',
				'errors' => array(
					'required'      => 'Wajib diisi'
				),
			)
		);

		$this->form_validation->set_rules($validasi);

		if ($this->form_validation->run()) {

			$uname =  $this->input->post('fusername', TRUE);
			$passwd = $this->input->post('fpassword', TRUE);
			$hasil = $this->Auth->cek_user($uname, $passwd);
			if ($hasil->num_rows() == 1) {
				foreach ($hasil->result() as $sess) {
					$sess_data['logged_in'] = 'Login';
					$sess_data['username'] = $sess->username;
					$sess_data['id_pengguna'] = $sess->id_pengguna;
					$sess_data['nama'] = $sess->nama_lengkap;
					$sess_data['level'] = $sess->level;
					$sess_data['aktif'] = $sess->status_aktif;
					$this->session->set_userdata($sess_data);
				}

				if ($this->session->userdata('aktif') != 0) {
					redirect('Retensi');
				} else {
					redirect('Auth/akun_belum_aktif');
				}
			} else {
				redirect('Auth/gagallogin'); // mengalihkan halaman atau merefresh halaman 
			}
		} else {
			$this->index();
		}
	}

	// menampilkan pesan atau notif ketika username atau password salah
	function gagallogin()
	{
		$url = base_url('Auth');
		echo $this->session->set_flashdata('msg', 'Username Atau Password Salah'); // pesan yang ditampilkan
		redirect($url);
	}

	function akun_belum_aktif()
	{
		$url = base_url('Auth');
		echo $this->session->set_flashdata('msg', 'Akun Anda Belum Aktif'); // pesan yang ditampilkan
		redirect($url);
	}

	// menghapus session login dan mengalihkan ke halaman awal login
	public function logout()
	{
		$keys = array('logged_in', 'aktif', 'username', 'level');
		$this->session->unset_userdata($keys);
		session_destroy(); // menghapus session pengguna yang telah login 
		redirect('Auth');
	}
}
