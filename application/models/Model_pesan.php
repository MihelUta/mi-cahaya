<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

/**
* class Model untuk Pesan
*/
class Model_pesan extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	// fungsi insert pesan ke database
	function insert_pesan($data)
	{
		$this->db->insert('kotak_masuk', $data);
	}

	function view_all_pesan()
	{
		$this->db->select('*');
		$this->db->from('kotak_masuk');

		return $this->db->get();
	}

	function insert_forgot_pwd($data)
	{
		$this->db->insert('kotak_masuk', $data);
	}

	function delete_pesan($id_pesan)
	{
		$this->db->where('id', $id_pesan);
		$this->db->delete('kotak_masuk');
	}
}

 ?>