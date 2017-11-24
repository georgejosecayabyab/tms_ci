<?php if(!defined('BASEPATH')) exit('Direct access not allowed');

	class login extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->model('login_model');

			$this->load->library('form_validation');

			$this->load->helper('form');
			$this->load->helper('url');
			$this->load->helper('html');

		}

		public function index()
		{
			//get post values
			$email = $this->input->post("email");
			$password = $this->input->post("password");

			//set validations
			$this->form_validation->set_rules("email", "Email", "trim|required");
			$this->form_validation->set_rules("password", "Password", "trim|required");

			if($this->form_validation->run() == FALSE)
			{
				//validation fails
				$data['active_tab'] = array(
					'home' => "",
					'login' => "active",
				);
				$this->load->view('home/home_head', $data);
				$this->load->view('home/login_view');
				$this->load->view('home/home_foot');
			}
			else
			{
				//validation succeeds
				if($this->input->post('login') == "Login")
				{
					//check if email and password exist
					$result = $this->login_model->if_user($email, $password);
					if(sizeof($result) > 0)
					{
						//user exist and correct
						//set session
						$is_student = $this->login_model->is_student($result['user_id']);
						$data = array(
								'user_id' => $result['user_id'],
								'user_type' => $is_student
						);

						$this->session->set_userdata($data);
						//student or faculty
						if($is_student == 0)
						{
							redirect("student");//student
						}
						else
						{
							$if_coordinator = $this->login_model->if_coordinator($result['user_id']);
							if(sizeof($if_coordinator) > 0)
							{
								redirect("coordinator");
							}
							else
							{
								redirect("faculty");//faculty
							}
							
						}
					}
					else
					{
						$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid email and password!</div>');
                        redirect('login/index');
					}
				}
				else
				{
					redirect("#");
				}
			}


		}
	}

?>