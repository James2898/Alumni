<?php
	class Admin extends CI_Controller {

		function __construct(){
			parent::__construct();
			$this->load->database();
	        $this->load->library('session');
			
	       /*cache control*/
			$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
			$this->output->set_header('Pragma: no-cache');
		}

		function index(){
			if ($this->session->userdata('admin_login') != 1)
            	redirect(base_url() . 'index.php/login', 'refresh');
            if($this->session->userdata('admin_login') == 1)
            	redirect(base_url() . 'index.php/admin/dashboard', 'refresh');

		}

		function dashboard(){
			$page_data['page_name']		=	'dashboard';
			$this->load->view('backend/index', $page_data);
		}

		function announcement(){
			$page_data['page_name']		=	'announcement';
			$this->load->view('backend/index',$page_data);
		}

		function alumni(){
			$page_data['page_name']		=	'alumni';
			$this->load->view('backend/index',$page_data);
		}


		function notifications(){
			$page_data['page_name']		=	'notifications';
			$this->load->view('backend/index',$page_data);
		}

		function appointment(){
			$page_data['page_name']		=	'appointment';
			$this->load->view('backend/index',$page_data);
		}

		function profile(){
			$page_data['page_name']		= 	'profile';
			$this->load->view('backend/index', $page_data);
		}
	}
?>