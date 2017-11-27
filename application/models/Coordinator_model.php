<?php
	if(!defined('BASEPATH')) exit('Direct acces not allowed');

class coordinator_model extends CI_Model
{

	public function get_group_common_free_time_by_day($group_id, $day)
	{
		$sql = "SELECT T.TIME_ID, TIME_FORMAT(T.START_TIME, '%h:%i %p') AS 'START', TIME_FORMAT(T.END_TIME, '%h:%i %p') AS 'END'
				FROM TIME T
				WHERE T.TIME_ID NOT IN
				(SELECT TIME_ID FROM SCHEDULE WHERE USER_ID IN 
						(SELECT STUDENT_ID FROM STUDENT_GROUP WHERE GROUP_ID=".$group_id.") 
						AND DAY='".$day."'
						OR USER_ID IN 
						(SELECT PANEL_ID FROM PANEL_GROUP WHERE GROUP_ID=".$group_id." AND STATUS=1)
					AND DAY='".$day."'
					GROUP BY TIME_ID);";
		$query = $this->db->query($sql);
		return $query->result_array();


	}

	public function if_coordinator($user_id)
	{
		$sql = "SELECT * FROM FACULTY WHERE USER_ID=".$user_id." AND IS_COORDINATOR=1;";
		$query = $this->db->query($sql);
		return $query->first_row('array');
	}
	//Coordinator Faculty

	//This function gets the user information of the faculty (NAME, USER_ID, IS_ACTIVE)
	public function get_faculty_info()
	{
		$sql = "SELECT CONCAT(U.LAST_NAME,', ',U.FIRST_NAME) AS 'NAME', U.IS_ACTIVE, U.USER_ID, U.EMAIL, R.RANK
				FROM FACULTY F 	LEFT JOIN USER U
								ON F.USER_ID = U.USER_ID
								JOIN RANK R
								ON R.RANK_CODE=F.RANK;";

		$query = $this->db->query($sql);
		return $query->result_array();
	}

	
	//This functions gets the number of panel per faculty
	public function get_no_of_panels()
	{
		$sql = "SELECT COUNT(PG.PANEL_ID) AS 'PANEL', U.USER_ID
				FROM FACULTY F 	LEFT JOIN USER U 
								ON F.USER_ID = U.USER_ID
                				LEFT JOIN PANEL_GROUP PG
                				ON F.USER_ID = PG.PANEL_ID
                WHERE PG.STATUS=1
				GROUP BY F.USER_ID;";

		$query = $this->db->query($sql);
		return $query->result_array();
	}

	//This function gets the number of groups per faculty
	public function get_no_of_groups()
	{
		$sql = "SELECT COUNT(U.USER_ID) AS 'GROUP', TG.adviser_id, U.USER_ID
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
		$sql = "SELECT TG.GROUP_ID, TG.GROUP_NAME, TG.ADVISER_ID, TG.THESIS_ID, TG.COURSE_CODE, TG.INITIAL_VERDICT, TG.FINAL_VERDICT, TG.IS_ACTIVE, DD.DEFENSE_DATE_ID, DD.DEFENSE_DATE, TIME_FORMAT(DD.START_TIME, '%h:%i %p') AS 'START', TIME_FORMAT(DD.END_TIME, '%h:%i %p') AS 'END', DD.VENUE, TG.SECTION, DD.DEFENSE_TYPE
				FROM THESIS_GROUP TG	LEFT JOIN DEFENSE_DATE DD
										ON TG.GROUP_ID = DD.GROUP_ID
                        				JOIN COURSE C
                        				ON TG.COURSE_CODE=C.COURSE_CODE
                        				WHERE TG.IS_ACTIVE=1;";

		$query = $this->db->query($sql);
		return $query->result_array();
	}	

	//Coordinator Student

	//This function gets the student information note no section
	public function get_student_info()
	{
		$sql = "SELECT CONCAT(U.LAST_NAME,', ', U.FIRST_NAME) AS 'NAME', U.USER_ID, S.COURSE_CODE, TG.GROUP_NAME, U.IS_ACTIVE
				FROM STUDENT S 	JOIN USER U
								ON S.USER_ID = U.USER_ID
                				LEFT JOIN STUDENT_GROUP SG 
                				ON SG.STUDENT_ID = S.USER_ID
                				LEFT JOIN THESIS_GROUP TG
                				ON SG.GROUP_ID = TG.GROUP_ID;";

		$query = $this->db->query($sql);
		return $query->result_array();
	}	

	///this function gets all course
	public function get_all_course_details()
	{
		$sql = "SELECT * 
				FROM COURSE;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_all_course()
	{
		$sql = "SELECT * 
				FROM COURSE;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	//Coordinator Announcement

	public function add_announcement($description, $course_code)
	{
		$sql = "INSERT INTO `thesis_related_event` (`event_id`, `event_desc`, `course_code`) 
				VALUES (NULL, ".$description.", ".$course_code.");";

		$query = $this->db->query($sql);
	}	

	//Coordinator Form

	//This function will get the form given the course_id
	public function get_form()
	{
		$sql = "SELECT *
				FROM FORM;";

		$query = $this->db->query($sql);
		return $query->result_array();
	}	

	//This function will add a form in the database
	public function add_form($form, $course_code)
	{
		$sql = "INSERT INTO `form` (`form_id`, `form_name`, `course_code`) 
				VALUES (NULL, ".$form.", ".$course_code.");";

		$query = $this->db->query($sql);
	}

	///coordinator home

	////get all defense available 
	public function get_all_open_meetings()
	{
		$sql = "SELECT DD.GROUP_ID, DATE(DD.DEFENSE_DATE) AS DEF_DATE, TIME_FORMAT(DD.START_TIME, '%h:%i %p') AS START, TIME_FORMAT(DD.END_TIME, '%h:%i %p') AS END, DD.VENUE, DD.STATUS, DATEDIFF(DD.DEFENSE_DATE, CURDATE()) AS DIFF, CURDATE() AS 'NOW', T.THESIS_TITLE
				FROM DEFENSE_DATE DD
				JOIN THESIS_GROUP TG
				ON TG.GROUP_ID=DD.GROUP_ID
				JOIN THESIS T
				ON T.THESIS_ID=TG.THESIS_ID
				WHERE DATEDIFF(DD.DEFENSE_DATE, CURDATE()) >= 0
				ORDER BY DD.DEFENSE_DATE ASC;";

		$query = $this->db->query($sql);
		return $query->result_array();
	}

	///coordinator archive
	public function archive_thesis()
	{
		$sql = "select t.thesis_id, t.thesis_title, tg.group_id, t.abstract
				from thesis t 
				left join thesis_group tg
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
				on tg.group_id=pg.group_id
				where pg.status=1;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_thesis_by_thesis_id($thesis_id)
	{	
		$sql = "SELECT * FROM THESIS WHERE THESIS_ID=".$thesis_id.";";
		$query = $this->db->query($sql);
		return $query->first_row('array');

	}

	public function update_initial_verdict($group_id, $verdict)
	{

		$data = array(
			'initial_verdict' => $verdict
		);

		$this->db->where('group_id', $group_id);
		$this->db->update('thesis_group', $data); 
	}

	public function update_defense_type($group_id, $verdict)
	{
		$defense_type = "";
		// if()
		// {

		// }
		// else if()
		// {

		// }
		// else
		// {

		// }


		$data = array(
			'group_id' => $group_id,
			'defense_type' => $verdict
		);

		$this->db->where('group_id', $group_id);
		$this->db->update('defense_date', $data); 
	}

	public function update_final_verdict($group_id, $verdict)
	{

		$data = array(
			'final_verdict' => $verdict
		);
		$this->db->where('group_id', $group_id);
		$this->db->update('thesis_group', $data); 
	}

	////returns time of defenses the panels needed to attend on that day 
	public function get_panel_defense_date($group_id, $date)
	{
		$sql = "SELECT CONCAT(U.FIRST_NAME,' ', U.LAST_NAME) AS 'NAME',DEFENSE_DATE, TIME_FORMAT(DD.START_TIME, '%h:%i %p') AS 'START', TIME_FORMAT(DD.END_TIME, '%h:%i %p') AS 'END'
				FROM DEFENSE_DATE DD
				JOIN THESIS_GROUP TG
				ON TG.GROUP_ID=DD.GROUP_ID
				JOIN PANEL_GROUP PG
				ON PG.GROUP_ID=TG.GROUP_ID
				JOIN FACULTY F
				ON F.USER_ID=PG.PANEL_ID
				JOIN USER U
				ON U.USER_ID=F.USER_ID
				WHERE PG.PANEL_ID IN (SELECT PANEL_ID FROM PANEL_GROUP WHERE GROUP_ID=".$group_id." AND STATUS=1)
				AND DD.DEFENSE_DATE = '".$date."'
				AND DD.GROUP_ID!=".$group_id.";";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function check_defense_date($group_id){
		$sql = "SELECT * FROM DEFENSE_DATE WHERE GROUP_ID=".$group_id.";";
		$query = $this->db->query($sql);
		return $query->first_row('array');
	}

	public function update_thesis_defense_date($group_id, $data)
	{

		$this->db->where('group_id', $group_id);
		$this->db->update('defense_date', $data); 
	}

	public function insert_thesis_defense_date($data)
	{
		//escape every variable
		$this->db->insert('defense_date', $data);
	}

	public function insert_defense_convert($defense_date_id, $start_time)
	{
		//escape every variable
		$sql = "INSERT INTO 'defense_convert' (defense_date_id, time_id) 
				VALUES (".$defense_date_id.", (select time_id from time where start_time=".$start_time."));";
		$query = $this->db->query($sql);
	}

	public function delete_defense_convert($defense_date_id)
	{
		//escape all variable
		$this->db->where('defense_date_id', $defense_date_id);
		$this->db->delete('defense_convert');
	}

	public function get_term()
	{
		$sql = "SELECT * FROM SCHOOL_TERM WHERE IS_ACTIVE=1;";
		$query = $this->db->query($sql);
		return $query->first_row('array');
	}

	public function get_all_term()
	{
		$sql = "SELECT * FROM SCHOOL_TERM;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_year()
	{
		$sql = "SELECT * FROM SCHOOL_YEAR WHERE IS_ACTIVE=1;";
		$query = $this->db->query($sql);
		return $query->first_row('array');
	}

	public function insert_form($form_name, $course_code)
	{
		//escape every variable
		$data = array(
			'form_name' => $form_name,
			'course_code' => $course_code
		);
		$this->db->insert('form', $data);
	}

	public function delete_form($form_id)
	{
		//escape all variable
		$this->db->where('form_id', $form_id);
		$this->db->delete('form');
	}

	public function get_group_tags($group_id)
	{
		$sql = "SELECT * 
				FROM SPECIALIZATION
				WHERE SPECIALIZATION_ID IN 
					(SELECT SPECIALIZATION_ID FROM THESIS_SPECIALIZATION WHERE THESIS_ID IN 
						(SELECT THESIS_ID FROM THESIS_GROUP WHERE GROUP_ID=".$group_id."));";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_common_tag($group_id)
	{
		$sql = "SELECT * 
				FROM FACULTY F
				JOIN FACULTY_SPECIALIZATION FS
				ON FS.USER_ID=F.USER_ID
				JOIN USER U
				ON U.USER_ID=F.USER_ID
				JOIN SPECIALIZATION S
				ON S.SPECIALIZATION_ID=FS.SPECIALIZATION_ID
				WHERE FS.SPECIALIZATION_ID IN (SELECT SPECIALIZATION_ID FROM THESIS_SPECIALIZATION WHERE THESIS_ID IN 
										(SELECT THESIS_ID FROM THESIS_GROUP WHERE GROUP_ID=".$group_id."));";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_common_tag_count($group_id)
	{
		$sql = "SELECT FS.USER_ID, CONCAT( U.LAST_NAME,', ',U.FIRST_NAME) AS 'NAME', COUNT(FS.USER_ID) AS 'COUNT'
				FROM FACULTY F
				JOIN FACULTY_SPECIALIZATION FS
				ON FS.USER_ID=F.USER_ID
				JOIN USER U
				ON U.USER_ID=F.USER_ID
				WHERE FS.SPECIALIZATION_ID IN (SELECT SPECIALIZATION_ID FROM THESIS_SPECIALIZATION WHERE THESIS_ID IN 
										(SELECT THESIS_ID FROM THESIS_GROUP WHERE GROUP_ID=".$group_id."))
				GROUP BY FS.USER_ID
				ORDER BY COUNT DESC
				LIMIT 3;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_common_panel_specialization()
	{
		$sql = "SELECT * 
				FROM FACULTY_SPECIALIZATION FS
				JOIN SPECIALIZATION S
				ON S.SPECIALIZATION_ID=FS.SPECIALIZATION_ID";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_possible_panelist($group_id)
	{
		$sql = "SELECT * 
				FROM FACULTY F
				JOIN USER U
				ON U.USER_ID=F.USER_ID
				WHERE F.USER_ID NOT IN (SELECT ADVISER_ID FROM THESIS_GROUP WHERE GROUP_ID=".$group_id.")
				ORDER BY U.LAST_NAME ASC;";
		$query = $this->db->query($sql);
		return $query->result_array();
		
	}

	public function get_active_group_panel($group_id)
	{
		$sql = "SELECT * 
				FROM PANEL_GROUP PG
				JOIN FACULTY F
                ON F.USER_ID=PG.PANEL_ID
				JOIN USER U
				ON U.USER_ID=F.USER_ID 
				WHERE PG.GROUP_ID=".$group_id."
				AND PG.STATUS=1;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_inactive_group_panel($group_id)
	{
		$sql = "SELECT * 
				FROM PANEL_GROUP PG
				JOIN FACULTY F
                ON F.USER_ID=PG.PANEL_ID
				JOIN USER U
				ON U.USER_ID=F.USER_ID 
				WHERE PG.GROUP_ID=".$group_id."
				AND PG.STATUS=0;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_panel_tags($panel)
	{
		$sql = "SELECT * 
				FROM FACULTY_SPECIALIZATION FS
				JOIN SPECIALIZATION S
				ON FS.SPECIALIZATION_ID=S.SPECIALIZATION_ID
				WHERE FS.USER_ID=".$panel.";";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function update_group_panelist($panel_group_id, $status)
	{
		$data = array(
			'status' => $status
		);
		$this->db->where('panel_group_id', $panel_group_id);
		$this->db->update('panel_group', $data); 
	}

	public function update_previous_group_panelist($panel_id, $group_id, $status)
	{
		$data = array(
			'status' => $status
		);
		$this->db->where('panel_id', $panel_id);
		$this->db->where('group_id', $group_id);
		$this->db->update('panel_group', $data); 
	}

	public function insert_group_panelist($data)
	{
		//escape every variable
		$this->db->insert('panel_group', $data);
	}

	public function delete_group_panelist($group_id)
	{
		//escape all variable
		$this->db->where('group_id', $group_id);
		$this->db->delete('panel_group');
	}

	public function get_all_rank()
	{
		$sql = "SELECT * FROM RANK";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function insert_user($data)
	{
		//escape every variable
		$this->db->insert('user', $data);
	}

	public function insert_student($first_name, $last_name, $email, $course)
	{

		$sql = "INSERT INTO STUDENT (USER_ID, COURSE_CODE) 
				VALUES ((SELECT USER_ID FROM USER WHERE FIRST_NAME='".$first_name."' AND LAST_NAME='".$last_name."' AND EMAIL='".$email."' AND USER_TYPE=0), (SELECT COURSE_CODE FROM COURSE WHERE COURSE_CODE='".$course."'));";

		$query = $this->db->query($sql);
	}

	public function insert_faculty($first_name, $last_name, $email, $rank)
	{
		$sql = "INSERT INTO FACULTY (USER_ID, IS_COORDINATOR, RANK)
				VALUES ((SELECT USER_ID FROM USER WHERE FIRST_NAME='".$first_name."' AND LAST_NAME='".$last_name."' AND EMAIL='".$email."' AND USER_TYPE=1),0, (SELECT RANK_CODE FROM RANK WHERE RANK='".$rank."'));";

		$query = $this->db->query($sql);
	}

	public function get_news()
	{
		$sql = "SELECT * FROM NEWS;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function delete_news($news_id)
	{
		//escape all variable
		$this->db->where('news_id', $news_id);
		$this->db->delete('news');
	}

	public function get_related_news()
	{
		$sql = "SELECT * FROM THESIS_RELATED_EVENT;";
		$query = $this->db->query($sql);
		return $query->result_array();

	}

	public function delete_related_news($event_id)
	{
		//escape all variable
		$this->db->where('event_id', $event_id);
		$this->db->delete('thesis_related_event');
	}

	public function insert_new_home_announcement($data)
	{
		//escape every variable
		$this->db->insert('news', $data);
	}

	public function insert_new_specific_announcement($data)
	{
		//escape every variable
		$this->db->insert('thesis_related_event', $data);
	}

	public function get_all_specialization()
	{
		$sql = "SELECT * FROM SPECIALIZATION;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function insert_specialization($data)
	{
		//escape every variable
		$this->db->insert('specialization', $data);
	}

	public function get_user_info($user_id)
	{
		$sql = "SELECT * FROM USER WHERE USER_ID=".$user_id.";";
		$query = $this->db->query($sql);
		return $query->first_row('array');
	}

	public function get_all_active_faculty()
	{
		$sql = "SELECT * FROM USER WHERE USER_ID IN(SELECT USER_ID FROM FACULTY WHERE IS_COORDINATOR=0) ORDER BY LAST_NAME ASC;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_all_year()
	{
		$sql = "SELECT * FROM SCHOOL_YEAR;";

		$query = $this->db->query($sql);
		return $query->result_array();
		
	}

	public function get_all_passed_group()
	{
		$sql = "SELECT C.COURSE_ORDER, TG.COURSE_CODE, TG.GROUP_NAME, TG.GROUP_ID, C.DEGREE_CODE, TG.THESIS_ID
				FROM COURSE C 
				LEFT JOIN THESIS_GROUP TG 
				ON TG.COURSE_CODE=C.COURSE_CODE
				WHERE TG.FINAL_VERDICT='P'
				ORDER BY GROUP_NAME ASC;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function sample_move_term($group_id, $degree_code)
	{
		$this->db->query("SET @GROUP_ID =".$group_id.";");
		$this->db->query("SET @DEGREE_CODE = '".$degree_code."';");
		$this->db->query("SET @ANSWER = IF(
						(SELECT COURSE_ORDER+1 
							FROM COURSE C
					        JOIN THESIS_GROUP TG
					        ON TG.COURSE_CODE=C.COURSE_CODE
					        WHERE DEGREE_CODE=@DEGREE_CODE
					        AND TG.GROUP_ID=@GROUP_ID) <= (SELECT COURSE_ORDER 
							FROM COURSE 
							WHERE DEGREE_CODE=@DEGREE_CODE
							ORDER BY COURSE_ORDER DESC
							LIMIT 1), 

					        (SELECT COURSE_ORDER+1 FROM COURSE C
					        JOIN THESIS_GROUP TG
					        ON TG.COURSE_CODE=C.COURSE_CODE
					        WHERE DEGREE_CODE=@DEGREE_CODE
					        AND TG.GROUP_ID=@GROUP_ID), 

					        (SELECT COURSE_ORDER FROM COURSE C
					        JOIN THESIS_GROUP TG
					        ON TG.COURSE_CODE=C.COURSE_CODE
					        WHERE DEGREE_CODE=@DEGREE_CODE
					        AND TG.GROUP_ID=@GROUP_ID)
					        );");

		$sql = "UPDATE THESIS_GROUP
					SET COURSE_CODE=(SELECT COURSE_CODE FROM COURSE WHERE COURSE_ORDER=@ANSWER AND DEGREE_CODE=@DEGREE_CODE)
					WHERE GROUP_ID=@GROUP_ID;";
						
		$this->db->query($sql);

		$sql = "SELECT @ANSWER;";

		$query = $this->db->query($sql);

		return $query->first_row('array');
	}
	public function deactivate_old_term($term)
	{	
		$data = array(
			'is_active' => 0
		);
		$this->db->where('term', $term);
		$this->db->update('school_term', $data);
	}

	public function deactivate_old_year($year)
	{	
		$data = array(
			'is_active' => 0
		);
		$this->db->where('year', $year);
		$this->db->update('school_year', $data);
	}

	public function activate_new_term($term)
	{
		$data = array(
			'is_active' => 1
		);
		$this->db->where('term', $term);
		$this->db->update('school_term', $data);
	}

	public function activate_new_year($year)
	{
		$data = array(
			'is_active' => 1
		);
		$this->db->where('year', $year);
		$this->db->update('school_year', $data);

	}

	public function get_time($time_id)
	{
		$sql = "SELECT T.START_TIME AS 'START', T.END_TIME AS 'END'
				FROM TIME T WHERE T.TIME_ID=".$time_id.";";

		$query = $this->db->query($sql);
		return $query->first_row('array');
	}

	public function insert_thesis($thesis_title)
	{	
		$data = array(
			'thesis_title' => $thesis_title,
			'thesis_status' => 'ON-GOING',
			'abstract' => ''
		);

		$this->db->insert('thesis', $data);

	}

	public function insert_thesis_group($group_name, $adviser, $thesis_title, $course_code)
	{
		$sql = "INSERT INTO THESIS_GROUP (GROUP_NAME, ADVISER_ID, THESIS_ID, INITIAL_VERDICT, FINAL_VERDICT, IS_ACTIVE, COURSE_CODE)
				VALUES ('".$group_name."', (SELECT USER_ID FROM FACULTY WHERE USER_ID=".$adviser."), (SELECT THESIS_ID FROM THESIS WHERE THESIS_TITLE='".$thesis_title."'), 'NOV', 'NVY', 1, '".$course_code."')";
		$this->db->query($sql);
	}

	public function insert_student_group($user_id, $group_id)
	{
		$data = array(
			'group_id' => $group_id,
			'student_id' => $user_id,
			'status' => 1
		);

		$this->db->insert('student_group', $data);
	}

	public function get_thesis_group($group_name, $adviser_id)
	{
		$sql = "SELECT * FROM THESIS_GROUP WHERE GROUP_NAME='".$group_name."' AND ADVISER_ID=".$adviser_id.";";
		$query = $this->db->query($sql);
		return $query->first_row('array');
	}

	public function check_degree_code($user_id)
	{
		$sql = "SELECT * FROM STUDENT WHERE USER_ID=".$user_id.";" ;
		$query = $this->db->query($sql);
		return $query->first_row('array');
	}

	public function delete_all_defense_date($group_id)
	{
		$sql = "delete from defense_date where group_id=".$group_id.";";
		$this->db->query($sql);
	}

	public function update_verdicts($group_id)
	{
		$sql = "update thesis_group
				set initial_verdict='NOV', final_verdict='NVY' 
				where group_id=".$group_id.";";
		$this->db->query($sql);
	}

	public function delete_notifications()
	{
		$this->db->query("SET SQL_SAFE_UPDATES = 0;");
		$this->db->query("delete from notification;");
		$this->db->query("SET SQL_SAFE_UPDATES = 1;");
	}

	public function get_members($group_id)
	{
		$sql = "SELECT * 
				FROM STUDENT_GROUP SG
				JOIN STUDENT S
				ON S.USER_ID=SG.STUDENT_ID
				JOIN COURSE C
				ON S.COURSE_CODE=C.COURSE_CODE
				WHERE GROUP_ID=".$group_id." AND STATUS=1";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function update_student_course($user_id, $degree, $course_order)
	{
		$sql = "UPDATE STUDENT
				SET COURSE_CODE=(SELECT COURSE_CODE FROM COURSE WHERE DEGREE_CODE='".$degree."' AND COURSE_ORDER=".$course_order.")
				WHERE USER_ID=".$user_id.";";
		$this->db->query($sql);
	}

	public function update_student_status($user_id)
	{
		$sql = "update user 
				set is_active=0
				where user_id=".$user_id.";";
		$this->db->query($sql);
	}

	public function update_thesis_status($thesis_id)
	{
		$sql = "update thesis 
				set thesis_status='COMPLETED'
				where thesis_id=".$thesis_id.";";
		$this->db->query($sql);
	}

	public function update_group_status($group_id)
	{
		$sql = "update thesis_group 
				set is_active=0
				where group_id=".$group_id.";";
		$this->db->query($sql);
	}

}


?>
