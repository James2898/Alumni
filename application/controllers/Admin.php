<?php
	class Admin extends CI_Controller {

		function __construct(){
			parent::__construct();

			session_start();

			$this->load->database();
	       /*cache control*/
			$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
			$this->output->set_header('Pragma: no-cache');
		}

		function index(){
			

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