<?php 
	if(!defined('BASEPATH')) exit('Direct access not allowed');
	

	class faculty extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->model('faculty_model');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			//check if session exist

			$session = $this->session->userdata();
			$user_id = $session['user_id'];
			$user_type = $session['user_type'];
			if($user_type != 1) exit('Access not allowed');
		}

		//faculty/home
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

		//view advisees
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

		//view advisee specific group
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
			$data['reply'] = $this->faculty_model->get_discussion();
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
		//view profile
		public function view_profile()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];


		}

		//edit profile
		public function edit_profile()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];
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

		//panel general
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
			
			//$data['notification'] = $this->faculty_model->get_notifications
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
			//$data['thesis'] = details about thesis document, paths and file
			$data['group'] = $this->faculty_model->get_group_details($group_id);
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

		public function view_archive()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$data['faculty_data'] = $this->faculty_model->get_faculty_detail($user_id);
			$data['faculty_notification'] =$this->faculty_model->get_new_faculty_notification($user_id);
			// list of finished thesis papers
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

		public function validate_comment()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$comment = $this->input->post("comment");
			$group_id = $this->input->post("group_id");
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
					$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Successful comment</div>');
                  	redirect('faculty/view_panel_specific/'.$group_id);
				}
			}

		}

		public function delete_comment($thesis_comment_id)
		{
			//$this->faculty_model->delete_thesis_comment($thesis_comment_id);
			$result = $this->faculty_model->get_thesis_group_by_thesis_comment_id($thesis_comment_id);
			$group_id = $result['group_id'];
			$this->faculty_model->delete_thesis_comment($thesis_comment_id);
			redirect('faculty/view_panel_specific/'.$group_id);
			
		}

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
		
	}

?>