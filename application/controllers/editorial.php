<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
define('PAGE_CSS','dashboard');
//session_start(); //we need to call PHP's session object to access it through CI
class Editorial extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('Editorial_model');
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

     $ph = array();
     
     $this->load->model('editorial_model');
     
     $data['editorial'] = $this->editorial_model->get_editorial();
     
     $ph['ph'] = $this->editorial_model->get_ph();

     $this->load->view('admin/layout/header',$data);
     $this->load->helper(array('form'));
     $this->load->view('admin/editorial',$ph, $data);
     $this->load->view('admin/add_modal');
     $this->load->view('admin/layout/footer');
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
   
 }
 function show($id){
    if($this->session->userdata('logged_in'))
   {
    
    //$this->info['title'] = 'User Management';
    $this->data['message'] = $this->session->flashdata('message');

//$this->load->view('your_view', $this->data); 
    //$this->info['message'] = $this->session->flashdata('message');
    
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];

     
     $other_img = array();
     $this->load->model('editorial_model');
     $data['editorial'] = $this->editorial_model->show_editorial($id);

     $data['img'] = $this->editorial_model->get_img_main_id($id);
     $data['other_img'] = $this->editorial_model->get_img_other_id($id);
     //$data['editorial'] = $this->editorial_model->get_editorial();

     $this->load->view('admin/layout/header',$data);
     
     $this->load->view('admin/show_editorial',$other_img, $data);
     $this->load->view('admin/add_modal');
     $this->load->view('admin/layout/footer');
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }
 function add_main_img_editorial(){
  if($this->input->post('filename','title','type','id_type','id_photographer','main')){
    $this->Editorial_model->add_main_img_editorial('filename','title','type','id_type','id_photographer','main');
    redirect('editorial', 'refresh');
  }
 }
 function add_editorial(){
     
    if($this->input->post('name_edito','name_serie','id_ph','hair','makeup','autres','date_publication')){
      $this->Editorial_model->add_editorial('name_edito','name_serie','id_ph','hair','makeup','autres','date_publication');
      redirect('editorial', 'refresh');
    }
 }
 function delete($id) {
    $this->Editorial_model->delete_editorial($id);
    $this->Editorial_model->delete_editorial_and_img($id);
    
    redirect('editorial','refresh');
  }
 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }

 public function upload_img()
  {
      $status = "";
      $msg = "";
      $file_element_name = 'userfile';       
      if (empty($_POST['title']))
      {
          $status = "error";
          $msg = "Please enter a title";
      }       
      if ($status != "error")
      {
          $config['upload_path'] = './files/';
          $config['allowed_types'] = 'gif|jpg|png|doc|txt';
          $config['max_size'] = 1024 * 8;
          $config['encrypt_name'] = TRUE;
   
          $this->load->library('upload', $config);
   
          if (!$this->upload->do_upload($file_element_name))
          {
              $status = 'error';
              $msg = $this->upload->display_errors('', '');
          }
          else
          {
              $data = $this->upload->data();
              $this->Editorial_model->update_main_exist($_POST['id_type']);
              $file_id = $this->Editorial_model->insert_file($data['file_name'], $_POST['title'],$_POST['type'],$_POST['id_type'],$_POST['id_photographer'],$_POST['main']);
              
              if($file_id)
              {
                  
                  $status = "success";
                  $msg = "File successfully uploaded";
              }
              else
              {
                  unlink($data['full_path']);
                  $status = "error";
                  $msg = "Something went wrong when saving the file, please try again.";
              }
          }
          @unlink($_FILES[$file_element_name]);
      }
      echo json_encode(array('status' => $status, 'msg' => $msg));
  }
  public function upload_img_other()
  {
      $status = "";
      $msg = "";
      $file_element_name = 'userfile';       
      if (empty($_POST['title']))
      {
          $status = "error";
          $msg = "Please enter a title";
      }       
      if ($status != "error")
      {
          $config['upload_path'] = './files/';
          $config['allowed_types'] = 'gif|jpg|png|doc|txt';
          $config['max_size'] = 1024 * 8;
          $config['encrypt_name'] = TRUE;
   
          $this->load->library('upload', $config);
   
          if (!$this->upload->do_upload($file_element_name))
          {
              $status = 'error';
              $msg = $this->upload->display_errors('', '');
          }
          else
          {
              $data = $this->upload->data();
              $file_id = $this->Editorial_model->insert_file_upload($data['file_name'], $_POST['title'],$_POST['type'],$_POST['id_type'],$_POST['id_photographer'],$_POST['main']);
              
              if($file_id)
              {
                  
                  $status = "success";
                  $msg = "File successfully uploaded";
              }
              else
              {
                  unlink($data['full_path']);
                  $status = "error";
                  $msg = "Something went wrong when saving the file, please try again.";
              }
          }
          @unlink($_FILES[$file_element_name]);
      }
      echo json_encode(array('status' => $status, 'msg' => $msg));
  }
public function files()
{
    $files = $this->files_model->get_files();
    $this->load->view('admin/files', array('files' => $files));
}
}

?>
