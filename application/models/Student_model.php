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
				WHERE S.USER_ID = ".$user_id.";";
		$query = $this->db->query($sql);
		return $query->first_row('array');
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

	public function get_meetings($user_id)
	{
		$sql = "SELECT MEETING_ID, GROUP_ID, VENUE, DATE(DATE) AS 'CALENDAR', TIME_FORMAT(START_TIME, '%h:%i %p') AS START, TIME_FORMAT(END_TIME, '%h:%i %p') AS END, DATEDIFF(DATE, CURDATE()) AS DIFF, CURDATE() AS 'NOW'
				FROM MEETING 
				WHERE GROUP_ID IN (SELECT GROUP_ID FROM STUDENT_GROUP WHERE STUDENT_ID=".$user_id." AND STATUS=1);";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_group($user_id)
	{
		$sql = "SELECT * 
				FROM STUDENT S 
				JOIN STUDENT_GROUP SG 
				ON SG.STUDENT_ID=S.USER_ID
				WHERE SG.STUDENT_ID=".$user_id."
				AND SG.STATUS=1;";
		$query = $this->db->query($sql);
		return $query->first_row('array');
	}

	public function get_course_forms($user_id)
	{
		$sql = "SELECT *
				FROM STUDENT S 
				JOIN COURSE C
				ON C.COURSE_ID = S.COURSE_ID
				JOIN FORM F 
				ON F.COURSE_ID = C.COURSE_ID
				WHERE S.USER_ID=".$user_id.";";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_course($user_id)
	{
		$sql = "SELECT *
				FROM STUDENT S 
				JOIN COURSE C
				ON C.COURSE_ID=S.COURSE_ID
				WHERE S.USER_ID=".$user_id.";";
		$query = $this->db->query($sql);
		return $query->first_row('array');
	}

	//get group info
	public function get_group_details($group_id)
	{
		$sql = "SELECT * 
				FROM THESIS_GROUP TG 
				JOIN THESIS T
				ON T.THESIS_ID = TG.THESIS_ID
				JOIN COURSE C
				ON C.COURSE_ID = TG.COURSE_ID
				JOIN USER U
				ON TG.ADVISER_ID = U.USER_ID
				WHERE TG.GROUP_ID=".$group_id.";";
		$query = $this->db->query($sql);
		return $query->first_row('array');
	}

	//get group defense
	public function get_defense($group_id)
	{
		$sql = "SELECT DATE(DEFENSE_DATE) AS DEF_DATE, VENUE
				FROM DEFENSE_DATE
				WHERE GROUP_ID=".$group_id."
				AND STATUS=0";
		$query = $this->db->query($sql);
		return $query->first_row('array');
	}

	//get advisee thesis group members
	public function get_thesis_group_members($group_id)
	{
		$sql = "SELECT *
				FROM STUDENT_GROUP SG 
				JOIN USER U
				ON U.USER_ID=SG.STUDENT_ID
				JOIN THESIS_GROUP TG
				ON TG.GROUP_ID = SG.GROUP_ID
				WHERE SG.STATUS=1
				AND TG.GROUP_ID=".$group_id.";";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_thesis_specialization($group_id)
	{
		$sql = "SELECT * 
				FROM THESIS_SPECIALIZATION TS
				JOIN THESIS T
				ON T.THESIS_ID = TS.THESIS_ID
				JOIN THESIS_GROUP TG
				ON TG.THESIS_ID = T.THESIS_ID
				JOIN SPECIALIZATION S
				ON S.SPECIALIZATION_ID = TS.SPECIALIZATION_ID
				WHERE TS.THESIS_ID=(SELECT THESIS_ID FROM THESIS_GROUP WHERE GROUP_ID=".$group_id.");";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_discussion_specific($group_id)
	{	
		$sql = "SELECT TD.GROUP_ID, TD.TOPIC_NAME, TD.TOPIC_INFO, TD.CREATED_BY, CONCAT(U.FIRST_NAME, ' ',U.LAST_NAME) AS 'NAME', TIME_FORMAT(TD.DATE_TIME, '%h:%i %p') AS 'TIME', DATE(TD.DATE_TIME) AS 'DATE'
				FROM TOPIC_DISCUSSION TD 
				JOIN USER U
				ON U.USER_ID = TD.CREATED_BY
				WHERE TD.GROUP_ID=".$group_id.";";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	//get discussion
	public function get_discussion()
	{	
		$sql = "SELECT GROUP_ID, COUNT(GROUP_ID) AS 'COUNT'
				FROM TOPIC_DISCUSSION
				GROUP BY GROUP_ID;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_new_student_notification($user_id)
		{
			$sql = "SELECT * 
					FROM NOTIFICATION
					WHERE IS_READ=0
					AND TARGET_USER_ID=".$user_id.";";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

	public function get_all_student_notification($user_id)
	{
		$sql = "SELECT * 
				FROM NOTIFICATION
				WHERE TARGET_USER_ID=".$user_id."
				ORDER BY NOTIFICATION_ID DESC;";
		$query = $this->db->query($sql);
		return $query->result_array();
		
	}

	public function update_notification($notification_id)
	{
		$data = array(
           'is_read' => 1 //1 means it has been read
        );

		$this->db->where('notification_id', $notification_id);
		$this->db->update('notification', $data); 
	}

}



?>
