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
			$page_data['page_name']		=	'dashboard';
			$this->load->view('backend/index', $page_data);
		}

		function dashboard(){
			$page_data['page_name']		=	'dashboard';
			$this->load->view('backend/index', $page_data);
		}

		function alumni_add(){
			$page_data['page_name']		= 	'alumni_add';
			$this->load->view('backend/index', $page_data);
		}

		function alumni_list(){
			$page_data['page_name']		= 	'alumni_list';
			$this->load->view('backend/index',$page_data);
		}

		function announcement(){
			$page_data['page_name']		=	'announcement';
			$this->load->view('backend/index',$page_data);
		}

		function profile(){
			$page_data['page_name']		= 	'profile';
			$this->load->view('backend/index', $page_data);
		}
	}
?>