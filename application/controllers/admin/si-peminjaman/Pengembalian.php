<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("common");
		// $this->load->commongetTitle();
    }
    public function index()
	{
		$header["title"]= "SI Pengembalian"; 
		$card["title"] = " Pengembalian / Data Pengembalian";
		$data["pengembalian"] = $this->common->getData("*", "tb_permintaan p", ["tb_pasien ps", "p.no_rm=ps.no_rm",], "", "", "");
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/si-peminjaman/pengembalian/data-pengembalian', $data);
		$this->load->view('_partials/footer');
	}
	
	public function input()
	{
		$header["title"]= "SI Peminjaman"; 
		$card["title"] = " Peminjaman / Tambah Peminjaman"; 
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/si-peminjaman/pengembalian/data-pengembalian');
		$this->load->view('_partials/footer');
	}
}
