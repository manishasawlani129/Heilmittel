<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'security'));
		$this->load->library(array('form_validation'));
		$this->load->model('setting');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	
		$this->load->view('settings/index');
	}

	public function update_password()
	{
		if($_POST) {
			$form_data = $this->input->post();	
			// set login form validation		
			$this->form_validation->set_rules('curpass', 'Current Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('newpass', 'New Password', 'trim|required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
				$data['errmsg'] = "Form validation Failed.";
				$this->load->view('admin/settings/update_password', $data);
			} else {
				$data = array(
					'curpass' => $this->input->post('curpass'),
					'newpass' => $this->input->post('newpass'),
					'email' => $this->session->userdata('user'), 
					'name' => $this->session->userdata('name')
				);

				$result = $this->setting->updatePass($data);

				if($result) {
					$data['status'] = "Password changed successfully.";
					$this->load->view('admin/dashboard', $data);
				} else {
					$data['errmsg'] = 'Something went wrong! Please try again.';
					$this->load->view('admin/settings/update_password', $data);
				}
			}
		}

		if(isset($this->session->userdata['user'])) {
			$data['name'] = $this->session->userdata('name');
			$this->load->view('admin/settings/update_password', $data);
		}
		else {
			$data['errmsg'] = "Session Expired. Please login to access admin panel.";
			$this->load->view('admin/login', $data);
		}		
		// $form_data = $this->input->post();	
		// // set login form validation		
		// $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		// $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

		// // check for already logged in user
		// if ($this->form_validation->run() == FALSE) {
		// 	if(isset($this->session->userdata['user'])) {
		// 		$data['name'] = $this->session->userdata('name');
		// 		$this->load->view('admin/dashboard', $data);
		// 	} else {				
		// 		// $data['errmsg'] = "Form validation failed! Please try again.";
		// 		$this->load->view('admin/login');
		// 	}
		// } else {			
		// 	$data = array(
		// 	'username' => $this->input->post('username'),
		// 	'password' => $this->input->post('password')
		// 	);
		// 	$result = $this->user->login($data);
		// 	if($result) {
		// 		$user = $result[0]->username;
		// 		$data['name'] = $result[0]->firstname.' '.$result[0]->lastname;
		// 		$this->session->set_userdata(array('user'=>$user, 'name'=>$data['name']));			
		// 		$this->load->view('admin/dashboard', $data);
		// 	} else {
		// 		$data['errmsg'] = 'Sorry! These credentials do not match our database.';
		// 		$this->load->view('admin/login', $data);
		// 	}
		// }
	}

	public function samplefunc($data)
	{
		return $data;
	}
}
