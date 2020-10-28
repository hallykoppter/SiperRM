<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_rm extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("common");
		// $this->title = $this->common_lib->getTitle();
	}
	
    public function index()
	{
		$header["title"]= "SiperRM"; 
		$card["title"] = " Data RM"; 
		$pinjam = $this->common->getData("*", "tb_peminjaman tp", ["tb_pasien tps", "tp.no_rm=tps.no_rm", "tb_pengguna tpg", "tp.id_pengguna=tpg.id_pengguna"], ["status_data" => 1, "status_peminjaman" => 0], ["tanggal_pinjam", "desc"]);
		$terlambat = 0;
        foreach($pinjam as $dataPinjam){
			$tgl_sekarang = date_create();
            $pecah = explode('-', $dataPinjam['tanggal_pinjam']);
            $tahun = $pecah[0];
            $bulan = $pecah[1];
            $tgl = $pecah[2];
            $tgl2 = $tgl."/".$bulan."/".$tahun;
            $idp = $dataPinjam["id_peminjaman"];
            $tk = date_create($dataPinjam["tanggal_pinjam"]);
            $keterlambatan = date_diff($tk, $tgl_sekarang);
            $hr = $keterlambatan->format("%a");
            if($hr==0 || ($hr<=2 && $dataPinjam["pelayanan"] == 'Rawat Inap') || ($hr<=1 && $dataPinjam["pelayanan"] == 'Rawat Jalan')){
                $terlambat = $terlambat;
            } else{
                $terlambat = $terlambat +1;
			}
        }
		$data['jml_data_terlambat'] = $terlambat;
		$data["pasien"] = $this->common->getData("*", ["tb_pasien",10], "", "", ["no_rm", "desc"]);
		
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/data-rm/data-rm', $data);
		$this->load->view('_partials/footer');
	}
	
	public function input()
	{
		$header["title"]= "SiperRM"; 
		$card["title"] = " Data RM / Tambah Data"; 
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/data-rm/tambah-data-rm');
		$this->load->view('_partials/footer');
	}

	public function insert()
	{
		$this->common->insert("tb_pasien", $this->input->post());
		$this->session->set_flashdata("success", "Berhasil Menambahkan Data!!!");
		redirect(base_url()."data-rm");
	}

	public function edit($id)
	{
		$filter = array("no_urut" => $id);
		$data["data_rm"] = $this->common->getData("*", "tb_pasien", "", $filter, "");
		$header["title"]= "SI Peminjaman"; 
		$card["title"] = " Data RM / Edit Data"; 
		$this->load->view('_partials/header', $header);
		$this->load->view('_partials/breadcrumb', $card);
		$this->load->view('admin/data-rm/edit-data-rm', $data);
		$this->load->view('_partials/footer');
	}
	public function update()
	{
		$filter = array("no_urut" => $_POST["no_urut"]);
		$this->common->update("tb_pasien", $this->input->post(), $filter);
		$this->session->set_flashdata("success", "Berhasil Mengedit Data!!!");
		redirect(base_url()."data-rm");
	}

	public function delete($id)
	{
		$filter = array("no_urut" => $id);
		$this->session->set_flashdata("success", "Berhasil Menghapus Data!!!");
		$query = $this->common->delete("tb_pasien", $filter);
		redirect(base_url()."data-rm");
	}
	public function updateStatus()
	{
		$filter = array("no_urut" => $_POST["no_urut"]);
		$data = array("status_aktif" => $_POST["status"]);
		$status = $this->common->update("tb_pasien", $data, $filter);
	}	
}
