<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* User Model - CRUD related to User table
*/
class Appointment extends CI_Model
{
	
	public $name;
    public $phone;
    public $email;
    public $age;
    public $gender;
    public $date_of_appointment;

    public function book()
    {
        $this->name = $_POST['name'];
        $this->phone  = $_POST['number'];
        $this->email  = $_POST['email'];
        $this->age  = $_POST['age'];
        $this->gender  = $_POST['sel_gender'];
        $date = DateTime::createFromFormat('d/m/Y', $_POST['visitdate']);
        $this->date_of_appointment = $date->format('Y-m-d');;
        if($this->db->insert('tbl_appointment', $this)) {
            return true;
        } else {
            return false;
        }
    }

}