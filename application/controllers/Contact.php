<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'security'));
        $this->load->library(array('form_validation'));
        $this->load->model('appointment');
        $this->load->model('contactUs');
    }
    
    public function index()
    {
        $this->load->view('contact');
    }

    public function bookAppointment()
    {
        $rules = array(
            array(
                'field' => 'name',
                'label' => 'Your Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'number',
                'label' => 'Phone Number',
                'rules' => 'required'
            ),
            array(
                'field' => 'sel_gender',
                'label' => 'Gender',
                'rules' => 'required'
            ),
            array(
                'field' => 'visitdate',
                'label' => 'Date Or Time To Visit',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('common/appointment_success', ['status' => false]);
        } else {
            if ($this->appointment->book()) {
                $this->load->library('PHPMailer_Lib');
                $mail = $this->phpmailer_lib->load();
                $mail->Host     = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'dr.kirukiran@gmail.com';
                $mail->Password = 'kneerkiran';
                $mail->SMTPSecure = 'tls';
                $mail->Port     = 587;
                
                $mail->setFrom('dr.kirukiran@gmail.com', "Dr. Kiran's Heilmittel");
                $mail->addAddress('dr.kiran104@gmail.com');
                $mail->Subject = "Book an appointment form website";
                $mail->isHTML(true);
                
                $mailContent = "Hi Dr.Kiran<br/><br/>
                <p>We just received an appointment from dr.kiranshomeo.com. Please find the below mentioned details regarding it.</p><h3>Person Details</h3>
                <span><b>Name</b>:" . $this->input->post('name') . "</span><br/>
                <span><b>Phone No.</b>:" . $this->input->post('number') . "</span><br/>
                <span><b>Email Address</b>:" . $this->input->post('email') . "</span><br/>
                <span><b>Age</b>:" . $this->input->post('age') . "</span><br/>
                <span><b>Gender</b>:" . $this->input->post('sel_gender') . "</span><br/>
                <span><b>Date of Visit</b>:" . $this->input->post('visitdate') . "</span><br/>
                <br/>

                <b>Thanks,</b>
                <br/>
                The Support team";
                $mail->Body = $mailContent;
                if(!$mail->send()){
                    $this->load->view('common/appointment_success');
                } else {
                    $data = array(
                        'name' => $this->input->post('name'), 
                        'date' => $this->input->post('visitdate'),
                        'status' => true
                    );
                    $this->load->view('common/appointment_success', $data);
                }
            } else {
                $this->load->view('common/appointment_success', ['status' => false]); 
            }
        }
    }

    public function getInTouch()
    {
        $rules = array(
            array(
                'field' => 'name',
                'label' => 'Your Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'phone',
                'label' => 'Contact Number',
                'rules' => 'required'
            ),
            array(
                'field' => 'subject',
                'label' => 'Subject',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == FALSE) {
            $message = 'Please fill all mandatory fields.';
            $header = 'Error';
        } else {
            if ($this->contactUs->save()) {
                $message = 'We have received your enquiry and will respond you soon. For urgent enquiries please call us on <b>+91-9887-6887-13</b> or email us on <b>drkiran@drkiranshomeo.com</b>.';
                $header = 'Thank you for contacting us.';

                $this->load->library('PHPMailer_Lib');
                $mail = $this->phpmailer_lib->load();
                $mail->Host     = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'dr.kirukiran@gmail.com';
                $mail->Password = 'kneerkiran';
                $mail->SMTPSecure = 'tls';
                $mail->Port     = 587;
                
                $mail->setFrom('dr.kirukiran@gmail.com', "Dr. Kiran's Heilmittel");
                $mail->addAddress('dr.kiran104@gmail.com');
                $mail->Subject = "Enquiry form website";
                $mail->isHTML(true);
                
                $mailContent = "Hi Dr.Kiran<br/><br/>
                <p>We just received an inquiry from dr.kiranshomeo.com. Please find the below mentioned details regarding it.</p><h3>Person Details</h3>
                <span><b>Name</b>:" . $this->input->post('name') . "</span><br/>
                <span><b>Phone No.</b>:" . $this->input->post('phone') . "</span><br/>
                <span><b>Email Address</b>:" . $this->input->post('email') . "</span><br/>
                <span><b>Subject</b>:" . $this->input->post('subject') . "</span><br/>
                <span><b>Message</b>:" . $this->input->post('message') . "</span><br/>
                <br/>

                <b>Thanks,</b>
                <br/>
                The Support team";
                $mail->Body = $mailContent;
                if(!$mail->send()){
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo json_encode(['header' => $header, 'message' => $message]);
                }
            } else {
                $message = 'We were not able to book save your details due to some technical issue occurred. Please retry filling the form with relavant information. If the error still exists, give us a call on <b>+91-9887-6887-13</b> or email us on <b>drkiran@drkiranshomeo.com</b>. <br/>Sorry for the inconvinience. :( ';
                $header = 'Technical Error';
                echo json_encode(['header' => $header, 'message' => $message]);
            }
        }
        
    }

}