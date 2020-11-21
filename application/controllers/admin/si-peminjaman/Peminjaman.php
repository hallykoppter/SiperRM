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
		$peminjaman = $this->common->getPeminjaman();
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
				'id_peminjaman' 		=> $p['id_peminjaman'],
				'no_rm' 						=> $p['no_rm'],
				'nama_pasien' 			=> $p['nama_pasien'],
				'nama_poli'					=> $p['nama_poli'],
				'tanggal_pinjam'	 	=> $p['tanggal_pinjam'],
				'tgl_kembali' 			=> $p['tgl_kembali'],
				'tgl_pengembalian' 	=> $pengembalian,
				'keterlambatan' 		=> $keterlambatan,
				'keterangan' 				=> $keterangan,
				'send_mail' 				=> $p['send_mail'],
				'status_peminjaman' => $p['status_peminjaman']
			];
			array_push($data['peminjaman'], $temp);
		}

		// fitur email otomatis
		foreach ($data['peminjaman'] as $pinjam) {
			if ($pinjam['send_mail'] == 0) {
				if ($pinjam['status_peminjaman'] == 0) {
					$this->_sendEmail();
					$this->db->set('send_mail', 1);
					$this->db->where('send_mail', 0);
					$this->db->where('status_peminjaman', 0);
					$this->db->update('tb_peminjaman');
				}
			}
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

		// menambahkan dua tahun untuk exp_date
		$wA = $_POST['tanggal_pinjam'];
		$exp_date = date('Y-m-d', strtotime('+2 Years', strtotime($wA)));
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
			'id_poli' => $_POST['poli'],
		];

		$this->db->insert('tb_peminjaman', $data);
		$this->db->set('exp_date', $exp_date);
		$this->db->where('no_rm', $_POST['no_rm']);
		$this->db->update('tb_pasien');
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

	private function _sendEmail()
	{
		$config = [
			'protocol' 	=> 'smtp',
			'smtp_host'	=> 'ssl://smtp.googlemail.com',
			'smtp_user' => 'astirinarifin@gmail.com',
			'smtp_pass' => 'Kagamine',
			'smtp_port' => 465,
			'mailtype' 	=> 'html',
			'charset' 	=> 'utf-8',
			'newline' 	=> "\r\n",
		];

		$this->load->library('email', $config);

		$this->email->from('astirinarifin@gmail.com', 'Admin RM');
		$this->email->to('astiariniarifin@gmail.com');
		// $this->email->to('officialkurniasandi@gmail.com');
		$this->email->subject('Siper RM - Peminjaman');
		$this->email->message('Terdapat Berkas yang Belum kembali. Harap Segera Konfirmasi!!');

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}
}
