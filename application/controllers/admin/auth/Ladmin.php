<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ladmin extends CI_Controller
{
	public function index()
	{
		$data['user'] = $this->db->get_where('tb_pengguna', ['username' => $this->session->userdata('username')])->row_array();
		$header["title"] = "Dashboard";
		$card["title"] = " Dashboard";
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/index', $data);
		$this->load->view('_partials/footer');
	}
}
