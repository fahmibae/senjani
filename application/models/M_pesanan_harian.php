<?php 
 
class M_pesanan_harian extends CI_Model{
	function tampil_data($table){
		
		$this->db->select('*');
		$this->db->from($table);
		return $this->db->get(); 
	}

    function getdata($id_pesanan)
    {
        return $this->db->where('id_pesanan', $id_pesanan)->get('pesanan_harian');
    }

    function kodepesanan()
    {
       $sql = $this->db->query("SELECT max(id_pesanan) as maxKode FROM pesanan_harian");
       $hasil = $sql->row();
       return $hasil->maxKode;
    }

    function update_total($where, $data_update)
    {
        $this->db->where($where);
        $this->db->update('pesanan_harian', $data_update);
    }

    function getting($id_makanan)
    {   
        $hsl = $this->db->query("SELECT * FROM makanan WHERE id_makanan='$id_makanan'");
        if($hsl->num_rows()>0){
            foreach($hsl->result() as $data){
                $hasil = array(
                    'id_makanan' => $data->id_makanan,
                    'nama_menu'  => $data->nama_menu,
                    'kategori'   => $data->kategori,
                    'harga'      => $data->harga,
                );
            }
        }
        return $hasil;

    }
 
	function input_data($data, $table){
		$this->db->insert($table, $data);
	}

    function delete_pesanan($id){
        $this->db->delete('pesanan_harian', array("id_pesanan" => $id)); 
        return ($this->db->affected_rows()>0) ? TRUE : FALSE;
    }
    
    function delete_kotak($id){
        $this->db->delete('kotak', array("id_kotak" => $id));   
    }

    function getreq($nama_kolom, $nilai, $tabel){
        $this->db->where($nama_kolom, $nilai);
        $query=$this->db->get($tabel);
        return $query->result();
    }

    function update_status_kotak($update, $id_kotak){
        return $this->db->update('kotak', $update, array('id_kotak' => $id_kotak)); 
    }

    function getting_pagi($nama_menu)
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

    function getting_sore($nama_menu)
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

    function up($keyword){
    	$this->db->select('*');
    	$this->db->from('pesanan_harian');
    	$this->db->order_by('total_harga', 'DESC');

    	return $this->db->get()->result();
    }

    function down($keyword){
    	$this->db->select('*');
    	$this->db->from('pesanan_harian');
    	$this->db->order_by('total_harga', 'ASC');

    	return $this->db->get()->result();
    }

}
