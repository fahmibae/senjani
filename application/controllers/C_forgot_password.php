<?php 

class C_forgot_password extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model("m_user");
		$this->load->model("m_utility");
	}

	function index()
	{
		$this->load->view('forgot_password');
	}

	function check_email(){
		$email = $this->input->post('email',TRUE);

        $cek = $this->db->where('email',$email)->get('user')->row();
        $cek2 = count($cek);

    if($cek2 > 0)
    {
    		$data['logged_in'] = TRUE;
    		$data['id_user'] = $cek->id_user;
            $data['email'] = $cek->email;
            $this->session->set_userdata($data);

            redirect('c_forgot_password/view_password');

    }
    else
    {
    $this->session->set_flashdata('gagal','Gagal reset email tidak terdaftar!');

    redirect_back();
    }
	}

	function view_password()
	{
		$this->load->view('password_submit');
	}

	function update($id_user)
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$data = array(
			'email' => $email,
			'password' => $password,);

		if ($this->m_user->edit($data, $id_user)==true){
			$this->session->set_flashdata('edit', true);
		}else{
			$this->session->set_flashdata('edit', false);
		}

		$this->load->view('login', $data);
	}
	
}
