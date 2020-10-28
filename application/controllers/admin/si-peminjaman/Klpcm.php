<?php

use phpDocumentor\Reflection\Types\This;

defined('BASEPATH') or exit('No direct script access allowed');

class Klpcm extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Common");
		// $this->load->commongetTitle();
	}
	public function index()
	{
		$data["klpcm"] = $this->Common->getKlpcm();
		$header["title"] = "SI Peminjaman";
		$card["title"] = " KLPCM / Data KLPCM";
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/si-peminjaman/klpcm/data-klpcm', $data);
		$this->load->view('_partials/footer');
	}

	public function input()
	{
		$header["title"] = "SI Peminjaman";
		$card["title"] = " KLPCM / Tambah KLPCM";
		$data['pasien'] = $this->db->get('tb_peminjaman')->result_array();
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/si-peminjaman/klpcm/tambah-klpcm', $data);
		$this->load->view('_partials/footer');
	}

	public function store()
	{
		$url = base_url('klpcm');
		$no_rm = $_POST['no_rm'];
		$nama_pasien = $_POST['nama_pasien'];
		$alergi = $_POST['alergi'];
		$tanggal_kunjungan = $_POST['tanggal_kunjungan'];
		$unit_layanan = $_POST['unit_layanan'];
		$subjek = $_POST['subjek'];
		$objek = $_POST['objek'];
		$assesment = $_POST['assesment'];
		$planning = $_POST['planning'];
		$jenis_kasus = $_POST['jenis_kasus'];
		$petugas = $_POST['petugas'];
		$kelengkapan = $_POST['status_kelengkapan'];

		//insert to tabel klpcm
		$data = [
			'no_rm' => $no_rm,
			'nama_pasien' => $nama_pasien,
			'alergi' => $alergi,
			'tanggal_kunjungan' => $tanggal_kunjungan,
			'unit_layanan' => $unit_layanan,
			'subjek' => $subjek,
			'objek' => $objek,
			'assesment' => $assesment,
			'planning' => $planning,
			'jenis_kasus' => $jenis_kasus,
			'nama_paraf_pet' => $petugas
		];
		$this->db->insert('tb_klpcm', $data);
		//update field kelengkapan berdasarkan norm pada tabel tb_peminjaman
		$this->db->where('no_rm', $no_rm);
		$kelengkap = ['kelengkapan' => $kelengkapan];
		$this->db->update('tb_peminjaman', $kelengkap);
		echo "<script>alert('Data Berhasil ditambahkan')</script>";
		echo "<script>document.location.href='$url'</script>";
	}

	public function delete($no_rm)
	{
		$url = base_url('klpcm');
		$kelengkapan = ['kelengkapan' => null];
		$this->db->delete('tb_klpcm', ['no_rm' => $no_rm]);
		$this->db->where('no_rm', $no_rm);
		$this->db->update('tb_peminjaman', $kelengkapan);
		echo "<script>alert('Data Berhasil dihapus')</script>";
		echo "<script>document.location.href='$url'</script>";
	}

	public function update($no_rm)
	{
		$header["title"] = "SI Peminjaman";
		$card["title"] = " KLPCM / Edit KLPCM";
		$data['pasien'] = $this->db->get('tb_peminjaman')->result_array();
		$data['klpcm'] = $this->Common->getKlpcm($no_rm);
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/si-peminjaman/klpcm/edit-klpcm', $data);
		$this->load->view('_partials/footer');
	}

	public function edit()
	{
		$url = base_url('klpcm');
		$id_klpcm = $_POST['id_klpcm'];
		$no_rm = $_POST['no_rm'];
		$nama_pasien = $_POST['nama_pasien'];
		$alergi = $_POST['alergi'];
		$tanggal_kunjungan = $_POST['tanggal_kunjungan'];
		$unit_layanan = $_POST['unit_layanan'];
		$subjek = $_POST['subjek'];
		$objek = $_POST['objek'];
		$assesment = $_POST['assesment'];
		$planning = $_POST['planning'];
		$jenis_kasus = $_POST['jenis_kasus'];
		$petugas = $_POST['petugas'];
		$kelengkapan = $_POST['status_kelengkapan'];

		//insert to tabel klpcm
		$data = [
			'no_rm' => $no_rm,
			'nama_pasien' => $nama_pasien,
			'alergi' => $alergi,
			'tanggal_kunjungan' => $tanggal_kunjungan,
			'unit_layanan' => $unit_layanan,
			'subjek' => $subjek,
			'objek' => $objek,
			'assesment' => $assesment,
			'planning' => $planning,
			'jenis_kasus' => $jenis_kasus,
			'nama_paraf_pet' => $petugas
		];
		$this->db->where('no_rm', $no_rm);
		$this->db->update('tb_klpcm', $data);
		//update field kelengkapan berdasarkan norm pada tabel tb_peminjaman
		$this->db->where('no_rm', $no_rm);
		$kelengkap = ['kelengkapan' => $kelengkapan];
		$this->db->update('tb_peminjaman', $kelengkap);
		echo "<script>alert('Data Berhasil diubah')</script>";
		echo "<script>document.location.href='$url'</script>";
	}
}
