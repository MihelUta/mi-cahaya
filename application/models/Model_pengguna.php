<?php

/**
* class Model CRUD Siswa
*/
class Model_pengguna extends CI_Model
{
	function __construct(){
		parent::__construct();
	}
	// BERITA

	// fungsi tambah berita
	function insert_kegiatan($data)
	{
		$this->db->insert('tb_kegiatan', $data);
	}

	function insert_kegiatanSalat($data)
	{
		$this->db->insert('tb_salat', $data);
	}

	function insert_kegiatanMengaji($data)
	{
		$this->db->insert('tb_mengaji', $data);
	}

	function update_kegiatanSalat($id_kegiatan, $dataS)
	{
		$this->db->where('id_kegiatan', $id_kegiatan);
		$this->db->update('tb_salat', $dataS);
	}

	function update_kegiatanMengaji($id_kegiatan, $dataM)
	{
		$this->db->where('id_kegiatan', $id_kegiatan);
		$this->db->update('tb_mengaji', $dataM);
	}

	function view_siswa($id_siswa)
	{
		$this->db->select('*');
		$this->db->from('tb_siswa');
		$this->db->where('id_user', $id_siswa);
		$this->db->join('tb_kelas','tb_siswa.id_kelas = tb_kelas.id_kelas');


		return $this->db->get();		
	}

	function view_all_kegiatan($siswa)
	{
		$this->db->distinct();
		$this->db->select('*');
		$this->db->from('tb_kegiatan');
		$this->db->where('id_user', $siswa);
		$this->db->join('tb_siswa','tb_siswa.id_siswa = tb_kegiatan.id_siswa');
		$this->db->join('tb_salat','tb_salat.id_kegiatan = tb_kegiatan.id_kegiatan');
		$this->db->join('tb_mengaji','tb_mengaji.id_kegiatan = tb_kegiatan.id_kegiatan');
		
		return $this->db->get();
	}

	function view_siswaVGuru($id_siswa)
	{
		$this->db->select('*');
		$this->db->from('tb_siswa');
		$this->db->where('id_siswa', $id_siswa);
		$this->db->join('tb_kelas','tb_siswa.id_kelas = tb_kelas.id_kelas');


		return $this->db->get();		
	}

	function view_all_kegiatanVGuru($siswa)
	{
		$this->db->distinct();
		$this->db->select('*');
		$this->db->from('tb_kegiatan');
		$this->db->where('tb_siswa.id_siswa', $siswa);
		$this->db->join('tb_siswa','tb_siswa.id_siswa = tb_kegiatan.id_siswa');
		$this->db->join('tb_salat','tb_salat.id_kegiatan = tb_kegiatan.id_kegiatan');
		$this->db->join('tb_mengaji','tb_mengaji.id_kegiatan = tb_kegiatan.id_kegiatan');
		
		return $this->db->get();
	}


	// GURU

	// fungsi view all guru
	function view_guru($id_guru)
	{
		$this->db->select('*');
		$this->db->from('tb_guru');
		$this->db->join('tb_kelas','tb_guru.id_kelas = tb_kelas.id_kelas');
		$this->db->where('id_user', $id_guru);

		return $this->db->get();		
	}

	function view_all_guru()
	{
		$this->db->select('*');
		$this->db->from('tb_guru');
		$this->db->join('tb_kelas','tb_guru.id_kelas = tb_kelas.id_kelas');

		return $this->db->get();
	}

	function select_by_id_guru($id_guru)
	{
		$this->db->select('*');
		$this->db->from('tb_guru');
		$this->db->where('id_user', $id_guru);
		$this->db->join('tb_kelas','tb_guru.id_kelas = tb_kelas.id_kelas');

		return $this->db->get();		
	}

	function update_guru($id_guru, $data)
	{
		$this->db->where('id_guru', $id_guru);
		$this->db->update('tb_guru', $data);
	}

	function delete_guru($id_guru)
	{
		// $this->db->where('username', $id_guru);
		// $this->db->delete('guru');
		$this->db->where('id_user', $id_guru);
		$this->db->delete('tb_user');
	}

	function add_guru($data)
	{
		$this->db->insert('tb_guru', $data);
	}

	// SISWA


	function view_all_siswa()
	{
		$this->db->select('*');
		$this->db->from('tb_siswa');
		$this->db->join('tb_kelas','tb_siswa.id_kelas = tb_kelas.id_kelas');

		return $this->db->get();
	}

	function view_siswa_kelas($kelas)
	{
		$this->db->select('*');
		$this->db->from('tb_siswa');
		$this->db->where('id_kelas', $kelas);

		return $this->db->get();
	}

	function add_user($dataU)
	{
		$this->db->insert('tb_user', $dataU);
	}

	function add_siswa($data)
	{
		$this->db->insert('tb_siswa', $data);
	}

	function select_by_id_siswa($id_siswa)
	{
		$this->db->select('*');
		$this->db->from('tb_siswa');
		$this->db->where('id_user', $id_siswa);
		$this->db->join('tb_kelas','tb_siswa.id_kelas = tb_kelas.id_kelas');

		return $this->db->get();		
	}

	function update_siswa($id_siswa, $data)
	{
		$this->db->where('id_siswa', $id_siswa);
		$this->db->update('tb_siswa', $data);
	}

	function delete_siswa($id_user)
	{
		// $this->db->where('username', $id_siswa);
		// $this->db->delete('guru');

		$this->db->where('id_user', $id_user);
		$this->db->delete('tb_user');
	}

	function search($siswa)
    {
    	$this->db->select('*');
    	$this->db->from('siswa');
        $this->db->like('nama', $siswa, 'both');
        
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
        	return $query->result();
        } else {
        	return $query->result();
        	}
    }
}
 ?>