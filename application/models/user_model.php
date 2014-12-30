<?php
class User_model extends CI_Model{

	protected $table = 'users';

	public function add_user()
	{
		$this->load->database('adraynaline');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$mail = $this->input->post('mail');
		$master = $this->input->post('master');
		$this->db->set('username', $username)
			->set('password', md5($password))
			
			->set('mail',$mail)
			->set('master',$master)
			->insert($this->table);


	}

    public function get_user() {
        $this->db->select('id,username,password,mail,master')->from('users');
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function delete_user($id){
    	$this->db->delete('users', array('id' => $id));
    	$this->session->set_flashdata('result', 'Successfully deleted !');

    }


}