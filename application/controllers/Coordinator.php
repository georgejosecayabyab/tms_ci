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

		public function sample_common_free_time()
		{
			$data['time_mo'] = $this->coordinator_model->get_group_common_free_time_by_day(5, 'MO');
			$data['time_we'] = $this->coordinator_model->get_group_common_free_time_by_day(5, 'WE');

			$this->load->view('coordinator/sample_schedule_view', $data);

		}
	}
?>