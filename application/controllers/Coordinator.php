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
			$this->sample_common_free_time();
		}

		public function sample_common_free_time()
		{
			$data['time_mo'] = $this->coordinator_model->get_group_common_free_time_by_day(5, 'MO');
			$data['time_we'] = $this->coordinator_model->get_group_common_free_time_by_day(5, 'WE');

			$this->load->view('coordinator/sample_schedule_view', $data);

		}
	}
?>