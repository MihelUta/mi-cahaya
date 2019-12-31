<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	/**
	* class Model_User
	*/
	class Model_user extends CI_Model
	{	
		function __construct()
		{
			parent::__construct();
		}

		function cek_user($data){
			$query = $this->db->get_where('tb_user', $data);
			return $query;
		}

		function add_user($data)
		{
			$this->db->insert('tbl_user', $data);
		}

		function add_guru($data)
		{
			$this->db->insert('guru', $data);
		}

		function add_ortu($data)
		{
			$this->db->insert('siswa', $data);
		}

		function isLoggedIn()
		{
			return $this->session->userdata('logged_in');
		}

		function user_page()
		{
			if ($this->isLoggedIn()) {
				return true;
			} else {
				redirect('home');
			}
		}

		function update_akun_siswa($id, $data)
		{
			$this->db->where('id', $id);
			$this->db->update('tbl_user', $data);
		}
	}

 ?>