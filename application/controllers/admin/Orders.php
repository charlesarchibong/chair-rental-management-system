<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Orders extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('form', 'string'));
        $this->load->model(array('customer_model', 'admin_model', 'orders_model'));
    }

    public function index()
    {
        if (!$this->session->rentalAdmin) {
            redirect(base_url());
        } else {

            $user = $this->admin_model->get_one($this->session->rentalAdmin->email);
            $this->data['title'] = $user->first_name . ' ' . $user->surname . ' Orders';
            $this->data['user'] = $user;
            $this->data['orders'] = $this->orders_model->get_orders();
            $this->load->view('admin-dashboard/orders', $this->data);
        }
    }



    public function approved_orders()
    {
        if (!$this->session->rentalAdmin) {
            redirect(base_url());
        } else {
            $user = $this->admin_model->get_one($this->session->rentalAdmin->email);
            $this->data['title'] = $user->first_name . ' ' . $user->surname . ' Approved Orders';
            $this->data['user'] = $user;
            $this->data['orders'] = $this->orders_model->get_orders();
            $this->load->view('admin-dashboard/approved_orders', $this->data);
        }
    }
    public function pending_orders()
    {
        if (!$this->session->rentalAdmin) {
            redirect(base_url());
        } else {
            $user = $this->admin_model->get_one($this->session->rentalAdmin->email);
            $this->data['title'] = $user->first_name . ' ' . $user->surname . ' Approved Orders';
            $this->data['user'] = $user;
            $this->data['orders'] = $this->orders_model->get_orders();
            $this->load->view('admin-dashboard/pending_orders', $this->data);
        }
    }

    public function declined_orders()
    {

        if (!$this->session->rentalAdmin) {
            redirect(base_url());
        } else {
            $user = $this->admin_model->get_one($this->session->rentalAdmin->email);
            $this->data['title'] = $user->first_name . ' ' . $user->surname . ' Approved Orders';
            $this->data['user'] = $user;
            $this->data['orders'] = $this->orders_model->get_orders();
            $this->load->view('admin-dashboard/declined_orders', $this->data);
        }
    }
}
