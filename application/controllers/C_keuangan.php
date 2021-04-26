<?php 
 
 
class C_keuangan extends CI_Controller{
 
	function __construct(){
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
 
	function tambah(){
		$this->load->view('navbar.php');
		$this->load->view('keuangan/tambahTransaksi');
	}
 
	function tambah_aksi(){
		$jenis = $this->input->post('jenis-transaksi');
		$deskripsi = $this->input->post('deskripsi');
		$nominal = $this->input->post('nominal-transaksi');
		$tanggal = $this->input->post('tanggal-masuk');
 
		$data = array(
			'jenis_transaksi' => $jenis,
			'deskripsi' => $deskripsi,
			'tanggal_masuk' => $tanggal,
			'periode' => date('F'),
			'nominal' => $nominal,

			);
		if ($this->m_utility->save($data,'keuangan')==true){
			$this->session->set_flashdata('tambah', true);
		}else {
			$this->session->set_flashdata('tambah', false);
		}
		redirect('c_keuangan/index');
	}

    function cari()
    {
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

    function get_json_keuangan(){
        $bulan = $this->uri->segment('3');
        $tahun = $this->uri->segment('4');
        $where = array(
            'MONTH(tanggal_masuk)' => $bulan,
            'YEAR(tanggal_masuk)' => $tahun,
            );       
        $data = $this->m_utility->get_data_where('keuangan', $where)->result();
        echo json_encode($data);
   }

   function proses_tambah(){
		$nama_pemesan = $this->input->post('nama_pemesan');
		$data = $this->m_keuangan->getting($nama_pemesan);
		echo json_encode($data);
	}  
}
