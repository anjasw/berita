<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('loginsess')) {
			redirect('login');
		}
		$this->load->model('Slider_model','sm');
		$this->load->model('Penulis_model','pm');
		$this->load->model('Kategori_model','km');
		$this->load->library('form_validation');
	}

	function index(){
    $view['status'] = $this->db->where_not_in('idstatus',99)->get('status')->result_array();
    $view['user'] = $this->session->userdata('loginsess');
		$view['view'] = 'slider/list';
		$view['data'] = $this->sm->get_slider();
		$this->load->view('admin',$view);
	}
	function add(){
		//$this->output->enable_profiler(true);
		$view['status'] = $this->db->where_not_in('idstatus',99)->get('status');
		$view['slider'] = $this->db->where('status',1)->get('slider');
		$view['user'] = $this->session->userdata('loginsess');
		$view['view'] = 'slider/add';
		if($_SERVER['REQUEST_METHOD']==='POST'){
			$this->form_validation->set_rules('judul', 'Judul Slider', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			if ($this->form_validation->run() == TRUE){
                	$data['judul'] = $this->input->post('judul');
                	$data['status'] = $this->input->post('status');
									$data['__createdby'] = $view['user']['username'];
									$lokasi = './assets/images/';
									$abspath = date('YmdHis').'_'.strtolower(str_replace(array(" ", ",","-", "&"), "_", $_FILES['images']['name']));
									$tmp_name = $_FILES["images"]["tmp_name"];
									$error = ['images']['error'];
									$size = ['images']['size'];
									$format = ['images']['type'];
									if ($error == 0) {
										if ($size < 3000000) {
											if ($format = 'images/jpg' || $format = 'images/png') {
												if (move_uploaded_file($tmp_name, $lokasi.$abspath)) {
													$data['image'] = $abspath;
												}else{
													$this->session->set_flashdata('insertstatus', 'false');
													redirect('slider/add');
												}
											}else{
												$this->session->set_flashdata('insertstatus', 'false');
												redirect('slider/add');
											}
										}else{
											$this->session->set_flashdata('insertstatus', 'false');
											redirect('slider/add');
										}
									}else{
										$this->session->set_flashdata('insertstatus', 'false');
										redirect('slider/add');
									}


									if ($this->sm->add_slider($data)) {
                		$this->session->set_flashdata('insertstatus', 'true');
                	}else $this->session->set_flashdata('insertstatus', 'false');
                	 redirect('slider');
      }
		}
		$this->load->view('admin',$view);
	}

	function edit($id){
    $view['status'] = $this->db->where_not_in('idstatus',99)->get('status');
		$view['slider'] = $this->db->where('status',1)->get('slider');
		$view['user'] = $this->session->userdata('loginsess');
		$view['view'] = 'slider/edit';
		$view['data'] = $this->sm->get_slider($id);
		if ($view['data']->num_rows()==0) {
			redirect('slider');
		}
		if($_SERVER['REQUEST_METHOD']==='POST'){
			$this->form_validation->set_rules('judul', 'Judul', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			if ($this->form_validation->run() == TRUE){
									$data['judul'] = $this->input->post('judul');
                	$data['status'] = $this->input->post('status');
									$data['__updatedby'] = $view['user']['username'];
                	$data['__updateddate'] = date('Y-m-d H:i:s');
									$basepath = './assets/images/';
									$abspath = date('YmdHis').'_'.strtolower(str_replace(array(" ", ",","-", "&"), "_", $_FILES['images']['name']));

									if (!empty($_FILES['images']['name'])) {
										if (move_uploaded_file($_FILES["images"]["tmp_name"], $basepath.$abspath)) {
											$data['image'] = $abspath;
										}else{
											$this->session->set_flashdata('insertstatus', 'false');
											redirect('berita');
										}
									}

									if ($this->sm->edit_slider($id,$data)) {
                		$this->session->set_flashdata('insertstatus', 'true');
                	}else $this->session->set_flashdata('insertstatus', 'false');
                		redirect('slider');
      }
		}
		$this->load->view('admin',$view);
	}

	function delete($id){
		if ($this->sm->delete_slider($id)) {
      $this->session->set_flashdata('deletestatus', 'true');
    }else $this->session->set_flashdata('deletestatus', 'false');
      redirect('slider');
	}
}
