<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Penulis_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	function add_penulis($data){
		return $this->db->insert('penulis', $data);
	}

	function get_penulis($id = false, $status = 99, $offset = -1,$q = ''){
		if ($id)  {
			$this->db->where("idpenulis=$id");
		}
		if ($status!=99)  {
			$this->db->where("status=$status");
		}
		if ($q != '') {
			$this->db->where("namapenulis LIKE '%$q%'");
		}
		if ($offset != -1) {
			$this->db->limit(2,$offset);
		}

		return $this->db->get('penulis');

	}

	function edit_penulis($id,$data){
		return $this->db->update('penulis',$data, ['idpenulis' => $id]);
	}

	function delete_penulis($id=false){
		if (!$id) return false;

		return $this->db->delete('penulis', ['idpenulis' => $id]);
	}
}
