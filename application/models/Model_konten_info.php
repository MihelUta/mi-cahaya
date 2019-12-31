<?php

/**
* class Model CRUD Berita
*/
class Model_konten_info extends CI_Model
{
	function __construct(){
		parent::__construct();
	}
	// BERITA

	// fungsi tambah berita
	function insert_berita($data_berita)
	{
		$this->db->insert('berita', $data_berita);
	}

	// fungsi tampil berita
	function view_all_berita()
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->order_by('id_berita', 'desc');

		return $this->db->get();
	}

	function select_by_id($id_berita)
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where('id_berita', $id_berita);

		return $this->db->get();		
	}

	// fungsi update berita
	function update_berita($id_berita, $data)
	{
		$this->db->where('id_berita', $id_berita);
		$this->db->update('berita', $data);
	}

	// fungsi delete berita
	function delete_berita($id_berita)
	{
		$this->db->where('id_berita', $id_berita);
		$this->db->delete('berita');
	}


	// PENGUMUMAN

	// fungsi tambah pengumuman
	function insert_pengumuman($data)
	{
		$this->db->insert('pengumuman', $data);
	}

	// fungsi tampil pengumuman
	function view_all_pengumuman()
	{
		$this->db->select('*');
		$this->db->from('pengumuman');
		$this->db->order_by('id_pengumuman', 'desc');

		return $this->db->get();
	}

	// fungsi memilih id
	function select_by_id_pengumuman($id_pengumuman)
	{
		$this->db->select('*');
		$this->db->from('pengumuman');
		$this->db->where('id_pengumuman', $id_pengumuman);

		return $this->db->get();		
	}

	// fungsi update pengumuman
	function update_pengumuman($id_pengumuman, $data)
	{
		$this->db->where('id_pengumuman', $id_pengumuman);
		$this->db->update('pengumuman', $data);
	}

	// fungsi delete pengumuman
	function delete_pengumuman($id_pengumuman)
	{
		$this->db->where('id_pengumuman', $id_pengumuman);
		$this->db->delete('pengumuman');
	}

	function insert_foto($data_gambar)
	{
		$this->db->insert('foto', $data_gambar);
	}

	function insert_galeri($data_gambar)
	{
		$this->db->insert('galeri', $data_gambar);
	}

	function view_all_galeri()
	{
		$this->db->select('*');
		$this->db->from('galeri');
		$this->db->order_by('id_galeri', 'desc');

		return $this->db->get();
	}

	function select_by_id_gambar($id_galeri)
	{
		$this->db->select('*');
		$this->db->from('galeri');
		$this->db->where('id_galeri', $id_galeri);

		return $this->db->get();		
	}

	function update_img($id_galeri, $data)
	{
		$this->db->where('id_galeri', $id_galeri);
		$this->db->update('galeri', $data);
	}

	function delete_img($id_galeri)
	{
		$this->db->where('id_galeri', $id_galeri);
		$this->db->delete('galeri');
	}
    
    function search($judul)
    {
    	$this->db->select('*');
    	$this->db->from('berita');
        $this->db->like('judul', $judul, 'both');
        
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
        	return $query->result();
        } else {
        	return $query->result();
        	}
    }
}

 ?>