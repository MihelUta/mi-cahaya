<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

/**
* class Single Controller
*/
class Single extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('model_konten_info');
	}

	function select_id($id_pengumuman)
	{
		$data['pengumuman'] = $this->model_konten_info->select_by_id_pengumuman($id_pengumuman)->row();
		$title['title'] = "Pengumuman";

		$this->load->view('header', $title);
		$this->load->view('v_single_page_pengumuman', $data);
		$this->load->view('footer');
	}

	function select_id_berita($id_berita)
	{
		$data['berita'] = $this->model_konten_info->select_by_id($id_berita)->row();
		$title['title'] = "Berita Kegiatan";

		$this->load->view('header', $title);
		$this->load->view('v_single_page_berita', $data);
		$this->load->view('footer');
	}


}
?>