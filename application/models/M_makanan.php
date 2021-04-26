<?php 
 
class M_makanan extends CI_Model{
	function tampil_data($table){
		$this->db->select('*');
		$this->db->from($table);
		return $this->db->get(); 
	}
 
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function delete($nama_kolom, $id, $tabel){
        $this->db->where($nama_kolom, $id);
		$this->db->delete($tabel);
    }

    function getreq($nama_kolom, $nilai, $tabel){
        $this->db->where($nama_kolom, $nilai);
        $query=$this->db->get($tabel);
        return $query;
    }

    function search($keyword){
    	$this->db->select('*');
    	$this->db->like('id_makanan', $keyword);
    	$this->db->or_like('kategori', $keyword);
    	$this->db->or_like('nama_menu', $keyword);
    	$this->db->from('makanan');

    	return $this->db->get()->result();
    }

    function up($keyword){
    	$this->db->select('*');
    	$this->db->from('makanan');
    	$this->db->order_by('harga', 'DESC');

    	return $this->db->get()->result();
    }

    function down($keyword){
    	$this->db->select('*');
    	$this->db->from('makanan');
    	$this->db->order_by('harga', 'ASC');

    	return $this->db->get()->result();
    }
}