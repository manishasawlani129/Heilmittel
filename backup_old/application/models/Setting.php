<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* User Model - CRUD related to User table
*/
class Setting extends CI_Model
{
	
	// public $current_password;
    // public $new_password;

    public function updatePass($data) {        
        if (!isset($data['curpass']) || !isset($data['newpass'])) {
            return false;
        } else {
            // get stored password of user
            $query = $this->db->get_where('tbl_user', array('username' => $data['email']));        
            
            // if exactly 1 record found, update the password
            if ($query->num_rows() == 1) {

                // verify current password and update new password
                
                    if (password_verify($data['curpass'], $query->row('password'))) {
                        $this->db->set('password', $this->hash_password($data['newpass']));
                        $this->db->where('username', $data['email']);
                        $this->db->update('tbl_user');
                        $this->db->trans_complete();
                    } else {
                        /* 
                            Whenever you refresh the page, 
                            after setting the password, it redirects in this ELSE
                        */
                        return false;
                    }              
                

                // check if db transaction was successfully executed
                if ($this->db->trans_status() === FALSE) {
                    return false;
                }
                
                return true;
            
            } else {
                return false;
            }
            
        }

    }

    private function hash_password($password) {
       return password_hash($password, PASSWORD_DEFAULT);
    }
}