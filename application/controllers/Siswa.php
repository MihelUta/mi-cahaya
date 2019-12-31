<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

class Siswa extends CI_Controller {

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
		$title['title'] = "Siswa";

		$siswa = $this->session->userdata['id_user'];
		$data['siswa'] = $this->model_pengguna->view_siswa($siswa)->result();
		$data['daftar_kegiatan'] = $this->model_pengguna->view_all_kegiatan($siswa)->result();

		$this->load->view('siswa/v_siswa_header', $title);
		$this->load->view('siswa/v_siswa',$data);
		$this->load->view('siswa/v_siswa_footer');
	}

	function proses_add_kegiatan()
		{	
				if(isset($_POST['simpan']))   
				{   
					$jumlah_data = count($this->input->post("tanggal"));
					$j=1;
					for ($i=0; $i < $jumlah_data; $i++) {
						
						$subuh = "s_subuh".$j;
						$dzuhur = "s_dzuhur".$j;
						$ashar = "s_ashar".$j;
						$magrib = "s_maghrib".$j;
						$isya = "s_isya".$j;
						// $data['nama'] = $this->input->post("id_siswa[$i]");
						$dataK['id_siswa'] = $this->input->post("id_siswa");
						$dataK['tanggal'] = $this->input->post("tanggal[$i]");
						$this->model_pengguna->insert_kegiatan($dataK);
						$id_kegiatan = $this->db->insert_id();
						$dataS['id_kegiatan'] = $id_kegiatan;
						$dataS['s_subuh'] = $this->input->post("$subuh");
						$dataS['s_dzuhur'] = $this->input->post("$dzuhur");
						$dataS['s_ashar'] = $this->input->post("$ashar");
						$dataS['s_maghrib'] = $this->input->post("$magrib");
						$dataS['s_isya'] = $this->input->post("$isya");
						$this->model_pengguna->insert_kegiatanSalat($dataS);
						$dataM['id_kegiatan'] = $id_kegiatan;
						$dataM['bacaanAwal'] = $this->input->post("bacaanAwal[$i]");
						$dataM['bacaanAkhir'] = $this->input->post("bacaanAkhir[$i]");
						$this->model_pengguna->insert_kegiatanMengaji($dataM);
						// echo "$subuh : ". $data['subuh'];
						// echo "$dzuhur : ". $data['dzuhur'];
						// echo "$ashar : ". $data['ashar'];
						// echo "$magrib : ". $data['magrib'];
						// echo "$isya : ". $data['isya'];
						// echo "mengaji : ". $data['mengaji'];
						// echo "<br>";
						$j++;
					}
					redirect("siswa");
					
				}else  if(isset($_POST['perbaharui']))   
				{
					// echo "perbaharui";
					$jumlah_data = count($this->input->post("tanggal"));
					$j=1;
					for ($i=0; $i < $jumlah_data; $i++) {
						
						$subuh = "s_subuh".$j;
						$dzuhur = "s_dzuhur".$j;
						$ashar = "s_ashar".$j;
						$magrib = "s_maghrib".$j;
						$isya = "s_isya".$j;

						$id_kegiatan = $this->input->post("id_kegiatan[$i]");
						// $data['nama'] = $this->input->post("id_siswa[$i]");
						$dataS['s_subuh'] = $this->input->post("$subuh");
						$dataS['s_dzuhur'] = $this->input->post("$dzuhur");
						$dataS['s_ashar'] = $this->input->post("$ashar");
						$dataS['s_maghrib'] = $this->input->post("$magrib");
						$dataS['s_isya'] = $this->input->post("$isya");
						$dataM['bacaanAwal'] = $this->input->post("bacaanAwal[$i]");
						$dataM['bacaanAkhir'] = $this->input->post("bacaanAkhir[$i]");
						$this->model_pengguna->update_kegiatanSalat($id_kegiatan,$dataS);
						$this->model_pengguna->update_kegiatanMengaji($id_kegiatan,$dataM);
						// echo "$subuh : ". $data['subuh'];
						// echo "$dzuhur : ". $data['dzuhur'];
						// echo "$ashar : ". $data['ashar'];
						// echo "$magrib : ". $data['magrib'];
						// echo "$isya : ". $data['isya'];
						// echo "mengaji : ". $data['mengaji'];
						// echo "nama : ". $nama;
						// echo "tanggal : ". $tanggal;
						// echo "<br>";
						$j++;
					}
					redirect("siswa");

				}else
				{
					echo "error";
				}
			

			// $jumlah_data = count($this->input->post("tanggal"));
			// for ($i=0; $i < $jumlah_data; $i++) { 
			// 	$data['nama'] = $this->input->post("id_siswa[$i]");
			// 	// $nama = $this->input->post('id_siswa');
			// 	$data['tanggal'] = $this->input->post("tanggal[$i]");
			// 	// $tanggal = $this->input->post('tanggal');
			// 	$data['subuh'] = $this->input->post("subuh[$i]");
			// 	$data['dzuhur'] = $this->input->post("dzuhur[$i]");
			// 	$data['ashar'] = $this->input->post("ashar[$i]");
			// 	$data['magrib'] = $this->input->post("magrib[$i]");
			// 	$data['isya'] = $this->input->post("isya[$i]");
			// 	$data['mengaji'] = $this->input->post("mengaji[$i]");
			// 	$this->model_pengguna->insert_kegiatan($data);
			// }
			// redirect("siswa");
			
			// echo $data['nama'];echo " "; echo $data['tanggal'];
			// $this->model_pengguna->update_kegiatan($nama,$tanggal,$data);
			// $this->model_pengguna->insert_kegiatan($data);
			// $this->index();
		}
}
