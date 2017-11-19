<?php 

	if(!defined('BASEPATH')) exit('Direct access not allowed');

	class coordinator extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->model('coordinator_model');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->library('email');
			//check if session exist

			// $session = $this->session->userdata();
			// $user_id = $session['user_id'];
			// $user_type = $session['user_type'];
			// if($user_type != 1) exit('Access not allowed');
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
				'term' => ""  
			);

			$this->load->view('coordinator/coordinator_base_head', $data);
			$this->load->view('coordinator/coordinator_group_view', $data);
			$this->load->view('coordinator/coordinator_base_foot', $data);
		}

		public function view_home_announcement()
		{
			$data['group'] = $this->coordinator_model->get_group_info();
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
				'term' => ""  
			);

			$this->load->view('coordinator/coordinator_base_head', $data);
			$this->load->view('coordinator/coordinator_group_view', $data);
			$this->load->view('coordinator/coordinator_base_foot', $data);
		}

		public function view_specific_announcement()
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
				'term' => ""  
			);

			$this->load->view('coordinator/coordinator_base_head', $data);
			$this->load->view('coordinator/coordinator_group_view', $data);
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
				'archive' => "active_tab",
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
				'archive' => "active_tab",
				'term' => ""  
			);

			$this->load->view('coordinator/coordinator_base_head', $data);
			$this->load->view('coordinator/coordinator_archive_specific_view', $data);
			$this->load->view('coordinator/coordinator_base_foot', $data);
		}

		public function view_set_term()
		{
			$data['term'] = $this->coordinator_model->get_term();
			$data['active_tab'] = array(
				'home' => "",
				'group' => "",
				'faculty' => "",
				'student' => "",
				'home_announcement' => "",
				'specific_announcement' => "",
				'form' => "",
				'report' => "",
				'archive' => "active_tab",
				'term' => ""  
			);

			$this->load->view('coordinator/coordinator_base_head', $data);
			$this->load->view('coordinator/coordinator_set_term_view', $data);
			$this->load->view('coordinator/coordinator_base_foot', $data);	
		}

		public function sample_common_free_time()
		{
			$data['time_mo'] = $this->coordinator_model->get_group_common_free_time_by_day(5, 'MO');
			$data['time_we'] = $this->coordinator_model->get_group_common_free_time_by_day(5, 'WE');

			$this->load->view('coordinator/sample_schedule_view', $data);

		}

		public function update_group_verdict()
		{
			$group_id = $this->input->post("group_id");
			$verdict = $this->input->post("verdict");

			$this->coordinator_model->update_initial_verdict($group_id, $verdict);
		}

		public function get_panel_defense_date()
		{
			$group_id = $this->input->post('group_id');
			$date = $this->input->post('date');
			$day = $this->input->post('day');

			$panel_defense = $this->coordinator_model->get_panel_defense_date($group_id, $date);
			$free_common_time = $this->coordinator_model->get_group_common_free_time_by_day($group_id, $day);

			$common_time = "";
			$start = $free_common_time[0]['START_TIME'];
			$end = '';
			for($i=0; $i<sizeof($free_common_time);$i++)
			{	
				if($i+1 < sizeof($free_common_time))
				{
					if($free_common_time[$i+1]['TIME_ID'] - $free_common_time[$i]['TIME_ID'] != 1)
					{
						$end = $free_common_time[$i]['END_TIME'];
						date('h:i:s a m/d/Y', strtotime($date));
						$common_time.=date('h:i:s a', strtotime($start)).' - '.date('h:i:s a', strtotime($end)).' | ';
						$start = $free_common_time[$i+1]['START_TIME'];
					}
				}
				if($i+1 == sizeof($free_common_time))
				{
					$end = $free_common_time[$i]['END_TIME'];
					$common_time.=date('h:i:s a', strtotime($start)).' - '.date('h:i:s a', strtotime($end)).' | ';
				}
			}

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
				'free' => $common_time,
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
					'defense_date' => $date,
					'start_time' => $start,
					'end_time' => $end,
					'venue' => ' ',
					'status' => 0,
					'is_featured' => 0
				);

				$this->coordinator_model->insert_thesis_defense_date($data);


			}
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

		public function upload_form($course_code)
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];
			
			$config['upload_path']          = './forms/';
            $config['allowed_types']        = 'pdf|docx';
            $config['max_size']             = 2000;
            $config['max_width']            = 4096;
            $config['max_height']           = 2048;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                $error = array('error' => $this->upload->display_errors());
                //$this->load->view('upload_form', $error);
            }
            else
            {
	            $data = array('upload_data' => $this->upload->data());
	            $rest = $this->upload->data();
	            //$this->load->view('upload_success', $data);
	            $this->coordinator_model->insert_form($rest['file_name'], $course_code);
	            redirect('coordinator/view_form');

            }
		}

		public function delete_form($form_id)
		{
			$this->coordinator_model->delete_form($form_id);
			redirect('coordinator/view_form');
		}

	}
?>