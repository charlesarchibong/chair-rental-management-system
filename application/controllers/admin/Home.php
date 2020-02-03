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
        if (!$this->session->rentalAdmin) {
            redirect(base_url('admin/login'));
        }
    }

    public function index()
    {
        $user = $this->session->rentalAdmin;
        $this->data['title'] = $user->first_name . ' ' . $user->surname . ' Dashboard';
        $this->data['user'] = $user;
        $this->data['orders'] = $this->orders_model->get_orders();
        $this->data['approved_orders'] = $this->orders_model->get_approved_orders();
        $this->data['pending_orders'] = $this->orders_model->get_pending_orders();
        $this->data['declined_orders'] = $this->orders_model->get_declined_orders();
        $this->load->view('admin-dashboard/index', $this->data);
    }

    public function admin_list()
    {
        $user = $this->session->rentalAdmin;
        $this->data['title'] = $user->first_name . ' ' . $user->surname . ' Admin List';
        $this->data['user'] = $user;
        $this->data['admins'] = $this->admin_model->get_admins();
        $this->load->view('admin-dashboard/admin_list', $this->data);
    }
    public function profile()
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
                redirect(base_url('admin/profile'), 'refresh');
            } else {
                $userData =  (array) null;
                if ($this->input->post('password')) :
                    $hashPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $userData = array(
                        'first_name' => $_POST['firstname'],
                        'surname' => $_POST['surname'],
                        'password' => $hashPassword
                    );
                else :
                    $userData = array(
                        'first_name' => $_POST['firstname'],
                        'surname' => $_POST['surname']
                    );
                endif;
                $this->admin_model->update_admin($userData);
                $user = $this->admin_model->get_one($this->session->rentalAdmin->email);
                $this->session->set_userdata('rentalAdmin', $user);
                $this->session->set_flashdata('updatesuccess', 'Your profile was updated successfully!!!');
                redirect(base_url('admin/profile'), 'refresh');
            }
        } else {
            $user = $this->session->rentalAdmin;
            $this->data['title'] = $user->first_name . ' ' . $user->surname . ' Admin List';
            $this->data['user'] = $user;
            $this->load->view('admin-dashboard/profile', $this->data);
        }
    }


    public function pin()
    {
        $user = $this->session->rentalAdmin;
        $this->data['user'] = $user;
        $this->data['title'] = $user->first_name . ' ' . $user->surname . ' Admin List';
        $pins = $this->pin_model->get_pins();
        $this->data['pins'] = $pins;
        $this->load->view('admin-dashboard/admin_pin', $this->data);
    }
    public function generate_pin()
    {
        $user = $this->session->rentalAdmin;
        $data = array(
            'pin' => random_string('alnum', 15),
            'created_by' => $user->email,
            'date_created' => date('Y-m-d g:i:s', time()),
        );
        if ($this->pin_model->insert_pin($data)) {
            $this->session->set_userdata('pinMsg', 'Pin was generated sucessfully!');
            redirect(base_url('admin/pin'));
        } else {
            $this->session->set_userdata('loginError', 'Pin was not generated, try again!');
            redirect(base_url('admin/pin'));
        }
    }

    public function customers()
    {
        $user = $this->session->rentalAdmin;
        $this->data['title'] = $user->first_name . ' ' . $user->surname . ' Admin List';
        $this->data['user'] = $user;
        $this->data['customers'] = $this->customer_model->get_customers();
        $this->load->view('admin-dashboard/customers', $this->data);
    }
}
