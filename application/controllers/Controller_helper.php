<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Controller_helper extends CI_Controller {
	private $viewData;
	function __construct(){
		parent::__construct();
		$this->load->model('Login_model');
	}

	function addViewData($key, $value) {
        $this->viewData[$key] = $value;
    }

    function loadview($template){
    	if($template=="login"){
    		$this->load->view("template/login_header", $this->viewData);
    		$this->load->view($template, $this->viewData);
    		$this->load->view("template/login_footer", $this->viewData);
    	}
    	else{
    		$this->load->view("template/admin/header", $this->viewData);
    		$this->load->view("template/admin/manu", $this->viewData);
    		$this->load->view($template, $this->viewData);
    		$this->load->view("template/admin/footer", $this->viewData);
    	}
    }

    function alreadyLoggedIn() {
    	$adminname = $this->session->userdata('admin_name');
    	if(!empty($adminname))
    	{
    		redirect('Deshboard');
		}
    }

    function checkLogin() {
    	$adminname = $this->session->userdata('admin_name');
    	if(empty($adminname))
    	{
    		redirect('Login');
		}
    }

    function getErrors($errorString) {
        $return = array();
        $errors = explode('</p>', $errorString);
        foreach ($errors as $key => $value) {
            $error = substr($value, strpos($value, '<p>') + 3);
            if ($error == '') {
                continue;
            }
            $return[] = $error;
        }
        return $return;
    }
}