<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

/**
* class for gallery
*/
class Gallery extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

	}

	function index()
	{
		$title['title'] = "Galeri";
		$gambar['daftar_gambar'] = $this->model_konten_info->view_all_galeri()->result();

		$this->load->view('header', $title);
		$this->load->view('v_gallery', $gambar);
		$this->load->view('footer');
	}
}

 ?>