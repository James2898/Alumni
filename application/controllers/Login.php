<?php  
	
	session_start();

	if(!defined('BASEPATH'))
		exit('No direct script access allowed');
	
	class Login extends CI_Controller {
		
		function __construct() {
        	parent::__construct();
        	$this->load->model('login_model');
        	$this->load->database();
        	$this->load->library('form_validation');
        	$this->load->helper('form');

        	/* cache control */
	        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
	        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
	        $this->output->set_header('Pragma: no-cache');
	        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
		}	

		public function index(){

			if(!empty($_SESSION['account_type'])){
				redirect(base_url().'index.php/admin/dashboard', 'refresh');
			}
          	$this->load->view('backend/login');
        	
		}


		// Check for user login process
		public function user_login_process() {

			$this->form_validation->set_rules('user_ID', 'user_ID', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
				
			}else{
				$data = array(
					'user_ID' => $this->input->post('user_ID'),
					'password' => $this->input->post('password')
				);
				$result = $this->login_model->login($data);
				if ($result == TRUE) {

					$user_ID = $this->input->post('user_ID');
					$result = $this->login_model->read_user_information($user_ID);
					if ($result != false) {
						$login_level = $this->login_model->get_login_level($user_ID);
						if($login_level == '1'){
							redirect(base_url(). 'index.php/admin/dashboard', 'refresh');
						}
					}
				}else{
					$data = array(
						'error_message' => 'Invalid Username or Password'
					);
					$this->load->view('backend/login', $data);
				}
			}
		}

		public function login(){

			$data = array(
				'user_ID' => $this->input->post('user_ID'),
				'password' => $this->input->post('password')
			);
			$result = $this->login_model->login($data);
			if($result == TRUE){
				$user_ID = $this->input->post('user_ID');
				$result = $this->login_model->read_user_information($user_ID);
				if($result != FALSE){
					$login_level = $this->login_model->get_login_level($user_ID);
					if($login_level == '1'){
						$_SESSION['account_type']	=	'admin';
						redirect(base_url().'index.php/admin/dashboard','refresh');
					}
				}
			}else{
				$data = array(
					'error_message' => 'Invalid Username or Password'
				);
				$this->load->view('backend/login', $data);
			}
		}



		// Logout from admin page
		public function logout() {
			session_unset('account_type');
			redirect(base_url() . 'index.php/login', 'refresh');	
			//$this->load->view('backend/login', $data);
		}

	}
?>