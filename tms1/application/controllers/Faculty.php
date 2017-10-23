<?php if(!defined('BASEPATH')) exit('Direct access not allowed');

	class faculty extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->model('faculty_model');
		}

		public function index()
		{
			$session = $this->session->userdata();
			$user_id = $session['user_id'];
			$data['faculty_data'] = $this->faculty_model->get_faculty_detail($user_id);
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
			$data['advisee'] = $this->faculty_model->get_active_advisee_thesis_groups($user_id);
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
				'user_id' => ''
			);
			$this->session->unset_userdata($data);
			$this->session->sess_destroy();
			redirect("home/index");
		}
	}

?>