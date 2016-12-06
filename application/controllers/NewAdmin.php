<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Controller_helper.php';
class NewAdmin extends Controller_helper{
	public function __construct(){
		parent::__construct();
		$this->checkLogin();
		$this->addViewData('active_menu', 'admin\'s');
		$this->load->model('NewAdmin_model');
	}
	public function index(){
		$this->addViewData('active_child_menu', 'all_admin');
		$this->addViewData('roles',$this->NewAdmin_model->getRoles());
		$this->addViewData('allAdmins',$this->NewAdmin_model->getAllAdmins());
		$this->loadview('users/allusers');
	}

	public function addNewAdmin(){
		$this->addViewData('active_child_menu', 'new_admin');
		$this->addViewData('info', array('Those field marked with (*) are required fields'));
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$this->form_validation->set_rules('adminName', 'User Full Name', 'required|trim|encode_php_tags|xss_clean|max_length[150]');
			$this->form_validation->set_rules('AdminEmail', 'User Email', 'required|trim|encode_php_tags|xss_clean|max_length[100]|callback_check_email_exists');
			
			$this->form_validation->set_rules('adminRole', 'User Role', 'required|trim|encode_php_tags|xss_clean');

			$this->form_validation->set_rules('UserName', 'Username', 'required|trim|encode_php_tags|xss_clean|max_length[100]|callback_check_user_exists');

			$this->form_validation->set_rules('UserPass','Password','required|trim|encode_php_tags|xss_clean|min_length[5]|max_length[20]');
			$this->form_validation->set_rules('cpassword','Confirm Password', 'required|trim|encode_php_tags|xss_clean|min_length[5]|max_length[20]|matches[UserPass]' );
			if($this->form_validation->run() == FALSE){
                $this->addViewData('error', $this->getErrors(validation_errors()));
            }
            elseif($this->NewAdmin_model->addNewAdmin() == FALSE){
            	$this->addViewData('error', array('There is a problem. Please Contact your software company.'));
            }
            else{
            	$this->addViewData('success', array('Congratulations. Successfully Done.....'));
            }
		}
		$this->addViewData('role',$this->NewAdmin_model->getAdminRole());
		$this->loadview('users/addNewAdmin');
	}

	//checking email already existing
	public function check_email_exists($AdminEmail){
		
		$this->form_validation->set_message('check_email_exists', 'This %s email already edists. Please try again');
		if($this->NewAdmin_model->check_email_exists($AdminEmail))
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	
	//checking username already existing
	public function check_user_exists($UserName){
		
		$this->form_validation->set_message('check_user_exists', 'This %s user name already edists. Please try again');
		
		if($this->NewAdmin_model->check_user_exists($UserName))
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	public function deleteAdmin(){
		if($this->NewAdmin_model->deleteAdmin($this->uri->segment(3))){
			$this->session->set_flashdata('success', 'Congratulations. Successfully Done.....');
		}else{
			$this->session->set_flashdata('error', 'There is a problem. Please Contact your software company.');
		}
		redirect('NewAdmin');
	}
}