<?php 

class C_sortir extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_utility');
		$this->load->model('m_keuangan');

        if ($this->session->userdata('status_login') != "login") {
            ?>
            <script type="text/javascript">
                    alert('Manjing dikit ning halaman login!');
                    window.location='<?php echo base_url('index.php'); ?>'
                </script>
            <?php
        }
	}

	function index()
	{
		$tanggal_awal = $this->input->get('tanggal_awal');
    	$tanggal_akhir = $this->input->get('tanggal_akhir');
		$data['keuangan'] = $this->m_keuangan->tampil_data('keuangan');
		$this->load->view('navbar.php');
		$this->load->view('keuangan/sortirTransaksi', $data);
	}

	function cari(){
        $tanggal_awal= date("Y-m-d",strtotime($this->input->post('tanggal_awal')));
        $tanggal_akhir= date("Y-m-d",strtotime($this->input->post('tanggal_akhir')));
        $sess_data=array(
            'tanggal_awal'=>$tanggal_awal,
            'tanggal_akhir'=>$tanggal_akhir
        );
        $this->session->set_userdata($sess_data);
        $data=array(
            'keuangan'=> $this->m_keuangan->sortir_keuangan($tanggal_awal,$tanggal_akhir),
            'tanggal_awal'=>date("d M Y",strtotime($this->session->userdata('tanggal_awal'))),
            'tanggal_akhir'=>date("d M Y",strtotime($this->session->userdata('tanggal_akhir'))),
        );
        $this->load->view('keuangan/resultTransaksi',$data);
    }

    function cetak()
    {
        $tanggal_awal  = $this->session->userdata('tanggal_awal');
        $tanggal_akhir = $this->session->userdata('tanggal_akhir');
        $pembayaran_pesanan     = "Pembayaran pesanan";
        $pembayaran_gaji        = "Pembayaran gaji pegawai";
        $pemasukan_lain         = "Pemasukan lain-lain";
        $pembelian_aset         = "Pembelian aset";
        $pembelian_bahan        = "Pembelian bahan-bahan";
        $pengeluaran = "Pengeluaran";
        $pemasukan   = "Pemasukan";
        $data['laporan_pembayaran_pesanan'] = $this->m_keuangan->laporan_pembayaran_pesanan($tanggal_awal,$tanggal_akhir,$pemasukan, $pembayaran_pesanan);
        $data['laporan_pembelian_bahan'] = $this->m_keuangan->laporan_pembelian_bahan($tanggal_awal,$tanggal_akhir,$pengeluaran, $pembelian_bahan);
        $data['laporan_pembelian_aset'] = $this->m_keuangan->laporan_pembelian_aset($tanggal_awal,$tanggal_akhir,$pengeluaran, $pembelian_aset);
        $data['laporan_pemasukan_lain'] = $this->m_keuangan->laporan_lain($tanggal_awal,$tanggal_akhir,$pemasukan, $pemasukan_lain);      
        $data['laporan_pembayaran_gaji'] = $this->m_keuangan->laporan_pembayaran_gaji($tanggal_awal,$tanggal_akhir,$pengeluaran,$pembayaran_gaji);
        $this->load->view('keuangan/laporanKeuangan', $data);
    }
}