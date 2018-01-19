<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	function check_login($username,$password){
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		return $this->db->get('user')->row();
	}
}
