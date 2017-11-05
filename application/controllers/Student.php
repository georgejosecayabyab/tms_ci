<?php if(!defined('BASEPATH')) exit('Direct access not allowed');
	
	class student extends CI_Controller
	{

		public function __construct()
		{
			parent::__construct();

			$this->load->database();
			$this->load->model('student_model');

			$this->load->helper('download');

		}

		public function index()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];
			
			$data['student_data'] = $this->student_model->get_user_information($user_id);
			$data['group_id'] = $this->student_model->get_group($user_id);
			$data['defense'] = $this->student_model->get_defense_date($user_id);
			$data['meeting'] = $this->student_model->get_meetings($user_id);
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

		//view_group if with group; if with no group, view_no_group
		public function view_group($group_id=NULL)
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];
			if($group_id)
			{
				$data['student_data'] = $this->student_model->get_user_information($user_id);
				$data['group_id'] = $this->student_model->get_group($user_id);
				$data['group'] = $this->student_model->get_group_details($group_id);
				$data['defense'] = $this->student_model->get_defense($group_id);
				$data['tag'] = $this->student_model->get_thesis_specialization($group_id);
				$data['member'] = $this->student_model->get_thesis_group_members($user_id);
				$data['discussion'] = $this->student_model->get_discussion_specific($group_id);
				$data['reply'] = $this->student_model->get_discussion();
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
		}

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

		//logout
		public function logout()
		{
			$data = array(
				'user_id' => ''
			);
			$this->session->unset_userdata($data);
			$this->session->sess_destroy();
			redirect("home/index");
		}
	}

?>