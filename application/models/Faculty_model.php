<?php if(!defined('BASEPATH')) exit('Direct acces not allowed');
	
	class faculty_model extends CI_Model
	{
		//get faculty detail using id
		public function get_faculty_detail($user_id)
		{
			$sql = "SELECT F.USER_ID, FIRST_NAME, LAST_NAME, EMAIL, R.RANK
					FROM RANK R JOIN FACULTY F
								ON R.RANK_CODE=F.RANK
								JOIN USER U 
								ON U.USER_ID=F.USER_ID
					WHERE F.USER_ID=".$user_id.";";
			$query = $this->db->query($sql);
			return $query->first_row('array'); 
		}

		public function get_faculty_specialization($user_id)
		{
			$sql = "SELECT FS.USER_ID, S.SPECIALIZATION 
					FROM FACULTY_SPECIALIZATION FS
					JOIN SPECIALIZATION S
					ON S.SPECIALIZATION_ID=FS.SPECIALIZATION_ID
					WHERE USER_ID=".$user_id.";";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		//get advisee groups
		public function get_active_advisee_thesis_groups($faculty_id)
		{
			$sql = "SELECT GROUP_ID, GROUP_NAME, THESIS_TITLE	
					FROM THESIS_GROUP G 	JOIN FACULTY F
									ON G.ADVISER_ID = F.USER_ID
									JOIN THESIS T
									ON T.THESIS_ID = G.THESIS_ID
					WHERE G.ADVISER_ID=".$faculty_id." AND T.THESIS_STATUS='ON-GOING'";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		//get defense list as a panel or adviser
		public function get_defense_list($faculty_id)
		{
			$sql = "SELECT DD.GROUP_ID, DATE(DD.DEFENSE_DATE) AS DEF_DATE, TIME_FORMAT(DD.START_TIME, '%h:%i %p') AS START, TIME_FORMAT(DD.END_TIME, '%h:%i %p') AS END, DD.VENUE, DD.STATUS, TG.GROUP_NAME, DATEDIFF(DD.DEFENSE_DATE, CURDATE()) AS DIFF, CURDATE() AS 'NOW'
					FROM DEFENSE_DATE DD
					JOIN THESIS_GROUP TG
					ON TG.GROUP_ID=DD.GROUP_ID
					WHERE DD.GROUP_ID IN (SELECT GROUP_ID
					FROM PANEL_GROUP
					WHERE PANEL_ID=".$faculty_id.")
					AND DATEDIFF(DD.DEFENSE_DATE, CURDATE()) >= 0;";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		//get advisee thesis group members
		public function get_advisee_thesis_group_members($faculty_id)
		{
			$sql = "SELECT *
					FROM STUDENT_GROUP SG 
					JOIN USER U
					ON U.USER_ID=SG.STUDENT_ID
					JOIN THESIS_GROUP TG
					ON TG.GROUP_ID = SG.GROUP_ID
					WHERE SG.STATUS=1
					AND TG.ADVISER_ID=".$faculty_id.";";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		//get num notification on each group under advisee
		public function get_notification_count_under_advisee($faculty_id)
		{
			$sql = "SELECT TG.GROUP_NAME, TG.GROUP_ID, N.CREATED_BY, CONCAT(U.FIRST_NAME, ' ', U.LAST_NAME) AS CREATOR, N.TARGET_USER_ID, N.NOTIFICATION_DETAILS, N.IS_READ, COUNT(TG.GROUP_ID) AS NOTIF
					FROM THESIS_GROUP TG
					JOIN STUDENT_GROUP SG
					ON SG.GROUP_ID=TG.GROUP_ID
					JOIN STUDENT S
					ON S.USER_ID=SG.STUDENT_ID
					JOIN USER U
					ON U.USER_ID=S.USER_ID
					JOIN NOTIFICATION N
					ON N.CREATED_BY=U.USER_ID
					WHERE N.TARGET_USER_ID=".$faculty_id."
					AND TG.ADVISER_ID=".$faculty_id."
					AND N.IS_READ=0
					GROUP BY TG.GROUP_ID;";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		//get notifications of group, not working yet(10/24/2017)
		public function get_notifications($group_id)
		{
			$sql = "SELECT N.NOTIFICATION_ID, N.CREATED_BY, U.FIRST_NAME, U.LAST_NAME, N.TARGET_USER_ID, N.IS_READ, TG.GROUP_ID, TG.GROUP_NAME
					FROM NOTIFICATION N JOIN USER U
					ON U.USER_ID=N.CREATED_BY
					JOIN STUDENT_GROUP SG
					ON SG.STUDENT_ID = N.CREATED_BY
					JOIN THESIS_GROUP TG
					ON TG.GROUP_ID = SG.GROUP_ID
					WHERE N.IS_READ=0
					AND TG.GROUP_ID=".$group_id.";";
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

		//get group thesis specialization
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
		// Jego

		//get panel thesis group memeber (Thesis group members)
		public function get_panel_thesis_group_members($id)
		{
			$sql ="SELECT TG.GROUP_ID, U.FIRST_NAME, U.LAST_NAME
					FROM USER U 	JOIN STUDENT S
									ON U.USER_ID = S.USER_ID
                					JOIN STUDENT_GROUP SG
									ON S.USER_ID = SG.STUDENT_ID
									JOIN THESIS_GROUP TG
                					ON TG.GROUP_ID = SG.GROUP_ID
                					JOIN PANEL_GROUP PG
                					ON TG.GROUP_ID = PG.GROUP_ID
					WHERE PG.PANEL_ID = ".$id."
					GROUP BY U.USER_ID;";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		//get thesis group tags (Thesis Specialization)
		public function get_panel_thesis_group_tags($id)
		{
			$sql = "SELECT S.specialization, TG.group_id
					FROM THESIS T 	JOIN thesis_specialization TS
									ON T.THESIS_ID = TS.THESIS_ID
                					JOIN specialization S
                					ON TS.specialization_id = S.specialization_id
                					JOIN THESIS_GROUP TG 
                					ON T.THESIS_id = TG.THESIS_id
                					JOIN PANEL_GROUP PG
                					ON PG.GROUP_ID = TG.GROUP_ID
					WHERE PG.panel_id = ".$id.";";
			$query = $this->db->query($sql);
			return $query->result_array();

		}

		//get panel details (Time, Date, Topic, State)
		public function get_panel_details($id)
		{

			$sql = "SELECT PG.PANEL_GROUP_ID, PG.PANEL_ID, PG.STATUS, PG.GROUP_ID, TG.GROUP_NAME, TG.ADVISER_ID, TG.THESIS_ID, TG.COURSE_ID, DD.DEFENSE_DATE, TIME_FORMAT(DD.START_TIME, '%h:%i %p') AS START, TIME_FORMAT(DD.END_TIME, '%h:%i %p') AS END, DD.VENUE, DD.STATUS, TG.INITIAL_VERDICT, IV.VERDICT AS 'IV_CODE', TG.FINAL_VERDICT, FV.VERDICT AS 'FV_CODE'
					FROM PANEL_GROUP PG	JOIN THESIS_GROUP TG 
										ON PG.GROUP_ID = TG.GROUP_ID
                        				JOIN DEFENSE_DATE DD
										ON PG.GROUP_ID = DD.GROUP_ID
                        				JOIN THESIS T
                        				ON TG.THESIS_ID = T.THESIS_ID
                        				JOIN INITIAL_VERDICT IV
                        				ON TG.INITIAL_VERDICT=IV.VERDICT_CODE
                        				JOIN FINAL_VERDICT FV
                        				ON TG.FINAL_VERDICT=FV.VERDICT_CODE
					WHERE PG.PANEL_ID =".$id.";";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function get_thesis_comment_count()
		{
			$sql = "SELECT PG.GROUP_ID, COUNT(THESIS_COMMENT) AS 'COUNT'
					FROM THESIS_COMMENT	TC
					JOIN PANEL_GROUP PG
					ON PG.PANEL_GROUP_ID=TC.PANEL_GROUP_ID		    
					GROUP BY PG.GROUP_ID;";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function get_thesis_comment($group_id)
		{
			$sql = "SELECT TC.THESIS_COMMENT_ID, TC.THESIS_COMMENT, PG.PANEL_GROUP_ID, PG.GROUP_ID, TG.GROUP_NAME, U.USER_ID, CONCAT(U.FIRST_NAME,' ', U.LAST_NAME) AS 'COMMENTED BY', DATE(TC.DATE_TIME) AS 'DATE', TIME_FORMAT(TIME(TC.DATE_TIME), '%h:%i %p') AS 'TIME'
					FROM THESIS_COMMENT TC 
					JOIN PANEL_GROUP PG
					ON PG.PANEL_GROUP_ID=TC.PANEL_GROUP_ID
					JOIN USER U
					ON U.USER_ID=PG.PANEL_ID
					JOIN THESIS_GROUP TG
					ON TG.GROUP_ID=PG.GROUP_ID
					WHERE PG.GROUP_ID=".$group_id."
					ORDER BY DATE, TIME ASC;";
			$query = $this->db->query($sql);
			return $query->result_array();

		}

		public function get_panel_group_id($user_id, $group_id)
		{
			$sql = "SELECT * FROM PANEL_GROUP WHERE PANEL_ID=".$user_id." AND GROUP_ID=".$group_id.";";
			$query = $this->db->query($sql);
			return $query->first_row('array');
		}

		public function insert_thesis_comment($data)
		{
			//escape every variable
			$this->db->insert('thesis_comment', $data);

		}

		public function delete_thesis_comment($id)
		{
			//escape all variable
			$this->db->where('thesis_comment_id', $id);
			$this->db->delete('thesis_comment'); 
		}



		public function get_thesis_group_by_thesis_comment_id($thesis_comment_id)
		{
			$sql = "SELECT *
					FROM THESIS_COMMENT TC 
					JOIN PANEL_GROUP PG
					ON PG.PANEL_GROUP_ID=TC.PANEL_GROUP_ID
					WHERE TC.THESIS_COMMENT_ID=".$thesis_comment_id.";";
			$query = $this->db->query($sql);
			return $query->first_row('array');
		}

		public function get_new_faculty_notification($user_id)
		{
			$sql = "SELECT * 
					FROM NOTIFICATION
					WHERE IS_READ=0
					AND TARGET_USER_ID=".$user_id.";";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function get_all_faculty_notification($user_id)
		{
			$sql = "SELECT * 
					FROM NOTIFICATION
					WHERE TARGET_USER_ID=".$user_id."
					ORDER BY NOTIFICATION_ID;";
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

		public function get_notifications_as_panel($user_id)
		{	
			$sql = "SELECT N.NOTIFICATION_ID, N.NOTIFICATION_DETAILS, PG.PANEL_ID, TG.GROUP_ID, TG.GROUP_NAME, TIME_FORMAT(N.DATE_CREATED, '%h:%i %p') AS 'TIME'
					FROM PANEL_GROUP PG
					JOIN THESIS_GROUP TG
					ON TG.GROUP_ID=PG.GROUP_ID
					JOIN NOTIFICATION N
					ON N.GROUP_ID=TG.GROUP_ID
					WHERE PG.GROUP_ID IN (SELECT GROUP_ID FROM PANEL_GROUP WHERE PANEL_ID=".$user_id.")
					AND PG.PANEL_ID=".$user_id."
					AND N.TARGET_USER_ID=".$user_id."
					AND N.IS_READ=0;";

			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function get_notifications_as_advisee($user_id)
		{	
			$sql = "SELECT N.NOTIFICATION_ID, N.NOTIFICATION_DETAILS, TG.GROUP_ID, TG.GROUP_NAME, TIME_FORMAT(N.DATE_CREATED, '%h:%i %p') AS 'TIME', N.IS_READ
					FROM THESIS_GROUP TG
					JOIN NOTIFICATION N
					ON N.GROUP_ID=TG.GROUP_ID
					WHERE TG.ADVISER_ID=".$user_id."
					AND N.TARGET_USER_ID=".$user_id."
					AND N.IS_READ=0;";

			$query = $this->db->query($sql);
			return $query->result_array();
		}

	}
?>