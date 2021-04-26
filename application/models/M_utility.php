<?php 
 
class M_utility extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

	function tampil_data($table){
		$this->db->select('*');
		$this->db->from($table);
		return $this->db->get(); 
	}
 
	function input_data($data,$table){
		$this->db->insert($table,$data);
		$insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    
    public function save($data,$table){
        $this->db->insert($table,$data);
        return ($this->db->affected_rows()>0) ? TRUE : FALSE;
    }

    function input_more($data_insert, $table){
        $this->db->insert($table,$data_insert);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function input_barang($data_barang, $table){
        $this->db->insert($table,$data_barang);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function edit($tabel, $data, $id_tabel){
        $this->db->update($tabel, $data, $id_tabel);
        return ($this->db->affected_rows()>0) ? TRUE : FALSE; 
    }
    
	public function delete($id){
        $this->db->delete($this->_table, array("product_id" => $id));
        return ($this->db->affected_rows()>0) ? TRUE : FALSE;
    }

    function getreq($nama_kolom, $nilai, $tabel){
        $this->db->where($nama_kolom, $nilai);
        $query=$this->db->get($tabel);
        return $query;
    }

    function getreq_kurir_harian($nama_kolom, $nilai, $nama_kolom1, $nilai1, $tabel){
        $this->db->where($nama_kolom, $nilai);
        $this->db->where($nama_kolom1, $nilai1);
        $query=$this->db->get($tabel);
        return $query;
    }

    function getreq_kurir($nama_kolom, $nilai, $nama_kolom1, $nilai1, $tabel){
        $this->db->where($nama_kolom, $nilai);
        $this->db->where($nama_kolom1, $nilai1);
        $query=$this->db->get($tabel);
        return $query;
    }

    function grafik_pemesanan()
    {
        $deskripsi = "Pembayaran pesanan";
        $sql2 = $this->db->query("SELECT tanggal_masuk, SUM(nominal) AS total_pesanan FROM keuangan WHERE YEAR(tanggal_masuk)=YEAR(NOW()) AND deskripsi='$deskripsi' GROUP BY MONTH(tanggal_masuk)");

        if ($sql2->num_rows() > 0){
            foreach ($sql2->result() as $data) {
                $hasil[] = $data;
            }

            return $hasil;
        }

    }

    function pengeluaran_bulan($pengeluaran)
    {
        $sql = "SELECT sum(nominal) AS total_nominal, tanggal_masuk FROM keuangan WHERE MONTH(tanggal_masuk)=MONTH(NOW()) AND jenis_transaksi='$pengeluaran'";

        $result = $this->db->query($sql);

        return $result->row()->total_nominal;
    }

     function pengeluaran_perbulan($pengeluaran)
    {
        $sql = "SELECT sum(nominal) AS total_nominal, tanggal_masuk FROM keuangan WHERE MONTH(tanggal_masuk)=MONTH(NOW()) AND jenis_transaksi='$pengeluaran'";

        $result = $this->db->query($sql);

        return $result->row()->total_nominal;
    }

    function pemasukan_bulan($pemasukan)
    {
        $sql = "SELECT sum(nominal) AS total_nominal, tanggal_masuk FROM keuangan WHERE MONTH(tanggal_masuk)=MONTH(NOW()) AND jenis_transaksi='$pemasukan'";

        $result = $this->db->query($sql);

        return $result->row()->total_nominal;
    }

    function pemrosesan($diproses)
    {
        $sql = "SELECT count(status_pesanan) AS total FROM pesanan WHERE status_pesanan='$diproses'";

        $result = $this->db->query($sql);

        return $result->row()->total;
    }

    function pemrosesan1($diproses)
    {
        $sql = "SELECT count(status_pengiriman) AS total FROM detail_pesanan_harian WHERE status_pengiriman='$diproses'";

        $result = $this->db->query($sql);

        return $result->row()->total;
    }

    function pengiriman($dikirim)
    {
        $sql = "SELECT count(status_pesanan) AS total FROM pesanan WHERE status_pesanan='$dikirim'";

        $result = $this->db->query($sql);

        return $result->row()->total;
    }

    function pengiriman1($dikirim)
    {
        $sql = "SELECT count(status_pengiriman) AS total FROM detail_pesanan_harian WHERE status_pengiriman='$dikirim'";

        $result = $this->db->query($sql);

        return $result->row()->total;
    }

    function selesai($selesai)
    {
        $sql = "SELECT count(status_pesanan) AS total FROM pesanan WHERE status_pesanan='$selesai'";

        $result = $this->db->query($sql);

        return $result->row()->total;
    }

    function selesai1($selesai)
    {
        $sql = "SELECT count(status_pengiriman) AS total FROM detail_pesanan_harian WHERE status_pengiriman='$selesai'";

        $result = $this->db->query($sql);

        return $result->row()->total;
    }    


    function grafik_pemesanan_mingguan()
    {
        $deskripsi = "Pembayaran pesanan";
        $sql3 = $this->db->query("SELECT tanggal_masuk, SUM(nominal) AS total_pesanan_mingguan FROM keuangan WHERE WEEK(tanggal_masuk)=WEEK(NOW()) AND deskripsi='$deskripsi'");

        if ($sql3->num_rows() > 0){
            foreach ($sql3->result() as $data) {
                $hasil_mingguan[] = $data;
            }

            return $hasil_mingguan;
        }

    }

    function grafik_pemesanan_harian()
    {
        $deskripsi = "Pembayaran pesanan";
        $sql4 = $this->db->query("SELECT tanggal_masuk, SUM(nominal) AS total_pesanan_hari FROM keuangan WHERE DAY(tanggal_masuk)=DAY(NOW()) AND deskripsi='$deskripsi'");

        if ($sql4->num_rows() > 0){
            foreach ($sql4->result() as $data) {
                $hasil_harian[] = $data;
            }

            return $hasil_harian;
        }

    }

    function pesanan_terlaris()
    {
        $sql5 = $this->db->query("SELECT count(histori_pesanan.nama_menu) as total_terlaris, histori_pesanan.nama_menu, makanan.nama_menu FROM histori_pesanan, makanan WHERE histori_pesanan.nama_menu=makanan.nama_menu GROUP BY histori_pesanan.nama_menu");

        if ($sql5->num_rows() > 0){
            foreach ($sql5->result() as $data) {
                $hasil_terlaris[] = $data;
            }

            return $hasil_terlaris;
        }
    }



}
