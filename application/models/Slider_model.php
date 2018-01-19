<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Slider_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	function add_slider($data){
		return $this->db->insert('slider', $data);
	}

	function get_slider($id = false, $status = 99){
		if ($id)  {
			$this->db->where("idslider=$id");
		}
		if ($status!=99)  {
			$this->db->where("status=$status");
		}
    return $this->db->get('slider');

	}

	function edit_slider($id,$data){
		return $this->db->update('slider',$data, ['idslider' => $id]);
	}

	function delete_slider($id=false){
		if (!$id) return false;

		return $this->db->delete('slider', ['idslider' => $id]);
	}
}
