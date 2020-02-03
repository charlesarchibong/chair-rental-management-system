<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('form', 'string'));
        $this->load->model(array('admin_model', 'pin_model'));
    }

    public function index()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
            $this->form_validation->set_rules('pin', 'Admin Authentication Pin', 'trim|required');
            $this->form_validation->set_rules('surname', 'Surname', 'trim|required');
            $this->form_validation->set_rules('email', 'Email Address', 'trim|required|is_unique[rental_admins.email]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'trim|required|matches[password]');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                $this->data['title'] = 'Regiter Admin';
                $this->load->view('admin-dashboard/register', $this->data);
            } else {
                $pin = $this->pin_model->authenticated_pin($_POST['pin']);
                if (!$pin) {
                    $this->session->set_flashdata('error', "Invalid Pin, Please try another!");
                    $this->data['title'] = 'Regiter Admin';
                    $this->load->view('admin-dashboard/register', $this->data);
                } elseif ($pin->no_of_usage > 0) {
                    $this->session->set_flashdata('error', "This pin has been used!");
                    $this->data['title'] = 'Regiter Admin';
                    $this->load->view('admin-dashboard/register', $this->data);
                } else {
                    $hashPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $userData = array(
                        'first_name' => $_POST['firstname'],
                        'surname' => $_POST['surname'],
                        'email' => $_POST['email'],
                        'password' => $hashPassword,
                        'id' => random_string('alpha', '50')
                    );
                    $pinData = array(
                        'pin' => $_POST['pin'],
                        'no_of_usage' => 1,
                        'used_by' => $_POST['email']
                    );
                    $this->pin_model->update_pin($pinData);
                    $this->admin_model->register_admin($userData);
                    $user = $this->admin_model->get_one($_POST['email']);
                    $this->session->set_userdata('rentalAdmin', $user);
                    redirect(base_url('admin/home'));
                }
            }
        } else {
            $this->data['title'] = 'Regiter Admin';
            $this->load->view('admin-dashboard/register', $this->data);
        }
    }
}
