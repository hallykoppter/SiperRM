<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Retensi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_data");
		// $this->title = $this->common_lib->getTitle();
	}
	public function index()
	{
		$header["title"] = "SI Retensi";
		$card["title"] = " Retensi / Data Retensi";
		$data['retensi'] = $this->M_data->get_retensi();
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/si-retensi/retensi/data-retensi', $data);
		$this->load->view('_partials/footer');
	}

	public function post()
	{
		$checkbox = $this->input->post('status_data');
		$url = base_url('retensi');
		// kalo di ceklis update data berdasarkan id_retensi
		for ($i = 0; $i < count($checkbox); $i++) {
			$update = $this->M_data->update_retensi($checkbox[$i]);
		}
		return redirect(base_url('retensi'));
	}

	public function tambah()
	{
		$header["title"] = "Tambah Retensi";
		$card["title"] = " Retensi / Tambah Retensi";
		$data['poli'] = $this->db->get('tb_poli')->result_array();
		$query = "SELECT p.no_rm, p.nama_pasien FROM tb_pasien AS p WHERE p.status_aktif=0";
		$data['pasien'] = $this->db->query($query)->result_array();
		$data['tanggal_kunjungan'] = $this->db->get('tb_peminjaman')->result_array();
		$data['jenis_pelayanan'] = $this->db->get('tb_poli')->result_array();
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/si-retensi/retensi/tambah-retensi', $data);
		$this->load->view('_partials/footer');
	}

	public function store()
	{
		$query = $this->db->query("SELECT * FROM `tb_permintaan` ORDER BY id_permintaan DESC LIMIT 1")->row_array();
		$id_permintaan = $query['id_permintaan'];
		$url = base_url('retensi');
		$tglPemindahan = new DateTime($_POST["tanggal_pemindahan"]);
		$tglkunjugan = new DateTime($_POST["tanggal_kunjungan"]);
		$diff = $tglPemindahan->diff($tglkunjugan);
		if (2 > $diff->y) {
			$id_status = 2;
			$status_pengembalian = 1;
		} else {
			$id_status = 1;
			$status_pengembalian = 1;
		}
		$data = [
			'id_permintaan' => (int)$id_permintaan + 1,
			'no_rm' => $_POST['no_rm'],
			'diagnosa' => $_POST['diagnosa'],
			'pelayanan' => 'Rawat Jalan',
			'jenis_pelayanan' => $_POST['jenis_pelayanan'],
			'id_pengguna' => $this->session->userdata('id_pengguna'),
			'status_permintaan' => $status_pengembalian,
			'id_status' => $id_status,
			'id_poli' => $_POST['poli'],
			'tanggal_kunjungan' => date("Y-m-d", strtotime($_POST['tanggal_kunjungan'])),
			'tanggal_pemindahan' => date("Y-m-d", strtotime($_POST['tanggal_pemindahan'])),
		];
		$this->db->insert('tb_permintaan', $data);
		echo "<script>alert('Data Berhasil ditambahkan')</script>";
		echo "<script>document.location.href='$url'</script>";
	}

	public function delete($id)
	{
		$url = base_url('retensi');
		$this->M_data->delete_retensi($id);
		echo "<script>alert('Data Berhasil dihapus')</script>";
		echo "<script>document.location.href='$url'</script>";
	}

	public function update($id)
	{
		$header["title"] = "Update Retensi";
		$card["title"] = " Retensi / Update Retensi";
		$data['retensi'] = $this->M_data->get_retensi($id);
		$data['poli'] = $this->db->get('tb_poli')->result_array();
		$data['pasien'] = $this->db->get('tb_pasien')->result_array();
		$data['jenis_pelayanan'] = $this->db->get('tb_poli')->result_array();
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/si-retensi/retensi/ubah-retensi', $data);
		$this->load->view('_partials/footer');
	}

	public function edit()
	{
		$id_permintaan = $_POST['id_permintaan'];
		$query = $this->db->query("SELECT id_status FROM `tb_permintaan` WHERE id_permintaan = $id_permintaan")->row_array();
		$url = base_url('retensi');
		$tglPemindahan = new DateTime($_POST["tanggal_pemindahan"]);
		$tglkunjugan = new DateTime($_POST["tanggal_kunjungan"]);
		$diff = $tglPemindahan->diff($tglkunjugan);
		// print_r($diff->y);
		if (2 > $diff->y) {
			$id_status = 2;
			$status_pengembalian = 1;
		} else {
			$id_status = 1;
			$status_pengembalian = 1;
		}

		// echo $id_status;
		$data = [
			'no_rm' => $_POST['norm'],
			'diagnosa' => $_POST['diagnosa'],
			'pelayanan' => 'Rawat Jalan',
			'jenis_pelayanan' => $_POST['jenis_pelayanan'],
			'id_pengguna' => $this->session->userdata('id_pengguna'),
			'status_permintaan' => $status_pengembalian,
			'id_status' => $id_status,
			'id_poli' => $_POST["poli"],
			'tanggal_kunjungan' => date("Y-m-d", strtotime($_POST['tanggal_kunjungan'])),
			'tanggal_pemindahan' => date("Y-m-d", strtotime($_POST['tanggal_pemindahan'])),
		];


		$this->db->where('id_permintaan', $id_permintaan);
		$this->db->update('tb_permintaan', $data);
		echo "<script>alert('Data Berhasil diubah')</script>";
		echo "<script>document.location.href='$url'</script>";
	}

	public function tglpinjam()
	{
		$no_rm = $_POST['no_rm'];
		$this->db->select('no_rm, tanggal_kunjungan');
		$this->db->where('no_rm', $no_rm);
		$pasien = $this->db->get('tb_peminjaman')->row_array();
		echo json_encode($pasien);
	}

	public function addById($id)
	{
		$query = "SELECT p.no_rm, pn.tanggal_pinjam FROM tb_pasien AS p JOIN tb_peminjaman AS pn ON p.no_rm=pn.no_rm WHERE p.no_rm=$id";
		$i = $this->db->query($query)->result_array();
		$data['pasien'] = $i['0'];
		$header["title"] = "Tambah Retensi";
		$card["title"] = " Retensi / Tambah Retensi";
		$data['poli'] = $this->db->get('tb_poli')->result_array();
		$data['jenis_pelayanan'] = $this->db->get('tb_poli')->result_array();
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/si-retensi/retensi/addById', $data);
		$this->load->view('_partials/footer');
	}
}
