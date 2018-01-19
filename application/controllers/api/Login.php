<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Api_Controller {
	public $is_public_service = TRUE;

	public function __construct()
	{
		parent::__construct();
		model('login_model','lm');
	}

	public function index(){
		$this->main();
	}

	public function process_post(){
		$out = new StdClass();

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == TRUE)
		{
            $username = post('username');
            $password = post('password');
            $user = $this->lm->check_login($username, $password);
            if ($user) {
            	$session['api_session_id'] = md5($username.date('YmdHis'));
            	$session['user_id'] = $user->userid;
            	$user->api_session_id = $session['api_session_id'];
            	$this->db->insert('api_session', $session);
            	$out->data = $user;
            }else{
        		throw new Exception('User Tidak Ditemukan', 400);

            }

        }else{
        	throw new Exception('Username Dan Password Di Butuhkan', 400);
        }
		
		return $out;	
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}
