<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Common');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$header["title"] = "Dashboard";
		$card["title"] = "<marquee> Sistem Informasi Peminjaman, Pengembalian dan Retensi Puskesmas Jenggawah
		 </marquee>";
		$peminjaman = $this->db->get('tb_peminjaman')->result_array();
		$jadwal = $this->db->get('tb_jadwal')->result_array();
		$terlambat = $this->db->query("SELECT * FROM tb_peminjaman WHERE tgl_pengembalian > tgl_kembali")->result_array();
		$tidk_lengkap = $this->db->get('tb_peminjaman', ['kelengkapan' => 'Tidak Lengkap'])->result_array();
		$data = [
			'jadwal' => count($jadwal),
			'peminjaman' => count($peminjaman),
			'terlambat' => count($terlambat),
			'tidak_lengkap' => count($tidk_lengkap)
		];

		foreach ($jadwal as $j) {
			$data['tanggal_jadwal'] = $j['tanggal'];
		}

		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/index', $data);
		$this->load->view('_partials/footer');
	}

	public function peminjaman_chart()
	{
		$data = [
			$this->Common->chart("01"),
			$this->Common->chart("02"),
			$this->Common->chart("03"),
			$this->Common->chart("04"),
			$this->Common->chart("05"),
			$this->Common->chart("06"),
			$this->Common->chart("07"),
			$this->Common->chart("08"),
			$this->Common->chart("09"),
			$this->Common->chart("10"),
			$this->Common->chart("11"),
			$this->Common->chart("12")
		];

		echo json_encode($data);
	}
}
