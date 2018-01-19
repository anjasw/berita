<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kategori_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	function add_kategori($data){
		return $this->db->insert('jeniserita', $data);
	}

	function get_kategori($id = false, $status = 99, $offset = -1, $q = '', $field = 'jenisberita'){
		if ($id)  {
			$this->db->where("idjenisberita=$id");
		}
		if ($status!=99)  {
			$this->db->where("status=$status");
		}
		
		if ($q != '') {
			$this->db->where("$field LIKE '%$q%'");
		}
		if ($offset != -1) {
			$this->db->limit(4, $offset);
		}

		return $this->db->get('jeniserita');

	}

	function edit_kategori($id,$data){
		return $this->db->update('jeniserita',$data, ['idjenisberita' => $id]);
	}

	function delete_kategori($id=false){
		if (!$id) return false;

		return $this->db->delete('jeniserita', ['idjenisberita' => $id]);
	}
}
