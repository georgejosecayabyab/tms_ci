<?php if(!defined('BASEPATH')) exit('Direct acces not allowed');

/**
* 
*/
class student_model extends CI_Model
{
	//for student home
	//get meetings date / time / 
	public function get_meeting_information($group_id)
	{
		$sql = "SELECT * FROM tms_ci.meeting
				WHERE GROUP_ID = ".$group_id.";";

		$query = $this->db->query($sql);

		return $query->result_array();
	}

	//get defense date of the group
	public function get_defense_date($group_id)
	{
		$sql = "SELECT * FROM defense_date
				WHERE defense_date > curdate()
				AND GROUP_ID = ".$group_id.";";
		$query = $this->db->query($sql);

		return $query->result_array();	
	}
}



?>
