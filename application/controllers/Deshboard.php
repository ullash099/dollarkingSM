<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Controller_helper.php';
class Deshboard extends Controller_helper{
	public function __construct(){
		parent::__construct();
		$this->checkLogin();
		$this->addViewData('active_menu', 'deshboard');
		//$this->load->model('Sales_model');
		//$this->load->model('Client_model');
	}

	public function index(){
                $this->loadview('deshboard');
	}
}