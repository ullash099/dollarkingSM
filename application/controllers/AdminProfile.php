<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Controller_helper.php';
class AdminProfile extends Controller_helper{
	public function __construct(){
		parent::__construct();
		$this->checkLogin();
		$this->addViewData('active_menu', 'profile');
		$this->load->model('NewAdmin_model');
	}

	public function index(){
		header("location:javascript://history.go(-1)");
	}

	public function profile()
	{
		$this->addViewData('userProfileInfo',$this->NewAdmin_model->userProfileInfo($this->uri->segment(3)));
		$this->loadview('users/profile');
	}

	public function updateProfile() {
        $this->addViewData('active_child_menu', 'update_profile');
        $this->addViewData('info', array('Those field marked with (*) are required fields'));
        $user_id = $this->uri->segment(3);
        $who = $this->uri->segment(4);
        if ($user_id == '')
            $user_id = $this->session->userdata('id');
        
        if($who == 1){
            if ($this->input->server('REQUEST_METHOD') === 'POST') {
                $this->form_validation->set_rules('userName', 'User Name', 'required|trim|xss_clean|encode_php_tags|min_length[5]|max_length[45]');
                $this->form_validation->set_rules('userEmail', 'User Email', 'required|trim|xss_clean|encode_php_tags|valid_email|max_length[25]');

                if ($this->form_validation->run() == FALSE) {
                    $this->addViewData('error', $this->getErrors(validation_errors()));
                }elseif ($this->NewAdmin_model->updateProfile($user_id) === FALSE) {
                	redirect('AdminProfile/updateProfile/'.$user_id, 'refresh');
                }else{
                	$this->session->set_flashdata('success', 'Profile successfully updated!');
                    redirect('AdminProfile/updateProfile/'.$user_id, 'refresh');
                }
            }
        }elseif($who == 2){
            if ($this->input->server('REQUEST_METHOD') === 'POST') {
                $this->form_validation->set_rules('oldUserPass', 'Old Password', 'required|trim|xss_clean|encode_php_tags');
                $this->form_validation->set_rules('newUserPass', 'New Password', 'required|trim|xss_clean|encode_php_tags|min_length[8]|max_length[20]');
                $this->form_validation->set_rules('reenterUserPass', 'Reenter password', 'required|trim|xss_clean|encode_php_tags|matches[newUserPass]');
                if ($this->form_validation->run() == FALSE) {
                   $this->addViewData('error', $this->getErrors(validation_errors()));
                }elseif ($this->NewAdmin_model->updatePassword($user_id) === FALSE) {
                    redirect('AdminProfile/updateProfile/'.$user_id, 'refresh');
                }else{
                	$this->session->set_flashdata('success', 'Pussword successfully updated!');
                    //redirect('AdminProfile/updateProfile/'.$user_id, 'refresh');
                }
            }
        }
        $this->addViewData('who', $user_id);
        $this->addViewData('userProfile', $this->NewAdmin_model->userProfileInfo($user_id));
        $this->loadview('users/updateProfile');
    }
    
}