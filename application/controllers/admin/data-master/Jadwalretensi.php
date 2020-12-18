<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwalretensi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("common");
		// $this->title = $this->common_lib->getTitle();
	}
	public function index()
	{
		$data['jadwal'] = $this->db->get('tb_jadwal')->result_array();
		$header["title"] = "SI Retensi";
		$card["title"] = " Data Jadwal Retensi / Atur Jadwal Retensi";
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/data-master/jadwal-retensi/data-jadwal-retensi', $data);
		$this->load->view('_partials/footer');
	}

	public function input()
	{
		$header["title"] = "SI Retensi";
		$card["title"] = "Tambah Data Retensi";
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/data-master/jadwal-retensi/tambah-jadwal-retensi');
		$this->load->view('_partials/footer');
	}

	public function insert()
	{
		$post = $_POST;
		$this->common->insert("tb_ruangan", $post);
		$this->session->set_flashdata("Success", '<div class="alert alert-success" role="alert">Berhasil menambahkan data!</div>');
		redirect(base_url() . "jadwal-retensi");
	}

	public function delete($id)
	{
		$this->db->where('id_ruangan', $id);
		$this->db->delete('tb_ruangan');
		$this->session->set_flashdata("Delete", '<div class="alert alert-danger" role="alert">Berhasil menghapus data!</div>');
		redirect(base_url() . "jadwal-retensi");
		// echo "bisa";
	}

	public function ubah($id)
	{
		$header["title"] = "SI Retensi";
		$card["title"] = "Ubah Data Jadwal Retensi";
		$data['jadwal'] = $this->db->get('tb_jadwal', ['id_jadwal' => $id])->row_array();
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/data-master/jadwal-retensi/ubah-jadwal-retensi', $data);
		$this->load->view('_partials/footer');
	}

	public function update()
	{
		$id = $this->input->post('id_jadwal');
		$data['tanggal'] = $this->input->post('tanggal');
		$this->db->update('tb_jadwal', $data, ['id_jadwal' => $id]);
		redirect(base_url() . "jadwal-retensi");
	}
}
