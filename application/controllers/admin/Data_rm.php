<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_rm extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("common");
		// $this->title = $this->common_lib->getTitle();
	}

	public function index()
	{
		$data['filter'] = $this->common->filterDataRMexpDateNull();
		foreach ($data['filter'] as $p) {
			$waktuSekarang = date('Y-m-d');

			$this->db->set('status_aktif', 0);
			$this->db->where('exp_date', $waktuSekarang);
			$this->db->update('tb_pasien');
		}
		$data['pasien'] = $this->common->getDataIndexRM();
		$header["title"] = "SiperRM";
		$card["title"] = " Data RM";
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/data-rm/data-rm', $data);
		$this->load->view('_partials/footer');
	}

	public function input()
	{
		$header["title"] = "SiperRM";
		$card["title"] = " Data RM / Tambah Data";
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/data-rm/tambah-data-rm');
		$this->load->view('_partials/footer');
	}

	public function insert()
	{
		$this->common->insert("tb_pasien", $this->input->post());
		$this->session->set_flashdata("success", "Berhasil Menambahkan Data!!!");
		redirect(base_url() . "data-rm");
	}

	public function edit($id)
	{
		$filter = array("no_urut" => $id);
		$data["data_rm"] = $this->common->getData("*", "tb_pasien", "", $filter, "");
		$header["title"] = "SI Peminjaman";
		$card["title"] = " Data RM / Edit Data";
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/data-rm/edit-data-rm', $data);
		$this->load->view('_partials/footer');
	}
	public function update()
	{
		$filter = array("no_urut" => $_POST["no_urut"]);
		$this->common->update("tb_pasien", $this->input->post(), $filter);
		$this->session->set_flashdata("success", "Berhasil Mengedit Data!!!");
		redirect(base_url() . "data-rm");
	}

	public function delete($id)
	{
		$filter = array("no_urut" => $id);
		$this->session->set_flashdata("success", "Berhasil Menghapus Data!!!");
		$query = $this->common->delete("tb_pasien", $filter);
		redirect(base_url() . "data-rm");
	}
	public function updateStatus()
	{
		$filter = array("no_urut" => $_POST["no_urut"]);
		$data = array("status_aktif" => $_POST["status"]);
		$status = $this->common->update("tb_pasien", $data, $filter);
	}
	public function qrcode($id)
	{
		$filter = array("no_urut" => $id);
		$data["data_rm"] = $this->common->getData("*", "tb_pasien", "", $filter, "");
		$QR['QR'] = $data['data_rm']['0'];
		$header["title"] = "SIPER RM";
		$card["title"] = " Data RM / QR-Code";
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/data-rm/qrcode', $QR);
		$this->load->view('_partials/footer');
		// $qrCode = new Endroid\QrCode\QrCode($QR['no_rm']);
		// header('Content-Type: ' . $qrCode->getContentType());
		// echo $qrCode->writeString();
	}
}
