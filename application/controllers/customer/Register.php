<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('form', 'string'));
        $this->load->model(array('customer_model'));
    }

    public function index()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
            $this->form_validation->set_rules('surname', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[rental_customers.email]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'trim|required|matches[password]');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('registererror', validation_errors());
                redirect(base_url(), 'refresh');
            } else {
                $hashPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $userData = array(
                    'firstname' => $_POST['firstname'],
                    'lastname' => $_POST['surname'],
                    'email' => $_POST['email'],
                    'password' => $hashPassword,
                    'id' => random_string('alpha', '50')
                );
                $this->customer_model->register_customer($userData);
                $user = $this->customer_model->get_one($_POST['email']);
                $this->session->set_userdata('rentalCustomer', $user);
                redirect(base_url('customer/home'));
            }
        }
    }
}
