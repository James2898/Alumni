<?php  
	
	//session_start();

	if(!defined('BASEPATH'))
		exit('No direct script access allowed');
	
	class Login extends CI_Controller {
		
		function __construct() {
        	parent::__construct();
        	$this->load->model('login_model');
        	$this->load->database();
        	$this->load->library('session','form_validation');
        	$this->load->helper('form');
		}	

		public function index(){
			if ($this->session->userdata('login_level') == 1)
            	redirect(base_url() . 'index.php/admin/dashboard', 'refresh');
        	$this->load->view('backend/login');
		}


		// Check for user login process
		public function user_login_process() {

			$this->form_validation->set_rules('user_ID', 'user_ID', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
				if(isset($this->session->userdata['account_type'])){
					$this->load->view('backend/index');
				}else{
					$this->load->view('backend/login');
				}
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
							$this->session->set_userdata('account_type','admin');
							$this->session->set_userdata('admin_login','1');
							$this->session->set_userdata('login_level','1');
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



		// Logout from admin page
		public function logout() {

			// Removing session data
			$sess_array = array(
				'user_ID' => ''
			);
			$this->session->unset_userdata('login_level');
			$data['message_display'] = 'Successfully Logout';
			redirect(base_url().'index.php/login');
			//$this->load->view('backend/login', $data);
		}

	}
?>