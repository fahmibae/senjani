<?php 
 
class M_keuangan extends CI_Model{
	function tampil_data($table){
		$this->db->select('*');
		$this->db->from($table);
		return $this->db->get(); 
	}
 
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function delete($id){
        $this->db->delete($this->_table, array("product_id" => $id));
    }

    function getting($nama_pemesan)
    {   
        $hsl = $this->db->query("SELECT * FROM pesanan WHERE nama_pemesan='$nama_pemesan'");
        if($hsl->num_rows()>0){
            foreach($hsl->result() as $data){
                $hasil = array(
                    'nama_pemesan' => $data->nama_pemesan,
                    'harga'      => $data->harga,
                );
            }
        }
        return $hasil;
    }
    
    
    function get_data_where($nama_kolom, $where){
        $this->db->where($where);
        $query=$this->db->get($tabel);
        return $query;
    }

    function getreq($nama_kolom, $nilai, $tabel){
        $this->db->where($nama_kolom, $nilai);
        $query=$this->db->get($tabel);
        return $query->result();
    }

    function sortir_keuangan($tanggal_awal, $tanggal_akhir)
    {
        return $this->db->query("SELECT * FROM keuangan WHERE tanggal_masuk BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
    }

    function laporan_pembayaran_pesanan($tanggal_awal, $tanggal_akhir, $pemasukan, $pembayaran_pesanan)
    {
        $sql = $this->db->query("SELECT sum(nominal) AS total FROM keuangan WHERE jenis_transaksi='$pemasukan' AND tanggal_masuk BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND MONTH(tanggal_masuk)=MONTH(NOW()) AND deskripsi='$pembayaran_pesanan'");
        return $result = $sql->row()->total;
    }

    function laporan_pembayaran_gaji($tanggal_awal, $tanggal_akhir, $pengeluaran, $pembayaran_gaji)
    {
        $sql = $this->db->query("SELECT sum(nominal) AS total FROM keuangan WHERE jenis_transaksi='$pengeluaran' AND tanggal_masuk BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND MONTH(tanggal_masuk)=MONTH(NOW()) AND deskripsi='$pembayaran_gaji'");
        return $result = $sql->row()->total;
    }

    function laporan_pembelian_aset($tanggal_awal, $tanggal_akhir, $pengeluaran, $pembelian_aset)
    {
        $sql = $this->db->query("SELECT sum(nominal) AS total FROM keuangan WHERE jenis_transaksi='$pengeluaran' AND tanggal_masuk BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND MONTH(tanggal_masuk)=MONTH(NOW()) AND deskripsi='$pembelian_aset'");
        return $result = $sql->row()->total;
    }

    function laporan_pembelian_bahan($tanggal_awal, $tanggal_akhir, $pengeluaran, $pembelian_bahan)
    {
        $sql = $this->db->query("SELECT sum(nominal) AS total FROM keuangan WHERE jenis_transaksi='$pengeluaran' AND tanggal_masuk BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND MONTH(tanggal_masuk)=MONTH(NOW()) AND deskripsi='$pembelian_bahan'");
        return $result = $sql->row()->total;
    }

    function laporan_lain($tanggal_awal, $tanggal_akhir, $pemasukan, $pemasukan_lain)
    {
        $sql = $this->db->query("SELECT sum(nominal) AS total FROM keuangan WHERE jenis_transaksi='$pemasukan' AND tanggal_masuk BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND MONTH(tanggal_masuk)=MONTH(NOW()) AND deskripsi='$pemasukan_lain'");
        return $result = $sql->row()->total;
    }    

    function total_sortir($tanggal_awal, $tanggal_akhir){
        $this->db->select_sum('nominal');
        $this->db->where('tanggal_masuk >=',$tanggal_awal);
        $this->db->where('tanggal_masuk <=',$tanggal_akhir);
        $query = $this->db->get('keuangan');
        if($query->num_rows()>0)
        {
            return $query->row()->nominal;
        }
        else
        {
            return 0;
        }
    }

    function cetak_total_pengeluaran($tanggal_awal, $tanggal_akhir, $pengeluaran){
        $query = $this->db->query("SELECT sum(nominal) AS total_pengeluaran WHERE jenis_transaksi='$pengeluaran' AND tanggal_masuk BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        if($query->num_rows()>0)
        {
            return $query->row()->total_pengeluaran;
        }
        else
        {
            return 0;
        }
    }

    function cetak_total_pemasukan($tanggal_awal, $tanggal_akhir, $pemasukan){
        $query = $this->db->query("SELECT sum(nominal) AS total_pemasukan WHERE jenis_transaksi='$pemasukan' AND tanggal_masuk BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        if($query->num_rows()>0)
        {
            return $query->row()->total_pemasukan;
        }
        else
        {
            return 0;
        }
    }



    function cetak_total($tanggal_awal, $tanggal_akhir){
        $this->db->select_sum('nominal');
        $this->db->where('tanggal_masuk >=',$tanggal_awal);
        $this->db->where('tanggal_masuk <=',$tanggal_akhir);
        $query = $this->db->get('keuangan');
        if($query->num_rows()>0)
        {
            return $query->row()->nominal;
        }
        else
        {
            return 0;
        }
    }
}
