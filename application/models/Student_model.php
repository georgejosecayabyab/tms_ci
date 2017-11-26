<?php 
	if(!defined('BASEPATH')) exit('Direct acces not allowed');

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
					WHERE SG.STUDENT_ID = ".$user_id."
					ORDER BY M.DATE DESC;";

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
									JOIN COURSE C
									ON C.COURSE_CODE=S.COURSE_CODE
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
					WHERE GROUP_ID IN (SELECT GROUP_ID FROM STUDENT_GROUP WHERE STUDENT_ID=".$user_id." AND STATUS=1)
					AND DATEDIFF(DATE, CURDATE()) >= 0
					ORDER BY DATE ASC;";
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
					ON C.COURSE_CODE=S.COURSE_CODE
					JOIN FORM F 
					ON F.COURSE_CODE = C.COURSE_CODE
					WHERE S.USER_ID=".$user_id.";";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function get_course($user_id)
		{
			$sql = "SELECT *
					FROM STUDENT S 
					JOIN COURSE C
					ON C.COURSE_CODE=S.COURSE_CODE
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
					ON C.COURSE_CODE=TG.COURSE_CODE
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
					LEFT JOIN USER U
					ON U.USER_ID=SG.STUDENT_ID
					LEFT JOIN THESIS_GROUP TG
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
			$sql = "SELECT TD.GROUP_ID, TD.TOPIC_DISCUSSION_ID, TD.TOPIC_NAME, TD.TOPIC_INFO, TD.CREATED_BY, CONCAT(U.FIRST_NAME, ' ',U.LAST_NAME) AS 'NAME', TIME_FORMAT(TD.DATE_TIME, '%h:%i %p') AS 'TIME', DATE(TD.DATE_TIME) AS 'DATE'
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

		//get discussion reply  count
		public function get_discussion_reply_count()
		{	
			$sql = "SELECT TD.TOPIC_DISCUSSION_ID, COUNT(D.DISCUSSION_ID) AS 'COUNT', TD.GROUP_ID
					FROM TOPIC_DISCUSSION TD
					LEFT JOIN DISCUSSION D 
					ON D.TOPIC_DISCUSSION_ID=TD.TOPIC_DISCUSSION_ID
					GROUP BY TD.TOPIC_DISCUSSION_ID;";
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

		public function get_thesis_related_event($user_id)
		{
			$sql = "SELECT * FROM THESIS_RELATED_EVENT 
					WHERE COURSE_CODE=(SELECT COURSE_CODE FROM STUDENT WHERE USER_ID=".$user_id.");";

			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function archive_thesis()
		{
			$sql = "select t.thesis_id, t.thesis_title, tg.group_id, t.abstract
					from thesis t 
					join thesis_group tg
					on tg.thesis_id=t.thesis_id
					where thesis_status='COMPLETED';";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function archive_members()
		{
			$sql = "select tg.thesis_id, sg.group_id, concat(u.first_name,' ', u.last_name) as 'name'
					from student_group sg
					join student s
					on s.user_id=sg.student_id
					join user u
					on u.user_id=s.user_id
					join thesis_group tg
					on tg.group_id=sg.group_id;";
			$query = $this->db->query($sql);
			return $query->result_array();
		}


		public function archive_specialization()
		{
			$sql = "select s.specialization, ts.thesis_id
					from thesis_specialization ts
					join specialization s
					on s.specialization_id=ts.specialization_id; ";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function archive_panels()
		{
			$sql = "select tg.thesis_id, pg.group_id, concat(u.first_name,' ', u.last_name) as 'name'
					from panel_group pg
					join faculty f
					on f.user_id=pg.panel_id
					join user u
					on u.user_id=f.user_id
					join thesis_group tg
					on tg.group_id=pg.group_id;";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function get_thesis($thesis_id)
		{
			$sql = "select * from thesis where thesis_id=".$thesis_id.";";
			$query = $this->db->query($sql);
			return $query->first_row('array');
		}

		public function insert_event($data)
		{
			//escape every variable
			$this->db->insert('thesis_related_event', $data);

		}

		public function get_topic($topic_id)
		{
			$sql = "SELECT *
					FROM TOPIC_DISCUSSION TD 
					JOIN THESIS_GROUP TG 
					ON TD.GROUP_ID=TG.GROUP_ID
					JOIN USER U
					ON U.USER_ID=TD.CREATED_BY
					WHERE TD.TOPIC_DISCUSSION_ID=".$topic_id.";";
			$query = $this->db->query($sql);
			return $query->first_row('array');
		}

		public function get_topic_discussion($topic_id)
		{
			$sql = "SELECT TD.TOPIC_DISCUSSION_ID, TD.TOPIC_NAME, TD.TOPIC_INFO, D.DISCUSSION_ID, D.DISCUSS, U.USER_ID, CONCAT(U.FIRST_NAME, ' ', U.LAST_NAME) AS 'NAME', DATE(D.DATE_TIME) AS 'DATE', TIME_FORMAT(TIME(D.DATE_TIME), '%h:%i %p') AS 'TIME' 
					FROM TOPIC_DISCUSSION TD
					JOIN DISCUSSION D
					ON TD.TOPIC_DISCUSSION_ID=D.TOPIC_DISCUSSION_ID
					JOIN USER U
					ON U.USER_ID=D.USER_ID
					WHERE TD.TOPIC_DISCUSSION_ID=".$topic_id."
					ORDER BY TD.DATE_TIME ASC;";
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

		public function get_all_discussion_target($group_id, $user_id)
		{
			$sql = "SELECT * 
					FROM USER U
					WHERE USER_ID !=".$user_id."
					AND USER_ID IN (SELECT STUDENT_ID FROM STUDENT_GROUP WHERE GROUP_ID=".$group_id.")
					OR USER_ID !=".$user_id."
					AND USER_ID IN (SELECT ADVISER_ID FROM THESIS_GROUP WHERE GROUP_ID=".$group_id.");";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function insert_notification($data)
		{
			//escape every variable
			$this->db->insert('notification', $data);
		}

		public function insert_discussion_reply($data)
		{
			//escape every variable
			$this->db->insert('discussion', $data);
		}

		public function insert_new_discussion($data)
		{
			//escape every variable
			$this->db->insert('topic_discussion', $data);
		}


		public function insert_schedule($user_id, $time, $day)
		{
			$sql = "INSERT INTO SCHEDULE (user_id, time_id, day)
					VALUES (".$user_id.", (select time_id from time where start_time='".$time."'), '".$day."');";
			$this->db->query($sql);
		}

		public function delete_schedule($user_id)
		{
			//escape all variable
			$this->db->where('user_id', $user_id);
			$this->db->delete('schedule'); 
		}

		public function insert_upload($data)
		{
			//escape every variable
			$this->db->insert('upload', $data);
		}

		public function insert_revision($file_name, $upload_name, $date_time, $group_id)
		{
			$sql = "INSERT INTO REVISION (UPLOAD_ID, REVISION_NAME) 
					VALUES ((SELECT UPLOAD_ID FROM UPLOAD WHERE UPLOAD_NAME='".$upload_name."' AND UPLOAD_DATE_TIME='".$date_time."' AND GROUP_ID=".$group_id."), '".$file_name."');";
			$this->db->query($sql);
		}

		public function delete_upload()
		{
			//escape all variable
			$this->db->where('user_id', $user_id);
			$this->db->delete('upload'); 
		}

		public function latest_uploaded($group_id)
		{
			$sql = "SELECT * 
					FROM UPLOAD 
					WHERE GROUP_ID=".$group_id."
					ORDER BY UPLOAD_DATE_TIME DESC;";
			$query = $this->db->query($sql);
			return $query->first_row('array');
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

		public function update_abstract($data, $thesis_id)
		{
			//escape every variable
			$this->db->where('thesis_id', $thesis_id);
			$this->db->update('thesis', $data); 
		}


		public function get_schedule($user_id)
		{
			$sql = "SELECT * 
					FROM SCHEDULE S
					JOIN TIME T
					ON T.TIME_ID=S.TIME_ID
					WHERE USER_ID =".$user_id.";";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function get_schedule_by_day($user_id, $day)
		{
			$sql = "SELECT T.TIME_ID, T.START_TIME, T.END_TIME 
					FROM TIME T
					WHERE T.TIME_ID IN
						(SELECT TIME_ID FROM SCHEDULE WHERE USER_ID=".$user_id." AND DAY='".$day."')
					AND T.TIME_ID >= 5
	                AND T.TIME_ID <= 60;";
			$query = $this->db->query($sql);
			return $query->result_array();


		}

		public function get_uploads_revision($group_id)
		{
			$sql = "SELECT * 
					FROM UPLOAD U 
					LEFT JOIN REVISION R 
					ON R.UPLOAD_ID=U.UPLOAD_ID
					WHERE U.GROUP_ID = ".$group_id.";";
			$query = $this->db->query($sql);
			return $query->result_array();
		}


		public function insert_thesis_tag($thesis_id, $specialization)
		{
			$sql = "insert into thesis_specialization (thesis_id, specialization_id) values (".$thesis_id.", (select specialization_id from specialization where specialization='".$specialization."'))";
			$this->db->query($sql);
		}

		public function get_thesis_id($group_id)
		{
			$sql = "select * from thesis_group where group_id=".$group_id."";
			$query = $this->db->query($sql);
			return $query->first_row('array');
		}

		public function get_all_tags($group_id)
		{
			$sql = "select * 
					from specialization 
					where specialization_id not in 
						(select specialization_id from thesis_specialization where thesis_id=
							(select thesis_id from thesis_group where group_id=".$group_id."));";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function get_sched($user_id)
		{
			$sql = "SELECT S.USER_ID, S.DAY, TIME_FORMAT(T.START_TIME, '%h:%i %p') AS START, TIME_FORMAT(T.END_TIME, '%h:%i %p') AS END
					FROM SCHEDULE S 
					JOIN TIME T 
					ON T.TIME_ID=S.TIME_ID 
					WHERE USER_ID=".$user_id.";";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function delete_thesis_tags($thesis_id)
		{
			//escape all variable
			$this->db->where('thesis_id', $thesis_id);
			$this->db->delete('thesis_specialization'); 
		}

		public function insert_meeting($data)
		{
			$this->db->insert('meeting', $data);
		}

	}



?>
