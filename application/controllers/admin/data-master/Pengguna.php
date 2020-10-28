<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("common");
		// $this->load->helper("helper");
		// $this->title = $this->common_lib->getTitle();
	}
	public function index()
	{
		$data['pengguna'] = $this->common->getData("nama_lengkap, jenis_kelamin, no_hp, username, level, status_aktif, id_pengguna", "tb_pengguna", "", "", "");
		$header["title"] = "SiperRM";
		$card["title"] = " Data Pengguna / Tambah Pengguna";
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/data-master/pengguna/data-pengguna', $data);
		$this->load->view('_partials/footer');
	}
	public function updateStatus()
	{
		$this->common->update('tb_pengguna', ['status_aktif' => $_GET['status']], ['id_pengguna' => $_GET['id']]);
	}
	public function input()
	{
		$header["title"] = "SiperRM";
		$card["title"] = "Tambah Data Pengguna";
		$data["getid"] = $this->getname();
		// $this->load->helper(array('url', 'string'));
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/data-master/pengguna/tambah-pengguna', $data);
		$this->load->view('_partials/footer');
	}

	public function insert()
	{
		$_POST['password'] = md5($_POST['password']);
		$post = $_POST;
		$this->common->insert("tb_pengguna", $post);
		$this->session->set_flashdata("Success", '<div class="alert alert-success" role="alert">Berhasil menambahkan data!</div>');
		redirect(base_url() . "pengguna");
	}


	public function delete($id)
	{
		$this->db->where('id_pengguna', $id);
		$this->db->delete('tb_pengguna');
		$this->session->set_flashdata("Delete", '<div class="alert alert-danger" role="alert">Berhasil menghapus data!</div>');
		redirect(base_url() . "pengguna");
		// echo "bisa";
	}

	public function getname()
	{
		$n = 5;
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';

		for ($i = 0; $i < $n; $i++) {
			$index = rand(0, strlen($characters) - 1);
			$randomString .= $characters[$index];
		}

		return $randomString;
	}
}
