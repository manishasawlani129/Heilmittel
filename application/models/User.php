<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* User Model - CRUD related to User table
*/
class User extends CI_Model
{
	
	public $username;
    public $password;
    public $firstname;
    public $lastname;

    public function login($data)
    {
        $query = $this->db->get_where('tbl_user', array('username' => $data['username']));        
        if ($query->num_rows() == 1) {
            $inputPassword = $data['password'];
            $storedPassword = $query->row('password');
            if (password_verify($inputPassword, $storedPassword)) {
                return $query->result();
            } else {
                return false;
            }            
        } else {
            return false;
        }
    }

    public function register()
    {
        $query = $this->db->get_where('tbl_user', array('username' => $_POST['email']));                
        if ($query->num_rows() > 0) {
            return false;
        } else {
            $this->firstname = $_POST['firstname'];
            $this->lastname  = $_POST['lastname'];
            $this->username  = $_POST['email'];
            $this->password  = $this->hash_password($_POST['password']);
            $this->db->insert('tbl_user', $this);
            return true;
        }        
    }

    private function hash_password($password){
       return password_hash($password, PASSWORD_DEFAULT);
    }    

    public function insert_token($token, $username)
    {
        if($token && $username) {            
            $tstamp = gmdate('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
           if ($this->db->insert('tbl_url_token', array('username' => $username, 'token' => $token, 'tstamp' => $tstamp))) {
                return true;
           }
        } else {
            return false;
        }
    }

    public function tokenExist($token)
    {
        $this->db->select('token')->where('token', $token)->from('tbl_url_token')->order_by('tstamp', 'desc')->limit(1);
        $query = $this->db->get();
        $status = ($query->num_rows() > 0) ? 1 : 0;
        return $status;
    }

    public function getUsernameFromTokenVal($token)
    {   
        $this->db->select('username', 'token')->where('token', $token)->from('tbl_url_token')->order_by('tstamp', 'desc')->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {            
            return $query->row('username');
        }
        // else get the username 
        else {
            return false;                        
        }
    }

    public function update_password($username, $new_password)
    {
        $query = $this->db->get_where('tbl_user', array('username' => $username));        
        // if exactly 1 record found, update the password
        if ($query->num_rows() == 1) {
            $this->db->set('password', $this->hash_password($new_password));
            $this->db->where('username', $username);
            $this->db->update('tbl_user');
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                return false;
            }
            
            return true;
        }
        // else return false
        else {
            return false;
        }        
    }
}