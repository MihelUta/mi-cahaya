<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

	/**
	* class Profile
	*/
	class Profile extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
		}
		
		function sejarah()
		{
			$data['title'] = "Sejarah";
			$this->load->view('header', $data);
			$this->load->view('v_sejarah');
			$this->load->view('footer');
		}
		
		function visimisi()
		{
			$data['title'] = "Visi Misi";
			$this->load->view('header', $data);
			$this->load->view('v_visimisi');
			$this->load->view('footer');
		}

		function staffguru()
		{
			$this->load->model('model_pengguna');

			$data['title'] = "Staff & Guru";
			$data_guru['list_guru'] = $this->model_pengguna->view_all_guru()->result();

			$this->load->view('header', $data);
			$this->load->view('v_staffguru', $data_guru);
			$this->load->view('footer');
		}

		function program_belajar()
		{
			$data['title'] = "Program Belajar";
			$this->load->view('header', $data);
			$this->load->view('v_program_belajar');
			$this->load->view('footer');
		}

		function kurikulum()
		{
			$data['title'] = "Kurikulum";
			$this->load->view('header', $data);
			$this->load->view('v_kurikulum');
			$this->load->view('footer');
		}
	}

 ?>