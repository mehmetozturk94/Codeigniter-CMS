<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public $viewFolder = "";

	public function __construct()
	{
		parent::__construct();
		$this->viewFolder = "dashboard";
	}

	public function index()
	{
		$viewData = new stdClass();
		$viewData->viewDashboard = $this->viewFolder;
		$viewData->viewsubDashboard = 'list';
		
		$this->load->view("{$this->viewFolder}/{$viewData->viewsubDashboard}/dashboard",$viewData);
	}
}