<?php

	Class Login_model extends CI_Model {

		

		// Read data using user_ID and password
		public function login($data) {

			$condition = "login_user_ID =" . "'" . $data['user_ID'] . "' AND " . "login_password =" . "'" . $data['password'] . "'";
			$this->db->select('*');
			$this->db->from('login');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
				return true;
			} else {
				return false;
			}
		}

		// Read data from database to show data in admin page
		public function read_user_information($user_ID) {

			$condition = "login_user_ID =" . "'" . $user_ID . "'";
			$this->db->select('*');
			$this->db->from('login');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
				return $query->result();
			} else {
				return false;
			}
		}

		//GET USER ACCOUNT TYPE
		public function get_login_level($user_ID){
			$condition = "login_user_ID =" . "'" . $user_ID . "'";
			$this->db->select('login_level');
			$this->db->from('login');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
				return $query->row()->login_level;
			} else {
				return false;
			}
		}

	}

?>