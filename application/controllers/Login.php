<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model','lm');
	}

	public function index(){
		$view['msg']='';
		$ceksess = $this->session->userdata('loginsess');
		if ($ceksess)
			redirect('dashboard');

		if($_SERVER['REQUEST_METHOD']==='POST'){
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if ($this->form_validation->run() == TRUE)
                {
                	$username = $this->input->post('username');
                	$password = $this->input->post('password');
                	$user = $this->lm->check_login($username, $password);
                	if ($user) {
                		$session['userid'] = $user->userid;
                		$session['username'] = $user->username;
                		$session['name'] = $user->name;
                		$session['email'] = $user->email;
                		$session['level'] = $user->level;
                		$this->session->set_userdata('loginsess',$session);
                		redirect('dashboard');
                	}else{
                		$view['msg'] = '<div class="error">Gagal login..<br>Cek kembali username dan passwordnya gan..</div><hr>';
                	}
                }
		}
		$this->load->view('login',$view);
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}
