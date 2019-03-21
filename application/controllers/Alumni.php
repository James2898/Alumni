<?php
	class Alumni extends CI_Controller {

		function __construct(){
			parent::__construct();

			session_start();
			$this->load->helper(array('form','url'));
			$this->load->database();
			$this->load->library("sendemail");
			$this->load->library("sendsms");
	       /*cache control*/
			$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
			$this->output->set_header('Pragma: no-cache');
			date_default_timezone_set('Asia/Manila');
		}

		function index(){
			if ($_SESSION['account_type'] != 'alumni'){
            	redirect(base_url(), 'refresh');
            	exit();
			}else{
				$page_data['page_name']		=	'dashboard';
				$this->load->view('backend/index', $page_data);
			}
		}

		function dashboard(){
			if ($_SESSION['account_type'] != 'alumni')
            	redirect(base_url(), 'refresh');
			$page_data['page_name']		=	'dashboard';
			$this->load->view('backend/index', $page_data);
		}

		function announcement($param1 = '', $param2 = ''){
			if ($_SESSION['account_type'] != 'alumni'){
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
            	redirect(base_url().'index.php/alumni/announcement','refresh');
            	exit();
			}else if($param1 == 'edit'){
				$data['announcement_title']		=	$this->input->post('announcement_title');
				$data['announcement_subject']	=	$this->input->post('announcement_subject');
				$data['announcement_content']	=	$this->input->post('announcement_content');

				$this->db->where('announcement_ID',$param2);
            	$this->db->update('announcement',$data);
            	$_SESSION['flashdata']	=	'Data Updated';
            	session_write_close();
            	redirect(base_url().'index.php/alumni/announcement','refresh');
            	exit();
			}

			$page_data['page_name']		=	'announcement';
			$this->load->view('backend/index',$page_data);
		}



		//ADMIN FUNCTIONS
		function alumni_config($param1 = '', $param2){
			if($param1 == 'edit'){
				$data['alumni_fname']	=	$this->input->post('alumni_fname');
				$data['alumni_mname']	=	$this->input->post('alumni_mname');
				$data['alumni_lname']	=	$this->input->post('alumni_lname');
				$data['alumni_email']	=	$this->input->post('alumni_email');
				$data['alumni_facebook']	=	$this->input->post('alumni_facebook');
				$data['alumni_cno']		=	$this->input->post('alumni_cno');
				$data['alumni_lno']		=	$this->input->post('alumni_lno');

				$this->db->where('alumni_ID', $param2);
				$this->db->update('alumni', $data);
				$_SESSION['flashdata']	=	'Data Updated';
				session_write_close();
				redirect(base_url().'index.php/alumni/profile', 'refresh');
			}
		}




		function notifications($param1 = '', $param2 = ''){


			if($param1 == 'read'){
				$data['notification_unread'] 	=	'FALSE';

				$this->db->where('notification_ID',$param2);
				$this->db->update('notification',$data);
				$_SESSION['flashdata']	=	'Data Updated';
				session_write_close();
				redirect(base_url().'index.php/alumni/notifications','refresh');
			}else if($param1 == 'unread'){
				$data['notification_unread']	=	'TRUE';
				
				$this->db->where('notification_ID',$param2);
				$this->db->update('notification',$data);
				$_SESSION['flashdata']	=	'Data Updated';
				session_write_close();
				redirect(base_url().'index.php/alumni/notifications','refresh');
			}else if($param1 == 'read_all'){
				$data['notification_unread']	=	'FALSE';

				$this->db->where('notification_recieve_ID',$_SESSION['user_ID']);
				$this->db->update('notification',$data);
				$_SESSION['flashdata']	=	'Data Updated';
				session_write_close();
				redirect(base_url().'index.php/alumni/notifications','refresh');
			}


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


				$data['appointment_alumni_ID']	=	$_SESSION['user_ID'];
				$date_start = $data['appointment_date_start']	=	$this->input->post('appointment_date_start');
				$data['appointment_date_end']	=	$this->input->post('appointment_date_start');
				$time_start = $data['appointment_time_start']	=	$this->input->post('appointment_time_start');
				$data['appointment_time_end']	=	$this->input->post('appointment_time_end');
				$data['appointment_details']	=	$this->input->post('appointment_details');
				$data['appointment_status']		=	"Waiting";

				$ndata['notification_recieve_ID'] = '1';
				$ndata['notification_sender_ID']  = $_SESSION['user_ID'];
				$ndata['notification_unread']	  =	"TRUE";
				$ndata['notification_type']		  = "Appointment";
				$ndata['notification_param']      = "Waiting";
				$ndata['notification_type_ID']	  = $id;
				$ndata['notification_datetime']	  = date('Y-m-d h:m:s');

				$subject = 'Appointment Request';
            	$body = 'Alumni '.$alumni.' requests for an Appointment on '.$date_start.' at '.$time_start;

            	$is_sms = $this->db->get_where('settings' , array('settings_user_ID' => '1','settings_type' => 'sms'))->row()->settings_description;
				$is_email = $this->db->get_where('settings' , array('settings_user_ID' => '1','settings_type' => 'email'))->row()->settings_description;

				if($is_email == 'on'){
					//EMAIL NOTIFICATION FOR ANNOUNCEMENT
					$address = $this->db->get_where('admin' , array('admin_ID' => '1'))->row()->admin_email;
					$this->sendemail->do_send($subject,$body,$address);
				}

				if($is_sms == 'on'){
					//SMS NOTIFICATION FOR ANNOUCEMENT
					$number = $this->db->get_where('admin' , array('admin_ID' => '1'))->row()->admin_cno;
					$SMS_APICODE = "TR-FARAH257028_62V1F";
					$result = $this->sendsms->itexmo($number,$subject." | ".$body,$SMS_APICODE);
					
					if ($result == ""){
						$_SESSION['error_log'] = "iTexMo: No response from server!!! Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
						Please CONTACT US for help. ";	
					}else if ($result == 0){
						$_SESSION['error_log'] =  "Message Sent!";
					}
					else{	
						$_SESSION['error_log'] = "Error Num ". $result . " was encountered!";
					}
				}

				$this->db->insert('appointment',$data);
				$this->db->insert('notification',$ndata);
            	$_SESSION['flashdata']	=	'Data Added';
            	$_SESSION['error_log']	=	$param2;
            	session_write_close();
            	redirect(base_url().'index.php/alumni/appointment','refresh');
            	exit();

			}else if($param1 == 'edit'){

				$alumni = $data['appointment_alumni_ID']	=	$_SESSION['user_ID'];
				$date_start = $data['appointment_date_start']	=	$this->input->post('appointment_date_start');
				$data['appointment_date_end']	=	$this->input->post('appointment_date_start');
				$time_start = $data['appointment_time_start']	=	$this->input->post('appointment_time_start');
				$data['appointment_time_end']	=	$this->input->post('appointment_time_end');
				$data['appointment_details']	=	$this->input->post('appointment_details');
				$data['appointment_status']		=	'Waiting';


				$ndata['notification_recieve_ID'] = '1';
				$ndata['notification_sender_ID']  = $_SESSION['user_ID'];
				$ndata['notification_unread']	  =	"TRUE";
				$ndata['notification_type']		  = "Appointment";
				$ndata['notification_param']      = "Waiting";
				$ndata['notification_type_ID']	  = $param2;
				$ndata['notification_datetime']	  = date('Y-m-d h:m:s');


				$subject = 'Appointment Request';
            	$body = 'Alumni '.$alumni.' requests for an Appointment on '.$date_start.' at '.$time_start;

            	$is_sms = $this->db->get_where('settings' , array('settings_user_ID' => '1','settings_type' => 'sms'))->row()->settings_description;
				$is_email = $this->db->get_where('settings' , array('settings_user_ID' => '1','settings_type' => 'email'))->row()->settings_description;

				if($is_email == 'on'){
					//EMAIL NOTIFICATION FOR ANNOUNCEMENT
					$address = $this->db->get_where('admin' , array('admin_ID' => '1'))->row()->admin_email;
					$this->sendemail->do_send($subject,$body,$address);
				}

				if($is_sms == 'on'){
					//SMS NOTIFICATION FOR ANNOUCEMENT
					$number = $this->db->get_where('admin' , array('admin_ID' => '1'))->row()->admin_cno;
					$SMS_APICODE = "TR-FARAH257028_62V1F";
					$result = $this->sendsms->itexmo($number,$subject." | ".$body,$SMS_APICODE);
					
					if ($result == ""){
						$_SESSION['error_log'] = "iTexMo: No response from server!!! Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
						Please CONTACT US for help. ";	
					}else if ($result == 0){
						$_SESSION['error_log'] =  "Message Sent!";
					}
					else{	
						$_SESSION['error_log'] = "Error Num ". $result . " was encountered!";
					}
				}

				$this->db->where('appointment_ID', $param2);
				$this->db->update('appointment', $data);
				$this->db->insert('notification',$ndata);
				$_SESSION['flashdata']	=	'Data Updated';
				session_write_close();
				redirect(base_url().'index.php/alumni/appointment','refresh');
				exit();
			}else if($param1 == 'cancel'){
				$prev_appointment_status = $this->db->get_where('appointment' , array('appointment_ID' =>$param2))->row()->appointment_status;
				$_SESSION['error_log'] = $prev_appointment_status;
				if($prev_appointment_status != 'Waiting' && $prev_appointment_status != 'Cancelled'){
					

					$ndata['notification_recieve_ID'] = '1';
					$ndata['notification_sender_ID']  = $_SESSION['user_ID'];
					$ndata['notification_unread']	  =	"TRUE";
					$ndata['notification_type']		  = "Appointment";
					$ndata['notification_param']      = "Cancelled";
					$ndata['notification_type_ID']	  = $param2;
					$ndata['notification_datetime']	  = date('Y-m-d h:m:s');

					$this->db->insert('notification', $ndata);
				}
				
				$data['appointment_status'] = 'Cancelled';



				$subject = 'Appointment Cancelled';
            	$body = 'Alumni '.$alumni.' cancelled Appointment ID '.$param2;


            	$is_sms = $this->db->get_where('settings' , array('settings_user_ID' => '1','settings_type' => 'sms'))->row()->settings_description;
				$is_email = $this->db->get_where('settings' , array('settings_user_ID' => '1','settings_type' => 'email'))->row()->settings_description;

				if($is_email == 'on'){
					//EMAIL NOTIFICATION FOR ANNOUNCEMENT
					$address = $this->db->get_where('admin' , array('admin_ID' => '1'))->row()->admin_email;
					$this->sendemail->do_send($subject,$body,$address);
				}

				if($is_sms == 'on'){
					//SMS NOTIFICATION FOR ANNOUCEMENT
					$number = $this->db->get_where('admin' , array('admin_ID' => '1'))->row()->admin_cno;
					$SMS_APICODE = "TR-FARAH257028_62V1F";
					$result = $this->sendsms->itexmo($number,$subject." | ".$body,$SMS_APICODE);
					
					if ($result == ""){
						$_SESSION['error_log'] = "iTexMo: No response from server!!! Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
						Please CONTACT US for help. ";	
					}else if ($result == 0){
						$_SESSION['error_log'] =  "Message Sent!";
					}
					else{	
						$_SESSION['error_log'] = "Error Num ". $result . " was encountered!";
					}
				}

				$this->db->where('appointment_ID', $param2);
				$this->db->update('appointment', $data);
				
				$_SESSION['flashdata']	=	'Data Updated';
				session_write_close();
				redirect(base_url().'index.php/alumni/appointment','refresh');
				exit();
			}

			


			$page_data['page_name']		=	'appointment';
			$this->load->view('backend/index',$page_data);
		}

		function profile($param1 = '', $param2 = ''){
			if($param1 == 'create_work'){

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
            	redirect(base_url().'index.php/alumni/profile','refresh');
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
            	redirect(base_url() . 'index.php/alumni/profile', 'refresh');
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
            	redirect(base_url().'index.php/alumni/profile','refresh');
            }



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
                redirect(base_url().'index.php/alumni/alumni', 'refresh');
			}else{


				$alumni_student_ID	=	$param1;
            	$is_profile_picture     = $this->db->get_where('alumni' , array('alumni_student_ID' => $alumni_student_ID))->row()->alumni_profile_picture;

            	$data['alumni_profile_picture']		=	$alumni_student_ID.".".$file_extension."?1234";
            	$this->db->where('alumni_student_ID',$param1);
            	$this->db->update('alumni',$data);

            	


				$data = array('upload_data' => $this->upload->data());
                
                $_SESSION['flashdata']	=	'Data Updated';
            	session_write_close();
            	redirect(base_url().'index.php/alumni/profile', 'refresh');
			}
		}

		function alumni_upload($param1	= ''){
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
                redirect(base_url().'index.php/alumni/profile', 'refresh');
                //$page_data['page_name']	=	'profile';
                //$this->load->view('backend/index', $page_data);
			}else{


				$data = array('upload_data' => $this->upload->data());
                
                $_SESSION['flashdata']	=	'Data Updated';
            	session_write_close();
            	redirect(base_url().'index.php/alumni/profile', 'refresh');
            	//$page_data['page_name']	=	'profile';
                //$this->load->view('backend/index', $page_data);
			}
		}

		function settings($param1 = '', $param2 = ''){
			if($_SESSION['account_type'] != 'alumni')
				redirect(base_url(),'refresh');

			if($param1 == 'edit'){
				$data['settings_description'] = $param2;

				$this->db->where(array('settings_user_ID' => $_SESSION['user_ID'],'settings_type' => 'theme'));
				$this->db->update('settings', $data);

				$_SESSION['flashdata']	=	'Data Updated';
				session_write_close();
				redirect(base_url().'index.php/alumni/settings','refresh');
				exit();
			}elseif ($param1 == 'email_off') {
				
				$data['settings_description'] = "off";
				$this->db->where(array('settings_user_ID' => $_SESSION['user_ID'],'settings_type' => 'email'));
				$this->db->update('settings', $data);

				$_SESSION['flashdata']	=	'Data Updated';
				session_write_close();
				redirect(base_url().'index.php/alumni/settings','refresh');
				exit();
			}elseif ($param1 == 'email_on') {
				
				$data['settings_description'] = "on";
				$this->db->where(array('settings_user_ID' => $_SESSION['user_ID'],'settings_type' => 'email'));
				$this->db->update('settings', $data);

				$_SESSION['flashdata']	=	'Data Updated';
				session_write_close();
				redirect(base_url().'index.php/alumni/settings','refresh');
				exit();
			}elseif ($param1 == 'sms_off') {
				
				$data['settings_description'] = "off";
				$this->db->where(array('settings_user_ID' => $_SESSION['user_ID'],'settings_type' => 'sms'));
				$this->db->update('settings', $data);

				$_SESSION['flashdata']	=	'Data Updated';
				session_write_close();
				redirect(base_url().'index.php/alumni/settings','refresh');
				exit();
			}elseif ($param1 == 'sms_on') {
				
				$data['settings_description'] = "on";
				$this->db->where(array('settings_user_ID' => $_SESSION['user_ID'],'settings_type' => 'sms'));
				$this->db->update('settings', $data);

				$_SESSION['flashdata']	=	'Data Updated';
				session_write_close();
				redirect(base_url().'index.php/alumni/settings','refresh');
				exit();
			}elseif($param1 == 'change_password'){

				$old_password = $this->input->post('admin_old_password');
				$new_password = $this->input->post('admin_new_password');

				$admin_password = $this->db->get_where('login' , array('login_user_ID' =>$_SESSION['user_ID']))->row()->login_password;

				$_SESSION['error_log'] = $admin_password." ".$old_password;
				if($old_password == $admin_password){

					$data['login_password']		=	$new_password;
					$this->db->where('login_user_ID', $_SESSION['user_ID']);
					$this->db->update('login',$data);

					$_SESSION['flashdata']  =   'Data Updated';
					session_write_close();
					redirect(base_url().'index.php/alumni/settings','refresh');
					exit();
				}else{
					$_SESSION['flashdata']  =   'ERROR';
				}


			}


			$page_data['page_name']		=	'settings';
			$this->load->view('backend/index',$page_data);
		}

	}
?>