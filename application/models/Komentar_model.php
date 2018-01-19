<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Komentar_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

  function getkomentar($offset = -1, $q = ''){
  	if ($q != '') {
			$this->db->where("nama LIKE '%$q%'");
	}
  	if ($offset != -1) {
			$this->db->limit(2, $offset);
	}

    return $this->db->get('komentar');
  }

  function delete_komentar($id=false){
		if (!$id) return false;
		return $this->db->delete('komentar', ['idkomentar' => $id]);
	}
}
