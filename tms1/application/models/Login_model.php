<?php if(!defined('BASEPATH')) exit('No direct access allowed');

	class login_model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		//check if user exist
		public function if_user($email, $password)
		{
			//SELECT * FROM USER WHERE EMAIL=$EMAIL AND PASSWORD=$PASSWORD;
			$this->db->where('email', $email);
			$this->db->where('password', $password);
			$query = $this->db->get('user');
			return $query->first_row('array');
		}


		//check if student
		public function is_student($user_id)
		{
			//SELECT * FROM STUDENT WHERE USER_ID=$USER_ID;
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('student');
			$num = $query->num_rows();
			if ($num > 0)
			{
				return 1;//student
			}
			else 
			{
				return 0;//faculty
			}
		}

		//get user/general details
		public function get_user_details($user_id)
		{
			if ($this->is_student($user_id) == 1)
			{
				$sql = "SELECT * FROM USER U JOIN STUDENT S ON S.USER_ID= U.USER_ID WHERE U.USER_ID=".$user_id.";";
				$query = $this->db->query($sql);
				return $query->result_array();
			}
			else
			{
				$sql = "SELECT * FROM USER U JOIN FACULTY F ON F.USER_ID= U.USER_ID WHERE U.USER_ID=".$user_id.";";
				$query = $this->db->query($sql);
				return $query->result_array();
			}

		}

		//get student details
		public function get_student($user_id)
		{
			$sql = "SELECT";
		}

	}

?>