<?php if(!defined('BASEPATH')) exit('Direct access not allowed');

	class login extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->model('login_model');

			$this->load->library('form_validation');
			$url = array(
				'url' => 'login'
			);

			$this->load->helper('form');
			$this->load->helper('url');
			$this->load->helper('html');

		}

		public function index_1()
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
                        redirect('login/index_1');
					}
				}
				else
				{
					redirect("#");
				}
			}


		}

		public function index()
		{
			$g_client = $this->google->get_client();
			$code = isset($_GET['code']) ? $_GET['code'] : NULL;
			$token = $g_client->fetchAccessTokenWithAuthCode($code);
            $g_client->setAccessToken($token);
            $pay_load = $g_client->verifyIdToken();
            $refresh_token = $g_client->getRefreshToken();
   //          echo $refresh_token;
			// var_dump($refresh_token);			
			$json_encode = json_encode($pay_load);
			$url_encode = $this->base64UrlEncode($json_encode);
			$json_token_encode = json_encode($token);
			$url_token_encode = $this->base64UrlEncode($json_token_encode);
			echo $json_token_encode;
			echo $url_token_encode;
			redirect('login/check/'.$url_encode.'/'.$url_token_encode);
		}

		public function sample()
		{
			$session = $this->session->userdata();
			var_dump($session);
		}

		public function check($url_encode, $url_token_encode)
		{
			$url_decode = $this->base64UrlDecode($url_encode);
			$json_decode = json_decode($url_decode, true);
			$pay_load = $json_decode;		
			$url_token_decode = $this->base64UrlDecode($url_token_encode);
			$json_token_decode = json_decode($url_token_decode, true);
			$token = $json_token_decode;
			$email = $pay_load["email"];
		    $result = $this->login_model->if_user_gmail($email);
		    // echo $email;
		    // var_dump($result);
			if(sizeof($result) > 0)
			{
				//user exist and correct
				//set session
				$is_student = $this->login_model->is_student($result['user_id']);
				//This is an array
				$data = [
					'access_token' => $token,
					'user_id' => $result['user_id'],
					'user_type' => $is_student
				];

				$this->session->set_userdata($data);

				//student or faculty
				if($is_student == 0)
				{
					//var_dump($this->session->userdata());
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
                redirect('home');
			}
		}

		public function sample_2()
		{
			echo 'joke!!';
			var_dump($this->session->userdata());
		}
		public function google()
		{
			require ("vendor/autoload.php");
			//Step 1: Enter you google account credentials

			$g_client = new Google_Client();

			$g_client->setClientId("1067483480445-gengh3tq4anad9odhqs0fralk85veclh.apps.googleusercontent.com");
			$g_client->setClientSecret("lQMtpbYso3Hw0FD3G-H8srEq");
			$g_client->setRedirectUri("http://localhost/tms_ci/index.php/login");     
			$g_client->setScopes("https://www.googleapis.com/auth/plus.login profile email https://mail.google.com/ https://www.googleapis.com/auth/gmail.compose");
			$g_client->setAccessType("offline");

			return $g_client;
		}

		public function base64UrlEncode($inputStr)
        {
            return strtr(base64_encode($inputStr), '+/=', '-_,');
        }

        public function base64UrlDecode($inputStr)
        {
            return base64_decode(strtr($inputStr, '-_,', '+/='));
        }
	}

?>