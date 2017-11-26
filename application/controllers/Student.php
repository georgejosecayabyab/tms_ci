<?php if(!defined('BASEPATH')) exit('Direct access not allowed');
	
	class student extends CI_Controller
	{

		public function __construct()
		{
			parent::__construct();

			$this->load->database();
			$this->load->model('student_model');

			$this->load->helper('download');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->library('email');

			$session = $this->session->userdata();
			$user_id = $session['user_id'];
			$user_type = $session['user_type'];
			if($user_type != 0) exit('Access not allowed');

		}

		/////view 
		public function index()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];
			
			$data['student_data'] = $this->student_model->get_user_information($user_id);
			$data['group_id'] = $this->student_model->get_group($user_id);
			$data['defense'] = $this->student_model->get_defense_date($user_id);
			$data['meeting'] = $this->student_model->get_meetings($user_id);
			$data['announcement'] = $this->student_model->get_thesis_related_event($user_id);
			$data['active_tab'] = array(
				'home' => "active",
				'group' => "",
				'group_schedule' => "",
				'form' => "",
				'archive' => "" 
			);
			
			$this->load->view('student/student_base_head', $data);
			$this->load->view('student/student_home_view', $data);
			$this->load->view('student/student_base_foot', $data);
		}

		public function view_forms()//get course or course id
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$data['student_data'] = $this->student_model->get_user_information($user_id);
			$data['group_id'] = $this->student_model->get_group($user_id);
			$data['form'] = $this->student_model->get_course_forms($user_id);
			$data['course'] = $this->student_model->get_course($user_id);
			$data['active_tab'] = array(
				'home' => "",
				'group' => "",
				'group_schedule' => "",
				'form' => "active",
				'archive' => "" 
			);

			$this->load->view('student/student_base_head', $data);
			$this->load->view('student/student_form_view', $data);
			$this->load->view('student/student_base_foot', $data);
		}

		public function view_archive()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$data['student_data'] = $this->student_model->get_user_information($user_id);
			$data['group_id'] = $this->student_model->get_group($user_id);
			$data['thesis'] = $this->student_model->archive_thesis();
			$data['member'] = $this->student_model->archive_members();
			$data['panel'] = $this->student_model->archive_panels();
			$data['specialization'] = $this->student_model->archive_specialization();
			$data['active_tab'] = array(
				'home' => "",
				'group' => "",
				'group_schedule' => "",
				'form' => "",
				'archive' => "active" 
			);

			$this->load->view('student/student_base_head', $data);
			$this->load->view('student/student_archive_view', $data);
			$this->load->view('student/student_base_foot', $data);
		}

		public function view_archive_specific($thesis_id)
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$data['student_data'] = $this->student_model->get_user_information($user_id);
			$data['group_id'] = $this->student_model->get_group($user_id);
			$data['thesis'] = $this->student_model->get_thesis($thesis_id);
			$data['member'] = $this->student_model->archive_members();
			$data['panel'] = $this->student_model->archive_panels();
			$data['specialization'] = $this->student_model->archive_specialization();
			$data['active_tab'] = array(
				'home' => "",
				'group' => "",
				'group_schedule' => "",
				'form' => "",
				'archive' => "active" 
			);

			$this->load->view('student/student_base_head', $data);
			$this->load->view('student/student_archive_specific_view', $data);
			$this->load->view('student/student_base_foot', $data);
		}

		//view_group if with group; if with no group, view_no_group
		public function view_group($group_id=NULL)
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			if($group_id != NULL)
			{
				$data['student_data'] = $this->student_model->get_user_information($user_id);
				$data['group_id'] = $this->student_model->get_group($user_id);
				$data['group'] = $this->student_model->get_group_details($group_id);
				$data['defense'] = $this->student_model->get_defense($group_id);
				$data['tag'] = $this->student_model->get_thesis_specialization($group_id);
				$data['member'] = $this->student_model->get_thesis_group_members($group_id);
				$data['discussion'] = $this->student_model->get_discussion_specific($group_id);
				$data['submit'] = $this->student_model->latest_uploaded($group_id);
				$data['comment'] = $this->student_model->get_thesis_comment($group_id);
				$data['reply'] = $this->student_model->get_discussion_reply_count();
				$data['tags'] = $this->student_model->get_all_tags($group_id);
				$data['uploads'] = $this->student_model->get_uploads_revision($group_id);
				$data['active_tab'] = array(
					'home' => "",
					'group' => "active",
					'group_schedule' => "",
					'form' => "",
					'archive' => "" 
				);

				$this->load->view('student/student_base_head', $data);
				$this->load->view('student/student_group_view', $data);
				$this->load->view('student/student_base_foot', $data);
			}
			else
			{
				$data['student_data'] = $this->student_model->get_user_information($user_id);
				$data['group_id'] = $this->student_model->get_group($user_id);
				$data['active_tab'] = array(
					'home' => "",
					'group' => "active",
					'group_schedule' => "",
					'form' => "",
					'archive' => "" 
				);

				$this->load->view('student/student_base_head', $data);
				$this->load->view('student/student_no_group_view', $data);
				$this->load->view('student/student_base_foot', $data);
			}

			// $this->load->view('student/sample');
			//$this->load->view('student/student_group_whole_version_view', $data);
		}

		public function view_panel_document($group_id, $upload_id)
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			// $data['student_data'] = $this->student_model->get_user_information($user_id);
			// $data['faculty_notification'] =$this->faculty_model->get_new_faculty_notification($user_id);
			// $data['comment'] = $this->faculty_model->get_thesis_comment($group_id);
			// $data['submit'] = $this->faculty_model->latest_uploaded($group_id);
			// $data['group'] = $this->faculty_model->get_group_details($group_id);
			// $data['upload'] = $this->faculty_model->get_upload_thesis_revision($upload_id);
			// $data['group_id'] = $this->student_model->get_group($user_id);
			// $data['active_tab'] = array(
			// 	'home' => "",
			// 	'group' => "",
			// 	'group_schedule' => "active",
			// 	'form' => "",
			// 	'archive' => "" 
			// );

		}

		public function view_schedule()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];
			
			$data['student_data'] = $this->student_model->get_user_information($user_id);
			$data['sched'] = $this->student_model->get_sched($user_id);
			$data['group_id'] = $this->student_model->get_group($user_id);
			$data['active_tab'] = array(
				'home' => "",
				'group' => "",
				'group_schedule' => "active",
				'form' => "",
				'archive' => "" 
			);


			$this->load->view('student/student_base_head', $data);
			if(sizeof($data['sched'])>0)
			{
				$this->load->view('student/student_with_schedule_view', $data);
			}
			else
			{
				$this->load->view('student/student_schedule_view', $data);
			}
			
			$this->load->view('student/student_base_foot', $data); 
			//$this->load->view('faculty/sample', $data);
		}

		public function view_edit_schedule()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];
			
			$data['student_data'] = $this->student_model->get_user_information($user_id);
			$data['sched'] = $this->student_model->get_sched($user_id);
			$data['group_id'] = $this->student_model->get_group($user_id);
			$data['active_tab'] = array(
				'home' => "",
				'group' => "",
				'group_schedule' => "active",
				'form' => "",
				'archive' => "" 
			);


			$this->load->view('student/student_base_head', $data);
			$this->load->view('student/student_schedule_view', $data);
			$this->load->view('student/student_base_foot', $data); 
			//$this->load->view('faculty/sample', $data);
		}

		public function view_new_discussion()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];
			
			$data['student_data'] = $this->student_model->get_user_information($user_id);
			$data['group_id'] = $this->student_model->get_group($user_id);
			$data['active_tab'] = array(
				'home' => "",
				'group' => "active",
				'group_schedule' => "",
				'form' => "",
				'archive' => "" 
			);


			$this->load->view('student/student_base_head', $data);
			$this->load->view('student/student_new_discussion_view', $data);
			$this->load->view('student/student_base_foot', $data); 
		}

		public function view_discussion_specific($topic_id)
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$data['student_data'] = $this->student_model->get_user_information($user_id);
			$data['group_id'] = $this->student_model->get_group($user_id);
			$data['faculty_notification'] =$this->student_model->get_new_student_notification($user_id);
			$data['topic_data'] = $this->student_model->get_topic($topic_id); 
			$data['discuss'] = $this->student_model->get_topic_discussion($topic_id);
			$data['active_tab'] = array(
				'home' => "",
				'group' => "active",
				'group_schedule' => "",
				'form' => "",
				'archive' => "" 
			);


			$this->load->view('student/student_base_head', $data);
			$this->load->view('student/student_discussion_specific_view', $data);
			$this->load->view('student/student_base_foot', $data);  
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

		public function validate_thesis_uploads()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];
			$group = $this->student_model->get_group($user_id);

			$files = array();
            if($_FILES['thesis_file']['name'] != '')
            {
            	$files[] = $_FILES['thesis_file']['name'];
            }
            if($_FILES['revision_file']['name'] != '')
            {
            	$files[] = $_FILES['revision_file']['name'];
            }

            if(sizeof($files)==2)
            {
            	//$d1 = $this->upload->do_upload('thesis_file');
            	//$d2 = $this->upload->do_upload('revision_file');
            	if($_FILES['thesis_file']['type'] != 'application/pdf' || $_FILES['revision_file']['type'] != 'application/pdf')////|| ! $this->upload->do_upload('revision_file') ! $this->upload->do_upload('thesis_file') 
            	{
            		$error = array('error' => $this->upload->display_errors());
            		$this->session->set_flashdata('fail', "PDFs only");
            		redirect('student/view_group/'.$group['group_id']);
            		
            	}
            	else
            	{
            		// $thesis = $this->upload->do_upload('thesis_file');
            		// $revision = $this->upload->do_upload('revision_file');
					$this->upload_file('thesis_file', 'revision_file');
					// $this->upload_file('revision_file');
					

		            $this->session->set_flashdata('success', 'Documents have been uploaded!');
					redirect('student/view_group/'.$group['group_id']);
            	}
				
			
            }
            else
            {
            	$this->session->set_flashdata('fail', 'Uploading requires revised document and associated revisions list');
            	redirect('student/view_group/'.$group['group_id']);
            }
		}

		////upload
		////uploading thesis and revisions list
		public function upload_file($file_name, $revision)
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];
			$group = $this->student_model->get_group($user_id);
			
			$config['upload_path']          = './uploaded_thesis/';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 2000;
            $config['max_width']            = 4096;
            $config['max_height']           = 2048;


            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload($file_name))
            {
                $this->session->set_flashdata('fail', $error['error']);
	            
            }
            else
            {
	            $data = array('upload_data' => $this->upload->data());
	            $rest = $this->upload->data();
	            date_default_timezone_set('Asia/Manila');
				$date_time = date("Y-m-d H:i:s");
				$thesis_content = array(
					'upload_date_time' => $date_time,
					'upload_name' => $rest['file_name'],
					'group_id' => $group['group_id']
				);
	            $this->student_model->insert_upload($thesis_content);
	            $this->upload_revision($revision, $rest['file_name'], $date_time, $group['group_id']);
	            $this->session->set_flashdata('success', 'Document has been uploaded!');
            }
		}

		public function upload_revision($file_name, $upload_name, $date_time, $group_id)
		{	
			$config['upload_path']          = './uploaded_revision/';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 2000;
            $config['max_width']            = 4096;
            $config['max_height']           = 2048;


            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload($file_name))
            {
                $error = array('error' => $this->upload->display_errors());
                //$this->load->view('upload_form', $error);
                $this->session->set_flashdata('fail', $error['error']);
            }
            else
            {
	            $data = array('upload_data' => $this->upload->data());
	            $rest = $this->upload->data();
	            $this->student_model->insert_revision($rest['file_name'], $upload_name, $date_time, $group_id);
	            $this->session->set_flashdata('success', 'Documents have been uploaded!');
            }
		}

		
		/////get
		public function get_all_notifications()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			
			$result = $this->student_model->get_all_student_notification($user_id);
			header("Content-type: application/json");
			echo json_encode($result);

		}

		public function get_new_notifications()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			
			$result = $this->student_model->get_new_student_notification($user_id);
			header('Content-Type: application/json');
			echo json_encode($result);

		}

		public function get_schedule()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$result = $this->student_model->get_schedule($user_id);
			$monday = $this->student_model->get_schedule_by_day($user_id, 'MO');
			$tuesday = $this->student_model->get_schedule_by_day($user_id, 'TU');
			$wednesday = $this->student_model->get_schedule_by_day($user_id, 'WE');
			$thursday = $this->student_model->get_schedule_by_day($user_id, 'TH');
			$friday = $this->student_model->get_schedule_by_day($user_id, 'FR');
			$saturday = $this->student_model->get_schedule_by_day($user_id, 'SA');


			$mo_common_time = "";
			$start = $monday[0]['START_TIME'];
			$end = '';
			for($i=0; $i<sizeof($monday);$i++)
			{	
				if($i+1 < sizeof($monday))
				{
					if($monday[$i+1]['TIME_ID'] - $monday[$i]['TIME_ID'] != 1)
					{
						$end = $monday[$i]['END_TIME'];
						$mo_common_time.=date('h:i a', strtotime($start)).' - '.date('h:i a', strtotime($end)).' | ';
						$start = $monday[$i+1]['START_TIME'];
					}
				}
				if($i+1 == sizeof($monday))
				{
					$end = $monday[$i]['END_TIME'];
					$mo_common_time.=date('h:i a', strtotime($start)).' - '.date('h:i a', strtotime($end)).' | ';
				}
			}

			echo $mo_common_time;
		}


		////////update
		public function update_notification()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];
			$result = $this->student_model->get_new_student_notification($user_id);

			if(sizeof($result)>0)
			{
				foreach($result as $row)
				{
					$this->student_model->update_notification($row['notification_id']);
				}
			}
		}

		/////validate
		public function validate_discussion()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$topic_name = $this->input->post("discussion_title");
			$discussion = $this->input->post("editor1");
			$result = $this->student_model->get_user_information($user_id);
			$group_id = $this->student_model->get_group($user_id);
			date_default_timezone_set('Asia/Manila');
			$date_time = date("Y-m-d H:i:s");


			$this->form_validation->set_rules('discussion_title', 'Title', 'required|trim');
			$this->form_validation->set_rules('editor1', 'Information', 'required|trim');
			if($this->form_validation->run() == FALSE)
			{
				redirect('student/view_new_discussion/');
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
				$this->student_model->insert_new_discussion($data);
				///
				$result = $this->student_model->get_all_discussion_target($group_id['group_id'], $user_id);
				foreach($result as $row)
				{
					$this->insert_notification("New Discussion: ".$topic_name, $row['user_id']);
					// $this->email->from('george_cayabyab@dlsu.edu.ph', $faculty_data['FIRST_NAME'].' '.$faculty_data['LAST_NAME']);
					// $this->email->to('george_cayabyab@dlsu.edu.ph');

					// $this->email->subject('CT Thesis');
					// $this->email->message("New Reply in discussion: ".$topic_name);

					// $this->email->send();
				}
              	redirect('student/view_group/'.$group_id['group_id']);
			}
		}

		public function validate_reply()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$student_data = $this->student_model->get_user_information($user_id);
			$topic_id = $this->input->post("topic_id");
			$topic_name = $this->input->post("topic_name");
			$reply = $this->input->post("reply");
			$group_id = $this->input->post("group_id");
			date_default_timezone_set('Asia/Manila');
			$date_time = date("Y-m-d H:i:s");

			$this->form_validation->set_rules('reply', 'Reply', 'required|trim');

			if($this->form_validation->run() == FALSE)
			{
				redirect('student/view_discussion_specific/'.$topic_id);
			}
			else
			{
				if($this->input->post('submit_reply') == "Submit")
				{
					$panel_group_id = $this->student_model->get_panel_group_id($user_id, $group_id);
					$data = array(
						'topic_discussion_id' =>  $topic_id,
						'user_id' => $user_id,
						'discuss' => $reply,
						'date_time' => $date_time
					);
					$this->student_model->insert_discussion_reply($data);
					$result = $this->student_model->get_all_discussion_target($group_id, $user_id);
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
                  	redirect('student/view_discussion_specific/'.$topic_id);
				}
			}
		}


		public function validate_abstract()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$thesis_id = $this->input->post("thesis_id");
			$group_id = $this->input->post("group_id");
			$abstract_text = $this->input->post("abstract_text");

			$this->form_validation->set_rules('abstract_text', 'Abstract', 'required|trim');

			if($this->form_validation->run() == FALSE)
			{
				redirect('student/view_group/'.$group_id);
			}
			else
			{
				$data = array(
					'abstract' => $abstract_text
				);
				$this->student_model->update_abstract($data, $thesis_id);
				redirect('student/view_group/'.$group_id);
			}
		}

		/////insert
		public function insert_event($discussion, $course_id)
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$group_id = $this->input->post("group_id");
			$data = array(
						'event_desc' =>  $discussion,
						'course_id' => $course_id
					);
			$this->student_model->insert_event($data);
		}

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
			$this->student_model->insert_notification($data);
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

		/////schedule
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
				$this->student_model->insert_schedule($user_id, $retime, $day);
			}

			header("Content-type: application/json");
			echo json_encode($sched_per_day);
		}

		public function delete_schedule()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$this->student_model->delete_schedule($user_id);
		}

		public function add_tags()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$group_id = $this->student_model->get_group($user_id);
			$thesis_id = $this->student_model->get_thesis_id($group_id['group_id']);
			$tags = $this->input->post("tags");
			$ar = array();
			for($x = 0; $x<sizeof($tags); $x++)
			{
				$ar[]= $tags[$x];
			}
			// $this->load->view('student/student_base_head', $data);
			// $this->load->view('student/student_home_view', $data);
			// $this->load->view('student/student_base_foot', $data);

			$this->student_model->delete_thesis_tags($thesis_id['thesis_id']);

			for($x = 0; $x<sizeof($ar); $x++)
			{
				$this->student_model->insert_thesis_tag($thesis_id['thesis_id'], $ar[$x]);
			}

			header('Content-Type: application/json');
			echo json_encode($ar);
		}

		public function validate_meeting()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$data['student_data'] = $this->student_model->get_user_information($user_id);
			$group_id = $this->student_model->get_group($user_id);
			$date = $this->input->post('datepicker');
			$venue = $this->input->post('venue');

			$new_date = date('Y-m-d H:i:s', strtotime($date));


			$this->form_validation->set_rules('venue', 'Venue', 'required|trim');

			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('fail', validation_errors());
				redirect('student/view_group/'.$group_id['group_id']);
			}
			else
			{
				$data = array(
					'date' => $new_date,
					'group_id' => $group_id['group_id'],
					'created_by' => $user_id,
					'venue' => $venue
				);

				$this->student_model->insert_meeting($data);
				$this->session->set_flashdata('success', 'Meeting has been created!');
				redirect('student/view_group/'.$group_id['group_id']);
			}
		}


	}

?>