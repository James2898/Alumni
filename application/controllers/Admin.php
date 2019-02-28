<?php
	class Admin extends CI_Controller {

		function __construct(){
			parent::__construct();

			session_start();
			$this->load->helper(array('form','url'));
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


		function upload_form(){
			$page_data['page_name']		=	'upload_form';
			$page_data['error']		=	'';
			$this->load->view('backend/index',$page_data);
		}

		function upload(){
			$config['upload_path']		=	'assets/img/profile_picture/';
			$config['file_name']		=	'James';
			$config['allowed_types']	=	'gif|jpg|png';
			$config['max_size']			=	100;
			$config['max_width']		=	1024;
			$config['max_height']		=	720;

			$this->upload->initialize($config);
			if(!$this->upload->do_upload('profile_picture')){
				$error = array('error' => $this->upload->display_errors());
				$page_data['page_name']	=	'upload_form';
				$page_data['error']		=	array('error' => $this->upload->display_errors());
                $this->load->view('backend/index', $page_data);
			}else{
				$data = array('upload_data' => $this->upload->data());
                $page_data['page_name']	=	'upload_success';
                $this->load->view('backend/index', $page_data);
			}
		}
	}
?>