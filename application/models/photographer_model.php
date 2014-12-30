<?php
class Photographer_model extends CI_Model{

	protected $table = 'photographer';

	public function add_photographer()
	{
		$this->load->database('adraynaline');
		$name_ph = $this->input->post('name_ph');
		$website = $this->input->post('website');
		$this->db->set('name_ph', $name_ph)
			->set('website', $website)
			->insert($this->table);
	}

    public function get_photographer() {
        $this->db->select('id,name_ph,website')->from('photographer');
        $query = $this->db->get();
        return $phph = $query->result();
    }
    public function delete_photographer($id){
    	$this->db->delete('photographer', array('id' => $id));
    	$this->session->set_flashdata('result', 'Successfully deleted !');

    }


}