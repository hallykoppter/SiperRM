<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemusnahan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// $this->title = $this->common_lib->getTitle();
		$this->load->model('M_data');
	}
	public function index()
	{
		$header["title"] = "SI Retensi";
		$card["title"] = " Pemusnahan / Tambah Pemusnahan";
		$pemusnahan = $this->M_data->get_pemusnahan();
		$tanggal_skrg = new DateTime(date("Y-m-d"));
		$data['pemusnahan'] = [];
		foreach ($pemusnahan as $p) {
			$selisih = $tanggal_skrg->diff(new DateTime($p['tanggal_kunjungan']))->days + 1;
			$musnah = [
				'id_pemusnahan' => $p['id_pemusnahan'],
				'no_rm' => $p['no_rm'],
				'nama_pasien' => $p['nama_pasien'],
				'diagnosa' => $p['diagnosa'],
				'tanggal_pemusnahan' => $p['tanggal_pemusnahan'],
				'selisih' => $selisih
			];
			array_push($data['pemusnahan'], $musnah);
		}
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/si-retensi/pemusnahan/data-pemusnahan', $data);
		$this->load->view('_partials/footer');
	}

	public function tambah()
	{
		$header["title"] = "SI Retensi";
		$card["title"] = " Pemusnahan / Tambah Pemusnahan";
		$data['pasien'] = $this->db->get('tb_pasien')->result_array();
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/si-retensi/pemusnahan/tambah-pemusnahan', $data);
		$this->load->view('_partials/footer');
	}

	public function store()
	{
		$url  = base_url('pemusnahan');
		$data = [
			'no_rm' => $this->input->post('norm'),
			'diagnosa' => $this->input->post('diagnosa'),
			'id_pengguna' => $this->session->userdata('id_pengguna'),
			'id_status' => 1,
			'tanggal_kunjungan' => $this->input->post('tanggal_kunjungan'),
			'tanggal_pemusnahan' => $this->input->post('tanggal_pemusnahan')
		];

		$this->db->insert('tb_pemusnahan', $data);
		echo "<script>alert('Data Berhasil ditambahkan')</script>";
		echo "<script>document.location.href='$url'</script>";
	}

	public function edit($id)
	{
		$header["title"] = "SI Retensi";
		$card["title"] = " Pemusnahan / Ubah Pemusnahan";
		$data['pemusnahan'] = $this->db->get_where('tb_pemusnahan', ['id_pemusnahan' => $id])->row_array();
		$data['pasien'] = $this->db->get('tb_pasien')->result_array();
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/si-retensi/pemusnahan/ubah-pemusnahan', $data);
		$this->load->view('_partials/footer');
	}

	public function update()
	{
		$url  = base_url('pemusnahan');
		$id_pemusnahan = $this->input->post('id_pemusnahan');
		$data = [
			'no_rm' => $this->input->post('norm'),
			'diagnosa' => $this->input->post('diagnosa'),
			'id_pengguna' => $this->session->userdata('id_pengguna'),
			'id_status' => 1,
			'tanggal_kunjungan' => $this->input->post('tanggal_kunjungan'),
			'tanggal_pemusnahan' => $this->input->post('tanggal_pemusnahan')
		];

		$this->db->where('id_pemusnahan', $id_pemusnahan);
		$this->db->update('tb_pemusnahan', $data);
		echo "<script>alert('Data Berhasil diubah')</script>";
		echo "<script>document.location.href='$url'</script>";
	}

	public function delete($id_pemusnahan)
	{
		$url  = base_url('pemusnahan');
		$this->db->where('id_pemusnahan', $id_pemusnahan);
		$this->db->delete('tb_pemusnahan');
		echo "<script>alert('Data Berhasil dihapus')</script>";
		echo "<script>document.location.href='$url'</script>";
	}
}
