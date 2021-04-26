<?php 
class C_kurir extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		$this->load->model("m_user");
		$this->load->model("m_utility");

		if ($this->session->userdata('status_login') != "login") {
            ?>
            <script type="text/javascript">
                    alert('Manjing dikit ning halaman login!');
                    window.location='<?php echo base_url('index.php'); ?>'
                </script>
            <?php
        }
	}
 
	function dashboard(){
		$pengeluaran = "Pengeluaran";
		$pemasukan   = "Pemasukan";
		$diproses    = "Diproses";
		$dikirim     = "Dikirim";
		$selesai     = "Selesai";

		$data['hasil'] = $this->m_utility->grafik_pemesanan();
		$data['hasil_mingguan'] = $this->m_utility->grafik_pemesanan_mingguan();
		$data['total_pengeluaran'] = $this->m_utility->pengeluaran_bulan($pengeluaran);
		$data['total_proses'] = $this->m_utility->pemrosesan($diproses);
		$data['total_proses1'] = $this->m_utility->pemrosesan1($diproses);
		$data['total_kirim']  = $this->m_utility->pengiriman($dikirim);
		$data['total_kirim1']  = $this->m_utility->pengiriman1($dikirim);
		$data['total_selesai'] = $this->m_utility->selesai($selesai);
		$data['total_selesai1'] = $this->m_utility->selesai1($selesai);
		$data['total_pemasukan'] = $this->m_utility->pemasukan_bulan($pemasukan);
		$data['hasil_terlaris'] = $this->m_utility->pesanan_terlaris();
		$data['hasil_harian'] = $this->m_utility->grafik_pemesanan_harian();
	    $this->load->view('navbar-kurir');
		$this->load->view('index', $data);
	}
	
	function pesanan(){
		$data_pesanan = $this->m_utility->tampil_data('pesanan')->result_array();
		$data['pesanan'] = $data_pesanan;
		$this->load->view('navbar-kurir');
		$this->load->view('kurir/pesanan',$data);
	}

	function pesanan_harian(){
		$pesanan = $this->db->get('pesanan_harian')->result_array();
		foreach ($pesanan as $value) {
	    $id_pesanan = $value['id_pesanan'];
	    $data_pesanan = $this->db->where('id_pesanan', $id_pesanan)->get('pesanan_harian')->row();
		$data_pagi = $this->m_utility->getreq('waktu','PAGI','detail_pesanan_harian')->result_array();
		$data_sore = $this->m_utility->getreq('waktu','SORE','detail_pesanan_harian')->result_array();
		$data['pesanan'] = $data_pesanan;
		$data['pesanan_pagi'] = $data_pagi;
		$data['pesanan_sore'] = $data_sore;
	    
		$this->load->view('navbar-kurir');
		$this->load->view('kurir/pesananHarian',$data);
		}
	}
	
	function kotak(){
		$data_kotak = $this->m_utility->tampil_data('kotak')->result();
		$data_kotak_tersedia = $this->m_utility->getreq('status_kotak','Tersedia', 'kotak')->result();
		$data_kotak_dipakai = $this->m_utility->getreq('status_kotak','Terpakai', 'kotak')->result();
		
		$data['kotak'] = $data_kotak;
		$data['kotak_tersedia'] = $data_kotak_tersedia;
		$data['kotak_dipakai'] = $data_kotak_dipakai;
		$this->load->view('navbar-kurir');
		$this->load->view('kurir/kotak_makan', $data);
	}

	
	
	//================= FUNGSI-FUNGSI PEMROSESAN DATA ================//
	function ubah_status(){
		$id_pesanan = $this->input->post('id-pesanan');
		$status = $this->input->post('status');
		$where_condition = array('id_pesanan' => $id_pesanan);
		$data = array(
			'status_pesanan' => $status
		);
		
		if($this->m_utility->edit('pesanan', $data, $where_condition)==true){
			$this->session->set_flashdata('edit', true);
		}else{
			$this->session->set_flashdata('edit', false);
		}
		redirect('c_kurir/pesanan');
	}

	function ubah_status_harian(){
		$id_pesanan = $this->input->post('id-pesanan');
		$status = $this->input->post('status');
		$where_condition = array('id_detail_pesanan' => $id_pesanan);
		$data = array(
			'status_pengiriman' => $status
		);
		
		if ($this->m_utility->edit('detail_pesanan_harian', $data, $where_condition)==true){
			$this->session->set_flashdata('edit', true);
		}else{
			$this->session->set_flashdata('edit', false);
		}
		redirect('c_kurir/pesanan_harian');
	}
	
	function ubah_status_kotak(){
		$id_kotak = $this->input->post('id-edit-kotak');
		$status = $this->input->post('status-kotak');
		$where_condition = array('id_kotak' => $id_kotak);
		$data = array(
			'status_kotak' => $status,
			'tanggal' => Date('Y-m-d H:i:s')
		);
		
		if ($this->m_utility->edit('kotak', $data, $where_condition)==true){
			$this->session->set_flashdata('edit', true);
		}else {
			$this->session->set_flashdata('edit', false);
		}
		redirect('c_kurir/kotak');
	}
}

?>
