<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

	/**
	* class Contact
	*/
	class Contact extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}
		
		function index()
		{
			$data['title'] = "Kontak";
			$this->load->view('header', $data);
			$this->load->view('v_contact');
			$this->load->view('footer');
		}

		function proses_add_pesan()
		{
            $this->form_validation->set_rules('nama', 'Name', 'trim|required|min_length[3]|max_length[150]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[7]|max_length[150]|valid_email');
            $this->form_validation->set_rules('no_telp', 'No. Telephone', 'trim|required|min_length[7]|max_length[12]');
            $this->form_validation->set_rules('pesan', 'Message', 'trim|required|min_length[10]');
            
            if  ($this->form_validation->run() != true){
                $title['title'] = "Kontak";
            
                $this->load->view('header', $title);
                $this->load->view('v_contact');
                $this->load->view('footer');
            } else {
                $data['nama'] = $this->input->post('nama');
                $data['email'] = $this->input->post('email');
                $data['no_telp'] = $this->input->post('no_telp');
                $data['pesan'] = $this->input->post('pesan');

                $this->model_pesan->insert_pesan($data);

                redirect(site_url('contact'));
    
                }
                
            
        }
    }


 ?>