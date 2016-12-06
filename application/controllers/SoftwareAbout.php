<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Controller_helper.php';
class SoftwareAbout extends Controller_helper{
	public function __construct(){
		parent::__construct();
		$this->checkLogin();
		$this->addViewData('active_menu', 'About_Software');
	}
	public function index(){
		$this->loadview('SoftwareAbout');
	}
}