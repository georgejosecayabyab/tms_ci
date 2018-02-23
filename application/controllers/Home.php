<?php if(!defined('BASEPATH')) exit('Direct access not allowed');
	
	class home extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->model('home_model');
			
		}

		public function index()
		{
			$data['awards'] = $this->home_model->get_awards_list();
			$data['news'] = $this->home_model->get_news_list();
			$data['defense'] = $this->home_model->get_defense_list();
			$data['active_tab'] = array(
				'home' => "active",
				'login' => "",
			);

			// $this->load->view('home/home_head', $data);
			// $this->load->view('home/home_header');
			// $this->load->view('home/home_view', $data);
			// $this->load->view('home/home_foot');
			$this->load->view('home/complete_home_view', $data);
		}

		
	}
?>