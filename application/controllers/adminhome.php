<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
define('PAGE_CSS','home');
//session_start(); //we need to call PHP's session object to access it through CI
class AdminHome extends CI_Controller {

 function __construct()
 {
   parent::__construct();
    $this->load->model('files_model');
    $this->load->database();
 }

 function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $this->load->view('admin/layout/header',$data);

     $this->load->view('admin/home');
     $this->load->view('admin/add_modal');
     $this->load->view('admin/layout/footer');
     
   }
   else
   {
     //If no session, redirect to login page
     redirect('adminlogin', 'refresh');
   }
 }
function add_photographer(){
    if(isset($_POST['nom_categorie'])){
    $verif_cat_exist = verif_cat_exist($_POST['nom_categorie']);

    if($verif_cat_exist == 0){
        add_categorie($_POST['nom_categorie']);
        $reponse = 'ok';
    }
    else {
        $reponse = 'categorie existe deja';
    }   
}
$array['reponse'] = $reponse;
echo json_encode($array);
}
    public function upload_file()
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
            $file_id = $this->files_model->insert_file($data['file_name'], $_POST['title']);
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

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('adminlogin', 'refresh');
 }

}

?>
