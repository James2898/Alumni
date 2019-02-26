<?php  
	
	if(!defined('BASEPATH'))
		exit('No direct script access allowed');
	
	class Login extends CI_Controller {
		


		function __construct() {
        	parent::__construct();
        	//$this->load->model('crud_model');
        	$this->load->database();
        	$this->load->library('session');
		}	

		public function index(){
			if ($this->session->userdata('admin_login') == 1)
            	redirect(base_url() . 'index.php?admin/dashboard', 'refresh');

            $this->load->view('backend/login');
		}











	}
?>