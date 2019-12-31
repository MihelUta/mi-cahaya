<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Class index
*/
class Home extends CI_Controller
{

	function index()
	{
        $this->load->helper('text');
		$title['title'] = "Home";

		$data['list_berita'] = $this->model_konten_info->view_all_berita()->result();
		$data['list_pengumuman'] = $this->model_konten_info->view_all_pengumuman()->result();

		$this->load->view('header', $title);
		$this->load->view('v_home', $data);
		$this->load->view('footer');
	}
    
    function cari()
    {
        if(isset($_GET['term'])){
            $result = $this->model_konten_info->search($_GET['term']);
            if(count($result) > 0) {
                foreach ($result as $jdl) {
                    $arr_result[] = $jdl->judul;
                }
                echo json_encode($arr_result);
            }
        }
    }

    function proses_cari()
    {
    	$title['title'] = "Pencarian";
    	$judul = $this->input->post('cari');

    	if (isset($judul) AND !empty($judul)) {
    		$data['list_search'] = $this->model_konten_info->search($judul);
    		$this->load->view('header', $title);
    		$this->load->view('v_search_berita', $data);
    		$this->load->view('footer');
    	} else if (!isset($judul) AND !empty($judul)) {
    		$this->load->view('header', $title);
    		$this->load->view('v_search_berita', $data);
    		$this->load->view('footer');
    	} else {
    		redirect('home');
    	}
    }

}

?>