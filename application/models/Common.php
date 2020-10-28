<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Common extends CI_Model
{

	public function insert($tb, $values)
	{
		$this->db->insert($tb, $values);
	}

	public function update($tb, $values, $filter)
	{
		$this->db->update($tb, $values, $filter);
	}

	public function delete($tb, $filter)
	{
		$this->db->delete($tb, $filter);
	}

	public function getData($select, $tb, $join, $filter, $order)
	{
		$sql = $this->db->select($select);

		if ($join != "") {
			for ($i = 0; $i < count($join); $i++) {
				if ($i % 2 != 0) {
					$sql = $this->db->join($join[$i - 1], $join[$i]);
				}
			}
		}

		if ($order != "") {
			$sql = $this->db->order_by($order[0], $order[1]);
		}
		if ($filter != "") {
			$sql = $this->db->where($filter);
		}

		if (is_array($tb)) {
			if (count($tb) == 2) {
				$sql = $this->db->get($tb[0], $tb[1]);
			} else {
				$sql = $this->db->get($tb[0], $tb[1], $tb[2]);
			}
		} else {
			$sql = $this->db->get($tb);
		}


		return $sql->result_array();
	}

	// public function hapus_data($where, $table){
	// 	$this->db->where($where);
	// 	$this->db->delete($table);	
	// }

	public function getPeminjaman($id_peminjaman = null)
	{
		if ($id_peminjaman == null) {
			$query = "SELECT p.id_peminjaman, p.no_rm,nama_pasien, nama_poli, tanggal_pinjam, tgl_kembali, tgl_pengembalian FROM tb_peminjaman AS p JOIN tb_pasien AS ps ON p.no_rm = ps.no_rm JOIN tb_poli AS pl ON p.id_poli = pl.id_poli ORDER BY id_peminjaman DESC";
			$get = $this->db->query($query)->result_array();
		} else {
			$query = "SELECT p.id_peminjaman, p.no_rm, p.pelayanan, p.id_poli,nama_pasien, nama_poli, tanggal_pinjam, tgl_kembali, tgl_pengembalian FROM tb_peminjaman AS p JOIN tb_pasien AS ps ON p.no_rm = ps.no_rm JOIN tb_poli AS pl ON p.id_poli = pl.id_poli WHERE id_peminjaman = $id_peminjaman";
			$get = $this->db->query($query)->row_array();
		}
		return $get;
	}

	public function filterPeminjaman($dari = null, $sampai = null)
	{
		if ($dari != null && $sampai != null) {
			$query = "SELECT p.no_rm,nama_pasien, nama_poli, tanggal_pinjam, tgl_kembali, tgl_pengembalian, kelengkapan FROM tb_peminjaman AS p JOIN tb_pasien AS ps ON p.no_rm = ps.no_rm JOIN tb_poli AS pl ON p.id_poli = pl.id_poli WHERE tanggal_pinjam BETWEEN '$dari' AND '$sampai' ORDER BY tanggal_pinjam DESC";
		} else {
			$query = "SELECT p.no_rm,nama_pasien, nama_poli, tanggal_pinjam, tgl_kembali, tgl_pengembalian, kelengkapan FROM tb_peminjaman AS p JOIN tb_pasien AS ps ON p.no_rm = ps.no_rm JOIN tb_poli AS pl ON p.id_poli = pl.id_poli ORDER BY tanggal_pinjam DESC";
		}

		$get = $this->db->query($query)->result_array();
		return $get;
	}

	public function getKlpcm($no_rm = null)
	{
		if ($no_rm == null) {
			$get = $this->db->query("SELECT p.id_peminjaman,p.no_rm, p.kelengkapan, p.status_data,ps.nama_pasien,ps.jenis_kelamin,ps.tgl_lahir FROM tb_klpcm as k JOIN tb_peminjaman AS p ON k.no_rm=p.no_rm JOIN tb_pasien AS ps ON p.no_rm = ps.no_rm ORDER BY id_peminjaman DESC");
			return $get->result_array();
		} else {
			$get = $this->db->query("SELECT k.*,ps.nama_pasien AS nampas,ps.jenis_kelamin,ps.tgl_lahir,p.kelengkapan FROM tb_klpcm AS k JOIN tb_pasien AS ps ON k.no_rm=ps.no_rm JOIN tb_peminjaman AS p ON k.no_rm=p.no_rm WHERE k.no_rm = '$no_rm'");
			return $get->row_array();
		}
	}

	public function chart($bulan)
	{
		$this->db->where('YEAR(tanggal_pinjam)', date('Y'));
		$this->db->where('MONTH(tanggal_pinjam)', $bulan);
		$peminjaman = $this->db->get('tb_peminjaman')->result_array();
		return count($peminjaman);
	}

	public function joindata($select, $table, $totable, $on, $key, $where)
	{
		$this->db->select($select);
		$this->db->from($table);
		$this->db->join($totable, $on);
		if ($key && $where != "") {
			$this->db->where($key, $where);
			$query = $this->db->get();
			return $query->row_array();
		}
		$query = $this->db->get();
		return $query->result_array();
	}
}
