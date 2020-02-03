<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
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
        if ($this->session->rentalAdmin) {
            redirect(base_url('admin/home'));
        } else {
            if ($_POST) {
                $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
                $this->form_validation->set_rules('password', 'Password', 'required');
                if ($this->form_validation->run() === FALSE) {
                    $this->data['title'] = "Admin Login";
                    $this->load->view('admin-dashboard/login', $this->data);
                } else {
                    $user = $this->admin_model->get_one($_POST['email']);
                    if ($user) {
                        if (password_verify($_POST['password'], $user->password)) {
                            $this->session->set_userdata('rentalAdmin', $user);
                            redirect(base_url('admin/home'));
                        } else {
                            $this->session->set_flashdata('error', 'Incorrect password/email');
                            $this->data['title'] = "Admin Login";
                            $this->load->view('admin-dashboard/login', $this->data);
                        }
                    } else {
                        $this->session->set_flashdata('error', 'No account exist with this credentials');
                        $this->data['title'] = "Admin Login";
                        $this->load->view('admin-dashboard/login', $this->data);
                    }
                }
            } else {
                $this->data['title'] = 'Admin Login';
                $this->load->view('admin-dashboard/login', $this->data);
            }
        }
    }

    public function logout()
    {
        if (!$this->session->rentalAdmin) {
            redirect(base_url('admin/login'));
        } else {
            $this->session->unset_userdata('rentalAdmin');
            redirect(base_url('admin/login'));
        }
    }
}
