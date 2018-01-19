<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Front_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

  function getnews($offset = -1, $kategori = 0, $id = 0){
    
    if ($kategori != 0) {
      $this->db->where("idjenisberita = $kategori");
		}
    if ($id != 0) {
      $this->db->where("idberita = $id");
    }
		$this->db->join('jeniserita','berita.idjenisberita=jeniserita.idjenisberita');
if ($offset != -1) {
      $this->db->limit(3,$offset);
    }
    return $this->db->get('berita');
  }

  function getjenisberita($offset = -1, $id = 0){
    if ($offset!=-1) {
      $this->db->limit(6,$offset);
    }
    if ($id != 0) {
			$this->db->where("idjenisberita = $id");
		}

		return $this->db->get('berita');
  }

  function getkategori(){
   		return $this->db->get('jeniserita');
  }

  function getslider($offset = -1, $id = 0){
    if ($offset!=-1) {
      $this->db->limit(5,$offset);
    }
    if ($id != 0) {
      $this->db->where("idslider = $id");
    }

    return $this->db->get('slider');
  }
}
