<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Controller_helper.php';
class Settings extends Controller_helper{
	public function __construct(){
		parent::__construct();
		$this->checkLogin();
		$this->addViewData('active_menu', 'Settings');
		$this->load->model('Settings_model');
	}

	public function index(){
		$this->addViewData('active_child_menu', 'all_jumbo_roll');
		$this->addViewData('allJumbo',$this->Settings_model->getAllJumbo());
		$this->loadview('Settings/allJumboRoll');
	}

	public function newJumbo()
	{
		$this->addViewData('active_child_menu', 'new_jumbo_roll');
		$this->addViewData('info',array('Those field marked with (*) are required fields'));
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$this->form_validation->set_rules('jName', 'Jumbo Name', 'required|trim|encode_php_tags|xss_clean|max_length[50]');
			$this->form_validation->set_rules('jCode', 'Jumbo Code', 'required|trim|encode_php_tags|xss_clean|max_length[30]');
			$this->form_validation->set_rules('jColor', 'Jumbo Color', 'required|trim|encode_php_tags|xss_clean|max_length[14]');			
			$this->form_validation->set_rules('jLength', 'Jumbo Length', 'required|trim|encode_php_tags|xss_clean|max_length[30]');
			$this->form_validation->set_rules('jDesc', 'Jumbo Description', 'required|trim|encode_php_tags|xss_clean|max_length[255]');

			if($this->form_validation->run() == FALSE){
                $this->addViewData('error', $this->getErrors(validation_errors()));
            }
            elseif($this->Settings_model->newJumbo() == FALSE){
            	$this->addViewData('error', array('There is a problem. Please Contact your software company.'));
            }
            else{
            	$this->addViewData('success', array('Congratulations. Successfully Done.....'));
            }
		}
		$this->loadview('Settings/jumborollEntry');
	}

	public function editJumbo()
	{
		$this->addViewData('active_child_menu', 'edit_jumbo_roll');
		$this->addViewData('info',array('Those field marked with (*) are required fields'));
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$this->form_validation->set_rules('jName', 'Jumbo Name', 'required|trim|encode_php_tags|xss_clean|max_length[50]');
			$this->form_validation->set_rules('jCode', 'Jumbo Code', 'required|trim|encode_php_tags|xss_clean|max_length[30]');
			$this->form_validation->set_rules('jColor', 'Jumbo Color', 'required|trim|encode_php_tags|xss_clean|max_length[14]');			
			$this->form_validation->set_rules('jLength', 'Jumbo Length', 'required|trim|encode_php_tags|xss_clean|max_length[30]');
			$this->form_validation->set_rules('jDesc', 'Jumbo Description', 'required|trim|encode_php_tags|xss_clean|max_length[255]');

			if($this->form_validation->run() == FALSE){
                $this->addViewData('error', $this->getErrors(validation_errors()));
            }
            elseif($this->Settings_model->updateJumbo($this->uri->segment(3)) == FALSE){
            	$this->addViewData('error', array('There is a problem. Please Contact your software company.'));
            }
            else{
            	$this->addViewData('success', array('Congratulations. Successfully Done.....'));
            }
		}
		$this->addViewData('thisJumbo',$this->Settings_model->getThisJumbo($this->uri->segment(3)));
		$this->loadview('Settings/jumborollEntry');
	}

	public function cartonBox()
	{
		$this->addViewData('active_child_menu', 'all_carton_box');
		$this->addViewData('cartonBox',$this->Settings_model->getAllCartonBox());
		$this->loadview('Settings/allCartonBox');
	}

	public function newCartonBox()
	{
		$this->addViewData('active_child_menu', 'new_carton_box');
		$this->addViewData('info',array('Those field marked with (*) are required fields'));
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$this->form_validation->set_rules('cbName', 'Carton Box Name', 'required|trim|encode_php_tags|xss_clean|max_length[30]');
			$this->form_validation->set_rules('cbCode', 'Carton Box Code', 'required|trim|encode_php_tags|xss_clean|max_length[20]');
			$this->form_validation->set_rules('cbSize', 'Carton Box Size', 'required|trim|encode_php_tags|xss_clean|max_length[20]');

			if($this->form_validation->run() == FALSE){
                $this->addViewData('error', $this->getErrors(validation_errors()));
            }
            elseif($this->Settings_model->newCartonBox() == FALSE){
            	$this->addViewData('error', array('There is a problem. Please Contact your software company.'));
            }
            else{
            	$this->addViewData('success', array('Congratulations. Successfully Done.....'));
            }
		}
		$this->loadview('Settings/cartonBoxEntry');
	}


	public function editCartonBox()
	{
		$this->addViewData('active_child_menu', 'edit_carton_box');
		$this->addViewData('info',array('Those field marked with (*) are required fields'));
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$this->form_validation->set_rules('cbName', 'Carton Box Name', 'required|trim|encode_php_tags|xss_clean|max_length[30]');
			$this->form_validation->set_rules('cbCode', 'Carton Box Code', 'required|trim|encode_php_tags|xss_clean|max_length[20]');
			$this->form_validation->set_rules('cbSize', 'Carton Box Size', 'required|trim|encode_php_tags|xss_clean|max_length[20]');

			if($this->form_validation->run() == FALSE){
                $this->addViewData('error', $this->getErrors(validation_errors()));
            }
            elseif($this->Settings_model->updateCartonBox($this->uri->segment(3)) == FALSE){
            	$this->addViewData('error', array('There is a problem. Please Contact your software company.'));
            }
            else{
            	$this->addViewData('success', array('Congratulations. Successfully Done.....'));
            }
		}
		$this->addViewData('thisCartonBox',$this->Settings_model->thisCartonBox($this->uri->segment(3)));
		$this->loadview('Settings/cartonBoxEntry');
	}
}