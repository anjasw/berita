<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Berita_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	function add_berita($data){
		return $this->db->insert('berita', $data);
	}

	function get_berita($id = false, $status = 99, $offset = -1, $q = ''){
		$this->db->select("berita.*, penulis.namapenulis");
		if ($id)  {
			$this->db->where("idberita=$id");
		}
		if ($status!=99)  {
			$this->db->where("status=$status");
		}

		if ($q != '') {
			$this->db->where("judulberita LIKE '%$q%'");
		}
    $this->db->join('jeniserita','berita.idjenisberita=jeniserita.idjenisberita');
    $this->db->join('penulis','berita.idpenulis=penulis.idpenulis');
		if ($offset != -1) {
			$this->db->limit(4, $offset);
		}
		return $this->db->get('berita');
	}

	function edit_berita($id,$data){
		return $this->db->update('berita',$data, ['idberita' => $id]);
	}

	function delete_berita($id=false){
		if (!$id) return false;

		return $this->db->delete('berita', ['idberita' => $id]);
	}
}
