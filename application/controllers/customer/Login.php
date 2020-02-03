<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
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
        if ($_POST) {
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() === FALSE) {
                redirect(base_url(), 'refresh');
            } else {
                $user = $this->customer_model->get_one($_POST['email']);
                if ($user) {
                    if (password_verify($_POST['password'], $user->password)) {
                        $this->session->set_userdata('rentalCustomer', $user);
                        redirect(base_url('customer/home'));
                    } else {
                        $this->session->set_flashdata('error', 'Incorrect password/email');
                        redirect(base_url(), 'refresh');
                    }
                } else {
                    $this->session->set_flashdata('error', 'No account exist with this credentials');
                    redirect(base_url(), 'refresh');
                }
            }
        }
    }

    public function logout()
    {
        if (!$this->session->rentalCustomer) {
            redirect(base_url());
        } else {
            $this->session->unset_userdata('rentalCustomer');
            redirect(base_url());
        }
    }
}
