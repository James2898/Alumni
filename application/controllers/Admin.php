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
			date_default_timezone_set('Asia/Manila');
		}

		function index(){
			if ($_SESSION['account_type'] != 'admin'){
            	redirect(base_url(), 'refresh');
            	exit();
			}else{
				$page_data['page_name']		=	'dashboard';
				$this->load->view('backend/index', $page_data);
			}
		}

		function dashboard(){
			if ($_SESSION['account_type'] != 'admin')
            	redirect(base_url(), 'refresh');
			$page_data['page_name']		=	'dashboard';
			$this->load->view('backend/index', $page_data);
		}

		function announcement($param1 = '', $param2 = ''){
			if ($_SESSION['account_type'] != 'admin'){
            	redirect(base_url(), 'refresh');
            	exit();
			}

			if($param1 == 'create'){
				$data['announcement_title']		=	$this->input->post('announcement_title');
				$data['announcement_subject']	=	$this->input->post('announcement_subject');
				$data['announcement_content']	=	$this->input->post('announcement_content');
				$data['announcement_date']	=	date('Y-m-d H:m:s');
				$this->db->insert('announcement',$data);

				$_SESSION['flashdata']	=	'Data Added';
				session_write_close();
            	redirect(base_url().'index.php/admin/announcement','refresh');
            	exit();
			}else if($param1 == 'edit'){
				$data['announcement_title']		=	$this->input->post('announcement_title');
				$data['announcement_subject']	=	$this->input->post('announcement_subject');
				$data['announcement_content']	=	$this->input->post('announcement_content');

				$this->db->where('announcement_ID',$param2);
            	$this->db->update('announcement',$data);
            	$_SESSION['flashdata']	=	'Data Updated';
            	session_write_close();
            	redirect(base_url().'index.php/admin/announcement','refresh');
            	exit();
			}



			$page_data['page_name']		=	'announcement';
			$this->load->view('backend/index',$page_data);
		}

		function alumni($param1 = '', $param2 = ''){
			if ($_SESSION['account_type'] != 'admin')
            	redirect(base_url(), 'refresh');

            if($param1 == 'create'){


            	$alumni_student_ID	=	$this->input->post('alumni_student_ID');
            	$alumni_password =	$this->input->post('alumni_password');
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

            	$ldata['login_user_ID']	=	$this->input->post('alumni_student_ID');
            	$ldata['login_password']	=	$this->input->post('alumni_password');
            	$ldata['login_level']	=	"2";

            	$this->db->insert('login',$ldata);

            	$_SESSION['flashdata']	=	'Data Added';
            	session_write_close();
            	redirect(base_url().'index.php/admin/alumni','refresh');
            	exit();

            }else if($param1 == 'create_work'){

            	$data['work_alumni_student_ID']	=	$param2;
            	$data['worK_alumni_position']	=	$this->input->post('work_alumni_position');
            	$data['work_company_name']		=	$this->input->post('work_company_name');
            	$data['work_company_address']	=	$this->input->post('work_company_address');
            	$data['work_industry']			=	$this->input->post('work_industry');
            	$data['work_alumni_salary_range']	=	$this->input->post('work_alumni_salary_range');
            	$data['work_alumni_start']		=	$this->input->post('work_alumni_start');
            	$data['work_alumni_end']		=	$this->input->post('work_alumni_end');


            	$this->db->insert('work',$data);
            	$_SESSION['flashdata']	=	'Data Added';
            	$_SESSION['error_log']	=	$param2;
            	session_write_close();
            	redirect(base_url().'index.php/admin/alumni','refresh');
            	exit();


            }else if($param1 == 'edit_about'){
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

            	$this->db->where('alumni_student_ID',$param2);
            	$this->db->update('alumni',$data);
            	$_SESSION['flashdata']	=	'Data Updated';
            	session_write_close();
            	redirect(base_url() . 'index.php/admin/alumni', 'refresh');
            	exit();

            }else if($param1 == 'edit_work'){
            	
            	$data['worK_alumni_position']	=	$this->input->post('work_alumni_position');
            	$data['work_company_name']		=	$this->input->post('work_company_name');
            	$data['work_company_address']	=	$this->input->post('work_company_address');
            	$data['work_industry']			=	$this->input->post('work_industry');
            	$data['work_alumni_salary_range']	=	$this->input->post('work_alumni_salary_range');
            	$data['work_alumni_start']		=	$this->input->post('work_alumni_start');
            	$data['work_alumni_end']		=	$this->input->post('work_alumni_end');

            	$this->db->where('work_alumni_student_ID',$param2);
            	$this->db->update('work',$data);
            	$_SESSION['flashdata']	=	'Data Updated';
            	session_write_close();
            	redirect(base_url().'index.php/admin/alumni','refresh');
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


		function notifications($param1 = '', $param2 = ''){
			$page_data['page_name']		=	'notifications';
			$this->load->view('backend/index',$page_data);
		}

		function appointment($param1 ='', $param2 = ''){


			if($param1 == 'create'){

				$id = $this->db->query("
                SELECT AUTO_INCREMENT AS ID 
                FROM  INFORMATION_SCHEMA.TABLES   
                WHERE TABLE_SCHEMA = 'alumni'
                AND TABLE_NAME = 'appointment'
                ")->row()->ID;

				$data['appointment_alumni_ID']	=	$this->input->post('appointment_alumni_ID[0]');
				$data['appointment_date_start']	=	$this->input->post('appointment_date_start');
				$data['appointment_date_end']	=	$this->input->post('appointment_date_start');
				$data['appointment_time_start']	=	$this->input->post('appointment_time_start');
				$data['appointment_time_end']	=	$this->input->post('appointment_time_end');
				$data['appointment_details']	=	$this->input->post('appointment_details');
				$data['appointment_status']		=	"Approved";

				$ndata['notification_recieve_ID'] = $this->input->post('appointment_alumni_ID[0]');
				$ndata['notification_sender_ID']  = $_SESSION['user_ID'];
				$ndata['notification_unread']	  =	"TRUE";
				$ndata['notification_type']		  = "Appointment";
				$ndata['notification_param']	  = "Created";
				$ndata['notification_type_ID']	  = $id;
				$ndata['notification_datetime']	  = date('Y-m-d h:m:s');


				$this->db->insert('appointment',$data);
				$this->db->insert('notification',$ndata);
            	$_SESSION['flashdata']	=	'Data Added';
            	$_SESSION['error_log']	=	$param2;
            	session_write_close();
            	redirect(base_url().'index.php/admin/appointment','refresh');
            	exit();

			}else if($param1 == 'edit'){


$prev_appointment_status = $this->db->get_where('appointment' , array('appointment_ID' =>$param2))->row()->appointment_status;
$prev_appointment_date = $this->db->get_where('appointment' , array('appointment_ID' =>$param2))->row()->appointment_date_start;
$prev_appointment_time_start = $this->db->get_where('appointment' , array('appointment_ID'=>$param2))->row()->appointment_time_start;
$prev_appointment_time_end = $this->db->get_where('appointment' , array('appointment_ID' =>$param2))->row()->appointment_time_end;

				$_SESSION['error_log'] = $prev_appointment_time_start."|".$prev_appointment_time_end."|".$prev_appointment_status."|".$prev_appointment_date;
				$data['appointment_alumni_ID']	=	$this->input->post('appointment_alumni_ID[0]');
				$data['appointment_date_start']	=	$this->input->post('appointment_date_start');
				$data['appointment_date_end']	=	$this->input->post('appointment_date_start');
				$data['appointment_time_start']	=	$this->input->post('appointment_time_start');
				$data['appointment_time_end']	=	$this->input->post('appointment_time_end');
				$data['appointment_details']	=	$this->input->post('appointment_details');
				$cur_appointment_status = $data['appointment_status']		=	$this->input->post('appointment_status');

				$this->db->where('appointment_ID', $param2);
				$this->db->update('appointment', $data);

				if(($prev_appointment_status == 'Approved'|| $prev_appointment_status == 'Waiting') && $cur_appointment_status == 'Cancelled'){
					$ndata['notification_recieve_ID'] = $this->input->post('appointment_alumni_ID[0]');
					$ndata['notification_sender_ID']  = $_SESSION['user_ID'];
					$ndata['notification_unread']	  =	"TRUE";
					$ndata['notification_type']		  = "Appointment";
					$ndata['notification_type_ID']	  = $param2;
					$ndata['notification_param']	  = "Cancelled";
					$ndata['notification_datetime']	  = date('Y-m-d h:m:s');

					$this->db->insert('notification',$ndata);

				}else if(($prev_appointment_status == 'Waiting' && $cur_appointment_status=="Approved")){
					$ndata['notification_recieve_ID'] = $this->input->post('appointment_alumni_ID[0]');
					$ndata['notification_sender_ID']  = $_SESSION['user_ID'];
					$ndata['notification_unread']	  =	"TRUE";
					$ndata['notification_type']		  = "Appointment";
					$ndata['notification_type_ID']	  = $param2;
					$ndata['notification_param']	  = "Approved";
					$ndata['notification_datetime']	  = date('Y-m-d h:m:s');

					$this->db->insert('notification',$ndata);					

				}else if($prev_appointment_date != $data['appointment_date_start']) {
					$ndata['notification_recieve_ID'] = $this->input->post('appointment_alumni_ID[0]');
					$ndata['notification_sender_ID']  = $_SESSION['user_ID'];
					$ndata['notification_unread']	  =	"TRUE";
					$ndata['notification_type']		  = "Appointment";
					$ndata['notification_type_ID']	  = $param2;
					$ndata['notification_param']	  = "Rescheduled";
					$ndata['notification_datetime']	  = date('Y-m-d h:m:s');

					$this->db->insert('notification',$ndata);
				}else if($prev_appointment_time_start != $data['appointment_time_start'] || $prev_appointment_time_end != $data['appointment_time_end']){
					$ndata['notification_recieve_ID'] = $this->input->post('appointment_alumni_ID[0]');
					$ndata['notification_sender_ID']  = $_SESSION['user_ID'];
					$ndata['notification_unread']	  =	"TRUE";
					$ndata['notification_type']		  = "Appointment";
					$ndata['notification_type_ID']	  = $param2;
					$ndata['notification_param']	  = "Rescheduled";
					$ndata['notification_datetime']	  = date('Y-m-d h:m:s');

					$this->db->insert('notification',$ndata);
				}

				
				$_SESSION['flashdata']	=	'Data Updated';
				session_write_close();
				redirect(base_url().'index.php/admin/appointment','refresh');
				exit();
			}








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

			$filename= $_FILES["profile_picture"]["name"];
			$file_extension	= pathinfo($filename,PATHINFO_EXTENSION);
			$_SESSION['error_log']	= $file_extension;

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

            	$data['alumni_profile_picture']		=	$alumni_student_ID.".".$file_extension."?1234";
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

		function settings($param1 = '', $param2 = ''){
			if($_SESSION['account_type'] != 'admin')
				redirect(base_url(),'refresh');

			$page_data['page_name']		=	'settings';
			$this->load->view('backend/index',$page_data);
		}

	}
?>