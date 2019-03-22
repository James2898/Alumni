<?php  

	class CheckDate_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		function check_date($date, $time_start, $time_end){
    		$is_date = $this->db->query("
                SELECT * 
                FROM alumni.appointment 
                WHERE appointment_date_start = '{$date}'
                ")->num_rows();
			if($is_date != 0){


				/*$time_start_array = $this->db->query("
	                SELECT * 
	                FROM alumni.appointment
	                WHERE appointment_date_start = '{$date}'
	                ")->get()->result_array();*/
				$time_start_array = $this->db->get_where('appointment', array('appointment_date_start' => $date, 'appointment_status' => 'Approved'))->result_array();
				
				foreach($time_start_array as $row){

					if($time_start >=  $row['appointment_time_start'] && $time_start < $row['appointment_time_end']){
						$_SESSION['flashdata'] = "TIME START ERROR";
						return FALSE;
					}

					if($time_end > $row['appointment_time_start'] && $time_end < $row['appointment_time_end']){
						$_SESSION['flashdata'] .= "TIME END ERROR";
						return FALSE;
					}

				}

			}
			return TRUE;

		}

	}

?>