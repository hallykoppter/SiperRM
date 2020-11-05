<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lpeminjaman extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Common');
		// $this->title = $this->common_lib->getTitle();
	}
	public function index()
	{
		$header["title"] = "SI Peminjaman";
		$card["title"] = " Laporan Peminjaman / Laporan Peminjaman";
		$peminjaman = $this->Common->filterPeminjaman();
		if (isset($_POST['filter'])) {
			$dari = $_POST['dari'];
			$sampai = $_POST['sampai'];
			if ($dari != null && $sampai != null) {
				$peminjaman = $this->Common->filterPeminjaman($dari, $sampai);
				$data['dari'] = $dari;
				$data['sampai'] = $sampai;
				$data['peminjaman'] = $this->loop($peminjaman);
				$data['nama_kepala'] = $this->input->post('nama_kepala');
				$data['nip'] = $this->input->post('nip');
			}
		}

		if (isset($_POST['print'])) {
			$data['peminjaman'] = $this->loop($peminjaman);
			$dari = $_POST['dari'];
			$sampai = $_POST['sampai'];
			$data['nama_kepala'] = $this->input->post('nama_kepala');
			$data['nip'] = $this->input->post('nip');
			if ($dari != null && $sampai != null) {
				$peminjaman = $this->Common->filterPeminjaman($dari, $sampai);
				$data['peminjaman'] = $this->loop($peminjaman);
				$data['nama_kepala'] = $this->input->post('nama_kepala');
				$data['nip'] = $this->input->post('nip');
			}
			//kirim data ke method print
			$this->print($data['peminjaman'], $data['nama_kepala'], $data['nip']);
		}

		$data['peminjaman'] = $this->loop($peminjaman);


		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/laporan/laporan-peminjaman/data-lpeminjaman', $data);
		$this->load->view('_partials/footer');
	}

	public function loop($peminjaman)
	{
		$data['peminjaman'] = [];
		foreach ($peminjaman as $p) {
			$tanggalSekarang = new DateTime($time = 'now');
			$pengembalian = $p['tgl_pengembalian'];
			$Kembali = $p['tgl_kembali'];
			$tanggalKembali = new DateTime($Kembali);
			$keterlambatan = $tanggalKembali->diff($tanggalSekarang)->days;
			if ($keterlambatan < 0) {
				$keterlambatan = 0;
			} else if ($p['tgl_pengembalian'] == null) {
				$keterangan = "Belum Kembali";
				$pengembalian = "-";
			} else if ($p['tgl_pengembalian'] != null) {
				$kbl = new DateTime($p['tgl_pengembalian']);
				$keterlambatan = $tanggalKembali->diff($kbl)->days;

				if ($keterlambatan < 2) {
					$keterangan = "Kembali";
				} else {
					$keterangan = "Kembali/Terlambat";
				}
			} else if ($p['tanggal_pinjam'] == $p['tgl_pengembalian']) {
				$keterangan = "Tepat Waktu";
				$keterlambatan = 0;
			} else if ($p['tgl_kembali'] == $p['tgl_pengembalian']) {
				$keterangan = 'Tepat Waktu';
				$keterlambatan = 0;
			} else if ($keterlambatan >= 2) {
				$keterangan = "Terlambat";
			}

			$temp = [
				'no_rm' => $p['no_rm'],
				'nama_pasien' => $p['nama_pasien'],
				'nama_poli' => $p['nama_poli'],
				'tanggal_pinjam' => $p['tanggal_pinjam'],
				'tgl_kembali' => $p['tgl_kembali'],
				'tgl_pengembalian' => $pengembalian,
				'keterlambatan' => $keterlambatan,
				'keterangan' => $keterangan,
				'kelengkapan' => $p['kelengkapan']
			];

			array_push($data['peminjaman'], $temp);
		}
		return $data['peminjaman'];
	}

	public function print($data, $nama_kepala, $nip)
	{
		$data['peminjaman'] = $data;
		$data['nama_kepala'] = $nama_kepala;
		$data['nip'] = $nip;
		$date = date('d-m-Y');
		$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
		$html = $this->load->view('admin/laporan/laporan-peminjaman/lpeminjaman', $data, true);
		$mpdf->WriteHTML($html);
		$mpdf->Output($date . '-laporan-peminjaman.pdf', 'I');
	}
}
