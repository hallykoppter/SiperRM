<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelestarian extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// $this->title = $this->common_lib->getTitle();
		$this->load->model('M_data');
	}
	public function index()
	{
		$header["title"] = "SI Retensi dan Pemusnahan";
		$card["title"] = " Pelestarian / Tambah Pelestarian";
		$pelestarian = $this->M_data->get_pelestarian();
		$tanggal_skrg = new DateTime(date("Y-m-d"));
		$data['pelestarian'] = [];
		foreach ($pelestarian as $p) {
			$selisih = $tanggal_skrg->diff(new DateTime($p['tanggal_kunjungan']))->days + 1;
			$lestari = [
				'id_pelestarian' => $p['id_pelestarian'],
				'no_rm' => $p['no_rm'],
				'nama_pasien' => $p['nama_pasien'],
				'diagnosa' => $p['diagnosa'],
				'tanggal_pelestarian' => $p['tanggal_pelestarian'],
				'scan' => $p['scan'],
				'selisih' => $selisih,
				'keterangan' => $p['keterangan']
			];
			array_push($data['pelestarian'], $lestari);
		}
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/si-retensi/pelestarian/data-pelestarian', $data);
		$this->load->view('_partials/footer');
	}

	public function tambah()
	{
		$header["title"] = "SI Retensi";
		$card["title"] = " Pelestarian / Tambah Pelestarian";
		$data['pasien'] = $this->db->get('tb_permintaan')->result_array();
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/si-retensi/pelestarian/tambah-pelestarian', $data);
		$this->load->view('_partials/footer');
	}

	public function store()
	{
		$url  = base_url('pelestarian');
		$data = [
			'no_rm' => $this->input->post('norm'),
			'diagnosa' => $this->input->post('diagnosa'),
			'id_pengguna' => $this->session->userdata('id_pengguna'),
			'id_status' => 1,
			'keterangan' => $this->input->post('keterangan'),
			'scan' => $this->input->post('scan'),
			'tanggal_kunjungan' => $this->input->post('tanggal_kunjungan'),
			'tanggal_pelestarian' => $this->input->post('tanggal_pelestarian')
		];

		$this->db->insert('tb_pelestarian', $data);
		echo "<script>alert('Data Berhasil ditambahkan')</script>";
		echo "<script>document.location.href='$url'</script>";
	}

	public function edit($id)
	{
		$header["title"] = "SI Retensi";
		$card["title"] = " Pelestarian / Ubah Pelestarian";
		$data['pelestarian'] = $this->db->get_where('tb_pelestarian', ['id_pelestarian' => $id])->row_array();
		$data['pasien'] = $this->db->get('tb_pasien')->result_array();
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/si-retensi/pelestarian/ubah-pelestarian', $data);
		$this->load->view('_partials/footer');
	}

	public function update()
	{
		$url  = base_url('pelestarian');
		$id_pelestarian = $this->input->post('id_pelestarian');
		$data = [
			'no_rm' => $this->input->post('norm'),
			'diagnosa' => $this->input->post('diagnosa'),
			'id_pengguna' => $this->session->userdata('id_pengguna'),
			'id_status' => 1,
			'keterangan' => $this->input->post('keterangan'),
			'scan' => $this->input->post('scan'),
			'tanggal_kunjungan' => $this->input->post('tanggal_kunjungan'),
			'tanggal_pelestarian' => $this->input->post('tanggal_pelestarian')
		];

		$this->db->where('id_pelestarian', $id_pelestarian);
		$this->db->update('tb_pelestarian', $data);
		echo "<script>alert('Data Berhasil diubah')</script>";
		echo "<script>document.location.href='$url'</script>";
	}

	public function delete($id_pelestarian)
	{
		$url  = base_url('pelestarian');
		$this->db->where('id_pelestarian', $id_pelestarian);
		$this->db->delete('tb_pelestarian');
		echo "<script>alert('Data Berhasil dihapus')</script>";
		echo "<script>document.location.href='$url'</script>";
	}

	public function permintaan()
	{
		$no_rm = $_POST['no_rm'];
		$this->db->select('no_rm, diagnosa, tanggal_kunjungan');
		$this->db->where('no_rm', $no_rm);
		$pasien = $this->db->get('tb_permintaan')->row_array();
		echo json_encode($pasien);
	}

	public function upload_scan()
	{
		$id = $this->input->post('id_pelestarian');
		$p = $this->db->get_where('tb_pelestarian', ['id_pelestarian' => $id])->result_array();

		$config['upload_path'] = './uploads/pelestarian/';
		$config['allowed_types'] = 'jpg|jpeg|png|pdf';
		$config['max_size'] = '3072';
		$config['file_name'] = $p[0]['no_rm'];

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file')) {
			$old_image = $p[0]['image'];
			unlink(FCPATH . 'uploads/pelestarian/' . $old_image);
			$new_name = $this->upload->data('file_name');
			$this->db->set('image', $new_name);
			$this->db->set('scan', 1);
			$this->db->where('id_pelestarian', $p[0]['id_pelestarian']);
			$this->db->update('tb_pelestarian');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">File berhasil diupload!</div>');
			redirect('pelestarian');
		} else {
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
			redirect('pelestarian');
		}
	}

	public function hasilscan($id)
	{
		$header["title"] = "SI Retensi";
		$card["title"] = " Pelestarian / Berkas Pelestarian";
		$scan['hasilscan'] = $this->db->get_where('tb_pelestarian', ['id_pelestarian' => $id])->result_array();
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/si-retensi/pelestarian/upload_scan', $scan);
		$this->load->view('_partials/footer');
	}
}
