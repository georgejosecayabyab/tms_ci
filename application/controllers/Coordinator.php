<?php 

	if(!defined('BASEPATH')) exit('Direct access not allowed');

	class coordinator extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->model('coordinator_model');


			$this->load->helper('download');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->library('email');
			//check if session exist

			$session = $this->session->userdata();
			$user_id = $session['user_id'];
			$user_type = $session['user_type'];
			if($user_type != 1) exit('Access not allowed');
			$if_coordinator = $this->coordinator_model->if_coordinator($user_id);
			if(sizeof($if_coordinator) == 0)
			{
				exit('Access not allowed');
			}
		}

		public function index()
		{
			//$this->sample_common_free_time();

			$data['defense'] = $this->coordinator_model->get_all_open_meetings();
			$data['active_tab'] = array(
				'home' => "active",
				'group' => "",
				'faculty' => "",
				'student' => "",
				'home_announcement' => "",
				'specific_announcement' => "",
				'form' => "",
				'report' => "",
				'archive' => "",
				'specialization' => "",
				'term' => ""  
			);

			$this->load->view('coordinator/coordinator_base_head', $data);
			$this->load->view('coordinator/coordinator_home_view', $data);
			$this->load->view('coordinator/coordinator_base_foot', $data);

		}


		public function view_group()
		{
			$data['group'] = $this->coordinator_model->get_group_info();
			$data['panel'] = $this->coordinator_model->archive_panels();
			$data['active_tab'] = array(
				'home' => "",
				'group' => "active",
				'faculty' => "",
				'student' => "",
				'home_announcement' => "",
				'specific_announcement' => "",
				'form' => "",
				'report' => "",
				'archive' => "",
				'specialization' => "",
				'term' => ""  
			);

			$this->load->view('coordinator/coordinator_base_head', $data);
			$this->load->view('coordinator/coordinator_group_view', $data);
			$this->load->view('coordinator/coordinator_base_foot', $data);


		}

		public function view_faculty()
		{
			$data['faculty_detail'] = $this->coordinator_model->get_faculty_info();
			$data['panel'] = $this->coordinator_model->get_no_of_panels();
			$data['group'] = $this->coordinator_model->get_no_of_groups();
			$data['all_rank'] = $this->coordinator_model->get_all_rank();
			$data['active_tab'] = array(
				'home' => "",
				'group' => "",
				'faculty' => "active",
				'student' => "",
				'home_announcement' => "",
				'specific_announcement' => "",
				'form' => "",
				'report' => "",
				'archive' => "",
				'specialization' => "",
				'term' => ""  
			);

			$this->load->view('coordinator/coordinator_base_head', $data);
			$this->load->view('coordinator/coordinator_faculty_view', $data);
			$this->load->view('coordinator/coordinator_base_foot', $data);
		}

		public function view_student()
		{
			$data['student'] = $this->coordinator_model->get_student_info();
			$data['course'] = $this->coordinator_model->get_all_course_details();
			$data['faculty'] = $this->coordinator_model->get_all_active_faculty();
			$data['active_tab'] = array(
				'home' => "",
				'group' => "",
				'faculty' => "",
				'student' => "active",
				'home_announcement' => "",
				'specific_announcement' => "",
				'form' => "",
				'report' => "",
				'archive' => "",
				'specialization' => "",
				'term' => ""  
			);

			$this->load->view('coordinator/coordinator_base_head', $data);
			$this->load->view('coordinator/coordinator_student_view', $data);
			$this->load->view('coordinator/coordinator_base_foot', $data);

		}

		public function view_announcement()
		{
			$data['group'] = $this->coordinator_model->get_group_info();
			$data['active_tab'] = array(
				'home' => "",
				'group' => "",
				'faculty' => "",
				'student' => "",
				'home_announcement' => "",
				'specific_announcement' => "",
				'form' => "",
				'report' => "",
				'archive' => "",
				'specialization' => "",
				'term' => ""  
			);

			$this->load->view('coordinator/coordinator_base_head', $data);
			$this->load->view('coordinator/coordinator_group_view', $data);
			$this->load->view('coordinator/coordinator_base_foot', $data);
		}

		public function view_home_announcement()
		{
			$data['news'] = $this->coordinator_model->get_news();
			$data['active_tab'] = array(
				'home' => "",
				'group' => "",
				'faculty' => "",
				'student' => "",
				'home_announcement' => "active",
				'specific_announcement' => "",
				'form' => "",
				'report' => "",
				'archive' => "",
				'specialization' => "",
				'term' => ""  
			);

			$this->load->view('coordinator/coordinator_base_head', $data);
			$this->load->view('coordinator/coordinator_home_announcement_view', $data);
			$this->load->view('coordinator/coordinator_base_foot', $data);
		}

		public function view_new_home_announcement()
		{
			$data['group'] = $this->coordinator_model->get_group_info();
			$data['active_tab'] = array(
				'home' => "",
				'group' => "",
				'faculty' => "",
				'student' => "",
				'home_announcement' => "",
				'specific_announcement' => "active",
				'form' => "",
				'report' => "",
				'archive' => "",
				'specialization' => "",
				'term' => ""  
			);

			$this->load->view('coordinator/coordinator_base_head', $data);
			$this->load->view('coordinator/coordinator_new_announcement_home_view', $data);
			$this->load->view('coordinator/coordinator_base_foot', $data);
		}

		public function view_specific_announcement()
		{
			$data['related_news'] = $this->coordinator_model->get_related_news();
			$data['active_tab'] = array(
				'home' => "",
				'group' => "",
				'faculty' => "",
				'student' => "",
				'home_announcement' => "",
				'specific_announcement' => "active",
				'form' => "",
				'report' => "",
				'archive' => "",
				'specialization' => "",
				'term' => ""  
			);

			$this->load->view('coordinator/coordinator_base_head', $data);
			$this->load->view('coordinator/coordinator_specific_announcement_view', $data);
			$this->load->view('coordinator/coordinator_base_foot', $data);
		}

		public function view_new_specific_announcement()
		{
			$data['course'] = $this->coordinator_model->get_all_course();
			$data['active_tab'] = array(
				'home' => "",
				'group' => "",
				'faculty' => "",
				'student' => "",
				'home_announcement' => "",
				'specific_announcement' => "active",
				'form' => "",
				'report' => "",
				'archive' => "",
				'specialization' => "",
				'term' => ""  
			);

			$this->load->view('coordinator/coordinator_base_head', $data);
			$this->load->view('coordinator/coordinator_new_announcement_specific_view', $data);
			$this->load->view('coordinator/coordinator_base_foot', $data);
		}

		public function view_form()
		{
			$data['form'] = $this->coordinator_model->get_form();
			$data['course_details'] = $this->coordinator_model->get_all_course_details();
			$data['course'] = $this->coordinator_model->get_all_course();
			$data['active_tab'] = array(
				'home' => "",
				'group' => "",
				'faculty' => "",
				'student' => "",
				'home_announcement' => "",
				'specific_announcement' => "",
				'form' => "active",
				'report' => "",
				'archive' => "",
				'specialization' => "",
				'term' => ""  
			);

			$this->load->view('coordinator/coordinator_base_head', $data);
			$this->load->view('coordinator/coordinator_form_view', $data);
			$this->load->view('coordinator/coordinator_base_foot', $data);
		}

		public function view_monitoring_report()
		{
			$data['group'] = $this->coordinator_model->get_group_info();
			$data['active_tab'] = array(
				'home' => "",
				'group' => "",
				'faculty' => "",
				'student' => "",
				'home_announcement' => "",
				'specific_announcement' => "",
				'form' => "",
				'report' => "active",
				'archive' => "",
				'specialization' => "",
				'term' => ""  
			);

			$this->load->view('coordinator/coordinator_base_head', $data);
			$this->load->view('coordinator/coordinator_group_view', $data);
			$this->load->view('coordinator/coordinator_base_foot', $data);
		}

		public function view_archive()
		{
			$data['thesis'] = $this->coordinator_model->archive_thesis();
			$data['member'] = $this->coordinator_model->archive_members();
			$data['panel'] = $this->coordinator_model->archive_panels();
			$data['specialization'] = $this->coordinator_model->archive_specialization();
			$data['active_tab'] = array(
				'home' => "",
				'group' => "",
				'faculty' => "",
				'student' => "",
				'home_announcement' => "",
				'specific_announcement' => "",
				'form' => "",
				'report' => "",
				'archive' => "active",
				'specialization' => "",
				'term' => ""  
			);

			$this->load->view('coordinator/coordinator_base_head', $data);
			$this->load->view('coordinator/coordinator_archive_view', $data);
			$this->load->view('coordinator/coordinator_base_foot', $data);
		}

		public function view_archive_specific($thesis_id)
		{
			$data['thesis'] = $this->coordinator_model->get_thesis_by_thesis_id($thesis_id);
			$data['member'] = $this->coordinator_model->archive_members();
			$data['panel'] = $this->coordinator_model->archive_panels();
			$data['specialization'] = $this->coordinator_model->archive_specialization();
			$data['active_tab'] = array(
				'home' => "",
				'group' => "",
				'faculty' => "",
				'student' => "",
				'home_announcement' => "",
				'specific_announcement' => "",
				'form' => "",
				'report' => "",
				'archive' => "active",
				'specialization' => "",
				'term' => ""  
			);

			$this->load->view('coordinator/coordinator_base_head', $data);
			$this->load->view('coordinator/coordinator_archive_specific_view', $data);
			$this->load->view('coordinator/coordinator_base_foot', $data);
		}

		public function view_set_term()
		{
			$data['term'] = $this->coordinator_model->get_term();
			$data['year'] = $this->coordinator_model->get_year();
			$data['all_term'] = $this->coordinator_model->get_all_term();
			$data['all_year'] = $this->coordinator_model->get_all_year();
			$data['active_tab'] = array(
				'home' => "",
				'group' => "",
				'faculty' => "",
				'student' => "",
				'home_announcement' => "",
				'specific_announcement' => "",
				'form' => "",
				'report' => "",
				'archive' => "",
				'specialization' => "",
				'term' => "active"  
			);

			//echo $data['year']['year'];

			$this->load->view('coordinator/coordinator_base_head', $data);
			$this->load->view('coordinator/coordinator_set_term_view', $data);
			$this->load->view('coordinator/coordinator_base_foot', $data);	
		}

		public function view_specialization()
		{
			$data['specialization'] = $this->coordinator_model->get_all_specialization();
			$data['active_tab'] = array(
				'home' => "",
				'group' => "",
				'faculty' => "",
				'student' => "",
				'home_announcement' => "",
				'specific_announcement' => "",
				'form' => "",
				'report' => "",
				'archive' => "",
				'specialization' => "active",
				'term' => ""  
			);

			$this->load->view('coordinator/coordinator_base_head', $data);
			$this->load->view('coordinator/coordinator_add_specialization_view', $data);
			$this->load->view('coordinator/coordinator_base_foot', $data);	
		}

		public function view_thesis()
		{
			$data['active_tab'] = array(
				'home' => "",
				'group' => "",
				'faculty' => "",
				'student' => "",
				'home_announcement' => "",
				'specific_announcement' => "",
				'form' => "",
				'report' => "",
				'archive' => "",
				'specialization' => "active",
				'term' => ""  
			);
		}

		public function sample_common_free_time()
		{
			$data['time_mo'] = $this->coordinator_model->get_group_common_free_time_by_day(5, 'MO');
			$data['time_we'] = $this->coordinator_model->get_group_common_free_time_by_day(5, 'WE');

			$this->load->view('coordinator/sample_schedule_view', $data);

		}

		public function update_initial_group_verdict()
		{
			$group_id = $this->input->post("group_id");
			$verdict = $this->input->post("verdict");

			if($verdict == 'P')
			{
				$this->coordinator_model->update_initial_verdict($group_id, $verdict);
				$this->coordinator_model->update_final_verdict($group_id, $verdict);
			}
			else
			{
				$this->coordinator_model->update_initial_verdict($group_id, $verdict);
			}
			

			$this->session->set_flashdata('success', 'Verdict has been updated!');
		}

		public function update_final_group_verdict()
		{
			$group_id = $this->input->post("group_id");
			$verdict = $this->input->post("verdict");

			$this->coordinator_model->update_final_verdict($group_id, $verdict);
			
			$this->session->set_flashdata('success', 'Verdict has been updated!');
		}

		public function get_panel_defense_date()
		{
			$group_id = $this->input->post('group_id');
			$date = $this->input->post('date');
			$day = $this->input->post('day');

			$panel_defense = $this->coordinator_model->get_panel_defense_date($group_id, $date);
			$free_common_time = $this->coordinator_model->get_group_common_free_time_by_day($group_id, $day);
			// $common_array = array();

			// foreach($free_common_time as $row)
			// {
			// 	$common_array[] = $row[''];
			// }

			// $common_time = "";
			// $start = $free_common_time[0]['START'];
			// $end = '';
			// for($i=0; $i<sizeof($free_common_time);$i++)
			// {	
			// 	if($i+1 < sizeof($free_common_time))
			// 	{
			// 		if($free_common_time[$i+1]['TIME_ID'] - $free_common_time[$i]['TIME_ID'] != 1)
			// 		{
			// 			$end = $free_common_time[$i]['END'];
			// 			date('h:i a m/d/Y', strtotime($date));
			// 			$common_time.=$start.' - '.$end.' | ';
			// 			$start = $free_common_time[$i+1]['START'];
			// 		}
			// 	}
			// 	if($i+1 == sizeof($free_common_time))
			// 	{
			// 		$end = $free_common_time[$i]['END'];
			// 		$common_time.=$start.' - '.$end.' | ';
			// 	}
			// }

			// $common_hour = array();
			// $start = $free_common_time[0]['START_TIME'];
			// $end = '';
			// for($i=0; $i<sizeof($free_common_time);$i++)
			// {	
			// 	if($i+1 < sizeof($free_common_time))
			// 	{
			// 		if($free_common_time[$i+1]['TIME_ID'] - $free_common_time[$i]['TIME_ID'] != 1)
			// 		{
			// 			$end = $free_common_time[$i]['END_TIME'];
			// 			date('h:i:s a m/d/Y', strtotime($date));
			// 			$common_hour.=date('h', strtotime($start)).' - '.date('h', strtotime($end)).' | ';
			// 			$start = $free_common_time[$i+1]['START_TIME'];
			// 		}
			// 		array_push($common_hour, )
			// 	}
			// 	if($i+1 == sizeof($free_common_time))
			// 	{
			// 		$end = $free_common_time[$i]['END_TIME'];
			// 		$common_hour.=date('h:i:s a', strtotime($start)).' - '.date('h:i:s a', strtotime($end)).' | ';
			// 	}
			// }

			$data = array(
				'free' => $free_common_time,
				'panel_defense' => $panel_defense
			);
			header('Content-Type: application/json');
			echo json_encode($data);
		}

		public function set_defense_date()
		{
			$group_id = $this->input->post('group_id');
			$date = $this->input->post('date');
			$start = $this->input->post('start');
			$end = $this->input->post('end');
			$start = date("G:i", strtotime($start));
			$end = date("G:i", strtotime($end));
			$result = $this->coordinator_model->check_defense_date($group_id);
			if(sizeof($result) > 0)
			{
				////update
				$data = array(
					'defense_date' => $date,
					'start_time' => $start,
					'end_time' => $end
				);

				$this->coordinator_model->update_thesis_defense_date($group_id, $data);
			}
			else
			{
				////create
				$data = array(
					'group_id' => $group_id,
					'defense_type' => 'REGULAR DEFENSE',
					'defense_date' => $date,
					'start_time' => $start,
					'end_time' => $end,
					'venue' => ' ',
					'status' => 0,
					'is_featured' => 0
				);

				$this->coordinator_model->insert_thesis_defense_date($data);
			}

			$this->session->set_flashdata('success', 'Defense date has been set!');
		}

		public function set_defense_date_link($group_id, $date, $time_id)
		{
			// $group_id = $this->input->post('group_id');
			// $date = $this->input->post('date');
			// $start = $this->input->post('start');
			// $end = $this->input->post('end');
			// $start = date("G:i", strtotime($start));
			// $end = date("G:i", strtotime($end));
			$time = $this->coordinator_model->get_time($time_id);

			$result = $this->coordinator_model->check_defense_date($group_id);
			if(sizeof($result) > 0)
			{
				////update
				$data = array(
					'defense_date' => $date,
					'start_time' => $time['START'],
					'end_time' => $time['END']
				);

				$this->coordinator_model->update_thesis_defense_date($group_id, $data);
			}
			else
			{
				////create
				$data = array(
					'group_id' => $group_id,
					'defense_type' => 'REGULAR DEFENSE',
					'defense_date' => $date,
					'start_time' => $time['START'],
					'end_time' => $time['END'],
					'venue' => ' ',
					'status' => 0,
					'is_featured' => 0
				);

				$this->coordinator_model->insert_thesis_defense_date($data);
			}

			$this->session->set_flashdata('success', 'Defense date has been set!');

			redirect('coordinator/view_group');
		}

		public function insert_defense_conversion($defense_date_id, $start, $end)////halt progress due to unknow defense_date_id in evry new insert
		{
			$this->coordinator_model->delete_defense_convert($defense_date_id);

			$array_of_time = array ();
			$start_time    = strtotime ($start);
			$end_time      = strtotime ($end);

			$fifteen_mins  = 15 * 60;

			while ($start_time < $end_time)
			{
			   $array_of_time[] = date ("H:i:s", $start_time);
			   $start_time += $fifteen_mins;
			}

			//print_r ($array_of_time);
			foreach($array_of_time as $row)
			{
				$this->coordinator_model->insert_defense_convert($defense_date_id, $row);
			}
		}

		public function upload_form()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$course_code = $this->input->post('course');
			
			$config['upload_path']          = './forms/';
            $config['allowed_types']        = 'pdf|docx';
            $config['max_size']             = 2000;
            $config['max_width']            = 4096;
            $config['max_height']           = 2048;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('fail', $error['error']);
                //$this->load->view('upload_form', $error);

	            redirect('coordinator/view_form');
            }
            else
            {
	            $data = array('upload_data' => $this->upload->data());
	            $rest = $this->upload->data();
	            //$this->load->view('upload_success', $data);
	            $this->coordinator_model->insert_form($rest['file_name'], $course_code);
	            $this->session->set_flashdata('success', 'Form has been uploaded!');
	            redirect('coordinator/view_form');

            }
		}

		public function delete_form($form_id)
		{
			$this->coordinator_model->delete_form($form_id);
			$this->session->set_flashdata('success', 'Form has been deleted!');
			redirect('coordinator/view_form');
		}

		public function get_group_tags($group_id)
		{

			$data['tags'] = $this->coordinator_model->get_group_tags($group_id);
			$data['tag_count'] = $this->coordinator_model->get_common_tag_count($group_id);
			$data['tag_common'] = $this->coordinator_model->get_common_tag($group_id);
			$data['panel_tag'] = $this->coordinator_model->get_common_panel_specialization();


			header('Content-Type: application/json');
			echo json_encode($data);
		}

		public function get_possible_panel($group_id)
		{
			$data['possible'] = $this->coordinator_model->get_possible_panelist($group_id);
			$data['panel'] = $this->coordinator_model->get_active_group_panel($group_id);

			header('Content-Type: application/json');
			echo json_encode($data);
		}

		public function get_group_panel($group_id)
		{
			$result = $this->coordinator_model->get_active_group_panel($group_id);

			header('Content-Type: application/json');
			echo json_encode($result);
		}

		public function get_panel_tags($panel_id)
		{
			
			$result = $this->coordinator_model->get_panel_tags($panel_id);

			header('Content-Type: application/json');
			echo json_encode($result);
		}

		public function update_group_panelist()
		{
			$group_id = $this->input->post('group_id');
			$fid = $this->input->post('fid');
			$sid = $this->input->post('sid');
			$tid = $this->input->post('tid');
			$id_array = array($fid, $sid, $tid);
			$result = $this->coordinator_model->get_active_group_panel($group_id);
			$inactive = $this->coordinator_model->get_inactive_group_panel($group_id);
			$updated_active_panels = array();
			$inactive_panels = array();
			if(sizeof($result) > 0) ///if panelist exists already///updates panels in common
			{
				///update only
				foreach($result as $row)
				{
					if (in_array($row['panel_id'], $id_array) == FALSE) {
					    $this->coordinator_model->update_group_panelist($row['panel_group_id'], 0);
					}
				}

				$result1 = $this->coordinator_model->get_active_group_panel($group_id);

				foreach($result1 as $row)
				{
					array_push($updated_active_panels, $row['panel_id']);
				}

				foreach($inactive as $row)
				{
					array_push($inactive_panels, $row['panel_id']);
				}

				
				foreach($id_array as $row)
				{
					if(in_array($row, $updated_active_panels) == FALSE) {
						if(in_array($row, $inactive_panels) == FALSE)
						{
							$data = array(
								'group_id' => $group_id,
								'panel_id' => $row, ///cant solve problem with identifying hte unequal panel id in id_array
								'status' => 1
							);
							$this->coordinator_model->insert_group_panelist($data);
						}
					    else
					    {
					    	$this->coordinator_model->update_previous_group_panelist($row, $group_id, 1);
					    }
					    
					}
				}
			}
			else ////if there are no panelist
			{
				///insert
				foreach($id_array as $row_id)
				{
					$data = array(
						'group_id' => $group_id,
						'panel_id' => $row_id,
						'status' => 1,
					);
					$this->coordinator_model->insert_group_panelist($data);
				}
			}

			$this->session->set_flashdata('success', 'Panelists has been set!');
		}

		public function validate_faculty()
		{
			$email = $this->input->post("email");
			$first_name = $this->input->post("first_name");
			$last_name = $this->input->post("last_name");
			$rank = $this->input->post("rank");
			date_default_timezone_set('Asia/Manila');
			$date_time = date("Y-m-d H:i:s");

			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
			$this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');

			if($this->form_validation->run() == FALSE)
			{
				//// set flash data
				$this->session->set_flashdata('fail', validation_errors());
				redirect('coordinator/view_faculty');
			}
			else
			{
				$this->create_faculty($email, $first_name, $last_name, $date_time, $rank);
				$this->session->set_flashdata('success', 'Faculty has been created!');
				redirect('coordinator/view_faculty');
			}
		}

		public function validate_student()
		{
			$email = $this->input->post("email");
			$first_name = $this->input->post("first_name");
			$last_name = $this->input->post("last_name");
			$course = $this->input->post("course");
			date_default_timezone_set('Asia/Manila');
			$date_time = date("Y-m-d H:i:s");

			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
			$this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');

			if($this->form_validation->run() == FALSE)
			{
				//// set flash data
				$this->session->set_flashdata('fail', validation_errors());
				redirect('coordinator/view_student');
			}
			else
			{	
				$this->create_student($email, $first_name, $last_name, $date_time, $course);
				$this->session->set_flashdata('success', 'Student has been created!');
				redirect('coordinator/view_student');
			}
		}

		public function create_faculty($email, $first_name, $last_name, $date_time, $rank)
		{
			$user = array(
				'first_name' => $first_name,
				'last_name' => $last_name,
				'password' => 1234,
				'email' => $email,
				'is_active' => 1,
				'date_joined' => $date_time,
				'profile_pic' => NULL,
				'user_type' => 1,

			);
			$this->coordinator_model->insert_user($user);

			$this->coordinator_model->insert_faculty($first_name, $last_name, $email, $rank);

		}

		public function create_student($email, $first_name, $last_name, $date_time, $course)
		{
			$user = array(
				'first_name' => $first_name,
				'last_name' => $last_name,
				'password' => 1234,
				'email' => $email,
				'is_active' => 1,
				'date_joined' => $date_time,
				'profile_pic' => NULL,
				'user_type' => 0,

			);
			$this->coordinator_model->insert_user($user);

			$this->coordinator_model->insert_student($first_name, $last_name, $email, $course);
		}

		public function delete_news($news_id)
		{
			$this->coordinator_model->delete_news($news_id);
			redirect('coordinator/view_home_announcement');

		}

		public function delete_related_news($event_id)
		{
			$this->coordinator_model->delete_related_news($event_id);
			redirect('coordinator/view_specific_announcement');
		}

		public function validate_home_announcement()
		{
			$topic_name = $this->input->post("discussion_title");
			$discussion = $this->input->post("editor1");
			date_default_timezone_set('Asia/Manila');
			$date_time = date("Y-m-d H:i:s");


			$this->form_validation->set_rules('discussion_title', 'Title', 'required|trim');
			$this->form_validation->set_rules('editor1', 'Information', 'required|trim');

			if($this->form_validation->run() == FALSE)
			{
				redirect('coordinator/view_new_home_announcement');
			}
			else
			{
				$data = array(
					'news_title' => $discussion,
					'news_title' => $topic_name,
					'date_time' => $date_time,
					'is_featured' => 0,
				);
				$this->coordinator_model->insert_new_home_announcement($data);
				redirect('coordinator/view_home_announcement');

			}
		}

		public function validate_specific_announcement()
		{
			$course = $this->input->post("course");
			$event_desc = $this->input->post("editor1");
			date_default_timezone_set('Asia/Manila');
			$date_time = date("Y-m-d H:i:s");

			$this->form_validation->set_rules('editor1', 'Information', 'required|trim');

			if($this->form_validation->run() == FALSE)
			{
				redirect('coordinator/view_new_specific_announcement');
			}
			else
			{
				$data = array(
					'event_desc' => $event_desc,
					'course_code' => $course
				);
				$this->coordinator_model->insert_new_specific_announcement($data);
				redirect('coordinator/view_specific_announcement');

			}
		}

		////download
		public function download_form($form_name)
		{
			if($form_name)
			{
				$file = realpath("forms")."\\".$form_name;
				if(file_exists($file))
				{
					$data = file_get_contents($file);

					force_download($form_name, $data);
				}	
			}
		}

		public function validate_specialization()
		{
			$specialization = $this->input->post('specialization');

			$this->form_validation->set_rules('specialization', 'Specialization', 'required|trim');

			if($this->form_validation->run() == FALSE)
			{
				//// set flash data
				$this->session->set_flashdata('fail', validation_errors());
				redirect('coordinator/view_specialization');
			}
			else
			{
				$this->insert_specialization($specialization);
				$this->session->set_flashdata('success', 'Specialization has been added!');
				redirect('coordinator/view_specialization');
			}

		}

		public function insert_specialization($specialization)
		{
			$data = array(
				'specialization'=> $specialization
			);
			$this->coordinator_model->insert_specialization($data);

		}

		public function get_user_info($user_id)
		{
			$data['user'] = $this->coordinator_model->get_user_info($user_id);

			header('Content-Type: application/json');
			echo json_encode($data);
		}

		public function sample_year()
		{
			var_dump($this->input->post('george'));
			echo $this->input->post('group_name');
			echo $this->input->post('adviser');
		}

		public function move_to_next_term()
		{
			$old_term = $this->coordinator_model->get_term();
			$this->coordinator_model->deactivate_old_term($old_term['term']);

			$old_year = $this->coordinator_model->get_year();
			$this->coordinator_model->deactivate_old_year($old_year['year']);

			$term = $this->input->post('term');
			$this->coordinator_model->activate_new_term($term);

			$year = $this->input->post('year');
			$this->coordinator_model->activate_new_year($year);
			$result = $this->coordinator_model->get_all_passed_group();

			$all_group = $this->coordinator_model->get_group_info();

			//$this->coordinator_model->delete_notifications();

			foreach($result as $row)/////MOVING TO THE NEXT COURSE
			{
				$group_id = $row['GROUP_ID'];
				$degree_code = $row['DEGREE_CODE'];
				$course_order = $this->coordinator_model->sample_move_term($group_id, $degree_code);
				$members = $this->coordinator_model->get_members($group_id);
				foreach($members as $mem)///moves students to next course
				{
					$this->coordinator_model->update_student_course($mem['user_id'], $degree_code, $course_order['@ANSWER']);
					if($mem['course_order'] == $course_order['@ANSWER'])
					{
						$this->coordinator_model->update_student_status($mem['user_id']); ///deactivates users
					}
				}

				if($row['COURSE_ORDER'] == $course_order['@ANSWER'])////set thesis to completed, DEACTIVATE GROUP
				{
					$this->coordinator_model->update_thesis_status($row['THESIS_ID']);
					$this->coordinator_model->update_group_status($row['GROUP_ID']);
				}

			}

			foreach($all_group as $row)////RESETTING VERDICTS
			{
				$group_id = $row['GROUP_ID'];
				$this->coordinator_model->delete_all_defense_date($group_id);
				$this->coordinator_model->update_verdicts($group_id);
			}

			$this->session->set_flashdata('success', 'A new term has been set!');			
			redirect('coordinator/view_set_term');

		}

		public function insert_group()
		{
			$users = $this->input->post('users');
			$group_name = $this->input->post('group_name');
			$thesis_title = $this->input->post('thesis_title');
			$adviser = $this->input->post('adviser');
			$adviser_id = $this->input->post('adviser_id');
			$course = $this->input->post('course');

			//// validations
			if(sizeof($users) > 4 || sizeof($users) < 1)
			{
				$this->session->set_flashdata('fail', 'Invalid number of students');
				redirect('coordinator/view_student');
				$count = 0;
				for($x = 0; $x < sizeof($users); $x++)
				{
					$valid_course = $this->coordinator_model->check_degree_code($users[$x]);
					if($valid_course['course_code'] == $course)
					{
						$count++;
					}
				}
				if($count != sizeof($users))
				{
					$this->session->set_flashdata('fail', 'Invalid course of student!');
					redirect('coordinator/view_student');
				}
			}

			$this->form_validation->set_rules('group_name', 'Group Name', 'required|trim');
			$this->form_validation->set_rules('thesis_title', 'Thesis Title', 'required');

			if($this->form_validation->run() == FALSE)
			{
				//// set flash data
				$this->session->set_flashdata('fail', validation_errors());
				redirect('coordinator/view_student');
			}
			else
			{
				$this->coordinator_model->insert_thesis($thesis_title);
				$this->coordinator_model->insert_thesis_group($group_name, $adviser_id, $thesis_title, $course);
				$thesis_group_id = $this->coordinator_model->get_thesis_group($group_name, $adviser_id);
				for($x = 0; $x < sizeof($users); $x++)
				{
					$this->coordinator_model->insert_student_group($users[$x], $thesis_group_id['group_id']);
				}
				$this->session->set_flashdata('success', 'Group has been created!');
				redirect('coordinator/view_student');
			}

			foreach($users as $row)
			{
				echo $row.'<br>';
			}

		}

		////logout
		public function logout()
		{
			$data = array(
				'user_id' => '',
				'user_type' => ''
			);
			$this->session->unset_userdata($data);
			$this->session->sess_destroy();
			redirect("home/index");
		}


	}
?>