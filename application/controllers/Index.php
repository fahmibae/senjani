<?php 
class Index extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		$this->load->model("m_user");
	}
 
	function index(){
		$this->load->view('login');
	}
	
	//================= FUNGSI-FUNGSI PEMROSESAN DATA ================//
	
	function cek_login(){
	    $email = $this->input->post('email');
    	$password = $this->input->post('password');
    	$status_login = "login";
    	$result = $this->m_user->get_data_user($email, $password);
    	
    	if(($result->num_rows()) > 0){
    	   
    	   foreach($result->result() as $data_user){
	           $this->session->set_userdata('id_kepegawaian', $data_user->id_kepegawaian);
        	   $this->session->set_userdata('status_login', true);
        	   $this->session->set_userdata('status_login', $status_login);
        	   $this->session->set_userdata('email', $email);
        	   $this->session->set_userdata('password', $password);
        	   
        	   switch($data_user->jabatan){
        	        case 'Admin':
        	            redirect('c_dashboard_admin/dashboard_admin');        
        	            break;
        	        case 'Personel':
        	            redirect('c_dashboard_personel/dashboard_personel');        
        	            break;
        	        case 'Kurir':
        	            redirect('c_dashboard_kurir/dashboard_kurir');        
        	            break;
        	   }
    	   }
    	       
    	}else{
			$this->session->set_flashdata('maaf','Email Atau Password Anda Salah, Silahkan Coba Lagi');
    	   redirect('index/');
    	}    
	}
	
	function logout(){
	    $this->session->sess_destroy();
	    redirect('index/');
	}
	
}

?>
