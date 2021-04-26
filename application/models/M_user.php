<?php 
 
class M_user extends CI_Model{

    function cek_login($email, $password){
        $this->db->select('*');
		$this->db->from('user');
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$this->db->limit('1');
		return $this->db->get();
    }
    
    function get_data_user($email, $password){
        $this->db->select('*');
		$this->db->from('user');
		$this->db->join('kepegawaian', 'user.id_kepegawaian = kepegawaian.id_kepegawaian');
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		return $this->db->get();
    }

    function edit($data, $id_user)
    {
        $this->db->update('user', $data, array('id_user' => $id_user)); 
        return ($this->db->affected_rows()>0) ? TRUE : FALSE;
    }
}
