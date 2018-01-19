<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penulis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('loginsess')) {
			redirect('login');
		}
		$this->load->model('Penulis_model','pm');
	}

	function index($offset = 0){
    $view['status'] = $this->db->where_not_in('idstatus',99)->get('status')->result_array();
    $view['user'] = $this->session->userdata('loginsess');
	$view['view'] = 'penulis/list';
	$q = $this->input->get('q');
	$view['data'] = $this->pm->get_penulis(false,99,$offset,$q);
	$penulis = $this->pm->get_penulis(false, 99, -1, $q);
	$config['base_url'] = base_url().'penulis/index';
	$config['total_rows'] = $penulis->num_rows();
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

	function add(){
		$view['status'] = $this->db->where_not_in('idstatus',99)->get('status');
		$view['user'] = $this->session->userdata('loginsess');
		$view['view'] = 'penulis/add';
		if($_SERVER['REQUEST_METHOD']==='POST'){
			$this->form_validation->set_rules('namapenulis', 'Nama Penulis', 'required|is_unique[penulis.namapenulis]');
			$this->form_validation->set_rules('tentangpenulis', 'Tentang Penulis','');
			$this->form_validation->set_rules('status', 'Status', 'required');

			if ($this->form_validation->run() == TRUE){
                	$data['namapenulis'] = $this->input->post('namapenulis');
                	$data['status'] = $this->input->post('status');

                	$data['__createdby'] = $view['user']['username'];
                	if ($this->pm->add_penulis($data)) {
                		$this->session->set_flashdata('insertstatus', 'true');
                	}else $this->session->set_flashdata('insertstatus', 'false');
                	 redirect('penulis');
  		}
		}
		$this->load->view('admin',$view);
	}

	function edit($id){
    $view['status'] = $this->db->where_not_in('idstatus',99)->get('status');
		$view['user'] = $this->session->userdata('loginsess');
		$view['view'] = 'penulis/edit';
		$view['data'] = $this->pm->get_penulis($id);
		if ($view['data']->num_rows()==0) {
			redirect('penulis');
		}
		if($_SERVER['REQUEST_METHOD']==='POST'){
			$this->form_validation->set_rules('namapenulis', 'Nama Penulis', 'required');
			if ($this->form_validation->run() == TRUE){
                	$data['namapenulis'] = $this->input->post('namapenulis');
                	$data['status'] = $this->input->post('status');

                	$data['__updatedby'] = $view['user']['username'];
                	$data['__updateddate'] = date('Y-m-d H:i:s');
                	if ($this->pm->edit_penulis($id,$data)) {
                		$this->session->set_flashdata('insertstatus', 'true');
                	}else $this->session->set_flashdata('insertstatus', 'false');
                		redirect('penulis');
      }
		}
		$this->load->view('admin',$view);
	}
	
	function delete($id){
		if ($this->pm->delete_penulis($id)) {
      $this->session->set_flashdata('deletestatus', 'true');
    }else $this->session->set_flashdata('deletestatus', 'false');
      redirect('penulis');
	}
}
