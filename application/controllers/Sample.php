<?php
	
	class sample extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function index(){
			$this->if_user();
			//$this->if_student();
			//$this->get_user_details();
			//$this->sample_view();
		}

		public function if_user()
		{
			$email = "geanne.franco@dlsu.edu.ph";
			$password = "1234";
			$this->load->model('login_model');
			$result = $this->login_model->if_user($email, $password);
			$data['num_user'] = $result;
			$data['is_student'] = $this->login_model->is_student($result['user_id']);
			$this->load->view('sample_view', $data);
		}


		public function if_student()
		{
			$id = 7;
			$this->load->model('login_model');
			$data['num_user'] = $this->login_model->is_student($id);
			$this->load->view('sample_view', $data);
		}

		public function get_user_details()
		{
			$id = 7;
			$this->load->model('login_model');
			$data['num_user'] = $this->login_model->get_user_details($id);
			$this->load->view('sample_view', $data);
		}

		// home view, glyph icon error
		public function sample_view()
		{
			$data = array(
					''=>'',
					''=>'',
				); 

			$this->load->view('home_head');
			$this->load->view('home_header');
			$this->load->view('home_view');
			$this->load->view('home_foot');
		}

		// home view, glyph icon error
		public function welcome()
		{
			$this->load->view('welcome_message');
		}

		public function login_view()
		{
			$this->load->view('home_head');
			$this->load->view('login_view');
			$this->load->view('home_foot');
		}
	}
?>