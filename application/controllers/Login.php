<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Controller_helper.php';
class Login extends Controller_helper{
	public function __construct(){
		parent::__construct();
		$this->load->model('Login_model');
	}
	public function index(){
		$this->alreadyLoggedIn();
		$this->addViewData('info', array('Please login to continue'));
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$this->form_validation->set_rules('uname','User Name','trim|xss_clean|encode_php_tags');
			$this->form_validation->set_rules('upass','Password','trim|xss_clean|encode_php_tags');
			if($this->form_validation->run() == FALSE){
                $this->addViewData('error', $this->getErrors(validation_errors()));
            }
            elseif($this->Login_model->login() == FALSE){
            	$this->addViewData('error', array('wrong username or password'));
            }
            else{
            	redirect('Deshboard');
            }
		}
		$this->loadview('login');
	}

	public function logout(){
		$this->session->userdata('admin_name');
		$this->session->userdata('admin_rool');
		$this->session->userdata('admin_date');
		
		$this->session->sess_destroy();
		redirect('Login');
	}
}