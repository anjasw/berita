<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class komentar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('loginsess')) {
			redirect('login');
		}
		$this->load->model('Komentar_model','km');
	}

	function index($offset = 0){
		//$this->output->enable_profiler(TRUE);
    $view['user'] = $this->session->userdata('loginsess');
	$view['view'] = 'komentar';
	$q = $this->input->get('q');
	$view['data'] = $this->km->getkomentar($offset, $q);
	$berita = $this->km->getkomentar(-1, $q);
	$config['base_url'] = base_url().'berita/index';
	$config['total_rows'] = $berita->num_rows();
	$config['per_page'] = 2;
	$config['num_tag_open'] = '<li>';
	$config['num_tag_close'] = '</li>';
	$config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
	$config['cur_tag_close'] = '</a></li>';
	$config['first_tag_open'] = '<li>';
	$config['first_tag_close'] = '</li>';
	$config['last_tag_open'] = '<li>';
	$config['last_tag_close'] = '</li>';
	$config['next_tag_open'] = '<li>';
	$config['next_tag_close'] = '</li>';
	$config['last_tag_close'] = '</li>';
	$config['prev_tag_open'] = '<li>';
	$config['prev_tag_close'] = '</li>';
	$config['anchor_class'] = 'class="waves-effect"';
	$view['pagging'] =$this->pagination->initialize($config);
	
	$this->load->view('admin',$view);

	}
	
	function delete($id){
		if ($this->km->delete_komentar($id)) {
      $this->session->set_flashdata('deletestatus', 'true');
    }else $this->session->set_flashdata('deletestatus', 'false');
      redirect('komentar');
	}
}
