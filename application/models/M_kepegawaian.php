<?php 
 
class M_kepegawaian extends CI_Model{
	
	function input_data($data, $table){
		$this->db->insert($table, $data);
	}

    function delete_pegawai($id){
        $this->db->delete('gaji_pegawai', array("id_kepegawaian" => $id));   
        $this->db->delete('kepegawaian', array("id_kepegawaian" => $id));   
    }

    function getreq($nama_kolom, $nilai, $tabel){
        $this->db->where($nama_kolom, $nilai);
        $query=$this->db->get($tabel);
        return $query->result();
    }

    function view($id_gaji){
        $this->db->where('id_gaji', $id_gaji);
        return $this->db->get('gaji_pegawai')->result();
    }

    function tampil_data($id_kepegawaian){
        $this->db->select('*');
        $this->db->join('kepegawaian', 'gaji_pegawai.id_kepegawaian=kepegawaian.id_kepegawaian');
        $this->db->from('gaji_pegawai');
        $this->db->where('id_kepegawaian', $id_kepegawaian);

        return $this->db->get()->result();
    }
    
    function get_gaji_pegawai(){
        return $this->db->get('kepegawaian');
    }
    
    function get_detail_gaji_pegawai($id_kepegawaian){
        $this->db->select('*');
        $this->db->from('gaji_pegawai');
        $this->db->where('kepegawaian.id_kepegawaian', $id_kepegawaian);
        $this->db->join('kepegawaian', 'gaji_pegawai.id_kepegawaian = kepegawaian.id_kepegawaian');
        return $this->db->get();
    }
 
    function get_periode_gaji($bulan, $tahun){
        $this->db->select('*');
        $this->db->from('periode_gaji');
        $this->db->where('bulan', $bulan);
        $this->db->where('tahun', $tahun);
        return $this->db->get('gaji_pegawai');
    }
    
    function bayar_gaji_pegawai($data, $id_gaji){
        return $this->db->update('gaji_pegawai', $data, array('id_gaji' => $id_gaji)); 
    }

    function cek_bayar($id_kepegawaian, $bulan, $tahun)
    {
        $this->db->where('id_kepegawaian', $id_kepegawaian);
        $this->db->where('bulan', $bulan);
        $this->db->where('tahun', $tahun);
        $result = $this->db->get('gaji_pegawai');
        return $result->num_rows();
    }
}
