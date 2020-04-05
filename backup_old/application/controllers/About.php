<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
	
	public function index()
	{
		$this->load->view('about/index');
	}

	public function drkiran()
	{
		$this->load->view('about/drkiran');
	}

	public function clinic()
	{
		$this->load->view('about/clinic');
	}

	public function gallery()
	{
		$this->load->view('about/gallery');
	}

	public function press()
	{
		$this->load->view('about/press');
	}
}