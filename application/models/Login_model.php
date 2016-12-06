<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model{
	public function login(){
		extract($_POST);
		$this->load->library('encrypt');
		$result = $this->db->get_where('admin',array('user_name'=>$uname));
		if($result->num_rows() > 0){
			$d_pass = $result->row(0)->user_pass;
			$dpass = trim($d_pass);			
			$key = "thisis36@of*()@mykey1598746";			
			$de_pass = $this->encrypt->decode($dpass,$key);
			if($upass == $de_pass){
				$attr = array(
					'admin_name'		=>  ucwords(str_replace('_', ' ', $result->row(0)->admin_name)),
					'user_name'			=>	$uname,
					'admin_role'		=>  $result->row(0)->role_type,
					'admin_date'		=> 	date("M. Y",strtotime($result->row(0)->creating_date)),
					'id'				=>	$result->row(0)->id,
				);
				$this->session->set_userdata($attr);
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}
}