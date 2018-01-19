<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Mypagination{
    
    function __construct(){
      	$this->SP =& get_instance();
    	$this->SP->load->library('pagination');
    }

    function getPagination($total, $perpage, $url, $uri_segment){
		$config['base_url'] = $url;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = 'Next >';
		$config['prev_link'] = '< Prev';
		$config['first_link'] = '&larr; First';
		$config['last_link'] = 'Last &rarr;';
		$config['total_rows'] = $total;
		$config['per_page'] = $perpage;
		$config['page_query_string'] = TRUE;
		$this->SP->pagination->initialize($config);
		$data['link']=$this->SP->pagination->create_links();
		return $data;
      }
}
?>
