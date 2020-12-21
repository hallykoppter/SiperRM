<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alihmedia extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// $this->title = $this->common_lib->getTitle();
	}
	public function index()
	{

		$data['no_rm'] = $this->input->post('no_rm');

		$header["title"] = "SI Retensi dan Pelestarian";
		$card["title"] = " Alih Media / Tambah Alih Media";
		$this->load->view('_partials/header-scanner', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/si-retensi/alih-media/data-alihmedia', $data);
		$this->load->view('_partials/footer');
	}
}
