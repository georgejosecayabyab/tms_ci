<?php
	if(!defined('BASEPATH')) exit('Direct acces not allowed');

	class coordinator_model extends CI_Model
	{
		public function get_group_common_free_time_by_day($group_id, $day)
		{
			$sql = "SELECT T.TIME_ID, T.START_TIME, T.END_TIME
					FROM TIME T
					WHERE T.TIME_ID NOT IN
					(SELECT TIME_ID FROM SCHEDULE WHERE USER_ID IN 
							(SELECT STUDENT_ID FROM STUDENT_GROUP WHERE GROUP_ID=".$group_id.") 
							OR USER_ID IN 
							(SELECT PANEL_ID FROM PANEL_GROUP WHERE GROUP_ID=".$group_id.")
						AND DAY='".$day."'
						GROUP BY TIME_ID);";
			$query = $this->db->query($sql);
			return $query->result_array();

			
		}
	}


?>