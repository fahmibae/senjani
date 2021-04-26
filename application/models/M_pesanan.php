<?php 
 
class M_pesanan extends CI_Model{
	function tampil_data($table){
		
		$this->db->select('*');
		$this->db->from($table);
		return $this->db->get(); 
	}
 
	function input_data($data, $table){
		$this->db->insert($table, $data);
	}

    function kodepesanan()
    {
       $sql = $this->db->query("SELECT max(id_pesanan) as maxKode FROM pesanan");
       $hasil = $sql->row();
       return $hasil->maxKode;
    }

    function delete_pesanan($id){
        $this->db->delete('pesanan', array("id_pesanan" => $id));   
    }
    
    function delete_kotak($id){
        $this->db->delete('kotak', array("id_kotak" => $id));   
    }

    function getreq($nama_kolom, $nilai, $tabel){
        $this->db->where($nama_kolom, $nilai);
        $query=$this->db->get($tabel);
        return $query->result();
    }

    function getting($nama_menu)
    {   
        $hsl = $this->db->query("SELECT * FROM makanan WHERE nama_menu='$nama_menu'");
        if($hsl->num_rows()>0){
            foreach($hsl->result() as $data){
                $hasil = array(
                    'nama_menu' => $data->nama_menu,
                    'harga'      => $data->harga,
                );
            }
        }
        return $hasil;

    }

    function kodeotomatis()
    {
       $sql = $this->db->query("SELECT max(id_kotak) as maxKode FROM kotak");
       $hasil = $sql->row();
       return $hasil->maxKode;
    }

    function up($keyword){
    	$this->db->select('*');
    	$this->db->from('pesanan');
    	$this->db->order_by('total_harga', 'DESC');

    	return $this->db->get()->result();
    }

    function down($keyword){
    	$this->db->select('*');
    	$this->db->from('pesanan');
    	$this->db->order_by('total_harga', 'ASC');

    	return $this->db->get()->result();
    }

    function cek_pesanan($nama_pemesan)
    {
        $this->db->where('nama_pemesan', $nama_pemesan);
        $result = $this->db->get('pesanan');
        return $result->num_rows();
    }


}
