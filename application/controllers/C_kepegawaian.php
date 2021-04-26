<?php 
 
 
class C_kepegawaian extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		$this->load->model("m_utility");		
        $this->load->model("m_kepegawaian");

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
		$data_kepegawaian = $this->m_utility->tampil_data('kepegawaian')->result();
		$data['kepegawaian'] = $data_kepegawaian;
		$this->load->view('navbar.php');
		$this->load->view('kepegawaian/daftarKaryawan',$data);
	}
	
	function gaji_pegawai(){
		$data['kepegawaian'] = $this->m_kepegawaian->get_gaji_pegawai()->result();
		$this->load->view('navbar.php');
		$this->load->view('kepegawaian/daftarGaji',$data);
	}
	
    function info_gaji($id_kepegawaian){
        $data['data_kepegawaian'] = $this->db->where('id_kepegawaian', $id_kepegawaian)->get('kepegawaian')->row();
		$data_kepegawaian = $this->m_kepegawaian->get_detail_gaji_pegawai($id_kepegawaian)->result();
		$data['kepegawaian'] = $data_kepegawaian;
		$this->load->view('navbar.php');
		$this->load->view('kepegawaian/detailGaji',$data);
	}

	function gaji_personel(){
        $this->load->view('navbar-personel.php');
		$this->load->view('kepegawaian/gajiPersonel');
	}
 
	function tambah(){
		$this->load->view('navbar.php');
		$this->load->view('kepegawaian/tambahKaryawan');
	}
 
 
    // =============== FUNGSI-FUNGSI PEMROSESAN DATA ================== //
    
    function bayar_gaji($id_gaji){

    	$status = $this->input->post('status');
    	$tanggal_pembayaran = $this->input->post('tanggal_pembayaran');
    	$nominal = $this->input->post('nominal');

        $data = array(
            'status' => $status,
            'tanggal_pembayaran' => $tanggal_pembayaran,
            );
        $this->m_kepegawaian->bayar_gaji_pegawai($data, $id_gaji);

        $data = array(
        	'jenis_transaksi' => 'Pengeluaran',
        	'deskripsi' => 'Pembayaran gaji pegawai',
        	'tanggal_masuk' => date('Y-m-d'),
        	'periode' => date('F'),
        	'nominal' => $nominal, );
        if ($this->m_utility->save($data, 'keuangan')==true){
			$this->session->set_flashdata('tambah', true);
		}else{
			$this->session->set_flashdata('tambah', false);
		}
        redirect_back();             
    }

    function tambah_gaji()
    {
		$id_kepegawaian = $this->input->post('id_kepegawaian');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
    	$tanggal_pembayaran = $this->input->post('tanggal_pembayaran');
    	$gaji = $this->input->post('gaji');
		$cek = $this->m_kepegawaian->cek_bayar($id_kepegawaian, $bulan, $tahun);
		
		if($cek > 0){
			$this->session->set_flashdata('maaf', 'maaf data sudah tersedia');
		}else{
    	$data = array(
    				'id_kepegawaian' => $id_kepegawaian,
    			    'bulan'     => $bulan,
    			    'tahun'     => $tahun,
    			    'tanggal_pembayaran' => $tanggal_pembayaran,
    			    'gaji' => $gaji,
    			    'status'             => 'BELUM LUNAS',);
    	
		$this->m_kepegawaian->input_data($data, 'gaji_pegawai');
		$this->session->set_flashdata('berhasil', 'Berhasil Tersimpan');	
		}
		redirect('c_kepegawaian/info_gaji/'.$id_kepegawaian);
    }
    
	function tambah_aksi(){
		$nama = $this->input->post('nama-karyawan');
		$ttl = $this->input->post('ttl-karyawan');
		$kelamin = $this->input->post('kelamin-karyawan');
		$agama = $this->input->post('agama-karyawan');
		$alamat = $this->input->post('alamat-karyawan');
		$jabatan = $this->input->post('jabatan-karyawan');
		$gaji = $this->input->post('gaji');
		$telp = $this->input->post('telp-karyawan');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
		$data = array(
			'nama_pegawai' => $nama,
			'ttl' => $ttl,
			'jenis_kelamin' => $kelamin,
			'agama' => $agama,
			'alamat' => $alamat,
			'jabatan' => $jabatan,
			'gaji' => str_replace(',', '', $gaji),
			'telp' => $telp
			);
		if ($this->m_utility->save($data,'kepegawaian')==true){
			$this->session->set_flashdata('tambah', true);
		}else{
			$this->session->set_flashdata('tambah', false);
		}
		
		$data = array(
			'id_kepegawaian' => $id_pegawai,
			'username' => $username,
			'password' => $password,
			);
	    $this->m_utility->input_data($data,'user');
		
		$this->session->set_userdata('action', 'tambah_data');
		redirect('c_kepegawaian/');
	}
	
    function edit_aksi_pegawai(){
        $id = $this->input->post('id-pegawai');       
        $nama = $this->input->post('nama-karyawan');
		$ttl = $this->input->post('ttl-karyawan');
		$kelamin = $this->input->post('kelamin-karyawan');
		$agama = $this->input->post('agama-karyawan');
		$alamat = $this->input->post('alamat-karyawan');
		$jabatan = $this->input->post('jabatan-karyawan');
		$gaji = $this->input->post('gaji');
		$telp = $this->input->post('telp-karyawan');
 
		$data = array(
			'nama_pegawai' => $nama,
			'ttl' => $ttl,
			'jenis_kelamin' => $kelamin,
			'agama' => $agama,
			'alamat' => $alamat,
			'jabatan' => $jabatan,
			'gaji' => str_replace(',', '', $gaji),
			'telp' => $telp
	    );
	    
        $where_condition = array(
			'id_kepegawaian' => $id,
			);
			
		
		if ($this->m_utility->edit('kepegawaian', $data, $where_condition)==true){
			$this->session->set_flashdata('edit', true);
		}else{
			$this->session->set_flashdata('edit', false);
		}
		redirect('c_kepegawaian/');                
    }
	
    function hapus_pegawai(){
        $id = $this->uri->segment('3');
        if($this->m_utility->delete($id)==true){
			$this->session->set_flashdata('hapus', true);
		}else{
			$this->session->set_flashdata('hapus', false);
		}
        redirect('c_kepegawaian/');                
    }
 
}
