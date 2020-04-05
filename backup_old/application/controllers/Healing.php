<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Healing extends CI_Controller {
	
	public function index()
	{
		$this->load->view('healing/index');
	}

	public function meditation()
	{
		$this->load->view('healing/meditation');
	}

	public function acupressure()
	{
		$this->load->view('healing/acupressure');
	}
}