<?php
class Editorial_model extends CI_Model{
	public function __construct()
	{
		$this->load->database('adraynaline');
	}
	protected $table = 'editorial';

	public function add_editorial()
	{
		
		$name_edito = $this->input->post('name_edito');
		$name_serie = $this->input->post('name_serie');
		$id_ph = $this->input->post('id_ph');
		$hair = $this->input->post('hair');
		$makeup = $this->input->post('makeup');
		$autres = $this->input->post('autres');
		$date_publication = $this->input->post('date_publication');
		$this->db->set('name_edito', $name_edito)
			->set('name_serie',$name_serie)
			->set('id_ph', $id_ph)
			->set('hair', $hair)
			->set('makeup', $makeup)
			->set('autres', $autres)
			->set('date_publication',$date_publication)
			->insert($this->table);
	}
	  public function show_editorial($id) {
        $this->db->select('*')->from('editorial')->where('id_edito',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        { return $query->row_array();
        }
        else {return NULL;}

    }
    public function get_editorial() {
        $this->db->select('id_edito,name_edito,id_ph,hair,makeup')->from('editorial');
        $query = $this->db->get();
        return $editorial = $query->result();

    }
   	public function get_img_other_id($id){
   		$this->db->select('*')->from('files')->where('id_type',$id);
   		$query = $this->db->get();
        return $editorial = $query->result();
   	}
    public function get_ph(){
    	$this->db->select('id,name_ph')->from('photographer');
    	$query = $this->db->get();
    	return $ph = $query->result();
    }
     public function delete_editorial($id){
    	$this->db->delete('editorial', array('id_edito' => $id));
    	$this->session->set_flashdata('result', 'Successfully deleted !');

    }
    public function delete_editorial_and_img($id){
        $this->db->delete('files', array('id_type' => $id, 'type' => '1'));
        $this->session->set_flashdata('result', 'Successfully deleted !');

    }
    public function get_ph_show($ph){
    	$this->db->select('*')->from('photographer')->where('id',$ph);
    	$query = $this->db->get();
        if ($query->num_rows() > 0)
        { return $query->row_array();
        }
        else {return NULL;}
    }
    public function get_img_main_id($id){
    	$this->db->select('*')->from('files')->where('id_type',$id)->where('main','1');
    	$query = $this->db->get();
        if ($query->num_rows() > 0)
        { return $query->row_array();
        }
        else {return NULL;}
    }
    
    public function insert_file($filename, $title, $type, $id_type, $id_photographer, $main)
    {
        $data = array(
            'filename'      	=> $filename,
            'title'         	=> $title,
            'type'				=> $type,
            'id_type'			=> $id_type, 
            'id_photographer'	=> $id_photographer,
            'main'				=> $main
        );
        $this->db->insert('files', $data);
        return $this->db->insert_id();

    }
    public function insert_file_upload($filename, $title, $type, $id_type, $id_photographer, $main)
    {
        $data = array(
            'filename'      	=> $filename,
            'title'         	=> $title,
            'type'				=> $type,
            'id_type'			=> $id_type, 
            'id_photographer'	=> $id_photographer,
            'main'				=> $main
        );
        $this->db->insert('files', $data);
        return $this->db->insert_id();

    }
    public function update_main_exist($id_type){
    	$data = array(
               'main_exist' => '1'
            );

		$this->db->where('id_edito', $id_type);
		$this->db->update('editorial', $data); 
    	
        $this->session->set_flashdata('result', 'Successfully Updated !');
    }

}