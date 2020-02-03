<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('form', 'string'));
        $this->load->model(array('admin_model', 'pin_model', 'customer_model', 'orders_model'));
        if (!$this->session->rentalCustomer) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $user = $this->session->rentalCustomer;
        $this->data['title'] = $user->firstname . ' ' . $user->lastname . ' Dashboard';
        $this->data['user'] = $user;
        $this->data['orders'] = $this->orders_model->get_order_by_user($user->id);
        $this->data['approved_orders'] = $this->orders_model->get_cusapproved_orders($user->id);
        $this->data['pending_orders'] = $this->orders_model->get_cuspending_orders($user->id);
        $this->data['declined_orders'] = $this->orders_model->get_cusdeclined_orders($user->id);
        $this->load->view('customer-dashboard/index', $this->data);
    }

    public function customer()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
            $this->form_validation->set_rules('surname', 'Last Name', 'trim|required');
            if ($this->input->post('password')) :
                $this->form_validation->set_rules('password', 'Password', 'trim|required');
                $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'trim|required|matches[password]');
            endif;
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('updateerror', validation_errors());
                redirect(base_url('customer/profile'), 'refresh');
            } else {
                $userData =  (array) null;
                if ($this->input->post('password')) :
                    $hashPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $userData = array(
                        'firstname' => $_POST['firstname'],
                        'lastname' => $_POST['surname'],
                        'password' => $hashPassword
                    );
                else :
                    $userData = array(
                        'firstname' => $_POST['firstname'],
                        'lastname' => $_POST['surname']
                    );
                endif;
                $this->customer_model->update_customer($userData);
                $user = $this->customer_model->get_one($this->session->rentalCustomer->email);
                $this->session->set_userdata('rentalCustomer', $user);
                $this->session->set_flashdata('updatesuccess', 'Your profile was updated successfully!!!');
                redirect(base_url('customer/profile'), 'refresh');
            }
        } else {
            $user = $this->session->rentalCustomer;
            $this->data['title'] = $user->firstname . ' ' . $user->lastname . ' Profile';
            $this->data['user'] = $user;
            $this->load->view('customer-dashboard/profile', $this->data);
        }
    }
}
