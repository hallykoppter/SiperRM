<?php

class M_data extends CI_Model
{
	public function get_retensi($id = null)
	{
		if ($id == null) {
			$data = $this->db->query("SELECT p.*, pl.*, ps.nama_pasien, sdp.nama_status FROM `tb_permintaan` AS p JOIN tb_pasien AS ps ON p.no_rm=ps.no_rm JOIN status_data_permintaan AS sdp ON p.id_status = sdp.id_status JOIN tb_poli AS pl ON p.id_poli=pl.id_poli ORDER BY p.id_permintaan DESC");
			return $data->result_array();
		} else {
			$data = $this->db->query("SELECT p.*, pl.*, ps.nama_pasien, sdp.nama_status FROM `tb_permintaan` AS p JOIN tb_pasien AS ps ON p.no_rm=ps.no_rm JOIN status_data_permintaan AS sdp ON p.id_status = sdp.id_status JOIN tb_poli AS pl ON p.id_poli=pl.id_poli WHERE p.id_permintaan = $id");
			return $data->row_array();
		}
	}

	public function update_retensi($id_permintaan)
	{
		$update = $this->db->query("UPDATE tb_permintaan
        SET id_status = 1 
        WHERE id_permintaan = $id_permintaan");
		return 1;
	}

	public function delete_retensi($id)
	{
		$this->db->delete('tb_permintaan', array('id_permintaan' => $id));
	}

	public function filter($dari = null, $sampai = null)
	{
		if ($dari != null && $sampai != null) {
			$data = $this->db->query("SELECT no_rm, diagnosa, tanggal_kunjungan, tanggal_pemindahan FROM tb_permintaan WHERE tanggal_pinjam BETWEEN '$dari' AND '$sampai'");
		} else {
			$data = $this->db->query("SELECT no_rm, diagnosa, tanggal_kunjungan, tanggal_pemindahan FROM tb_permintaan");
		}
		return $data->result_array();
	}

	public function filterpelestarian($dari = null, $sampai = null)
	{
		if ($dari != null && $sampai != null) {
			$data = $this->db->query("SELECT no_rm, diagnosa, tanggal_kunjungan, tanggal_pelestarian FROM tb_pelestarian WHERE tanggal_pinjam BETWEEN '$dari' AND '$sampai'");
		} else {
			$data = $this->db->query("SELECT no_rm, diagnosa, tanggal_kunjungan, tanggal_pelestarian FROM tb_pelestarian");
		}
		return $data->result_array();
	}

	public function filterpemusnahan($dari = null, $sampai = null)
	{
		if ($dari != null && $sampai != null) {
			$data = $this->db->query("SELECT no_rm, diagnosa, tanggal_kunjungan, tanggal_pemusnahan FROM tb_pemusnahan WHERE tanggal_pinjam BETWEEN '$dari' AND '$sampai'");
		} else {
			$data = $this->db->query("SELECT no_rm, diagnosa, tanggal_kunjungan, tanggal_pemusnahan FROM tb_pemusnahan");
		}
		return $data->result_array();
	}

	public function ft_peminjaman()
	{
		$data = $this->db->query("SELECT p.no_rm,nama_pasien, nama_poli, tanggal_pinjam, tgl_kembali FROM tb_peminjaman AS p JOIN tb_pasien AS ps ON p.no_rm = ps.no_rm JOIN tb_poli AS pl ON p.id_poli = pl.id_poli");
		return $data->result_array();
	}

	public function get_pelestarian($id = null)
	{
		if ($id == null) {
			$data = $this->db->query("SELECT p.*, ps.nama_pasien FROM `tb_pelestarian` AS p JOIN tb_pasien AS ps ON p.no_rm=ps.no_rm ORDER BY p.id_pelestarian DESC");
			return $data->result_array();
		} else {
			$data = $this->db->query("SELECT p.*, ps.nama_pasien FROM `tb_pelestarian` AS p JOIN tb_pasien AS ps ON p.no_rm=ps.no_rm WHERE p.id_pelestarian = $id");
			return $data->row_array();
		}
	}

	public function get_pemusnahan($id = null)
	{
		if ($id == null) {
			$data = $this->db->query("SELECT p.*, ps.nama_pasien FROM `tb_pemusnahan` AS p JOIN tb_pasien AS ps ON p.no_rm=ps.no_rm ORDER BY p.id_pemusnahan DESC");
			return $data->result_array();
		} else {
			$data = $this->db->query("SELECT p.*, ps.nama_pasien FROM `tb_pemusnahan` AS p JOIN tb_pasien AS ps ON p.no_rm=ps.no_rm WHERE p.id_pemusnahan = $id");
			return $data->row_array();
		}
	}
}
