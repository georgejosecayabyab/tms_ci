<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Google
	{
		private $g_client;
		private $token;
		private $pay_load;
		private $code;
		private $redirect_uri;

		public function __construct()
		{	

			require ("vendor/autoload.php");

			$this->g_client = new Google_Client();

			$this->g_client->setClientId("1067483480445-gengh3tq4anad9odhqs0fralk85veclh.apps.googleusercontent.com");
			$this->g_client->setClientSecret("lQMtpbYso3Hw0FD3G-H8srEq");
			$this->g_client->setScopes("https://www.googleapis.com/auth/plus.login profile email https://mail.google.com/ https://www.googleapis.com/auth/gmail.compose");
			$this->g_client->setAccessType("offline");
			$this->g_client->setRedirectUri("http://localhost/tms_ci/index.php/login");    
		}

		public function set_redirect_uri($url)
		{
			$this->redirect_uri = $url;	
		}

		public function get_client()
		{
			return $this->g_client;
		}

		public function get_token()
		{
			return $this->token;
		}

		public function revoke_token()
		{

		}

		public function get_pay_load()
		{	
			return $this->pay_load;
		}

		public function get_auth_url()
		{

		}

		public function get_gmail()
		{
			return new Google_Service_Gmail($this->g_client);
		}

		public function get_gmail_message()
		{
			return  new Google_Service_Gmail_Message();
		}
	}
?>