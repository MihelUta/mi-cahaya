<?php if (! defined('BASEPATH')) exit('No direct script access allowed');


	/**
	* class Admin
	*/
	class Admin extends CI_Controller
	{
		function __construct(){
			parent::__construct();
			$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
			$this->load->library('encryption');
			if ($this->session->userdata('username') == "") {
				redirect('home');
			}

			$this->load->helper('text');
		}
		
		function index()
		{
			$data['id_user'] = $this->session->userdata('id_user');

			$data['daftar_berita'] = $this->model_konten_info->view_all_berita()->result();
			$data['daftar_pengumuman'] = $this->model_konten_info->view_all_pengumuman()->result();
			$data['daftar_pesan'] = $this->model_pesan->view_all_pesan()->result();
			$data['daftar_guru'] = $this->model_pengguna->view_all_guru()->result();
			$data['daftar_siswa'] = $this->model_pengguna->view_all_siswa()->result();

			$this->load->view('admin/v_admin_header', $data);
			$this->load->view('admin/v_admin_index');
			$this->load->view('admin/v_admin_footer');
			
		}

		function add_berita()
		{

			$data['username'] = $this->session->userdata('username');
			$error['error'] = '';

			$this->load->view('admin/v_admin_header');
			$this->load->view('admin/v_admin_add_berita', $error);
			$this->load->view('admin/v_admin_footer');
		}

		function proses_add_berita()
		{
			$nmfile = "IMG_file_" .time();
			$config['upload_path']			= './uploads/';
            $config['allowed_types']        = 'png|jpg|jpeg|bmp';
            //$config['max_size']				= '3048';
            // $config['max_width']			= '2000';
            // $config['max_height']			= '1400';
        	$config['file_name']			= $nmfile;
        	
            $this->load->library('upload', $config);
            	
            if ($this->upload->do_upload('file')) {

            	$img = $this->upload->data();
            	$gambar = $img['file_name'];
            	$alamat = $img['full_path'];

            	$this->image_resize($alamat, $gambar);

            	$judul = $this->input->post('judul', TRUE);
            	$deskripsi = $this->input->post('deskripsi', TRUE);

            	$data_gambar = array(
            		'nama' => $gambar,
            		'jenis' => "berita",
            		'alamat' => $alamat);
            	$this->model_konten_info->insert_foto($data_gambar);

            	$data_berita = array(
            		'judul' => $judul,
            		'deskripsi' => $deskripsi,
            		'foto' => $gambar
            		);
            	$this->model_konten_info->insert_berita($data_berita);

            	redirect(site_url('dashboard/view_berita'));

            	} else {
            		$error = array ('error' => $this->upload->display_errors());

            		$this->load->view('admin/v_admin_header');
            		$this->load->view('admin/v_admin_add_berita', $error);
            		$this->load->view('admin/v_admin_footer');
                }	
//            }
            
		}

		function image_resize($path, $file)
		{
			$config_resize = array();
			$config_resize['image_library']		=	'gd2';
			$config_resize['source_image']		= 	$path;
			//$config_resize['create_thumb']		= 	TRUE;
			$config_resize['maintian_ratio']	= 	TRUE;
			$config_resize['width']				=	250;
			$config_resize['height']			= 	250;
			$config_resize['new_image']			= './uploads/thumb/'.$file;

			$this->load->library('image_lib', $config_resize);
			$this->image_lib->resize();
		}

		function view_berita()
		{
			$data['username'] = $this->session->userdata('username');

			$data['daftar_berita'] = $this->model_konten_info->view_all_berita()->result();

			$this->load->view('admin/v_admin_header');
			$this->load->view('admin/v_admin_view_berita', $data);
			$this->load->view('admin/v_admin_footer');
		}

		function edit_berita($id_berita)
		{
			$data['berita'] = $this->model_konten_info->select_by_id($id_berita)->row();

			$this->load->view('admin/v_admin_header');
			$this->load->view('admin/v_admin_edit_berita', $data);
			$this->load->view('admin/v_admin_footer');
		}

		function proses_edit_berita()
		{
			$nmfile = "IMG_file_" .time();
			$config['upload_path']			= './uploads/';
            $config['allowed_types']        = 'png|jpg|jpeg|bmp';
            $config['max_size']				= '2048';
            $config['max_width']			= '1380';
            $config['max_height']			= '768';
            $config['file_name']			= $nmfile;

            $judul = $this->input->post('judul', TRUE);
            $deskripsi = $this->input->post('deskripsi', TRUE);
            $id_berita = $this->input->post('id_berita', TRUE);
        	
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {

            	$img = $this->upload->data();
            	$gambar = $img['file_name'];
            	$alamat = $img['full_path'];

            	$this->image_resize($alamat, $gambar);
            	$data_gambar = array(
            		'nama' => $gambar,
            		'jenis' => "berita",
            		'alamat' => $alamat
            		);
            	$this->model_konten_info->insert_foto($data_gambar);

            	$data = array(
            		'judul' => $judul,
            		'deskripsi' => $deskripsi,
            		'foto' => $gambar
            		);

				$this->model_konten_info->update_berita($id_berita, $data);

            	redirect(site_url('admin/view_berita'));

            } else {

            		echo '<script>alert("Gagal memperbarui data, Silahkan coba lagi!");history.go(-1);</script>';
                	}
		}

		function delete_berita($id_berita)
		{
			$this->model_konten_info->delete_berita($id_berita);
			redirect(site_url('admin/view_berita'));
		}

		function add_pengumuman()
		{
			$data['username'] = $this->session->userdata('username');
			$error['error'] = '';
			$this->load->view('admin/v_admin_header');
			$this->load->view('admin/v_admin_add_pengumuman', $error);
			$this->load->view('admin/v_admin_footer');
		}

		function proses_add_pengumuman()
		{
			$config['upload_path']			= './uploads/';
            $config['allowed_types']        = 'png|jpg|jpeg|bmp';
        	
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {

            	$img = $this->upload->data();
            	$gambar = $img['file_name'];
            	$alamat = $img['full_path'];

            	$this->image_resize($alamat, $gambar);

            	$judul = $this->input->post('judul', TRUE);
            	$deskripsi = $this->input->post('deskripsi', TRUE);

            	$data_gambar = array(
            		'nama' => $gambar,
            		'jenis' => "pengumuman",
            		'alamat' => $alamat);
            	$this->model_konten_info->insert_foto($data_gambar);

            	$data_pengumuman = array(
            		'judul' => $judul,
            		'deskripsi' => $deskripsi,
            		'foto' => $gambar
            		);
            	$this->model_konten_info->insert_pengumuman($data_pengumuman);

            	redirect(site_url('admin/view_pengumuman'));

            } else {
            		$error = array('error' => $this->upload->display_errors());
            		$this->load->view('admin/v_admin_header');
            		$this->load->view('admin/v_admin_add_pengumuman', $error);
            		$this->load->view('v_admin_footer');
                	}
		}

		function view_pengumuman()
		{
			$data['username'] = $this->session->userdata('username');

			$data['daftar_pengumuman'] = $this->model_konten_info->view_all_pengumuman()->result();

			$this->load->view('admin/v_admin_header');
			$this->load->view('admin/v_admin_view_pengumuman', $data);
			$this->load->view('admin/v_admin_footer');
		}

		function edit_pengumuman($id_pengumuman)
		{
			$data['daftar_pengumuman'] = $this->model_konten_info->select_by_id_pengumuman($id_pengumuman)->row();

			$this->load->view('admin/v_admin_header');
			$this->load->view('admin/v_admin_edit_pengumuman', $data);
			$this->load->view('admin/v_admin_footer');
		}

		function proses_edit_pengumuman()
		{
			$config['upload_path']			= './uploads/';
            $config['allowed_types']        = 'png|jpg|jpeg|bmp';

            $judul = $this->input->post('judul', TRUE);
            $deskripsi = $this->input->post('deskripsi', TRUE);
            $id_pengumuman = $this->input->post('id_pengumuman', TRUE);
        	
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {

            	$img = $this->upload->data();
            	$gambar = $img['file_name'];
            	$alamat = $img['full_path'];

            	$this->image_resize($alamat, $gambar);
            	$data_gambar = array(
            		'nama' => $gambar,
            		'jenis' => "pengumuman",
            		'alamat' => $alamat
            		);
            	$this->model_konten_info->insert_foto($data_gambar);

            	$data = array(
            		'judul' => $judul,
            		'deskripsi' => $deskripsi,
            		'foto' => $gambar
            		);

				$this->model_konten_info->update_pengumuman($id_pengumuman, $data);

            	redirect(site_url('admin/view_pengumuman'));

            } else {

            		echo '<script>alert("Gagal memperbarui pengumuman, Silahkan coba lagi!");history.go(-1);</script>';
                	}
		}

		function delete_pengumuman($id_pengumuman)
		{
			$this->model_konten_info->delete_pengumuman($id_pengumuman);
			redirect(site_url('admin/view_pengumuman'));
		}

		function view_pesan()
		{
			$data['list_pesan'] = $this->model_pesan->view_all_pesan()->result();

			$this->load->view('admin/v_admin_header');
			$this->load->view('admin/v_admin_view_pesan', $data);
			$this->load->view('admin/v_admin_footer');
		}

		function hapus_pesan($id_pesan){
			$this->model_pesan->delete_pesan($id_pesan);
			redirect(site_url('Admin/view_pesan'));
		}

		// GURU
		function view_guru()
		{
			$data['daftar_guru'] = $this->model_pengguna->view_all_guru()->result();

			$this->load->view('admin/v_admin_header');
			$this->load->view('admin/v_admin_view_guru', $data);
			$this->load->view('admin/v_admin_footer');
		}

		function edit_guru($id_guru)
		{
			$data['daftar_guru'] = $this->model_pengguna->select_by_id_guru($id_guru)->row();

			$this->load->view('admin/v_admin_header');
			$this->load->view('admin/v_admin_edit_guru', $data);
			$this->load->view('admin/v_admin_footer');
		}

		function proses_edit_guru()
		{
			$data['nip'] = $this->input->post('nip');
			$data['nuptk'] = $this->input->post('nuptk');
			$data['nik'] = $this->input->post('nik');
			$data['nama'] = $this->input->post('nama');
			$data['ttl'] = $this->input->post('ttl');
			$data['jabatan'] = $this->input->post('jabatan');
			$data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
			$data['id_kelas'] = $this->input->post('wali_kelas');
			$data['foto'] = $this->input->post('foto');
			$id_guru = $this->input->post('id_guru');
			$this->model_pengguna->update_guru($id_guru, $data);
			redirect(site_url('admin/view_guru'));
		}

		function hapus_guru($id_guru)
		{
			$this->model_pengguna->delete_guru($id_guru);
			redirect(site_url('admin/view_guru'));
		}

		function add_guru()
		{
			$data['username'] = $this->session->userdata('username');
			
			$this->load->view('admin/v_admin_header');
			$this->load->view('admin/v_admin_add_guru');
			$this->load->view('admin/v_admin_footer');
		}

		function add_guru_excel()
		{
			$data['username'] = $this->session->userdata('username');
			
			$this->load->view('admin/v_admin_header');
			$this->load->view('admin/v_admin_add_guru_excel');
			$this->load->view('admin/v_admin_footer');
		}

		function proses_add_guru()
		{
			$dataU['username'] = $this->input->post('username');
			$dataU['password'] = $this->input->post('password');
			$dataU['level'] = "guru";
			$this->model_pengguna->add_user($dataU);
			$id_guru = $this->db->insert_id();
			$data['id_user'] = $id_guru;
			$data['nip'] = $this->input->post('nip');
			$data['nuptk'] = $this->input->post('nuptk');
			$data['nik'] = $this->input->post('nik');
			$data['nama'] = $this->input->post('nama');
			$data['ttl'] = $this->input->post('ttl');
			$data['jabatan'] = $this->input->post('jabatan');
			$data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
			$data['id_kelas'] = $this->input->post('wali_kelas');
			$data['foto'] = $this->input->post('foto');
			$this->model_pengguna->add_guru($data);
			redirect(site_url('admin/view_guru'));
		}

		// SISWA

		function view_siswa()
		{
			$data['daftar_siswa'] = $this->model_pengguna->view_all_siswa()->result();

			$this->load->view('admin/v_admin_header');
			$this->load->view('admin/v_admin_view_siswa', $data);
			$this->load->view('admin/v_admin_footer');
		}

		function add_siswa()
		{
			$data['username'] = $this->session->userdata('username');
			
			$this->load->view('admin/v_admin_header');
			$this->load->view('admin/v_admin_add_siswa');
			$this->load->view('admin/v_admin_footer');
		}

		function add_siswa_excel()
		{

			$data['username'] = $this->session->userdata('username');
			
			$this->load->view('admin/v_admin_header');
			$this->load->view('admin/v_admin_add_siswa_excel');
			$this->load->view('admin/v_admin_footer');
		}

		

		function proses_add_siswa()
		{
			$dataU['username'] = $this->input->post('username');
			$dataU['password'] = $this->input->post('password');
			$dataU['level'] = "siswa";
			$this->model_pengguna->add_user($dataU);
			$id_siswa = $this->db->insert_id();
			$data['id_user'] = $id_siswa;
			$data['nis_lokal'] = $this->input->post('nis_lokal');
			$data['nisn'] = $this->input->post('nisn');
			$data['nik'] = $this->input->post('nik');
			$data['nama'] = $this->input->post('nama');
			$data['ttl'] = $this->input->post('ttl');
			$data['alamat'] = $this->input->post('alamat');
			$data['id_kelas'] = $this->input->post('kelas');
			$data['foto'] = $this->input->post('foto');
			$this->model_pengguna->add_siswa($data);
			redirect(site_url('admin/view_siswa'));
		}

		function edit_siswa($id_siswa)
		{		
			$data['daftar_siswa'] = $this->model_pengguna->select_by_id_siswa($id_siswa)->row();

			$this->load->view('admin/v_admin_header');
			$this->load->view('admin/v_admin_edit_siswa', $data);
			$this->load->view('admin/v_admin_footer');
		}

		function proses_edit_siswa()
		{
			$data['nama'] = $this->input->post('nama');
			$data['nis_lokal'] = $this->input->post('nis_lokal');
			$data['nisn'] = $this->input->post('nisn');
			$data['nik'] = $this->input->post('nik');
			$data['ttl'] = $this->input->post('ttl');
			$data['alamat'] = $this->input->post('alamat');
			$data['id_kelas'] = $this->input->post('kelas');
			$data['foto'] = $this->input->post('foto');
			$id_siswa = $this->input->post('id_siswa');
			$this->model_pengguna->update_siswa($id_siswa, $data);
			redirect(site_url('admin/view_siswa'));
		}

		function hapus_siswa($id_siswa)
		{
			$this->model_pengguna->delete_siswa($id_siswa);
			redirect(site_url('admin/view_siswa'));
		}

		// GALLERY
		function add_gallery()
		{
			$data['username'] = $this->session->userdata('username');
			$data['daftar_gambar'] = $this->model_konten_info->view_all_galeri()->result();

			$this->load->view('admin/v_admin_header');
			$this->load->view('admin/v_admin_gallery', $data);
			$this->load->view('admin/v_admin_footer');

		}

		function proses_add_gallery()
		{
			$namafile = "IMG_";

			$config['upload_path']			= './uploads/';
            $config['allowed_types']        = 'png|jpg|jpeg|bmp';
            $config['file_name']			= $namafile;
        	
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {

            	$img = $this->upload->data();
            	$gambar = $img['file_name'];
            	$alamat = $img['full_path'];

            	$this->image_resize($alamat, $gambar);
            	
            	$caption = $this->input->post('caption', TRUE);

            	$data_gambar = array(
            		'nama' => $gambar,
            		'caption' => $caption,
            		'path' => $alamat);

            	$this->model_konten_info->insert_galeri($data_gambar);

            	redirect(site_url('admin/add_gallery'));

            } else {

            		echo '<script>alert("Gagal menyimpan foto ke galeri, Silahkan coba lagi!");history.go(-1);</script>';
                	}
		}

		function delete_gambar($id_galeri)
		{
			$this->model_konten_info->delete_img($id_galeri);
			redirect(site_url('admin/add_gallery'));
		}

		function edit_gambar($id_galeri)
		{
			$data['daftar_galeri'] = $this->model_konten_info->select_by_id_gambar($id_galeri)->row();

			$this->load->view('admin/v_admin_header');
			$this->load->view('admin/v_admin_edit_gallery', $data);
			$this->load->view('admin/v_admin_footer');
		}

		function proses_edit_gambar()
		{
			$namafile = "IMG_";
			$config['upload_path']			= './uploads/';
            $config['allowed_types']        = 'png|jpg|jpeg|bmp';
            $config['file_name']			= $namafile;

             $caption = $this->input->post('caption', TRUE);
        	
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {

            	$img = $this->upload->data();
            	$gambar = $img['file_name'];
            	$alamat = $img['full_path'];

            	$data = array(
            		'nama' => $gambar,
            		'caption' => $caption,
            		'path' => $alamat
            		);

				$this->model_konten_info->update_img($id_galeri, $data);

            	redirect(site_url('admin/add_gallery'));

            } else {

            		echo '<script>alert("Gagal memperbarui galeri, Silahkan coba lagi!");history.go(-1);</script>';
                	}
		}

		public function upload_siswa_excel(){
        	$fileName = time().$_FILES['file']['name'];
         
	        $config['upload_path'] = './assets/'; //buat folder dengan nama assets di root folder
	        $config['file_name'] = $fileName;
	        $config['allowed_types'] = 'xls|xlsx|csv';
	        $config['max_size'] = 10000;
	         
	        $this->load->library('upload');
	        $this->upload->initialize($config);
	         
	        if(! $this->upload->do_upload('file') )
	        $this->upload->display_errors();
	             
	        $media = $this->upload->data('file');
	        $inputFileName = './assets/'.$fileName;
	        // $inputFileName = './assets/'.$media['file_name'];
	        try {
	                $inputFileType = IOFactory::identify($inputFileName);
	                $objReader = IOFactory::createReader($inputFileType);
	                $objPHPExcel = $objReader->load($inputFileName);
	            } catch(Exception $e) {
	                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
	            }
	 
	            $sheet = $objPHPExcel->getSheet(0);
	            $highestRow = $sheet->getHighestRow();
	            $highestColumn = $sheet->getHighestColumn();
	             
	            for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
	                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
	                                                NULL,
	                                                TRUE,
	                                                FALSE);
	                                                 
	                //Sesuaikan sama nama kolom tabel di database                                
	                //  $data = array(
	                //     "idimport"=> $rowData[0][0],
	                //     "nama"=> $rowData[0][1],
	                //     "alamat"=> $rowData[0][2],
	                //     "kontak"=> $rowData[0][3]
	                // );
	                 
	                $dataU['username'] = $rowData[0][1];
					$dataU['password'] = $rowData[0][2];
					$dataU['level'] = "siswa";
					$this->model_pengguna->add_user($dataU);
					$id_siswa = $this->db->insert_id();
					$data['id_user'] = $id_siswa;
					$data['nis_lokal'] = $rowData[0][4];
					$data['nisn'] = $rowData[0][5];
					$data['nik'] = $rowData[0][6];
					$data['nama'] = $rowData[0][3];
					$data['ttl'] = $rowData[0][7];
					$data['alamat'] = $rowData[0][8];
					$data['id_kelas'] = $rowData[0][9];
					$data['foto'] = $rowData[0][10];
					
					

	                //sesuaikan nama dengan nama tabel
	                $this->model_pengguna->add_siswa($data);

	                // delete_files($media['file_path']);
	                     
	            }
	        // delete_files($media['file_path']); 
	        unlink("./assets/$fileName");
	        redirect(site_url('admin/view_siswa'));
    	}

    	public function upload_guru_excel(){
        	$fileName = time().$_FILES['file']['name'];
         
	        $config['upload_path'] = './assets/'; //buat folder dengan nama assets di root folder
	        $config['file_name'] = $fileName;
	        $config['allowed_types'] = 'xls|xlsx|csv';
	        $config['max_size'] = 10000;
	         
	        $this->load->library('upload');
	        $this->upload->initialize($config);
	         
	        if(! $this->upload->do_upload('file') )
	        $this->upload->display_errors();
	             
	        $media = $this->upload->data('file');
	        $inputFileName = './assets/'.$fileName;
	        // $inputFileName = './assets/'.$media['file_name'];
	        try {
	                $inputFileType = IOFactory::identify($inputFileName);
	                $objReader = IOFactory::createReader($inputFileType);
	                $objPHPExcel = $objReader->load($inputFileName);
	            } catch(Exception $e) {
	                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
	            }
	 
	            $sheet = $objPHPExcel->getSheet(0);
	            $highestRow = $sheet->getHighestRow();
	            $highestColumn = $sheet->getHighestColumn();
	             
	            for ($row = 2; $row <= $highestRow; $row++){                  
	            //  Read a row of data into an array                 
	                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,NULL,TRUE,FALSE);

	                $dataU['username'] = $rowData[0][1];
					$dataU['password'] = $rowData[0][2];
					$dataU['email'] = "-";
					$dataU['level'] = "guru";
					$this->model_pengguna->add_user($dataU);
					$id_guru = $this->db->insert_id();
					$data['id_user'] = $id_guru;
					$data['nip'] = $rowData[0][3];
					$data['nuptk'] = $rowData[0][4];
					$data['nik'] = $rowData[0][5];
					$data['nama'] = $rowData[0][6];
					$data['ttl'] = $rowData[0][7];
					$data['jabatan'] = $rowData[0][8];
					$data['jenis_kelamin'] = $rowData[0][9];
					$data['id_kelas'] = $rowData[0][10];
					$data['foto'] = $rowData[0][11];
					
	                //sesuaikan nama dengan nama tabel
					$this->model_pengguna->add_guru($data);
	            }
	        // delete_files($media['file_path']); 
	        unlink("./assets/$fileName");
	        redirect(site_url('admin/view_guru'));
    	}

    	// Profil

    	function view_sejarah()
		{
			// $data['list_pesan'] = $this->model_pesan->view_all_pesan()->result();

			$this->load->view('admin/v_admin_header');
			$this->load->view('admin/v_admin_view_sejarah');
			$this->load->view('admin/v_admin_footer');
		}

		function view_visimisi()
		{
			// $data['list_pesan'] = $this->model_pesan->view_all_pesan()->result();

			$this->load->view('admin/v_admin_header');
			$this->load->view('admin/v_admin_view_visimisi');
			$this->load->view('admin/v_admin_footer');
		}

		function view_programbelajar()
		{
			// $data['list_pesan'] = $this->model_pesan->view_all_pesan()->result();

			$this->load->view('admin/v_admin_header');
			$this->load->view('admin/v_admin_view_programbelajar');
			$this->load->view('admin/v_admin_footer');
		}

		function view_kurikulum()
		{
			// $data['list_pesan'] = $this->model_pesan->view_all_pesan()->result();

			$this->load->view('admin/v_admin_header');
			$this->load->view('admin/v_admin_view_kurikulum');
			$this->load->view('admin/v_admin_footer');
		}


	}
 ?>