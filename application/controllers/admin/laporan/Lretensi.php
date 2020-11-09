<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lretensi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_data');
		// $this->title = $this->common_lib->getTitle();
	}
	public function index()
	{
		$header["title"] = "SI Retensi";
		$card["title"] = " Laporan Retensi / Laporan Retensi";
		$data['cetak'] = $this->M_data->filter();
		if (isset($_POST['filter'])) {
			$dari = $_POST['dari'];
			$sampai = $_POST['sampai'];
			if ($dari != null && $sampai != null) {
				$data['cetak'] = $this->M_data->filter($dari, $sampai);
				$data['dari'] = $dari;
				$data['sampai'] = $sampai;
				$data['nama_kepala'] = $this->input->post('nama_kepala');
				$data['nip'] = $this->input->post('nip');
			}
		}
		if (isset($_POST['print'])) {
			$data['print'] = $this->M_data->filter();
			$dari = $_POST['dari'];
			$sampai = $_POST['sampai'];
			$data['nama_kepala'] = $this->input->post('nama_kepala');
			$data['nip'] = $this->input->post('nip');
			if ($dari != null && $sampai != null) {
				$data['print'] = $this->M_data->filter($dari, $sampai);
				$data['nama_kepala'] = $this->input->post('nama_kepala');
				$data['nip'] = $this->input->post('nip');
			}
			//kirim data ke method print
			$this->print($data['print'], $data['nama_kepala'], $data['nip']);
		}
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/laporan/laporan-retensi/data-lretensi', $data);
		$this->load->view('_partials/footer');
	}

	public function print($data, $nama_kepala, $nip)
	{
		$data['retensi'] = $data;
		$data['nama_kepala'] = $nama_kepala;
		$data['nip'] = $nip;
		$date = date('d-m-Y');
		$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
		$html = $this->load->view('admin/laporan/laporan-retensi/lretensi', $data, true);
		$mpdf->WriteHTML($html);
		$mpdf->Output($date . '-laporan-retensi.pdf', 'I');
	}
}
