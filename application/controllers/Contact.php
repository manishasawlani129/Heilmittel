<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'security'));
		$this->load->library(array('form_validation'));
		$this->load->model('appointment');
	}
	
	public function index()
	{
		$this->load->view('contact');
	}

	public function bookAppointment()
	{
		if($this->input->post('submit_aptform')) {
	        $name = $_POST['name'];
	        $phone  = $_POST['number'];
	        $email  = $_POST['email'];
	        $age  = $_POST['age'];
	        $gender  = $_POST['sel_gender'];
	        $date_of_appointment = $_POST['visitdate'];
			//Send Mail Script to be added
			//Insert and show success page
			if ($this->appointment->book()) {
				$data = array(
					'name' => $this->input->post('name'), 
					'date' => $this->input->post('visitdate'),
					'status' => true
				);
				$this->load->view('common/appointment_success', $data);	
			} else {
				$this->load->view('common/appointment_success', ['status' => false]);	
			}
		} else {
			return false;
		}
	}

	public function getInTouch()
	{
		$name = $this->input->post('name');
		$phone = $this->input->post('phone');
		// further logic here
	}

}