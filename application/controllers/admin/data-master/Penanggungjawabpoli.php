<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penanggungjawabpoli extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("common");
		// $this->title = $this->common_lib->getTitle();
	}

	public function index()
	{
		$data['penanggungjawabpoli'] = $this->common->joindata("*", "tb_penanggungjawab_poli", "tb_poli", "tb_penanggungjawab_poli.id_poli = tb_poli.id_poli", "", "");
		$header["title"] = "SI Retensi";
		$card["title"] = " Data Penanggung Jawab Poli / Tambah Penanggung Jawab Poli";
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/data-master/penanggungjawab-poli/data-penanggunjawab-poli', $data);
		$this->load->view('_partials/footer');
	}

	// data sosial pasien
	public function input()
	{

		$header["title"] = "SI Retensi";
		$card["title"] = "Tambah Data Penanggung Jawab Poli";
		$data['poli'] = $this->db->get('tb_poli')->result_array();
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/data-master/penanggungjawab-poli/tambah-penanggunjawab-poli', $data);
		$this->load->view('_partials/footer');
	}

	public function insert()
	{
		$data = [
			'nama_penanggungjawab' => $this->input->post('nama_penanggungjawab'),
			'id_poli' => $this->input->post('id_poli')
		];
		$this->db->insert('tb_penanggungjawab_poli', $data);
		$this->session->set_flashdata("Success", '<div class="alert alert-success" role="alert">Berhasil menambahkan data!</div>');
		redirect(base_url() . "penanggungjawab-poli");
	}

	public function delete($id)
	{
		$this->db->where('id_penanggungjawab', $id);
		$this->db->delete('tb_penanggungjawab_poli');
		$this->session->set_flashdata("Delete", '<div class="alert alert-danger" role="alert">Berhasil menghapus data!</div>');
		redirect(base_url() . "penanggungjawab-poli");
		// echo "bisa";
	}

	public function edit($id)
	{
		$data['penanggungjawabpoli'] = $this->common->joindata("*", "tb_penanggungjawab_poli", "tb_poli", "tb_penanggungjawab_poli.id_poli = tb_poli.id_poli", "id_penanggungjawab", $id);
		$data['poli'] = $this->db->get('tb_poli')->result_array();
		$header["title"] = "SI Retensi";
		$card["title"] = "Ubah Data Penanggung Jawab Poli";
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/data-master/penanggungjawab-poli/ubah-penanggungjawab-poli', $data);
		$this->load->view('_partials/footer');
	}

	public function update()
	{
		$id_penanggungjawab = $this->input->post('id_penanggungjawab');
		$data = [
			'nama_penanggungjawab' => $this->input->post('nama_penanggungjawab'),
			'id_poli' => $this->input->post('id_poli')
		];
		$this->db->update('tb_penanggungjawab_poli', $data, ['id_penanggungjawab', $id_penanggungjawab]);
		$this->session->set_flashdata("Success", '<div class="alert alert-success" role="alert">Berhasil mengubah data!</div>');
		redirect(base_url() . "penanggungjawab-poli");
	}
}
