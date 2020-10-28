<?php

class Auth extends CI_Model
{

	function cek_login($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	public function cek_user($username, $password)
	{
		$hasil = $this->db->query("SELECT * FROM tb_pengguna WHERE username='$username' AND password=md5('$password')");
		return $hasil;
	}
}
