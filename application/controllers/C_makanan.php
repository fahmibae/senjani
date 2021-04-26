<?php 
 
 
class C_makanan extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		$this->load->model("m_utility");		
        $this->load->model("m_makanan");	

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
        $data_makanan = $this->m_utility->tampil_data('makanan')->result();
		$data['makanan'] = $data_makanan;
		$data['jumlah_makanan'] = count($data_makanan);
		$this->load->view('navbar.php');
		$this->load->view('makanan/daftarMenu',$data);
	}
 
	function tambah(){
		$this->load->view('navbar.php');
		$this->load->view('makanan/tambahMenu');
	}
 
 
 
    // ============ FUNGSI-FUNGSI PEMROSESAN DATA ====================//
 
	function tambah_aksi(){
		$kategori = $this->input->post('kategori-menu');
		$namaMenu = $this->input->post('nama-menu');
		$harga = $this->input->post('harga-menu');
		$deskripsi = $this->input->post('deskripsi-menu');
		$upload = $this->input->post('upload-menu');
	 	$config['upload_path'] = 'images/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size']       = 20480000;
        $config['max_width']      = 20000;
        $config['max_height']     = 20000;

        if(empty($_FILES['upload-menu']['name'])){
            $file_name = $config['upload_path'].'default_image.png';
        }else{
            $config['file_name'] = str_replace(".","",microtime(true));
            
            // Upload File
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('upload-menu')) {
            	echo $this->upload->display_errors('<p>', '</p>');
            } else {
                $data = array('image_metadata' => $this->upload->data());
            }
            
            $file_name = $config['upload_path'].$config['file_name'].$this->upload->data('file_ext');
        }

 
		$data = array(
			'kategori' => $kategori,
			'nama_menu' => $namaMenu,
			'harga' => $harga,
			'deskripsi' => $deskripsi,
			'foto' => $file_name
			);
		if ($this->m_utility->save($data,'makanan')==TRUE){
			$this->session->set_flashdata('tambah', true);
		}else{
			$this->session->set_flashdata('tambah', false);
		}
		redirect('c_makanan/');
	}


    function edit_aksi_menu(){
        $id = $this->input->post('id-menu');
		$kategori = $this->input->post('kategori-menu');
		$namaMenu = $this->input->post('nama-menu');
		$harga = $this->input->post('harga-menu');
		$deskripsi = $this->input->post('deskripsi-menu');
		$foto_menu_prev = $this->input->post('foto-menu-prev');
		$upload = $this->input->post('upload-menu');
	 	$config['upload_path'] = 'images/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size']       = 20480000;
        $config['max_width']      = 20000;
        $config['max_height']     = 20000;
        if(empty($_FILES['upload-menu']['name'])){
    		$data = array(
			    'kategori' => $kategori,
			    'nama_menu' => $namaMenu,
			    'harga' => $harga,
			    'deskripsi' => $deskripsi
			);
        }else{
            $config['file_name'] = str_replace(".","",microtime(true));
            
            // Upload File
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('upload-menu')) {
            	echo $this->upload->display_errors('<p>', '</p>');
            } else {
                @unlink($foto_menu_prev);
                $data = array('image_metadata' => $this->upload->data());
            }
            $file_name = $config['upload_path'].$config['file_name'].$this->upload->data('file_ext');
    		$data = array(
			    'kategori' => $kategori,
			    'nama_menu' => $namaMenu,
			    'harga' => $harga,
			    'deskripsi' => $deskripsi,
			    'foto' => $file_name
			);
        }
        
        
        $where_condition = array(
	    	'id_makanan' => $id,
		);
		
		if ($this->m_utility->edit('makanan', $data, $where_condition)==TRUE){
			$this->session->set_flashdata('edit', true);
		} else {
			$this->session->set_flashdata('edit', false);			
		}
		redirect('c_makanan/');              
    }


	function delete_aksi(){
		$id = $this->uri->segment('3');
		if ($this->m_utility->delete($id)==TRUE){
			$this->session->set_flashdata('hapus', true);
		}else{
			$this->session->set_flashdata('hapus', false);
		}
		redirect('c_makanan/');
	}

    function search(){
		$keyword = $this->input->post('keyword');
		$data['makanan'] = $this->m_makanan->search($keyword);
		$this->load->view('navbar.php');
		$this->load->view('makanan/resultMakanan', $data);
	}

	function sortir_up(){
		$keyword = $this->input->post('keyword');
		$data['makanan'] = $this->m_makanan->up($keyword);
		$this->load->view('navbar.php');
		$this->load->view('makanan/resultMakanan', $data);
	}
	function sortir_down(){
		$keyword = $this->input->post('keyword');
		$data['makanan'] = $this->m_makanan->down($keyword);
		$this->load->view('navbar.php');
		$this->load->view('makanan/resultMakanan', $data);
	}
 
}
