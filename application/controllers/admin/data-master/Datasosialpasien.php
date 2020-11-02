<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datasosialpasien extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("common");
		// $this->title = $this->common_lib->getTitle();
	}

	public function index()
	{
		$data['pasien'] = $this->common->getData("no_rm, nama_pasien, jenis_kelamin, tgl_lahir, alamat, status_aktif, no_urut", "tb_pasien", "", "", "");
		$header["title"] = "SiperRM";
		$card["title"] = " Data Sosial Pasien / Tambah Data Sosial Pasien";
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/data-master/data-sosial-pasien/data-sosial-pasien', $data);
		$this->load->view('_partials/footer');
	}

	public function input()
	{
		$header["title"] = "SiperRM";
		$card["title"] = "Tambah Data Sosial Pasien";
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/data-master/data-sosial-pasien/tambah-sosial-pasien');
		$this->load->view('_partials/footer');
	}

	public function insert()
	{
		$post = $_POST;
		$this->common->insert("tb_pasien", $post);
		$this->session->set_flashdata("Success", '<div class="alert alert-success" role="alert">Berhasil menambahkan data!</div>');
		redirect(base_url() . "data-sosial-pasien");
	}


	public function delete($id)
	{
		$this->db->where('no_urut', $id);
		$this->db->delete('tb_pasien');
		$this->session->set_flashdata("Delete", '<div class="alert alert-danger" role="alert">Berhasil menghapus data!</div>');
		redirect(base_url() . "data-sosial-pasien");
		// echo "bisa";
	}
	public function edit($id)
	{
		$filter = array("no_urut" => $id);
		$data["data_rm"] = $this->common->getData("*", "tb_pasien", "", $filter, "");
		$header["title"] = "SI Peminjaman";
		$card["title"] = " Data sosial Pasien / Edit Data";
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/data-master/data-sosial-pasien/edit-sosial-pasien', $data);
		$this->load->view('_partials/footer');
	}
	public function update()
	{
		$filter = array("no_urut" => $_POST["no_urut"]);
		$this->common->update("tb_pasien", $this->input->post(), $filter);
		$this->session->set_flashdata("success", "Berhasil Mengedit Data!!!");
		redirect(base_url() . "data-sosial-pasien");
	}
}
