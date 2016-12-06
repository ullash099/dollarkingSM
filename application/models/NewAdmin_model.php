<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class NewAdmin_model extends CI_Model{
	public function getAdminRole(){
		return $this->db->get('user_role')->result();
	}

	public function check_email_exists($AdminEmail){
		$where = array(
			'admin_email'	=>	$AdminEmail
		);
		if($this->db->get_where('admin',$where)->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function check_user_exists($Username){
		$where = array(
			'user_name'	=>	$Username
		);
		if($this->db->get_where('admin',$where)->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function getRoles()
	{
		return $this->db->get('user_role')->result();
	}

	public function addNewAdmin(){
		extract($_POST);
		date_default_timezone_set('Asia/Dhaka');
  		$date = date("Y-m-d");
  		$this->load->library('encrypt');
		$key = "thisis36@of*()@mykey1598746";
		$en_pass = $this->encrypt->encode($UserPass,$key);

  		$allData  = array(
  			'role_type'		=>	$adminRole,
  			'admin_name'	=>	ucwords(str_replace(' ', '_',$adminName)),
  			'admin_email'	=>	$AdminEmail,
  			'user_name'		=>	$UserName,
  			'user_pass'		=>	$en_pass,
  			'creating_date'	=>	$date
  		);

  		if($this->db->insert('admin', $allData)){
  			return TRUE;
  		}else{
  			return FALSE;
  		}
	}

	public function getAllAdmins(){
		return $this->db->get('admin')->result();
	}

	public function deleteAdmin($id){
		if($this->db->where('id', $id)->delete('admin')){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function userProfileInfo($id)
	{
		$where = array('id' => $id );
		return $this->db->get_where('admin',$where)->result();
	}

	public function updateProfile($id)
	{
		date_default_timezone_set('Asia/Dhaka');
		extract($_POST);
        $data = array(
        	'admin_name'	=> ucwords(str_replace(' ', '_', $aname)),
            'user_name' 	=> $userName,
            'admin_email' 	=> $userEmail,
            'update_date' 	=> date('Y-m-d')
        );
        //
        $query = "SELECT * FROM `admin` WHERE `id`!=? and (`user_name` =?  OR `admin_email` = ?)";
        $result = $this->db->query($query,array($id,$userName,$userEmail));//->get();
        //echo $this->db->last_query();
        
        //$result = $this->db->select('*')->from('users')->where($sWhere);
        if($result->num_rows() > 0){
            $this->session->set_flashdata('error', 'User Name or Email address already taken!');
            return FALSE;
        }else{
        	if($this->db->where('id', $id)->update('admin', $data)){
    			$attr = array(
					'admin_name'	=>  ucwords(str_replace(' ', '_', $aname)),
					'user_name'		=>	$userName,
				);
				$this->session->set_userdata($attr);
	            return TRUE;
        	}else{
        		$this->session->set_flashdata('error', 'There is a problem. Please Contact With Software Companny!');
        		return FALSE;
        	}
        }
	}

	public function updatePassword($id)
	{
		$this->load->library('encrypt');
        extract($_POST);
        $result = $this->db->get_where('admin',array('id' =>  $id));
        if($result->num_rows() > 0){
            $d_pass = $result->row(0)->user_pass;
            $dpass = trim($d_pass);
            $key = "thisis36@of*()@mykey1598746";
            $de_pass = $this->encrypt->decode($dpass,$key);
            
            if($oldUserPass == $de_pass){
                $en_pass = $this->encrypt->encode($newUserPass,$key);
                $upPass  = array(
                    'user_pass'      =>  $en_pass
                );
                if($this->db->where('id', $id)->update('admin', $upPass)){
                    return TRUE;
                }else {
                    return FALSE; 
                }
            }else{
                $this->session->set_flashdata('error', 'Wrong Old Password!');
                return FALSE;
            }
        }
	}
}