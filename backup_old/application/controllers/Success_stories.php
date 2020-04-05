<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Success_stories extends CI_Controller {
	
	public function index()
	{
		$this->load->view('success_stories/index');
	}

	public function case_study()
	{
		$this->load->view('success_stories/case_study');
	}

}