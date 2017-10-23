<?php if(!defined('BASEPATH')) exit('Direct acces not allowed');
	
	class faculty_model extends CI_Model
	{
		//get faculty detail using id
		public function get_faculty_detail($id)
		{
			$sql = "SELECT *
					FROM RANK R JOIN FACULTY F
								ON R.RANK_CODE=F.RANK
								JOIN FACULTY_SPECIALIZATION FS
								ON F.USER_ID=FS.USER_ID
								JOIN USER U 
								ON U.USER_ID=F.USER_ID
					WHERE F.USER_ID=".$id.";";
			$query = $this->db->query($sql);
			return $query->first_row('array');
		}


		//update user faculty detail
		public function edit_user_data($data)
		{
			
		}

		//update faculty detail
		public function edit_faculty_data($data)
		{

		}

		//get advisee groups
		public function get_active_advisee_thesis_groups($id)
		{
			$sql = "SELECT *	
					FROM THESIS_GROUP G 	JOIN FACULTY F
									ON G.ADVISER_ID = F.USER_ID
									JOIN THESIS T
									ON T.THESIS_ID = G.THESIS_ID
					WHERE G.ADVISER_ID=".$id." AND T.THESIS_STATUS='ON-GOING'";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
	}
?>