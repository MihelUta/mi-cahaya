<?php 
if (! defined('BASEPATH')) exit('No direct script access allowed');

/**
* class Setting Controller
*/
class Settings extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->model_user->user_page();
	}

	function index()
	{
		$title['title'] = "Siswa";

		$this->load->view('siswa/v_siswa_header', $title);
		$this->load->view('siswa/v_siswa_settings');
		$this->load->view('siswa/v_siswa_footer');
	}

	function change_username_siswa()
	{
		$title['title'] = "Ganti Username";
		$this->load->view('siswa/v_siswa_header', $title);
		$this->load->view('siswa/v_siswa_change_username');
		$this->load->view('siswa/v_siswa_footer');	
	}

	function change_username_guru()
	{
		$title['title'] = "Ganti Username";
		$this->load->view('guru/v_guru_header', $title);
		$this->load->view('guru/v_guru_change_username');
		$this->load->view('guru/v_guru_footer');	
	}

	function change_password_siswa()
	{
		$title['title'] = "Ganti Password";
		$this->load->view('siswa/v_siswa_header', $title);
		$this->load->view('siswa/v_siswa_change_password');
		$this->load->view('siswa/v_siswa_footer');
	}

	function change_password_guru()
	{
		$title['title'] = "Ganti Password";
		$this->load->view('guru/v_guru_header', $title);
		$this->load->view('guru/v_guru_change_password');
		$this->load->view('guru/v_guru_footer');
	}

	function change_email_siswa()
	{
		$title['title'] = "Tambah Email";
		$this->load->view('siswa/v_siswa_header', $title);
		$this->load->view('siswa/v_siswa_change_email');
		$this->load->view('siswa/v_siswa_footer');
	}

	function change_email_guru()
	{
		$title['title'] = "Tambah Email";
		$this->load->view('guru/v_guru_header', $title);
		$this->load->view('guru/v_guru_change_email');
		$this->load->view('guru/v_guru_footer');
	}

	function proses_change_username_siswa()
	{
		$title['title'] = "Ganti Username";
		$this->model_user->user_page();

		$this->form_validation->set_rules('userlama', 'Old Username', 'required');
		$this->form_validation->set_rules('userbaru', 'New Username', 'required|max_length[30]|min_length[2]');

		if ($this->form_validation->run() != true) {
			$this->load->view('siswa/v_siswa_header', $title);
			$this->load->view('siswa/v_siswa_change_username');
			$this->load->view('siswa/v_siswa_footer');	
		} else {
			$sql = $this->db->select('*')->from('tbl_user')->where('username', $this->session->userdata('username'))->get();

			foreach ($sql->result() as $info) {
				$db_id = $info->id;
				$db_username = $info->username;
			}

			if ($this->input->post('userlama') == $db_username) {
				$new_username = $this->input->post('userbaru');
				$update = $this->db->query("UPDATE `tbl_user` SET `username` = '$new_username' WHERE `id` = '$db_id'");
				redirect('logout', 'refresh');
			} else {
				echo '<script>alert("Username gagal diubah, Silahkan coba lagi");history.go(-1);</script>';
			}
		}
	}

	function proses_change_username_guru()
	{
		$title['title'] = "Ganti Username";
		$this->model_user->user_page();

		$this->form_validation->set_rules('userlama', 'Old Username', 'required');
		$this->form_validation->set_rules('userbaru', 'New Username', 'required|max_length[30]|min_length[2]');

		if ($this->form_validation->run() != true) {
			$this->load->view('guru/v_guru_header', $title);
			$this->load->view('guru/v_guru_change_username');
			$this->load->view('guru/v_guru_footer');	
		} else {
			$sql = $this->db->select('*')->from('tbl_user')->where('username', $this->session->userdata('username'))->get();

			foreach ($sql->result() as $info) {
				$db_id = $info->id;
				$db_username = $info->username;
			}

			if ($this->input->post('userlama') == $db_username) {
				$new_username = $this->input->post('userbaru');
				$update = $this->db->query("UPDATE `tbl_user` SET `username` = '$new_username' WHERE `id` = '$db_id'");
				redirect('logout', 'refresh');
			} else {
				echo '<script>alert("Username gagal diubah, Silahkan coba lagi");history.go(-1);</script>';
			}
		}
	}

	function proses_change_password_siswa()
	{
		$title['title'] = "Ganti Password";
		$this->model_user->user_page();
		
		$this->form_validation->set_rules('passlama', 'Old Password', 'required');
		$this->form_validation->set_rules('passbaru', 'New Password', 'required|max_length[20]|min_length[6]');
		$this->form_validation->set_rules('conf_pass', 'Repeat Password', 'required|matches[passbaru]');

		if ($this->form_validation->run() != true) {
			$this->load->view('siswa/v_siswa_header', $title);
			$this->load->view('siswa/v_siswa_change_password');
			$this->load->view('siswa/v_siswa_footer');	
		} else {
			$sql = $this->db->select('*')->from('tbl_user')->where('username', $this->session->userdata('username'))->get();

			foreach ($sql->result() as $my_info) {
				$db_id = $my_info->id;
				$db_password = $my_info->password;
			}

			if ($this->input->post('passlama') == $db_password ){
				$new_pw = $this->input->post('passbaru');

				$update = $this->db->query("UPDATE `tbl_user` SET `password` = '$new_pw' WHERE `id` = '$db_id'");
				redirect('logout', 'refresh');
			} else {
				echo '<script>alert("Password gagal diubah, Silahkan coba lagi");history.go(-1);</script>';
			}
		}
	}

	function proses_change_password_guru()
	{
		$title['title'] = "Ganti Password";
		$this->model_user->user_page();
		
		$this->form_validation->set_rules('passlama', 'Old Password', 'required');
		$this->form_validation->set_rules('passbaru', 'New Password', 'required|max_length[20]|min_length[6]');
		$this->form_validation->set_rules('conf_pass', 'Repeat Password', 'required|matches[passbaru]');

		if ($this->form_validation->run() != true) {
			$this->load->view('guru/v_guru_header', $title);
			$this->load->view('guru/v_guru_change_password');
			$this->load->view('guru/v_guru_footer');	
		} else {
			$sql = $this->db->select('*')->from('tbl_user')->where('username', $this->session->userdata('username'))->get();

			foreach ($sql->result() as $my_info) {
				$db_id = $my_info->id;
				$db_password = $my_info->password;
			}

			if ($this->input->post('passlama') == $db_password ){
				$new_pw = $this->input->post('passbaru');

				$update = $this->db->query("UPDATE `tbl_user` SET `password` = '$new_pw' WHERE `id` = '$db_id'");
				redirect('logout', 'refresh');
			} else {
				echo '<script>alert("Password gagal diubah, Silahkan coba lagi");history.go(-1);</script>';
			}
		}
	}

	function proses_insert_email_guru()
	{
		$title['title'] = "Tambah Email";
		$this->model_user->user_page();
		
		$this->form_validation->set_rules('email_baru', 'New Email', 'required|max_length[40]|min_length[6]');

		if ($this->form_validation->run() != true) {
			$this->load->view('guru/v_guru_header', $title);
			$this->load->view('guru/v_guru_change_email');
			$this->load->view('guru/v_guru_footer');	
		} else {
			$sql = $this->db->select('*')->from('tbl_user')->where('username', $this->session->userdata('username'))->get();

			foreach ($sql->result() as $my_info) {
				$db_id = $my_info->id_guru;
				$db_email = $my_info->email;
			}

			if ($db_email == NULL ){
				$new_email = $this->input->post('email_baru');

				$update = $this->db->query("UPDATE `tbl_user` SET `email` = '$new_email' WHERE `id_guru` = '$db_id'");
				redirect('logout', 'refresh');
			} else {
				echo '<script>alert("Email gagal ditambahkan karena email sudah didaftarkan :)");history.go(-1);</script>';
			}
		}	
	}

		function proses_insert_email_siswa()
	{
		$title['title'] = "Tambah Email";

		$this->model_user->user_page();

		$this->form_validation->set_rules('email_baru', 'New Email', 'required|max_length[40]|min_length[6]');

		if ($this->form_validation->run() != true) {
			$this->load->view('siswa/v_siswa_header', $title);
			$this->load->view('siswa/v_siswa_change_email');
			$this->load->view('siswa/v_siswa_footer');	
		} else {
			$sql = $this->db->select('*')->from('tbl_user')->where('username', $this->session->userdata('username'))->get();

			foreach ($sql->result() as $my_info) {
				$db_id = $my_info->id;
				$db_email = $my_info->email;
			}

			// if ($this->input->post('email_baru') == $db_email_user ){
			if ($db_email == NULL ){
				$new_email = $this->input->post('email_baru');

				$update = $this->db->query("UPDATE `tbl_user` SET `email` = '$new_email' WHERE `id` = '$db_id'");
				redirect('logout', 'refresh');
			} else {
				echo '<script>alert("Email gagal ditambahkan karena email sudah ada :)");history.go(-1);</script>';
			}
		}	
	}

	function pengaturan_guru()
	{
		$title['title'] = "Pengaturan";

		$this->load->view('guru/v_guru_header', $title);
		$this->load->view('guru/v_guru_settings');
		$this->load->view('guru/v_guru_footer');
	}
}

?>