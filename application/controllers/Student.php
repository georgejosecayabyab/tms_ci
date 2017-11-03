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
			$data['active_tab'] = array(
				'home' => "active",
				'group' => "",
				'group_schedule' => "",
				'form' => "",
				'panels' => "",
				'archive' => "" 
			);

			$this->load->view('student/student_base_head', $data);
			$this->load->view('student/student_home_view', $data);
			$this->load->view('student/student_base_foot', $data);
		}
	}

?>