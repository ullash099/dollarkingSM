<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings_model extends CI_Model{
	public function getAllJumbo()
	{
		return $this->db->get('raw_materials_jumbo')->result();
	}

	public function newJumbo()
	{
		extract($_POST);
		$data = array(
			'jumbo_code' 		=> 	$jCode,
			'jumbo_name' 		=> 	str_replace(' ', '_', ucwords($jName)),
			'jumbo_length' 		=> 	$jLength,
			'jumbo_color' 		=> 	$jColor,
			'jumbo_description'	=>	$jDesc
		);
		if($this->db->insert('raw_materials_jumbo', $data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function getThisJumbo($id)
	{
		$where = array('mat_id' => $id );
		return $this->db->get_where('raw_materials_jumbo',$where)->result();
	}

	public function updateJumbo($id)
	{
		extract($_POST);
		$data = array(
			'jumbo_code' 		=> 	$jCode,
			'jumbo_name' 		=> 	str_replace(' ', '_', ucwords($jName)),
			'jumbo_length' 		=> 	$jLength,
			'jumbo_color' 		=> 	$jColor,
			'jumbo_description'	=>	$jDesc
		);
		if($this->db->where('mat_id',$id)->update('raw_materials_jumbo', $data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function getAllCartonBox()
	{
		return $this->db->get('raw_materials_carton')->result();
	}

	public function newCartonBox()
	{
		extract($_POST);
		$data = array(
			'carton_name' 		=> 	str_replace(' ', '_', ucwords($cbName)),
			'carton_code' 		=> 	$cbCode,
			'carton_size' 		=> 	$cbSize
		);
		if($this->db->insert('raw_materials_carton', $data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function thisCartonBox($id)
	{
		$where = array('carton_id' => $id );
		return $this->db->get_where('raw_materials_carton',$where)->result();
	}

	public function updateCartonBox($id)
	{
		extract($_POST);
		$data = array(
			'carton_name' 		=> 	str_replace(' ', '_', ucwords($cbName)),
			'carton_code' 		=> 	$cbCode,
			'carton_size' 		=> 	$cbSize
		);
		if($this->db->where('carton_id',$id)->update('raw_materials_carton', $data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}