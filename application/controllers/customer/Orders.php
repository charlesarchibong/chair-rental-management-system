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
        if (!$this->session->rentalCustomer) {
            redirect(base_url());
        } else {

            $user = $this->customer_model->get_one($this->session->rentalCustomer->email);
            $this->data['title'] = $user->firstname . ' ' . $user->lastname . ' Orders';
            $this->data['user'] = $user;
            $this->data['orders'] = $this->orders_model->get_order_by_user($user->id);
            $this->load->view('customer-dashboard/orders', $this->data);
        }
    }

    public function make_order()
    {

        if ($this->input->post()) {
            $this->form_validation->set_rules('description', 'Description', 'trim|required');
            $this->form_validation->set_rules('duration', 'Duration', 'trim|required');
            if ($this->input->post('description') == 'chair' || $this->input->post('description') == 'table') {
                $this->form_validation->set_rules('default-quantity', 'Chair/Table Quantity', 'trim|required');
            } else {
                $this->form_validation->set_rules('chair-quantity', 'Chair Quantity', 'trim|required');
                $this->form_validation->set_rules('table-quantity', 'Table Quantity', 'trim|required');
            }
            if (!$this->session->rentalCustomer) {
                $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
                $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
                $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[rental_customers.email]');
                $this->form_validation->set_rules('password', 'Password', 'trim|required');
                $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'trim|required|matches[password]');
            }
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('ordererror', validation_errors());
                redirect(base_url(), 'refresh');
            } else {
                $user = NULL;
                if (!$this->session->rentalCustomer) {
                    $hashPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $userData = array(
                        'firstname' => $_POST['firstname'],
                        'lastname' => $_POST['lastname'],
                        'email' => $_POST['email'],
                        'password' => $hashPassword,
                        'id' => random_string('alpha', '50')
                    );
                    $this->customer_model->register_customer($userData);
                    $user = $this->customer_model->get_one($_POST['email']);
                    $this->session->set_userdata('rentalCustomer', $user);
                } else {
                    $user = $this->customer_model->get_one($this->session->rentalCustomer->email);
                }
                $description = ($this->input->post('description') == 'both') ? 'Chair and Table' : $this->input->post('description');
                $chair_quantity = 0;
                $table_quantity = 0;
                switch ($this->input->post('description')) {
                    case 'chair':
                        $chair_quantity = $this->input->post('default-quantity');
                        break;
                    case 'table':
                        $table_quantity = $this->input->post('default-quantity');
                        break;
                    default:
                        $chair_quantity = $this->input->post('chair-quantity');
                        $table_quantity = $this->input->post('table-quantity');
                        break;
                }
                $orderId = $this->orders_model->generate_orderid();
                $chair_price = $this->orders_model->chair_price * $chair_quantity;
                $table_price = $this->orders_model->table_price * $table_quantity;
                $orderData = array(
                    'orderId'  => $orderId,
                    'ordered_by' => $user->email,
                    'customerId' => $user->id,
                    'description' => $description,
                    'chair_quantity' => $chair_quantity,
                    'table_quantity' => $table_quantity,
                    'duration' => $this->input->post('duration'),
                    'amount' => ($chair_price + $table_price) * $this->input->post('duration'),
                    'ordered_date' => date("Y-m-d h:i:sa")
                );
                if ($this->orders_model->add_order($orderData)) {
                    $this->session->set_flashdata('ordersuccess', 'Your order with OrderID ' . $orderId . ' was  successfully made, please make payment to complete order');
                    redirect(base_url('customer/orders'), 'refresh');
                } else {
                    $this->session->set_flashdata('ordererror', 'Your order with OrderID ' . $orderId . ' was not successfully, please try again!');
                    redirect(base_url(), 'refresh');
                }
            }
        } else {
            if (!$this->session->rentalCustomer) {
                redirect(base_url());
            } else {
                $user = $this->customer_model->get_one($this->session->rentalCustomer->email);
                $this->data['title'] = $user->firstname . ' ' . $user->lastname . ' Make Order';
                $this->data['user'] = $user;
                $this->load->view('customer-dashboard/make_order', $this->data);
            }
        }
    }

    public function approved_orders()
    {
        if (!$this->session->rentalCustomer) {
            redirect(base_url());
        } else {
            $user = $this->customer_model->get_one($this->session->rentalCustomer->email);
            $this->data['title'] = $user->firstname . ' ' . $user->lastname . ' Approved Orders';
            $this->data['user'] = $user;
            $this->data['orders'] = $this->orders_model->get_order_by_user($user->id);
            $this->load->view('customer-dashboard/approved_orders', $this->data);
        }
    }
    public function pending_orders()
    {
        if (!$this->session->rentalCustomer) {
            redirect(base_url());
        } else {
            $user = $this->customer_model->get_one($this->session->rentalCustomer->email);
            $this->data['title'] = $user->firstname . ' ' . $user->lastname . ' Pending Orders';
            $this->data['user'] = $user;
            $this->data['orders'] = $this->orders_model->get_order_by_user($user->id);
            $this->load->view('customer-dashboard/pending_orders', $this->data);
        }
    }

    public function declined_orders()
    {

        if (!$this->session->rentalCustomer) {
            redirect(base_url());
        } else {
            $user = $this->customer_model->get_one($this->session->rentalCustomer->email);
            $this->data['title'] = $user->firstname . ' ' . $user->lastname . ' Declined Orders';
            $this->data['user'] = $user;
            $this->data['orders'] = $this->orders_model->get_order_by_user($user->id);
            $this->load->view('customer-dashboard/declined_orders', $this->data);
        }
    }

    public function get_order()
    {
        if ($this->input->get('orderId')) {
            $order = $this->orders_model->get_one_by_id($this->input->get('orderId'));
            $user = $this->customer_model->get_one_by_id($order->customerId);
            echo json_encode(array('order' => $order, 'user' => $user));
        }
    }
    public function update_order()
    {
        if ($this->input->post('orderId')) {
            if ($this->input->post('transactionId')) :
                $data = array(
                    'orderId' => $this->input->post('orderId'),
                    'payment_status' => 'Paid',
                    'transactionId' => $this->input->post('transactionId')
                );
                $this->session->set_flashdata('ordersuccess', 'Your payment for was successfully for order with OrderID ' . $this->input->post('orderId'));
            else :
                $data = array(
                    'orderId' => $this->input->post('orderId'),
                    'status' => 'Approved',
                    'approved_date' => date("Y-m-d h:i:sa"),
                    'approved_by' => $this->session->rentalAdmin->email,
                );
            endif;
            $order = $this->orders_model->update_order($data);
            echo json_encode(array('order' => $order));
        }
    }
}
