<?php if(!defined('BASEPATH')) exit('Direct access not allowed');
	
	class student extends CI_Controller
	{

		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->model('student_model');

		}

		public function index()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];
			
			$data['student_data'] = $this->student_model->get_user_information($user_id);
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
		public function view_group()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];

			$view = "";
			$result = $this->student_model->check_if_in_group($user_id);

			$data['student_data'] = $this->student_model->get_user_information($user_id);
			$data['active_tab'] = array(
				'home' => "",
				'group' => "",
				'group_schedule' => "",
				'form' => "",
				'archive' => "active" 
			);

			if(sizeof($result) > 0)
			{
				$view = 'student/student_group_view';
			}
			else
			{
				$view = 'student/student_no_group_view';
			}

			$this->load->view('student/student_base_head', $data);
			$this->load->view($view, $data);
			$this->load->view('student/student_base_foot', $data);
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