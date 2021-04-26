<?php 
 
 
class C_pesanan extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		$this->load->model("m_utility");		
        $this->load->model("m_pesanan");
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
		$data_pesanan = $this->m_utility->tampil_data('pesanan')->result();
		$data['pesanan'] = $data_pesanan;
		$this->load->view('navbar.php');
		$this->load->view('pesanan/daftarPesanan',$data);
	}

	function index_hutang(){
		$id_pesanan  = $this->uri->segment('3');
		$data_hutang = $this->db->where('id_pesanan', $id_pesanan)->get('hutang_pesanan')->result();
		$data_pesanan = $this->db->where('id_pesanan', $id_pesanan)->get('pesanan')->row();
		$pesanan = $this->db->where('id_pesanan', $id_pesanan)->get('pesanan')->row();
		$data['hutang'] = $data_hutang;
		$data['pesanan'] = $data_pesanan;
		$data['check'] = $pesanan;
		$this->load->view('navbar.php');
		$this->load->view('pesanan/detailPembayaranHutang', $data);
	}

	function tambah_aksi_hutang()
    {
    	$id_pesanan = $this->input->post('id-pesanan');
    	$nomor      = $this->input->post('nomor-pembayaran');
    	$atm        = $this->input->post('atm');
    	$tanggal    = $this->input->post('tanggal');
    	$jumlah     = $this->input->post('jumlah');

    	$query = $this->db->where('id_pesanan', $id_pesanan)->get('pesanan');
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
		}else{
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
		$this->db->update('pesanan', $update);

		}
		}
	}
		$this->session->set_userdata('action', 'tambah_data'); 
		redirect_back();
    }

 
	function tambah(){
		$row = $this->m_pesanan->kodepesanan();
		$nomor_urut = (int) substr($row, 12, 4);
		$kode_tambah = $nomor_urut + 1;
		$data = array('id_pesanan' => $kode_tambah);
		$this->load->view('navbar.php');
		$this->load->view('pesanan/tambahPesanan', $data);
	}

	function daftarKotak(){
		$data_kotak = $this->m_utility->tampil_data('kotak')->result();
		$data_kotak_tersedia = $this->m_utility->getreq('status_kotak','Tersedia', 'kotak')->result();
		$data_kotak_dipakai = $this->m_utility->getreq('status_kotak','Terpakai', 'kotak')->result();
		
		$data['kotak'] = $data_kotak;
		$data['kotak_tersedia'] = $data_kotak_tersedia;
		$data['kotak_dipakai'] = $data_kotak_dipakai;
		$this->load->view('navbar.php');
		$this->load->view('pesanan/daftarKotak',$data);
	}

	function tambahKotak(){
		$row = $this->m_pesanan->kodeotomatis();
		$nomor_urut = substr($row, 5, 5);
		$kode_tambah = $nomor_urut + 1;
		$data = array('id_kotak' => $kode_tambah);
		$this->load->view('navbar.php');
		$this->load->view('pesanan/tambahKotak', $data);
	}
 
 
 
    //============= FUNGSI-FUNGSI PEMROSESAN DATA ================//
    
	function tambah_aksi_pesanan(){
		$id_pesanan = $this->input->post('id-pesanan');
		$nama 		= $this->input->post('nama-pemesan');
		$kontak 	= $this->input->post('kontak-pesanan');
		$alamat     = $this->input->post('alamat');
		$namaMenu 	= $this->input->post('nama-pesanan');
		$status 	= $this->input->post('status-pembayaran');
		$tanggal 	= $this->input->post('tanggal-pesanan');
		$harga      = $this->input->post('harga-pesanan');
		$qty     	= $this->input->post('qty');
		$pembayaran = $this->input->post('pembayaran');
		$sisa    	= $this->input->post('sisa');
		$total_harga= $this->input->post('total-harga');
		if($status=="LUNAS"){
			$data = array(
			'id_pesanan' => $id_pesanan,
			'nama_pemesan' => $nama,
			'kontak_pemesan' => $kontak,
			'alamat' => $alamat,
			'nama_menu' => $namaMenu,
			'status_pembayaran' => $status,
			'status_pesanan' => 'Diproses',
			'tanggal_pesanan' => $tanggal,
			'harga' => $harga,
			'qty' => $qty,
			'pembayaran' => $total_harga,
			'sisa_pembayaran' => '0',
			'total_harga' => $total_harga,
		);
		}elseif($status=="DP"){
		$data = array(
			'id_pesanan' => $id_pesanan,
			'nama_pemesan' => $nama,
			'kontak_pemesan' => $kontak,
			'alamat' => $alamat,
			'nama_menu' => $namaMenu,
			'status_pembayaran' => $status,
			'status_pesanan' => 'Diproses',
			'tanggal_pesanan' => $tanggal,
			'harga' => $harga,
			'qty' => $qty,
			'pembayaran' => $pembayaran,
			'sisa_pembayaran' => $sisa,
			'total_harga' => $total_harga,
		);
		}
		if ($this->m_utility->save($data, 'pesanan')==true){
			$this->session->set_flashdata('tambah', true);
		}else{
			$this->session->set_flashdata('tambah', false);
		}

		$data_barang = array(
			'nama_menu' => $namaMenu,
			'harga' => $harga, 
		);
		
		$this->m_utility->input_barang($data_barang, 'histori_pesanan');

		$data_insert = array(
			'jenis_transaksi' => 'Pemasukan',
			'deskripsi' => 'Pembayaran pesanan',
			'tanggal_masuk' => $tanggal,
			'periode' => Date('F'),
			'nominal' => $total_harga,
		);

		$this->m_utility->input_more($data_insert, 'keuangan');
		redirect('c_pesanan/');
	}

	function tambah_aksi_kotak(){
 		$id_kotak = $this->input->post('id-kotak');
		$data = array(
			'id_kotak' => $id_kotak,
			'status_kotak' => 'Tersedia',
			'tanggal' => Date('Y-m-d H:i:s')
			);
		if ($this->m_utility->save($data, 'kotak')==true){
			$this->session->set_flashdata('tambah', true);
		}else{
			$this->session->set_flashdata('tambah', false);
		}
		redirect('c_pesanan/daftarKotak');
    	}
    
    function view_edit($id_pesanan)
    {
    	$data['data_pesanan'] = $this->db->where('id_pesanan', $id_pesanan)->get('pesanan')->row();
    	$this->load->view('navbar.php');
    	$this->load->view('pesanan/editPesanan', $data);

    }

    function view_edit_kotak($id_kotak)
    {
    	$data['data_kotak'] = $this->db->where('id_kotak', $id_kotak)->get('kotak')->row();
    	$this->load->view('navbar.php');
    	$this->load->view('pesanan/edit', $data);
    }
    
    function edit_aksi_pesanan(){
		$id_pesanan = $this->uri->segment('3');
		$nama = $this->input->post('nama-pemesan', true);
		$kontak = $this->input->post('kontak-pesanan', true);
		$alamat     = $this->input->post('alamat', true);
		$namaMenu = $this->input->post('nama-pesanan', true);
		$status_pembayaran = $this->input->post('status-pembayaran', true);
		$status_pesanan = $this->input->post('status-pesanan', true);
		$tanggal = $this->input->post('tanggal-pesanan', true);
		$harga = $this->input->post('harga-pesanan', true);
		$qty     	= $this->input->post('qty', true);
		$sisa    	= $this->input->post('sisa', true);
		$total_harga= $this->input->post('total-harga', true);
		$cek = $this->m_pesanan->cek_pesanan($nama_pemesan);
		
		$where_condition = array(
			'id_pesanan' => $id_pesanan,
			);

			$data = array(
				'nama_pemesan' => $nama,
				'kontak_pemesan' => $kontak,
				'alamat' => $alamat,
				'nama_menu' => $namaMenu,
				'status_pembayaran' => $status_pembayaran,
				'status_pesanan' => $status_pesanan,
				'tanggal_pesanan' => $tanggal,
				'harga' => $harga,
				'qty' => $qty,
				'sisa_pembayaran' => $sisa,
				'total_harga' => $total_harga
			);

			if ($this->m_utility->edit('pesanan', $data, $where_condition)==TRUE){
				$this->session->set_flashdata('edit', true);
			}else{
				$this->session->set_flashdata('edit', false);
			}             
			redirect('c_pesanan/index/'.$id_pesanan);
    }
    
    
    function edit_aksi_kotak(){
        $id = $this->input->post('id-edit-kotak');
    	$id_baru = $this->input->post('id-kotak');
		$status = $this->input->post('status-kotak');
		
        $where_condition = array(
			'id_kotak' => $id,
			);
			
		$data = array(
			'id_kotak' => $id_baru,
			'status_kotak' => $status
			);
		
		if ($this->m_utility->edit('kotak', $data, $where_condition)==true){
			$this->session->set_flashdata('edit', true);
		} else {
			$this->session->set_flashdata('edit', false);
		}
		redirect('c_pesanan/daftarKotak');                
    }
    
    
    function hapus_pesanan(){
        $id = $this->uri->segment('3');
        if ($this->m_utility->delete($id)==true){
			$this->session->set_flashdata('hapus', true);
		}else{
			$this->session->set_flashdata('hapus', false);
		}
        redirect('c_pesanan/');                
    }
    
    function hapus_kotak(){
        $id = $this->uri->segment('3');
        if ($this->m_utility->delete($id)==true){
			$this->session->set_flashdata('hapus', true);
		}else{
			$this->session->set_flashdata('hapus', true);
		}
        redirect('c_pesanan/daftarKotak');                
    }  

    function proses_tambah(){
		$nama_menu = $this->input->post('nama_menu');
		$data = $this->m_pesanan->getting($nama_menu);
		echo json_encode($data);
	}  

	function sortir_up(){
		$keyword = $this->input->post('keyword');
		$data['pesanan'] = $this->m_pesanan->up($keyword);
		$this->load->view('navbar.php');
		$this->load->view('pesanan/resultPesanan', $data);
	}

	function sortir_down(){
		$keyword = $this->input->post('keyword');
		$data['pesanan'] = $this->m_pesanan->down($keyword);
		$this->load->view('navbar.php');
		$this->load->view('pesanan/resultPesanan', $data);
	}
   
}
