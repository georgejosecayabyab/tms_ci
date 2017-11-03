<?php if(!defined('BASEPATH')) exit('Direct acces not allowed');

/**
* 
*/
class student_model extends CI_Model
{
	//for student home
	//get meetings date / time / venue
	public function get_meeting_information($user_id)
	{
		$sql = "SELECT *
				FROM MEETING M 	JOIN THESIS_GROUP TG
								ON M.GROUP_ID = TG.GROUP_ID
                				JOIN STUDENT_GROUP SG
                				ON TG.GROUP_ID = SG.GROUP_ID
				WHERE SG.STUDENT_ID = ".$user_id.";";

		$query = $this->db->query($sql);

		return $query->result_array();
	}

	//get defense date of the group
	public function get_defense_date($user_id)
	{
		$sql = "SELECT *
				FROM defense_date DD 	JOIN thesis_group TG
										ON DD.GROUP_ID = TG.GROUP_ID
                        				JOIN STUDENT_GROUP SG
                        				ON TG.GROUP_ID = SG.GROUP_ID
				WHERE DD.DEFENSE_DATE >= CURDATE() 
				AND SG.STUDENT_ID = ".$user_id.";";

		$query = $this->db->query($sql);

		return $query->result_array();	
	}
	//get firstname, lastname, userid, groupid, groupname, thesisid, thesistitle, adviser
	public function get_user_information($user_id)
	{
		$sql = "SELECT *
				FROM STUDENT S 	JOIN USER U 
								ON S.USER_ID = U.USER_ID
                				JOIN STUDENT_GROUP SG
                				ON U.USER_ID = SG.STUDENT_ID
                				JOIN THESIS_GROUP TG 
                				ON SG.GROUP_ID = TG.GROUP_ID
                				JOIN THESIS T
                				ON TG.THESIS_ID = T.THESIS_ID
				WHERE S.USER_ID = ".$user_id.";";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	//get group tags
	public function get_group_specialization($user_id)
	{
		$sql = "SELECT *
				FROM thesis_specialization TS 	JOIN thesis T 
												ON TS.THESIS_ID = T.THESIS_ID
                                				JOIN specialization S
                                				ON TS.SPECIALIZATION_ID = S.SPECIALIZATION_ID
                                				JOIN thesis_group TG
                                				ON T.THESIS_ID = TG.THESIS_ID
                                				JOIN student_group SG
                                				ON TG.GROUP_ID = SG.GROUP_ID
				WHERE SG.STUDENT_ID = ".$user_id.";";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}



?>
