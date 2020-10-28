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
			}
		}

		if (isset($_POST['print'])) {
			$data['peminjaman'] = $this->loop($peminjaman);
			$dari = $_POST['dari'];
			$sampai = $_POST['sampai'];
			$data['nama_kepala'] = $this->input->post('nama_kepala');
			if ($dari != null && $sampai != null) {
				$peminjaman = $this->Common->filterPeminjaman($dari, $sampai);
				$data['peminjaman'] = $this->loop($peminjaman);
				$data['nama_kepala'] = $this->input->post('nama_kepala');
			}
			//kirim data ke method print
			$this->print($data['peminjaman'], $data['nama_kepala']);
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
			$tanggalKembali = new DateTime($p["tgl_kembali"]);
			$pengembalian = $p['tgl_pengembalian'];
			$tanggalPengembalian = new DateTime($pengembalian);
			$keterlambatan = $tanggalPengembalian->diff($tanggalKembali)->days;
			if ($p['tgl_pengembalian'] == null) {
				$keterangan = "Belum Kembali";
				$pengembalian = "-";
				$keterlambatan = 0;
			} else if ($p['tgl_kembali'] == $p['tgl_pengembalian']) {
				$keterangan = "Tepat Waktu";
				$keterlambatan = 0;
			} else if ($keterlambatan > 0) {
				$keterangan = "Terlambat";
			}


			$temp = [
				'no_rm' => $p['no_rm'],
				'nama_pasien' => $p['nama_pasien'],
				'nama_poli' => $p['nama_poli'],
				'tanggal_pinjam' => $p['tanggal_pinjam'],
				'tgl_kembali' => $p['tgl_kembali'],
				'tgl_pengembalian' => $pengembalian,
				'keterangan' => $keterangan,
				'kelengkapan' => $p['kelengkapan']
			];

			array_push($data['peminjaman'], $temp);
		}
		return $data['peminjaman'];
	}

	public function print($data, $nama_kepala)
	{
		$data['peminjaman'] = $data;
		$data['nama_kepala'] = $nama_kepala;
		$date = date('d-m-Y');
		$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
		$html = $this->load->view('admin/laporan/laporan-peminjaman/lpeminjaman', $data, true);
		$mpdf->WriteHTML($html);
		$mpdf->Output($date . '-laporan-peminjaman.pdf', 'I');
	}
}
