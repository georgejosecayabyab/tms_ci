<?php
	if(!defined('BASEPATH')) exit('Direct acces not allowed');

	class coordinator_model extends CI_Model
	{
	//Coordinator Faculty

	//This function gets the user information of the faculty (NAME, USER_ID, IS_ACTIVE)
	public function get_faculty_info()
	{
		$sql = "SELECT U.FIRST_NAME, U.LAST_NAME, U.IS_ACTIVE, U.USER_ID
				FROM FACULTY F 	JOIN USER U
								ON F.USER_ID = U.USER_ID";

		$query = $this->db->query($sql);
		return $query->result_array();
	}

	
	//This functions gets the number of panel per faculty
	public function get_no_of_panels()
	{
		$sql = "SELECT COUNT(PG.PANEL_ID) AS 'NO OF PANELS ASSIGNED', U.USER_ID
				FROM FACULTY F 	JOIN USER U 
								ON F.USER_ID = U.USER_ID
                				JOIN panel_group PG
                				ON F.USER_ID = PG.PANEL_ID
				GROUP BY F.USER_ID;";

		$query = $this->db->query($sql);
		return $query->result_array();
	}

	//This function gets the number of groups per faculty
	public function get_no_of_groups()
	{
		$sql = "SELECT COUNT(U.USER_ID), TG.adviser_id
				FROM FACULTY F 	JOIN USER U
								ON F.USER_ID = U.USER_ID
                				JOIN THESIS_GROUP TG 
                				ON F.USER_ID = TG.ADVISER_ID
				GROUP BY U.USER_ID;";

		$query = $this->db->query($sql);
		return $query->result_array();
	}	

	//Coordinator Thesis Group

	//This functions gets the group information
	public function get_group_info()
	{
		$sql = "SELECT *
				FROM THESIS_GROUP TG	JOIN DEFENSE_DATE DD
										ON TG.GROUP_ID = DD.GROUP_ID
                        				JOIN COURSE C 
                        				ON TG.COURSE_ID = C.COURSE_ID;";

		$query = $this->db->query($sql);
		return $query->result_array();
	}	

	//Coordinator Student

	//This function gets the student information note no section
	public function get_student_info()
	{
		$sql = "SELECT *
				FROM STUDENT S 	JOIN USER U
								ON S.USER_ID = U.USER_ID
                				JOIN STUDENT_GROUP SG 
                				ON SG.STUDENT_ID = S.USER_ID
                				JOIN THESIS_GROUP TG
                				ON SG.GROUP_ID = TG.GROUP_ID;";

		$query = $this->db->query($sql);
		return $query->result_array();
	}	

	}


?>