<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Front_model','fm');
	}

  function home($offset = 0){
    $data['all'] = $this->fm->getnews($offset,0,0);
    $data['semua'] = $this->fm->getslider(-1,0);
    $data['berita'] = $this->fm->getkategori(-1,0);
	$berita = $this->fm->getnews(-1, 0, 0);
    $config['base_url'] = base_url().'news/home';
	$config['total_rows'] = $berita->num_rows();
	$config['per_page'] = 3;
	$config['num_tag_open'] = '<li>';
	$config['num_tag_close'] = '</li>';
	$config['cur_tag_open'] = '<li class="active"><a>';
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
	$config['anchor_class'] = '';

	$data['pagging'] =$this->pagination->initialize($config);
	$this->load->view('front/home', $data);
  }

  function detail($id){
		$data['data'] = $this->fm->getnews(0,0,$id)->row();
		$data['berita'] = $this->fm->getkategori(0);
		$this->load->view('front/detail', $data);
  }

  function kategori($id){
    $data['kategori'] = $this->fm->getjenisberita(0,$id);
		$data['semua'] = $this->fm->getslider(0);
    $data['berita'] = $this->fm->getkategori();
		$this->load->view('front/kategori', $data);
  }
}
