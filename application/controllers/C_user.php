<?php 
class C_User extends CI_Controller{
 
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
 
	
	function profil(){
	    $email = $this->session->userdata('email'); 
	    $password = $this->session->userdata('password');
	    $result = $this->m_user->get_data_user($email, $password)->result();
	    $data['profil'] = $result;
	    $this->load->view('navbar.php');
		$this->load->view('profile', $data);
	}

	function profil_personel()
	{
		$email = $this->session->userdata('email'); 
	    $password = $this->session->userdata('password');
	    $result = $this->m_user->get_data_user($email, $password)->result();
	    $data['profil'] = $result;
	    $this->load->view('navbar-personel.php');
		$this->load->view('profile-personel', $data);
	}

	function profil_kurir()
	{
		$email = $this->session->userdata('email'); 
	    $password = $this->session->userdata('password');
	    $result = $this->m_user->get_data_user($email, $password)->result();
	    $data['profil'] = $result;
	    $this->load->view('navbar-kurir.php');
		$this->load->view('profile-kurir', $data);
	}
	
	//================= FUNGSI-FUNGSI PEMROSESAN DATA ================//
	
	function edit_data(){
	    $email = $this->input->post('email');
    	$password = $this->input->post('password');
    	$id = $this->input->post('id-pegawai');       
        $nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$telp = $this->input->post('telepon');
        $cv_prev = $this->input->post('cv-prev');
		$upload = $this->input->post('cv');
	 	$config['upload_path'] = 'file_cv/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
        $config['max_size']       = 20480000;
        $config['max_width']      = 20000;
        $config['max_height']     = 20000;

        if(empty($_FILES['cv']['name'])){
    		$data = array(
			    'nama_pegawai' => $nama,
			    'alamat' => $alamat,
			    'telp' => $telp
	        );
        }else{
            $config['file_name'] = str_replace(".","",microtime(true));
            
            // Upload File
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('cv')) {
            	echo $this->upload->display_errors('<p>', '</p>');
            } else {
                @unlink($cv_prev);
                $data = array('image_metadata' => $this->upload->data());
            }
            $file_name = $config['upload_path'].$config['file_name'].$this->upload->data('file_ext');
    		$data = array(
			    'nama_pegawai' => $nama,
			    'alamat' => $alamat,
			    'telp' => $telp,
			    'file_cv' => $file_name
			);
        }

        $where_condition = array('id_kepegawaian' => $this->session->userdata('id_kepegawaian'));
        
        //EDIT TABLE kepegawaian
	    if ($this->m_utility->edit('kepegawaian', $data, $where_condition)==true){
			$this->session->set_flashdata('edit', true);
		}else{
			$this->session->set_flashdata('edit', false);
		}
	    
	    //EDIT TABLE user
	    $data = array(
			'email' => $email,
			'password' => $password,
	    );
	    $this->m_utility->edit('user', $data, $where_condition);
	    
	    redirect_back();
	}
	
	function download_cv(){
	    $this->load->helper('download');
	    $file_name = $this->input->get('cv_download');
	    if ($file_name != '') {
            $file = $file_name;
            // check file exists    
            if (file_exists( $file )) {
                 // get file content
                $data = file_get_contents ( $file );
                 //force download
                force_download ( $file_name, $data );
            } else {
                 redirect('c_user/profil');
            }
       }
	}
	
}

?>
