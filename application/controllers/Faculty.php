<?php 
	if(!defined('BASEPATH')) exit('Direct access not allowed');
	

	class faculty extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->model('faculty_model');
			
			$this->load->helper('download');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->library('email');
			//check if session exist

			$session = $this->session->userdata();
			$user_id = $session['user_id'];
			$user_type = $session['user_type'];
			if($user_type != 1) exit('Access not allowed');
		}

		//////views
		public function index()
		{	
			$session = $this->session->userdata();
			$user_id = $session['user_id'];
			$user_type = $session['user_type'];
			$data['faculty_data'] = $this->faculty_model->get_faculty_detail($user_id);
			$data['notif_as_panel'] = $this->faculty_model->get_notifications_as_panel($user_id);
			$data['notif_as_adviser'] = $this->faculty_model->get_notifications_as_advisee($user_id);
			$data['faculty_notification'] =$this->faculty_model->get_new_faculty_notification($user_id);
			$data['defense'] = $this->faculty_model->get_defense_list($user_id);
			$data['active_tab'] = array(
				'home' => "active",
				'schedule' => "",
				'advisees' => "",
				'panels' => "",
				'archive' => "" 
			);
			$this->load->view('faculty/faculty_base_head', $data);
			$this->load->view('faculty/faculty_home_view', $data);
			$this->load->view('faculty/faculty_base_foot', $data);
		}

		public function view_advisee_list()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$data['faculty_data'] = $this->faculty_model->get_faculty_detail($user_id);
			$data['faculty_notification'] =$this->faculty_model->get_new_faculty_notification($user_id);
			$data['advisee'] = $this->faculty_model->get_active_advisee_thesis_groups($user_id);
			$data['member'] = $this->faculty_model->get_advisee_thesis_group_members($user_id);
			$data['notification'] = $this->faculty_model->get_notification_count_under_advisee($user_id);
			$data['discussion'] = $this->faculty_model->get_discussion();
			$data['active_tab'] = array(
				'home' => "",
				'schedule' => "",
				'advisees' => "active",
				'panels' => "",
				'archive' => "" 
			);

			$this->load->view('faculty/faculty_base_head', $data);
			$this->load->view('faculty/faculty_advisee_view', $data);
			$this->load->view('faculty/faculty_base_foot', $data);
		}

		public function view_advisee_specific($group_id)
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$data['faculty_data'] = $this->faculty_model->get_faculty_detail($user_id);
			$data['faculty_notification'] =$this->faculty_model->get_new_faculty_notification($user_id);
			$data['group'] = $this->faculty_model->get_group_details($group_id);
			$data['defense'] = $this->faculty_model->get_defense($group_id);
			$data['tag'] = $this->faculty_model->get_thesis_specialization($group_id);
			$data['member'] = $this->faculty_model->get_advisee_thesis_group_members($user_id);
			$data['discussion'] = $this->faculty_model->get_discussion_specific($group_id);
			$data['reply'] = $this->faculty_model->get_discussion_reply_count();
			$data['submit'] = $this->faculty_model->latest_uploaded($group_id);
			$data['comment'] = $this->faculty_model->get_thesis_comment($group_id);
			$data['active_tab'] = array(
				'home' => "",
				'schedule' => "",
				'advisees' => "active",
				'panels' => "",
				'archive' => "" 
			);

			$this->load->view('faculty/faculty_base_head', $data);
			$this->load->view('faculty/faculty_advisee_specific_view', $data);
			$this->load->view('faculty/faculty_base_foot', $data);

		}

		public function view_profile()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$data['faculty_data'] = $this->faculty_model->get_faculty_detail($user_id);
			$data['faculty_tag'] = $this->faculty_model->get_faculty_specialization($user_id);
			$data['all_tag'] = $this->faculty_model->get_all_specialization($user_id);
			$data['active_tab'] = array(
				'home' => "",
				'schedule' => "",
				'advisees' => "",
				'panels' => "",
				'archive' => "" 
			);

			$this->load->view('faculty/faculty_base_head', $data);
			$this->load->view('faculty/faculty_profile_view', $data);
			$this->load->view('faculty/faculty_base_foot', $data);

		}


		public function view_discussion_specific($topic_id)
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$data['faculty_data'] = $this->faculty_model->get_faculty_detail($user_id);
			$data['faculty_notification'] =$this->faculty_model->get_new_faculty_notification($user_id);
			$data['topic_data'] = $this->faculty_model->get_topic($topic_id); 
			$data['discuss'] = $this->faculty_model->get_topic_discussion($topic_id);
			$data['active_tab'] = array(
				'home' => "",
				'schedule' => "",
				'advisees' => "active",
				'panels' => "",
				'archive' => "" 
			);


			$this->load->view('faculty/faculty_base_head', $data);
			$this->load->view('faculty/faculty_discussion_specific_view', $data);
			$this->load->view('faculty/faculty_base_foot', $data); 
		}

		public function view_panel_details()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$data['faculty_data'] = $this->faculty_model->get_faculty_detail($user_id);
			$data['faculty_notification'] =$this->faculty_model->get_new_faculty_notification($user_id);
			$data['panel_details'] = $this->faculty_model->get_panel_details($user_id);
			$data['member'] = $this->faculty_model->get_panel_thesis_group_members($user_id);
			$data['tags'] = $this->faculty_model->get_panel_thesis_group_tags($user_id);
			$data['comment'] = $this->faculty_model->get_thesis_comment_count();
			$data['active_tab'] = array(
				'home' => "",
				'schedule' => "",
				'advisees' => "",
				'panels' => "active",
				'archive' => "" 
			);

			$this->load->view('faculty/faculty_base_head', $data);
			$this->load->view('faculty/faculty_panel_view', $data);
			$this->load->view('faculty/faculty_base_foot', $data); 


		}

		public function view_panel_specific($group_id)
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$data['faculty_data'] = $this->faculty_model->get_faculty_detail($user_id);
			$data['faculty_notification'] =$this->faculty_model->get_new_faculty_notification($user_id);
			$data['comment'] = $this->faculty_model->get_thesis_comment($group_id);
			$data['submit'] = $this->faculty_model->latest_uploaded($group_id);
			//$data['thesis'] = details about thesis document, paths and file
			$data['group'] = $this->faculty_model->get_group_details($group_id);
			$data['upload'] = $this->faculty_model->get_uploads_revision($group_id);
			$data['active_tab'] = array(
				'home' => "",
				'schedule' => "",
				'advisees' => "",
				'panels' => "active",
				'archive' => "" 
			);

			$this->load->view('faculty/faculty_base_head', $data);
			$this->load->view('faculty/faculty_panel_specific_view', $data);
			$this->load->view('faculty/faculty_base_foot', $data); 

		}

		public function view_panel_document($group_id, $upload_id)
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$data['faculty_data'] = $this->faculty_model->get_faculty_detail($user_id);
			$data['faculty_notification'] =$this->faculty_model->get_new_faculty_notification($user_id);
			$data['comment'] = $this->faculty_model->get_thesis_comment($group_id);
			$data['submit'] = $this->faculty_model->latest_uploaded($group_id);
			$data['group'] = $this->faculty_model->get_group_details($group_id);
			$data['upload'] = $this->faculty_model->get_upload_thesis_revision($upload_id);
			$data['active_tab'] = array(
				'home' => "",
				'schedule' => "",
				'advisees' => "",
				'panels' => "active",
				'archive' => "" 
			);

			$this->load->view('faculty/faculty_base_head', $data);
			$this->load->view('faculty/faculty_panel_document_view', $data);
			$this->load->view('faculty/faculty_base_foot', $data); 

		}

		public function view_archive()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$data['faculty_data'] = $this->faculty_model->get_faculty_detail($user_id);
			$data['faculty_notification'] =$this->faculty_model->get_new_faculty_notification($user_id);
			$data['thesis'] = $this->faculty_model->archive_thesis();
			$data['member'] = $this->faculty_model->archive_members();
			$data['panel'] = $this->faculty_model->archive_panels();
			$data['specialization'] = $this->faculty_model->archive_specialization();
			$data['active_tab'] = array(
				'home' => "",
				'schedule' => "",
				'advisees' => "",
				'panels' => "",
				'archive' => "active" 
			);


			$this->load->view('faculty/faculty_base_head', $data);
			$this->load->view('faculty/faculty_archive_view', $data);
			$this->load->view('faculty/faculty_base_foot', $data); 
		}

		public function view_archive_specific($thesis_id)
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];
			
			$data['faculty_data'] = $this->faculty_model->get_faculty_detail($user_id);
			$data['faculty_notification'] =$this->faculty_model->get_new_faculty_notification($user_id);
			$data['thesis'] = $this->faculty_model->get_thesis_by_thesis_id($thesis_id);
			$data['member'] = $this->faculty_model->archive_members();
			$data['panel'] = $this->faculty_model->archive_panels();
			$data['specialization'] = $this->faculty_model->archive_specialization();
			$data['active_tab'] = array(
				'home' => "",
				'schedule' => "",
				'advisees' => "",
				'panels' => "",
				'archive' => "active" 
			);


			$this->load->view('faculty/faculty_base_head', $data);
			$this->load->view('faculty/faculty_archive_specific_view', $data);
			$this->load->view('faculty/faculty_base_foot', $data); 
		
		}

		public function view_schedule()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$data['faculty_data'] = $this->faculty_model->get_faculty_detail($user_id);
			$data['sched'] = $this->faculty_model->get_sched($user_id);
			$data['faculty_notification'] =$this->faculty_model->get_new_faculty_notification($user_id);
			$data['active_tab'] = array(
				'home' => "",
				'schedule' => "active",
				'advisees' => "",
				'panels' => "",
				'archive' => "" 
			);


			$this->load->view('faculty/faculty_base_head', $data);
			if(sizeof($data['sched'])> 0)
			{
				$this->load->view('faculty/faculty_with_schedule_view', $data);
			}
			else
			{
				$this->load->view('faculty/faculty_schedule_view', $data);
			}
			$this->load->view('faculty/faculty_base_foot', $data); 
			//$this->load->view('faculty/sample', $data);
		}

		public function view_edit_schedule()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$data['faculty_data'] = $this->faculty_model->get_faculty_detail($user_id);
			$data['sched'] = $this->faculty_model->get_sched($user_id);
			$data['faculty_notification'] =$this->faculty_model->get_new_faculty_notification($user_id);
			$data['active_tab'] = array(
				'home' => "",
				'schedule' => "active",
				'advisees' => "",
				'panels' => "",
				'archive' => "" 
			);


			$this->load->view('faculty/faculty_base_head', $data);
			$this->load->view('faculty/faculty_schedule_view', $data);
			$this->load->view('faculty/faculty_base_foot', $data); 
			//$this->load->view('faculty/sample', $data);
		}


		public function view_new_discussion($group_id)
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];
			
			$data['faculty_data'] = $this->faculty_model->get_faculty_detail($user_id);
			$data['group'] = $this->faculty_model->get_group_details($group_id);
			$data['active_tab'] = array(
				'home' => "",
				'schedule' => "",
				'advisees' => "active",
				'panels' => "",
				'archive' => "" 
			);


			$this->load->view('faculty/faculty_base_head', $data);
			$this->load->view('faculty/faculty_new_discussion_view', $data);
			$this->load->view('faculty/faculty_base_foot', $data); 
		}

		//////edit
		public function edit_profile()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$data['faculty_data'] = $this->faculty_model->get_faculty_detail($user_id);
			$data['faculty_tag'] = $this->faculty_model->get_faculty_specialization($user_id);
			$data['all_tag'] = $this->faculty_model->get_all_specialization($user_id);
			$data['all_rank'] = $this->faculty_model->get_all_rank($user_id);
			$data['active_tab'] = array(
				'home' => "",
				'schedule' => "",
				'advisees' => "",
				'panels' => "",
				'archive' => "" 
			);

			$this->load->view('faculty/faculty_base_head', $data);
			$this->load->view('faculty/faculty_edit_profile_view', $data);
			$this->load->view('faculty/faculty_base_foot', $data);
		}



		//////validate
		public function validate_comment() 
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$comment = $this->input->post("comment");
			$group_id = $this->input->post("group_id");
			$thesis_title = $this->input->post("thesis_title");
			date_default_timezone_set('Asia/Manila');
			$date_time = date("Y-m-d H:i:s");

			$this->form_validation->set_rules('comment', 'Comment', 'required|trim');

			if($this->form_validation->run() == FALSE)
			{
				redirect('faculty/view_panel_specific/'.$group_id);
			}
			else
			{
				if($this->input->post('submit_comment') == "Submit")
				{
					$panel_group_id = $this->faculty_model->get_panel_group_id($user_id, $group_id);
					$data = array(
						'thesis_comment' =>  $comment,
						'panel_group_id' => $panel_group_id['panel_group_id'],
						'date_time' => $date_time
					);
					$this->faculty_model->insert_thesis_comment($data);
					$result = $this->faculty_model->get_all_thesis_comment_notification_target($group_id, $user_id);
					foreach($result as $row)
					{
						$this->insert_notification("New Comment from ".$thesis_title, $row['user_id']);
						// $this->email->from('george_cayabyab@dlsu.edu.ph', $faculty_data['FIRST_NAME'].' '.$faculty_data['LAST_NAME']);
						// $this->email->to('george_cayabyab@dlsu.edu.ph');

						// $this->email->subject('CT Thesis');
						// $this->email->message("New Reply in discussion: ".$thesis_title);

						// $this->email->send();
					}
					$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Successful comment</div>');
                  	redirect('faculty/view_panel_specific/'.$group_id);
				}
			}

		}

		public function validate_reply()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$faculty_data = $this->faculty_model->get_faculty_detail($user_id);
			$topic_id = $this->input->post("topic_id");
			$topic_name = $this->input->post("topic_name");
			$reply = $this->input->post("reply");
			$group_id = $this->input->post("group_id");
			date_default_timezone_set('Asia/Manila');
			$date_time = date("Y-m-d H:i:s");

			$this->form_validation->set_rules('reply', 'Reply', 'required|trim');

			if($this->form_validation->run() == FALSE)
			{
				redirect('faculty/view_discussion_specific/'.$topic_id);
			}
			else
			{
				if($this->input->post('submit_reply') == "Submit")
				{
					$panel_group_id = $this->faculty_model->get_panel_group_id($user_id, $group_id);
					$data = array(
						'topic_discussion_id' =>  $topic_id,
						'user_id' => $user_id,
						'discuss' => $reply,
						'date_time' => $date_time
					);
					$this->faculty_model->insert_discussion_reply($data);
					$result = $this->faculty_model->get_all_discussion_target($group_id, $user_id);
					foreach($result as $row)
					{
						$this->insert_notification("New Reply in discussion: ".$topic_name, $row['user_id']);
						// $this->email->from('george_cayabyab@dlsu.edu.ph', $faculty_data['FIRST_NAME'].' '.$faculty_data['LAST_NAME']);
						// $this->email->to('george_cayabyab@dlsu.edu.ph');

						// $this->email->subject('CT Thesis');
						// $this->email->message("New Reply in discussion: ".$topic_name);

						// $this->email->send();
					}
					$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Successful comment</div>');
                  	redirect('faculty/view_discussion_specific/'.$topic_id);
				}
			}

		}

		public function validate_discussion()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$topic_name = $this->input->post("discussion_title");
			$discussion = $this->input->post("editor1");
			$result = $this->faculty_model->get_faculty_detail($user_id);
			$group_id = $this->input->post("group_id");
			date_default_timezone_set('Asia/Manila');
			$date_time = date("Y-m-d H:i:s");


			$this->form_validation->set_rules('discussion_title', 'Title', 'required|trim');
			$this->form_validation->set_rules('editor1', 'Information', 'required|trim');
			if($this->form_validation->run() == FALSE)
			{
				redirect('faculty/view_new_discussion/'.$group_id);
			}
			else
			{
				$data =	array(
						'topic_name' =>  $topic_name,
						'topic_info' => $discussion,
						'created_by' => $user_id,
						'group_id'	=> $group_id['group_id'],
						'date_time' => $date_time
					);
				$this->faculty_model->insert_new_discussion($data);
				////
				$result = $this->faculty_model->get_all_discussion_target($group_id, $user_id);
				foreach($result as $row)
				{
					$this->insert_notification("New Discussion: ".$topic_name, $row['user_id']);
					// $this->email->from('george_cayabyab@dlsu.edu.ph', $faculty_data['FIRST_NAME'].' '.$faculty_data['LAST_NAME']);
					// $this->email->to('george_cayabyab@dlsu.edu.ph');

					// $this->email->subject('CT Thesis');
					// $this->email->message("New Reply in discussion: ".$topic_name);

					// $this->email->send();
				}
              	redirect('faculty/view_advisee_specific/'.$group_id);
			}
		}

		////get
		public function get_all_notifications()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			
			$result = $this->faculty_model->get_all_faculty_notification($user_id);
			header("Content-type: application/json");
			echo json_encode($result);

		}

		public function get_new_notifications()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			
			$result = $this->faculty_model->get_new_faculty_notification($user_id);
			header('Content-Type: application/json');
			echo json_encode($result);

		}

		public function get_discussion_reply($id)
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			
			$result = $this->faculty_model->get_discussion_reply($id);
			header('Content-Type: application/json');
			echo json_encode($result);
		}

		//////insert 

		public function insert_notification($notification, $target_user_id)
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$group_id = $this->input->post("group_id");
			date_default_timezone_set('Asia/Manila');
			$date_time = date("Y-m-d H:i:s");
			$data = array(
						'notification_details' =>  $notification,
						'created_by' => $user_id,
						'target_user_id' => $target_user_id,
						'is_read' => 0,
						'date_created' => $date_time,
						'group_id' => $group_id
					);
			$this->faculty_model->insert_notification($data);
		}

		public function insert_faculty_specialization($specialization)
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];
			$this->faculty_model->insert_faculty_specialization($user_id, $specialization);
		}


		////// delete

		public function delete_comment($thesis_comment_id)
		{
			//$this->faculty_model->delete_thesis_comment($thesis_comment_id);
			$result = $this->faculty_model->get_thesis_group_by_thesis_comment_id($thesis_comment_id);
			$group_id = $result['group_id'];
			$this->faculty_model->delete_thesis_comment($thesis_comment_id);
			redirect('faculty/view_panel_specific/'.$group_id);
			
		}

		public function delete_reply($discussion_id)
		{
			//$this->faculty_model->delete_thesis_comment($thesis_comment_id);
			$topic_id = $this->faculty_model->get_topic_id_by_discussion_id($discussion_id);
			$this->faculty_model->delete_discussion_reply($discussion_id);
			redirect('faculty/view_discussion_specific/'.$$topic_id);
			
		}
		
		//////update
		public function update_notification()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];
			$result = $this->faculty_model->get_new_faculty_notification($user_id);

			if(sizeof($result)>0)
			{
				foreach($result as $row)
				{
					$this->faculty_model->update_notification($row['notification_id']);
				}
			}
		}

		public function update_faculty_specialization() ////not working
		{
			$value = $this->input->post('data'); 

			for($i=0; $i<sizeof($value); $i++)
			{
				$this->insert_faculty_specialization($value[$i]);
			}
		}


		public function update_reply($discussion_id)
		{
			$topic_id = $this->faculty_model->get_topic_id_by_discussion_id($discussion_id);
			$this->faculty_model->delete_discussion_reply($discussion_id);
			redirect('faculty/view_discussion_specific/'.$$topic_id);
			$value = $this->input->post('data'); 
			$this->faculty_model->update_discussion_reply($discussion_id, $data);
		}

		////download 
		public function download_file($file_name)
		{
			if($file_name)
			{
				$file = realpath("uploaded_thesis")."\\".$file_name;
				if(file_exists($file))
				{
					$data = file_get_contents($file);

					force_download($file_name, $data);
				}	
			}
		}

		//logout
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


		//////schedule
		public function insert_schedule()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$sched_per_day = array();
			$sched = $this->input->post("data");
			$day = $this->input->post("day");

			if($day == 0)
			{
				$day = 'MO';
			}
			elseif ($day == 1) {
				$day = 'TU';
			}
			elseif ($day == 2) {
				$day = 'WE';
			}
			elseif ($day == 3) {
				$day = 'TH';
			}
			elseif ($day == 4) {
				$day = 'FR';
			}
			elseif ($day == 5) {
				$day = 'SA';
			}

			for($b = 0; $b < sizeof($sched); $b++)
			{
				//return to js to check if it works
				$time = $sched[(string)$b];
				array_push($sched_per_day, $time);
				///inser to db
				$retime = date("G:i", strtotime((string)$time));
				$this->faculty_model->insert_schedule($user_id, $retime, $day);
			}
			header("Content-type: application/json");
			echo json_encode($sched_per_day);
		}

		public function delete_schedule()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$this->faculty_model->delete_schedule($user_id);
		}
		///sample
		public function try()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$agile = array();
			$sched = $this->input->post("data");
			$day = $this->input->post("day");
			if($day == 0)
			{
				$day = 'MO';
			}
			elseif ($day == 1) {
				$day = 'TU';
			}
			elseif ($day == 2) {
				$day = 'WE';
			}
			elseif ($day == 3) {
				$day = 'TH';
			}
			elseif ($day == 4) {
				$day = 'FR';
			}
			elseif ($day == 5) {
				$day = 'SA';
			}

			$x = 0;

			$k = (string)$x;
			$l = (string)1;

			$fl = sizeof($sched);
			$sank = $sched[$k][$l];
			$sank3 = $sched[(string)0];

			for($b = 0; $b < sizeof($sched); $b++)
			{
				$time = $sched[(string)$b];
				array_push($agile, $time);
				$rest = array(
					'start_time' => $sched[(string)$b],
					'end_time' => $sched[(string)$b]
				);
				$retime = date("G:i", strtotime((string)$time));
				//$this->faculty_model->insert_some($rest);
				$this->faculty_model->insert_sched($user_id, $retime, $day);
			}

			header("Content-type: application/json");
			echo json_encode($agile);


		}

		public function add_tags()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$faculty_tag = $this->faculty_model->get_faculty_specialization($user_id);
			$tags = $this->input->post("tags");
			$ar = array();
			for($x = 0; $x<sizeof($tags); $x++)
			{
				$ar[]= $tags[$x];
			}

			$this->faculty_model->delete_faculty_tags($user_id);
			for($x = 0; $x<sizeof($ar); $x++)
			{

				$this->faculty_model->insert_faculty_specialization($user_id, $ar[$x]);
			}
			$this->session->set_flashdata('success', 'Faculty specialization has been edited!');
			header('Content-Type: application/json');
			echo json_encode($ar);
		}

		public function validate_meeting()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$group_id = $this->input->post('group_id');
			$date = $this->input->post('datepicker');
			$venue = $this->input->post('venue');

			$new_date = date('Y-m-d H:i:s', strtotime($date));


			$this->form_validation->set_rules('venue', 'Venue', 'required|trim');

			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('fail', validation_errors());
				redirect('faculty/view_advisee_specific/'.$group_id);
			}
			else
			{
				$data = array(
					'date' => $new_date,
					'group_id' => $group_id,
					'created_by' => $user_id,
					'venue' => $venue
				);

				$this->faculty_model->insert_meeting($data);
				$this->session->set_flashdata('success', 'Meeting has been created!');
				redirect('faculty/view_advisee_specific/'.$group_id);
			}
		}

	}

?>