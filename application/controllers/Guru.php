<?php if (! defined('BASEPATH')) exit ('No direct script access allowed'); 
	
	/**
	* class Guru
	*/
	class Guru extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();

			if ($this->session->userdata('username') == "") {
				redirect('home');
			}
			$this->load->helper('text');
		}
		
		function index()
		{
			$title['title'] = "Guru";
			$guru = $this->session->userdata['id_user'];
			
			$data['guru'] = $this->model_pengguna->view_guru($guru)->result();
			foreach ($data['guru'] as $gr) {
					// echo $gr->wali_kelas;
					$data['siswa'] = $this->model_pengguna->view_siswa_kelas($gr->id_kelas)->result();
			}
			$siswa = $this->input->post("idsiswa");
			$data['daftar_kegiatan'] = $this->model_pengguna->view_all_kegiatan($siswa)->result();


			$this->load->view('guru/v_guru_header', $title);
			$this->load->view('guru/v_guru',$data);
			$this->load->view('guru/v_guru_footer');
		}

		function cari_kegiatan_siswa()
		{
			$title['title'] = "Guru";

			$guru = $this->session->userdata['id_user'];
			
			$data['guru'] = $this->model_pengguna->view_guru($guru)->result();
			$data['siswa'] = $this->model_pengguna->view_all_siswa()->result();
			
			$siswa = $this->input->post("idsiswa");
			$bulan = $this->input->post("idbulan");
			$data['k_siswa'] = $this->model_pengguna->view_siswaVGuru($siswa)->result();
			$data['daftar_kegiatan'] = $this->model_pengguna->view_all_kegiatanVGuru($siswa)->result();

			$this->load->view('guru/v_guru_header', $title);
			$this->load->view('guru/v_guru',$data);
			$this->load->view('guru/v_guru_footer');
		}

		function cetak_laporan_kegiatan() {
        	if ($this->input->post("cetakPDF")== "pdf") {
        		// load dompdf
				// echo "sayaaaaaa";
		        $this->load->helper('domppdf');
		        // $data;
		        // $i = 0;
		        // foreach ($_POST['data'] as $value) {
		        //     $data[$i] = $value;
		        //     $i++;
		        // }
		        // $bulanAwal = $_POST['bulanAwal'];
		        // $tahunAwal = $_POST['tahunAwal'];
		        // $bulanAkhir = $_POST['bulanAkhir'];
		        // $tahunAkhir = $_POST['tahunAkhir'];
		        // $tglAwal = '01';
		        // $tglAkhir = '31';
		        // foreach ($data as $value) {
		        //     if ($value == "dataPetugas") {
		        //         $data['petugas'] = $this->Laporan_model->getDataPetugas($tahunAwal.$bulanAwal.$tglAwal,$tahunAkhir.$bulanAkhir.$tglAkhir);
		        //     } else if ($value == "dataNasabah") {
		        //         $data['nasabah'] = $this->Laporan_model->getDataNasabah($tahunAwal.$bulanAwal.$tglAwal,$tahunAkhir.$bulanAkhir.$tglAkhir);
		        //     }else if($value == "dataSampah"){
		        //         $data['sampah'] = $this->Laporan_model->getDataSampah();
		        //     }else if($value == "setoranSampahNasabah"){
		        //         $data['setoran'] = $this->Laporan_model->getSetoranSampahNasabah($tahunAwal.$bulanAwal.$tglAwal,$tahunAkhir.$bulanAkhir.$tglAkhir);
		        //     }else if($value=="penjualanSampah"){
		        //         $data['penjualan'] = $this->Laporan_model->getPenjualanSampah($tahunAwal.$bulanAwal.$tglAwal,$tahunAkhir.$bulanAkhir.$tglAkhir);
		        //     }
		        // }

		        // $html = $this->load->view('guru/laporan_kegiatan', $data, TRUE);
		        // $filename = "laporan kegiatan $siswa bulan $bulan";
		        $this->load->model('model_konten_info');
		        $this->load->library('dompdf_gen');

		        $siswa = $this->input->post("id_siswa");
		        $bulan = $this->input->post("bulan");
		        $tahun = $this->input->post("tahun");
				$data['siswa'] = $this->model_pengguna->view_siswa($siswa)->result();
				$data['bulan'] = $this->input->post("bulan");
				$data['tahun'] = $this->input->post("tahun");
				$data['daftar_kegiatan'] = $this->model_pengguna->view_all_kegiatan($siswa)->result();

		        $html = $this->load->view("guru/laporan_kegiatan",$data,TRUE);
		        // $this->load->view("guru/laporan_kegiatan",$data);
		        // $this->load->view("guru/laporan_kegiatan",$data);
		        // $html = $this->load->view('v_home', $data, TRUE);
		        $filename = "laporan kegiatan $siswa bulan $bulan tahun $tahun";
		        // $filename = "laporan kegiatan";
		        $paper = 'A4';
		        $orientation = 'potrait';
		        // pdf_create($html, $filename, $paper, $orientation);


		        $paper_size  = 'A4'; //paper size
		        // $orientation = 'potrait'; //tipe format kertas
		        // // $html = $this->output->get_output();
		 
		        $this->dompdf->set_paper($paper_size, $orientation);
		        // //Convert to PDF
		        $this->dompdf->load_html($html);
		        $this->dompdf->render();
		        $this->dompdf->stream("$filename", array('Attachment'=>1));

		        redirect('guru');
        	}else if ($this->input->post("cetakEXCEL")== "excel") {
        		$this->load->model('model_konten_info');

        		$siswa = $this->input->post("id_siswa");
		        $bulan = $this->input->post("bulan");
		        $tahun = $this->input->post("tahun");
				$data['siswa'] = $this->model_pengguna->view_siswa($siswa)->result();
				$data['bulan'] = $this->input->post("bulan");
				$data['tahun'] = $this->input->post("tahun");
				$data['daftar_kegiatan'] = $this->model_pengguna->view_all_kegiatan($siswa)->result();

		        $this->load->view("guru/laporan_kegiatan_excel",$data);
        	}
    	}

    	

	}

 ?>