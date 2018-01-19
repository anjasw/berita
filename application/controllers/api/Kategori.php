<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends Api_Controller {

	public function __construct()
	{
		parent::__construct();
		model('Kategori_model','km');
	}

	public function index(){
		$this->main();
	}

	public function process_get($auth){
		$out = new StdClass();
		$offset = get('offset');
		$q = get('q');
		$field = get('field');
		$out->data = $this->km->get_kategori(false, 99, $offset, $q,$field)->result();
		return $out;	
	}

	public function process_post($auth){
		$out = new StdClass();

		$this->form_validation->set_rules('jenisberita', 'Jenis Berita', 'required|is_unique[jeniserita.jenisberita]');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == TRUE){
        	$data['jenisberita'] = post('jenisberita');
        	$data['status'] = post('status');
        	$user = $this->db->get_where('user',['userid' => $auth->user_id ])->row();
        	$data['__createdby'] = $user->username;
        	$out->data = $data;

        	if ($this->km->add_kategori($data)) {
        		$out->data = $data;
        	}else {
    			throw new Exception('Data gagal di simpan', 400);
        	}

    	}else{
    		throw new Exception(validation_errors(), 400);
    	}
    		
    	return $out;
	}
	public function process_update(){
		
	}

}
