<?php 

class C_dashboard_kurir extends CI_Controller
{
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

	function dashboard_kurir(){
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

}