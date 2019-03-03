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
			if ($_SESSION['account_type'] != 'admin')
            	redirect(base_url(), 'refresh');
			$page_data['page_name']		=	'dashboard';
			$this->load->view('backend/index', $page_data);
		}

		function announcement(){
			$page_data['page_name']		=	'announcement';
			$this->load->view('backend/index',$page_data);
		}

		function alumni($param1 = '', $param2 = ''){
			if ($_SESSION['account_type'] != 'admin')
            	redirect(base_url(), 'refresh');

            if($param1 == 'create'){

            	$data['alumni_student_ID']	=	$this->input->post('alumni_student_ID');
            	$data['alumni_profile_picture']	= 'empty';
            	$data['alumni_degree']		=	$this->input->post('alumni_degree');
            	$data['alumni_degree']	=	$this->input->post('alumni_degree');
            	$data['alumni_fname']	=	$this->input->post('alumni_fname');
            	$data['alumni_mname']	=	$this->input->post('alumni_mname');
            	$data['alumni_lname']	=	$this->input->post('alumni_lname');
            	$data['alumni_gender']	=	$this->input->post('alumni_gender');
            	$data['alumni_cno']		=	$this->input->post('alumni_cno');
            	$data['alumni_lno']		=	$this->input->post('alumni_lno');
            	$data['alumni_address']	=	$this->input->post('alumni_address');
            	$data['alumni_email']	=	$this->input->post('alumni_email');
            	$data['alumni_grad_year']	=	$this->input->post('alumni_grad_year');
            	$data['alumni_facebook']	=	$this->input->post('alumni_facebook');
            	$data['alumni_linkedin']	=	$this->input->post('alumni_linkedin');
            	$data['alumni_website']		=	$this->input->post('alumni_website');

            	$this->db->insert('alumni', $data);

            	$_SESSION['flashdata']	=	'Data Added';
            	session_write_close();
            	redirect(base_url().'index.php/admin/alumni','refresh');
            	exit();

            }else if($param1 == 'edit'){
            	$data['alumni_degree']	=	$this->input->post('alumni_degree');
            	$data['alumni_fname']	=	$this->input->post('alumni_fname');
            	$data['alumni_mname']	=	$this->input->post('alumni_mname');
            	$data['alumni_lname']	=	$this->input->post('alumni_lname');
            	$data['alumni_gender']	=	$this->input->post('alumni_gender');
            	$data['alumni_cno']		=	$this->input->post('alumni_cno');
            	$data['alumni_lno']		=	$this->input->post('alumni_lno');
            	$data['alumni_address']	=	$this->input->post('alumni_address');
            	$data['alumni_email']	=	$this->input->post('alumni_email');
            	$data['alumni_grad_year']	=	$this->input->post('alumni_grad_year');
            	$data['alumni_facebook']	=	$this->input->post('alumni_facebook');
            	$data['alumni_linkedin']	=	$this->input->post('alumni_linkedin');
            	$data['alumni_website']		=	$this->input->post('alumni_website');

            	/*$alumni_student_ID	=	$this->input->post('alumni_student_ID');
            	$is_profile_picture     = $this->db->get_where('alumni' , array('alumni_student_ID' => $alumni_student_ID))->row()->alumni_profile_picture;

            	$_SESSION['error_log']	=	$is_profile_picture;
            	if($is_profile_picture == 'empty'){
            		$data['alumni_profile_picture']		=	$this->input->post('alumni_student_ID')."jpg?/1234";
            	}*/

            	$this->db->where('alumni_student_ID',$param2);
            	$this->db->update('alumni',$data);
            	$_SESSION['flashdata']	=	'Data Updated';
            	session_write_close();
            	redirect(base_url() . 'index.php/admin/alumni', 'refresh');
            	exit();

            }else if($param1 == 'delete'){

            }


			$page_data['page_name']		=	'alumni';
			$this->load->view('backend/index',$page_data);
		}


		//ADMIN FUNCTIONS
		function admin_config($param1 = '', $param2){
			if($param1 = 'edit'){
				$data['admin_fname']	=	$this->input->post('admin_fname');
				$data['admin_mname']	=	$this->input->post('admin_mname');
				$data['admin_lname']	=	$this->input->post('admin_lname');
				$data['admin_email']	=	$this->input->post('admin_email');
				$data['admin_facebook']	=	$this->input->post('admin_facebook');
				$data['admin_cno']		=	$this->input->post('admin_cno');
				$data['admin_lno']		=	$this->input->post('admin_lno');

				$this->db->where('admin_ID', $param2);
				$this->db->update('admin', $data);
				$_SESSION['flashdata']	=	'Data Updated';
				session_write_close();
				redirect(base_url().'index.php/admin/profile', 'refresh');
			}
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

		function upload($param1	= ''){
			$config['upload_path']		=	'assets/img/profile_picture/';
			$config['file_name']		=	$param1;
			$config['allowed_types']	=	'gif|jpg|png';
			$config['overwrite']		=	TRUE;
			//$config['max_size']			=	100;
			//$config['max_width']		=	1024;
			//$config['max_height']		=	720;

			$this->upload->initialize($config);
			if(!$this->upload->do_upload('profile_picture')){
				$error = array('error' => $this->upload->display_errors());
				
				$_SESSION['flashdata']	=	'ERROR';
				$_SESSION['error_log']	=	$this->upload->display_errors();
               	session_write_close();
                redirect(base_url().'index.php/admin/alumni', 'refresh');
			}else{


				$alumni_student_ID	=	$param1;
            	$is_profile_picture     = $this->db->get_where('alumni' , array('alumni_student_ID' => $alumni_student_ID))->row()->alumni_profile_picture;

            	$_SESSION['error_log']	=	$is_profile_picture;
            	if($is_profile_picture == 'empty'){
            		$data['alumni_profile_picture']		=	$alumni_student_ID.".jpg?/1234";
            	}

            	$this->db->where('alumni_student_ID',$param1);
            	$this->db->update('alumni',$data);


				$data = array('upload_data' => $this->upload->data());
                
                $_SESSION['flashdata']	=	'Data Updated';
            	session_write_close();
            	redirect(base_url().'index.php/admin/alumni', 'refresh');
			}
		}

		function admin_upload($param1	= ''){
			$config['upload_path']		=	'assets/img/profile_picture/';
			$config['file_name']		=	$param1;
			$config['allowed_types']	=	'gif|jpg|png';
			$config['overwrite']		=	TRUE;
			//$config['max_size']			=	100;
			//$config['max_width']		=	1024;
			//$config['max_height']		=	720;

			$this->upload->initialize($config);
			if(!$this->upload->do_upload('profile_picture')){
				$error = array('error' => $this->upload->display_errors());
				
				$_SESSION['flashdata']	=	'ERROR';
				$_SESSION['error_log']	=	$this->upload->display_errors();
               	session_write_close();
                redirect(base_url().'index.php/admin/profile', 'refresh');
                //$page_data['page_name']	=	'profile';
                //$this->load->view('backend/index', $page_data);
			}else{


				$data = array('upload_data' => $this->upload->data());
                
                $_SESSION['flashdata']	=	'Data Updated';
            	session_write_close();
            	redirect(base_url().'index.php/admin/profile', 'refresh');
            	//$page_data['page_name']	=	'profile';
                //$this->load->view('backend/index', $page_data);
			}
		}
	}
?>