<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'security'));
		$this->load->library(array('form_validation'));
		$this->load->model('user');
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
		$form_data = $this->input->post();	
		// set login form validation		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

		// check for already logged in user
		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['user'])) {
				$data['name'] = $this->session->userdata('name');
				$this->load->view('admin/dashboard', $data);
			} else {
				// $data['errmsg'] = "Form validation failed! Please try again.";
				$this->load->view('admin/login');
			}
		} else {			
			$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
			);
			$result = $this->user->login($data);
			if($result) {
				$user = $result[0]->username;
				$data['name'] = $result[0]->firstname.' '.$result[0]->lastname;
				$this->session->set_userdata(array('user'=>$user, 'name'=>$data['name']));			
				$this->load->view('admin/dashboard', $data);
			} else {
				$data['errmsg'] = 'Sorry! These credentials do not match our database.';
				$this->load->view('admin/login', $data);
			}
		}
	}

	public function register()
	{
		if($this->input->post('submit')) {			
			if ($this->user->register()) {
				$data['registermsg'] = 'Admin registered successfully. Please login to continue.';
				$data['registermsgtheme'] = 0;
				$this->load->view('admin/login', $data);	
			} else {
				$data['registermsg'] = 'This user already exists. In case you lost your password, click <b>Forgot Password</b> link below.';
				$data['registermsgtheme'] = 1;
				$this->load->view('admin/login', $data);
			}
		} else {
			$this->load->view('admin/register');
		}
	}

	public function forgotPassword()
    {
    	$this->load->view('admin/forgot_password');
    }

    public function sendToken()
    {
    	$reset_password_url = '';
        $username = $this->input->post('username');       
        $token = sha1(uniqid($username, true));        
        if($this->user->insert_token($token, $username)) {        	
        	$reset_password_url = base_url().'admin/changepassword/token/'.$token;
        	echo "Please visit <a href=".$reset_password_url.">this url</a> to change password.";
        	/*
        	$this->load->library('email');

        	$this->email->from('admin@heilmittel.com', 'Admin');
			$this->email->to($username);
			 
			$this->email->subject('Reset Password Link');
			$this->email->message('');

			if($this->email->send()) {
				// code here
			}
			*/
        } else {
        	$data['errmsg'] = "Technical Failure! Please try again.";
        	$this->load->view('admin/forgot_password');
        }        
    }

    public function changePassword()
    {
    	$data = $this->uri->uri_to_assoc();
    	$status = $this->user->tokenExist($data['token']);
    	$view = $status ? 'admin/change_password' : 'admin/forgot_password';
    	if($view == 'admin/forgot_password') {
    		$data['errmsg'] = "Incorrect password reset link. Try again!";
    	}
    	$this->load->view($view, $data);
    }

    public function updatePassword()
    {
    	if($this->input->post('submit')) {
    		if($this->input->post(array('password', 'password_confirm'), TRUE)) {
    			$data = $this->uri->uri_to_assoc();
    			$token = $data['token'];    			
    			$username = $this->user->getUsernameFromTokenVal($token);    			
    			if($this->user->update_password($username, $this->input->post('password'))) {
    				$data['registermsg'] = 'Password updated successfully. Please login to continue.';
					$data['registermsgtheme'] = 0;
					$this->load->view('admin/login', $data);
    			} else {
    				$data['errmsg'] = 'There were issues updating your password! Please try again.';
    				$this->load->view('admin/change_password');
    			}
    		}   		
    	} else {
    		echo 'false';
    	}
    }

	public function logout()  
    {      	    	    	
        //removing session  
		$this->session->sess_destroy();
		$data['logoutmsg'] = 'You have been successfully logged out! Login to access the admin panel.';
        $this->load->view('admin/login', $data);
    }     
}
