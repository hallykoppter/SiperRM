<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Poli extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("common");
		// $this->title = $this->common_lib->getTitle();
	}
	public function index()
	{
		$data['poli'] = $this->common->getData("id_poli, nama_poli", "tb_poli", "", "", "");
		$header["title"] = "SiperRM";
		$card["title"] = "Data Poli";
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/data-master/data-poli/data-datapoli', $data);
		$this->load->view('_partials/footer');
	}

	public function input()
	{
		$header["title"] = "SiperRM";
		$card["title"] = "Tambah Data Poli";
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/data-master/data-poli/tambah-datapoli');
		$this->load->view('_partials/footer');
	}

	public function insert()
	{
		$post = $_POST;
		$this->common->insert("tb_poli", $post);
		$this->session->set_flashdata("Success", '<div class="alert alert-success" role="alert">Berhasil menambahkan data!</div>');
		redirect(base_url() . "poli");
	}

	public function delete($id)
	{
		$this->db->where('id_poli', $id);
		$this->db->delete('tb_poli');
		$this->session->set_flashdata("Delete", '<div class="alert alert-danger" role="alert">Berhasil menghapus data!</div>');
		redirect(base_url() . "poli");
		// echo "bisa";
	}

	public function edit($id)
	{
		$header["title"] = "SiperRM";
		$card["title"] = "Ubah Data Poli";
		$data['poli'] = $this->db->get('tb_poli', ['id_poli' => $id])->row_array();
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/data-master/data-poli/ubah-datapoli', $data);
		$this->load->view('_partials/footer');
	}

	public function update()
	{
		$id = $this->input->post('id_poli');
		$nama = $this->input->post('nama_poli');
		$data['nama_poli'] = $nama;
		$this->db->update('tb_poli', $data, ['id_poli' => $id]);
		$this->session->set_flashdata("Delete", '<div class="alert alert-success" role="alert">Berhasil mengubah data!</div>');
		redirect(base_url() . "poli");
	}

	function hapus($id)
	{
		$url = base_url('poli');
		$this->common->delete($id);
		echo "<script>alert('Data Berhasil dihapus')</script>";
		echo "<script>document.location.href='$url'</script>";
	}
}
