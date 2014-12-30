<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
define('PAGE_CSS','home');
//session_start(); //we need to call PHP's session object to access it through CI
class Manageadmin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('User_model');
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

     $result   = array();
     $this->load->model('user_model');
     
     $result['result'] = $this->user_model->get_user();
     

     $this->load->view('admin/layout/header',$data);
     $this->load->helper(array('form'));
     $this->load->view('admin/user',$result, $data);
     $this->load->view('admin/add_modal');
     $this->load->view('admin/layout/footer');
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
   
 }
 function add_user(){
     
    if($this->input->post('username','password','grade','mail')){
      $this->User_model->add_user('username','password','grade','mail');
      redirect('manageadmin', 'refresh');
    }
 }
 function delete($id) {
    $this->User_model->delete_user($id);
    
    redirect('manageadmin');
  }
 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }

}

?>
