<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
define('PAGE_CSS','dashboard');
//session_start(); //we need to call PHP's session object to access it through CI
class Photographer extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('Photographer_model');
  $this->load->library('form_validation');
  $this->load->library('session');

 }

 function index()
 {
  
   if($this->session->userdata('logged_in'))
   {
    
    //$this->info['title'] = 'User Management';
    $this->data['message'] = $this->session->flashdata('message');

//$this->load->view('your_view', $this->data); 
    //$this->info['message'] = $this->session->flashdata('message');
    
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];

     $phph   = array();
     $this->load->model('photographer_model');
     
     $phph['phph'] = $this->photographer_model->get_photographer();
     

     $this->load->view('admin/layout/header',$data);
     $this->load->helper(array('form'));
     $this->load->view('admin/photographer',$phph, $data);
     $this->load->view('admin/add_modal');
     $this->load->view('admin/layout/footer');
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
   
 }
 function add_photographer(){
     
    if($this->input->post('name_ph','website')){
      $this->Photographer_model->add_photographer('name_ph','website');
      redirect('photographer', 'refresh');
    }
 }
 function delete($id) {
    $this->Photographer_model->delete_photographer($id);
    
    redirect('photographer');
  }
 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }

}

?>
