<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("common");
		// $this->load->commongetTitle();
	}
	public function index()
	{
		$header["title"] = "SI Peminjaman";
		$card["title"] = " Peminjaman / Data Peminjaman";
		// $data["peminjaman"] = $this->common->getData("*", "tb_peminjaman p", ["tb_pasien ps", "p.no_rm=ps.no_rm", "tb_dokter d", "p.no_sip_dokter=d.no_sip"], "", "", "");
		$peminjaman = $this->common->getPeminjaman();
		$data['peminjaman'] = [];
		foreach ($peminjaman as $p) {
			$tanggalPinjam = new DateTime($p["tanggal_pinjam"]);
			$pengembalian = $p['tgl_pengembalian'];
			$tanggalPengembalian = new DateTime($pengembalian);
			$keterlambatan = $tanggalPengembalian->diff($tanggalPinjam)->days;
			if ($p['tgl_pengembalian'] == null) {
				$keterangan = "Belum Kembali";
				$pengembalian = "-";
				$keterlambatan = 0;
			} else if ($p['tanggal_pinjam'] == $p['tgl_pengembalian']) {
				$keterangan = "Tepat Waktu";
				$keterlambatan = 0;
			} else if ($keterlambatan > 2) {
				$keterangan = "Terlambat";
			}


			$temp = [
				'id_peminjaman' => $p['id_peminjaman'],
				'no_rm' => $p['no_rm'],
				'nama_pasien' => $p['nama_pasien'],
				'nama_poli' => $p['nama_poli'],
				'tanggal_pinjam' => $p['tanggal_pinjam'],
				'tgl_kembali' => $p['tgl_kembali'],
				'tgl_pengembalian' => $pengembalian,
				'keterlambatan' => $keterlambatan,
				'keterangan' => $keterangan,
			];
			array_push($data['peminjaman'], $temp);
		}
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/si-peminjaman/peminjaman/data-peminjaman', $data);
		$this->load->view('_partials/footer');
	}

	public function input()
	{
		$header["title"] = "SI Peminjaman";
		$card["title"] = " Peminjaman / Tambah Peminjaman";
		$data['poli'] = $this->db->get('tb_poli')->result_array();
		$this->db->select('no_rm, nama_pasien');
		$data['pasien'] = $this->db->get('tb_pasien')->result_array();
		$this->load->view('_partials/header-barcode', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/si-peminjaman/peminjaman/tambah-peminjaman', $data);
		$this->load->view('_partials/footer');
	}

	public function store()
	{
		$query = $this->db->query("SELECT * FROM `tb_peminjaman` ORDER BY id_peminjaman DESC LIMIT 1")->row_array();
		$id_peminjaman = $query['id_peminjaman'];
		$url = base_url('peminjaman');
		$data = [
			'id_peminjaman' => (int)$id_peminjaman + 1,
			'no_rm' => $_POST['no_rm'],
			'pelayanan' => $_POST['pelayanan'],

			'tanggal_pinjam' => $_POST['tanggal_pinjam'],
			'tgl_kembali' => $_POST['tgl_kembali'],
			'tgl_pengembalian' => null,
			'status_peminjaman' => 0,
			'status_data' => 1,
			'id_pengguna' => $this->session->userdata('id_pengguna'),
			'id_poli' => $_POST['poli']
		];
		
		$this->db->insert('tb_peminjaman', $data);
		echo "<script>alert('Data Berhasil ditambahkan')</script>";
		echo "<script>document.location.href='$url'</script>";
	}

	public function pasien()
	{
		$no_rm = $_POST['no_rm'];
		$this->db->select('no_rm, nama_pasien, jenis_kelamin, tgl_lahir');
		$this->db->where('no_rm', $no_rm);
		$pasien = $this->db->get('tb_pasien')->row_array();
		echo json_encode($pasien);
	}

	public function update($id)
	{
		$data['peminjaman'] = $this->common->getPeminjaman($id);
		$header["title"] = "SI Peminjaman";
		$card["title"] = " Peminjaman / Edit Peminjaman";
		$data['poli'] = $this->db->get('tb_poli')->result_array();
		$this->db->select('no_rm, nama_pasien');
		$data['pasien'] = $this->db->get('tb_pasien')->result_array();
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/si-peminjaman/peminjaman/edit-peminjaman', $data);
		$this->load->view('_partials/footer');
	}

	public function edit()
	{
		$id_peminjaman = $_POST['id_peminjaman'];
		$url = $url = base_url('peminjaman');
		$data = [
			'no_rm' => $_POST['no_rm'],
			'pelayanan' => $_POST['pelayanan'],
			'tgl_pengembalian' => $_POST['tgl_pengembalian'],
			'status_peminjaman' => 1,
			'status_data' => 1,
			'id_pengguna' => $this->session->userdata('id_pengguna'),
			'id_poli' => $_POST['poli']
		];
		$this->db->where('id_peminjaman', $id_peminjaman);
		$this->db->update('tb_peminjaman', $data);
		echo "<script>alert('Data Berhasil diubah')</script>";
		echo "<script>document.location.href='$url'</script>";
	}

	public function delete($id_peminjaman)
	{
		$url = base_url('peminjaman');
		$this->db->delete('tb_peminjaman', ['id_peminjaman' => $id_peminjaman]);
		echo "<script>alert('Data Berhasil dihapus')</script>";
		echo "<script>document.location.href='$url'</script>";
	}

	public function cetak_tracer()
	{
		$date = date("Y-m-d");
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'B5', 'margin_left' => 5, 'margin_right' => 5, 'margin_top' => 5, 'margin_bottom' => 5, 'margin_header' => 0, 'margin_footer' => 0, 'orientation' => 'P']);
		$html = $this->load->view('admin/laporan/laporan-peminjaman/kartu-tracer', [], true);
		$mpdf->WriteHTML($html);
		$mpdf->Output($date . '-kartu_tracer.pdf', 'I');
	}
}
