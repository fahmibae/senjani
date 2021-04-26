<?php 
 
 
class C_pesanan_harian extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		$this->load->model("m_utility");		
        $this->load->model("m_pesanan_harian");
        $this->load->helper("waktu");

        if ($this->session->userdata('status_login') != "login") {
            ?>
            <script type="text/javascript">
                    alert('Manjing dikit ning halaman login!');
                    window.location='<?php echo base_url('index.php'); ?>'
                </script>
            <?php
        }
	}
    
     
	function index(){
		$data_pesanan = $this->m_utility->tampil_data('pesanan_harian')->result();
		
		$data['pesanan'] = $data_pesanan;

		$this->load->view('navbar.php');
		$this->load->view('pesanan/daftarPesananHarian',$data);
	}

	function index_hutang(){
		$id_pesanan  = $this->uri->segment('3');
		$data_hutang = $this->db->where('id_pesanan', $id_pesanan)->get('hutang_pesanan')->result();
		$data_pesanan_harian = $this->db->where('id_pesanan', $id_pesanan)->get('pesanan_harian')->row();
		$pesanan_harian = $this->db->where('id_pesanan', $id_pesanan)->get('pesanan_harian')->row();
		$data['hutang'] = $data_hutang;
		$data['pesanan'] = $data_pesanan_harian;
		$data['check'] = $pesanan_harian;
		$this->load->view('navbar.php');
		$this->load->view('pesanan/detailPembayaranHutangHarian', $data);
	}
 
	function tambah(){
		$row = $this->m_pesanan_harian->kodepesanan();
		$nomor_urut = (int) substr($row, 12, 4);
		$kode_tambah = $nomor_urut + 1;
		$data = array('id_pesanan' => $kode_tambah);
		$this->load->view('navbar.php');
		$this->load->view('pesanan/tambahPesananHarian', $data);
	}
 
 
    //============= FUNGSI-FUNGSI PEMROSESAN DATA ================//
    
	function tambah_aksi_pesanan(){
		$id_pesanan = $this->input->post('id-pesanan');
		$nama 		= $this->input->post('nama-pemesan');
		$kontak 	= $this->input->post('kontak-pesanan');
		$alamat     = $this->input->post('alamat');
		$tanggal 	= $this->input->post('tanggal-pesanan');
		$status     = $this->input->post('status-pembayaran');
		$menu_pagi  = $this->input->post('menu-pagi');
		$menu_sore  = $this->input->post('menu-sore');
		$harga_pagi = $this->input->post('harga-pagi');
		$harga_sore = $this->input->post('harga-sore');
		$total_harga= $this->input->post('total-harga');
		$pembayaran = $this->input->post('pembayaran');
		$sisa_pembayaran = $this->input->post('sisa');
		$tanggal_akhir = date('Y-m-d', strtotime('+6 days', strtotime($tanggal)));
		if($status=="LUNAS"){
		$data = array(
			'id_pesanan' => $id_pesanan,
			'nama_pemesan' => $nama,
			'kontak_pemesan' => $kontak,
			'alamat' => $alamat,
			'tanggal_pesanan' => $tanggal,
			'tanggal_akhir'   => $tanggal_akhir,
			'status_pembayaran' => $status,
			'menu_pagi'  => $menu_pagi,
			'menu_sore' => $menu_sore,
			'harga_pagi' => $harga_pagi,
			'harga_sore' => $harga_sore,
			'total_harga' => $total_harga,
			'pembayaran'  => $total_harga,
			'sisa_pembayaran' => '0',
		);
		}elseif($status=="DP"){
		$data = array(
			'id_pesanan' => $id_pesanan, 
			'nama_pemesan' => $nama,
			'kontak_pemesan' => $kontak,
			'alamat' => $alamat,
			'tanggal_pesanan' => $tanggal,
			'tanggal_akhir'   => $tanggal_akhir,
			'status_pembayaran' => $status,
			'menu_pagi'  => $menu_pagi,
			'menu_sore' => $menu_sore,
			'harga_pagi' => $harga_pagi,
			'harga_sore' => $harga_sore,
			'total_harga' => $total_harga,
			'pembayaran'  => $pembayaran,
			'sisa_pembayaran' => $sisa_pembayaran,
		);	
		}
		if ($this->m_utility->save($data,'pesanan_harian') == TRUE) {
			$this->session->set_flashdata('tambah', true);
		}else{
			$this->session->set_flashdata('tambah', false);
		}

		$data_insert = array(
				'jenis_transaksi' => 'Pemasukan',
				'deskripsi' => 'Pembayaran pesanan',
				'tanggal_masuk' => $tanggal,
				'periode' => Date('F'),
				'nominal' => $pembayaran,
		);

		$this->m_utility->input_more($data_insert,'keuangan');

		$data_barang = array(
			array(
				'nama_menu' => $menu_pagi,
				'harga'     => $harga_pagi,
			),
			array(
				'nama_menu' => $menu_sore,
				'harga'     => $harga_sore,
			), 
		);
		$this->db->insert_batch('histori_pesanan', $data_barang);

		//$data_insert = array(
			//'jenis_transaksi' => 'Pemasukan',
			//'deskripsi' => 'Pembayaran pesanan',
			//'tanggal_masuk' => $tanggal,
			//'periode' => Date('F'),
			//'nominal' => $total_harga,
		//);

		//$this->m_utility->input_more($data_insert, 'keuangan');

		//$update = array(
		//	'status_kotak' => 'Terpakai');

		//$this->m_pesanan_harian->update_status_kotak($update, $id_kotak);

		$this->session->set_userdata('action', 'tambah_data');
		redirect('c_pesanan_harian/');
	}

    function view_edit($id_pesanan)
    {
    	$data['data_pesanan'] = $this->db->where('id_pesanan', $id_pesanan)->get('pesanan_harian')->row();
    	$this->load->view('navbar.php');
    	$this->load->view('pesanan/editPesananHarian', $data);

    }

    function tambah_aksi_hutang()
    {
    	$id_pesanan = $this->input->post('id-pesanan');
    	$nomor      = $this->input->post('nomor-pembayaran');
    	$atm        = $this->input->post('atm');
    	$tanggal    = $this->input->post('tanggal');
    	$jumlah     = $this->input->post('jumlah');

    	$query = $this->db->where('id_pesanan', $id_pesanan)->get('pesanan_harian');
    	foreach ($query->result() as $data) {
    		$tanggal_pesanan = $data->tanggal_pesanan;
    		$sisa_pembayaran = $data->sisa_pembayaran;
    	
    	if($sisa_pembayaran < $jumlah){
			$this->session->set_flashdata('peringatan','nominal pembayaran tidak boleh melebihi sisa hutang');
			redirect('c_pesanan_harian/index_hutang/'.$jumlah);
		}else{

		if($tanggal_pesanan > $tanggal){
			$this->session->set_flashdata('peringatan1','Tanggal Hutang Tidak Boleh Lebih Dari Tanggal Pencatatan');
			redirect('c_pesanan_harian/index_hutang/'.$tanggal);
		}else{

		$sisa_bayar = $sisa_pembayaran - $jumlah;

    	$data = array(
    		'id_pesanan' => $id_pesanan,
    		'nomor_pembayaran' => $nomor,
    		'tanggal_masuk' => $tanggal,
    		'atm' => $atm,
    		'jumlah'  => $jumlah,
    	);

    	if ($this->m_utility->save($data, 'hutang_pesanan')==TRUE){
			$this->session->set_flashdata('tambah', true);
		}else {
			$this->session->set_flashdata('tambah', false);
		}

    	$data_insert = array(
				'jenis_transaksi' => 'Pemasukan',
				'deskripsi' => 'Pembayaran pesanan',
				'tanggal_masuk' => $tanggal,
				'periode' => Date('F'),
				'nominal' => $jumlah,
		);

		$this->m_utility->input_more($data_insert,'keuangan');

		$update = array('sisa_pembayaran' => $sisa_bayar);

		$where  = array('id_pesanan' => $id_pesanan);

		$this->db->where($where);
		$this->db->update('pesanan_harian', $update);

		}
		}
	}
		$this->session->set_userdata('action', 'tambah_data'); 
		redirect_back();
    }
    
    function edit_aksi_pesanan(){
		$id_pesanan = $this->uri->segment('3');
		$nama = $this->input->post('nama-pemesan', true);
		$kontak = $this->input->post('kontak-pesanan', true);
		$alamat     = $this->input->post('alamat', true);
		$tanggal = $this->input->post('tanggal-pesanan', true);
		$tanggal_akhir = $this->input->post('tanggal-akhir', true);
		$menu_pagi = $this->input->post('menu-pagi', true);
		$menu_sore  = $this->input->post('menu-sore', true);
		$harga_pagi = $this->input->post('harga-pagi', true);
		$harga_sore = $this->input->post('harga-sore', true);
		$total_harga = $this->input->post('total-harga', true);
		$pembayaran  = $this->input->post('pembayaran', true);
		$status_pembayaran = $this->input->post('status-pembayaran', true);
		$sisa = $this->input->post('sisa', true);
		
		$where_condition = array(
			'id_pesanan' => $id_pesanan,
			);
	    
		$data = array(
		    'nama_pemesan' => $nama,
			'kontak_pemesan' => $kontak,
			'alamat' => $alamat,
			'tanggal_pesanan' => $tanggal,
			'tanggal_akhir' => $tanggal_akhir,
			'menu_pagi' => $menu_pagi,
			'menu_sore' => $menu_sore,
			'harga_pagi' => $harga_pagi,
			'harga_sore' => $harga_sore,
			'total_harga' => $total_harga, 
			'pembayaran' => $pembayaran, 
			'sisa_pembayaran' => $sisa
		);
		
		if ($this->m_utility->edit('pesanan_harian', $data, $where_condition) == TRUE){
			$this->session->set_flashdata('berhasil', 'Berhasil Edit');
		}else{
			$this->session->set_flashdata('gagal', 'Gagal Edit');
		}
		redirect('c_pesanan_harian/index/'.$id_pesanan);                
    }

    function hapus_pesanan(){
        $id = $this->uri->segment('3');
		if ($this->m_utility->delete($id)==TRUE){
			$this->session->set_flashdata('hapus', true);
		}else{
			$this->session->set_flashdata('hapus', false);
		}		
        redirect('c_pesanan_harian/');                
    }

	function tambah_aksi_detail(){
		$id_kotak1  = $this->input->post('id-kotak1');
		$id_kotak2  = $this->input->post('id-kotak2');
		$id_pesanan = $this->input->post('id-pesanan');
		$data = array(
			array('tanggal_pesanan'   => $this->input->post('tanggal-pesanan1'),
				  'nama_menu'         => $this->input->post('nama-menu1'),
				  'harga'             => $this->input->post('harga1'),
				  'waktu'             => $this->input->post('waktu1'),
				  'status_pengiriman' => $this->input->post('status-pengiriman1'),
				  'id_kotak'          => $id_kotak1,
				  'id_pesanan'        => $id_pesanan,
				),
			array('tanggal_pesanan'   => $this->input->post('tanggal-pesanan2'),
				  'nama_menu'         => $this->input->post('nama-menu2'),
				  'harga'             => $this->input->post('harga2'),
				  'waktu'             => $this->input->post('waktu2'),
				  'status_pengiriman' => $this->input->post('status-pengiriman2'),
				  'id_kotak'          => $id_kotak2,
				  'id_pesanan'        => $id_pesanan,
				),
		);

		$this->db->insert_batch('detail_pesanan_harian', $data);

		$update = array(
			array(
				'id_kotak'     => $id_kotak1,
				'status_kotak' => 'Terpakai',
			),
			array(
				'id_kotak'     => $id_kotak2,
				'status_kotak' => 'Terpakai',
			),
		);
		$this->db->update_batch('kotak', $update, 'id_kotak');

		
		$this->session->set_userdata('action', 'tambah_data');
		redirect_back();
	}

	function view_detail_pesanan()
	{
		$id_pesanan = $this->uri->segment('3');
		$data_pesanan = $this->db->where('id_pesanan', $id_pesanan)->get('pesanan_harian')->row();
		$data_pagi = $this->m_utility->getreq('waktu','PAGI', 'detail_pesanan_harian')->result();
		$data_sore = $this->m_utility->getreq('waktu','SORE', 'detail_pesanan_harian')->result();
		$data_detail_pesanan = $this->db->where('id_pesanan', $id_pesanan)->get('detail_pesanan_harian')->result();

		$data['detail_pesanan'] = $data_detail_pesanan;
		$data['pesanan'] = $data_pesanan;
		$data['pesanan_pagi'] = $data_pagi;
		$data['pesanan_sore'] = $data_sore;


		$this->load->view('navbar.php');
		$this->load->view('pesanan/detailPesananHarian',$data);
	}

	function proses_tambah_pagi()
	{
		$nama_menu = $this->input->post('nama_menu');
		$data = $this->m_pesanan_harian->getting_pagi($nama_menu);
		echo json_encode($data);
	}

	function proses_tambah_sore()
	{
		$nama_menu = $this->input->post('nama_menu');
		$data = $this->m_pesanan_harian->getting_sore($nama_menu);
		echo json_encode($data);
	}

	function sortir_up(){
		$keyword = $this->input->post('keyword');
		$data['pesanan'] = $this->m_pesanan_harian->up($keyword);
		$this->load->view('navbar.php');
		$this->load->view('pesanan/resultPesananHarian', $data);
	}

	function sortir_down(){
		$keyword = $this->input->post('keyword');
		$data['pesanan'] = $this->m_pesanan_harian->down($keyword);
		$this->load->view('navbar.php');
		$this->load->view('pesanan/resultPesananHarian', $data);
	}
 
   
}
