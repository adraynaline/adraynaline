<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
define('PAGE_CSS','genral');

class AdminLogin extends CI_Controller {

	function __construct()
   {
     parent::__construct();
    
     
   }
	public function index()
	{
		$this->load->view('admin/layout/header');
		$this->load->helper(array('form'));
		$this->load->view('admin/login');
		$this->load->view('admin/layout/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */