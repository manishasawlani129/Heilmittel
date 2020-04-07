<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* User Model - CRUD related to User table
*/
class ContactUs extends CI_Model
{
	
	public $name;
    public $phone;
    public $email;
    public $subject;
    public $message;

    public function save()
    {
        $this->name = $_POST['name'];
        $this->phone  = $_POST['phone'];
        $this->email  = $_POST['email'];
        $this->subject  = $_POST['subject'];
        $this->message  = $_POST['message'];
        if($this->db->insert('tbl_contact_us', $this)) {
            return true;
        } else {
            return false;
        }
    }

}