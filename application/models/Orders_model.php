<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Orders_model extends CI_Model
{
    private $table_name = 'rental_orders';
    public $chair_price = 20;
    public $table_price = 100;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add_order($data)
    {
        return $this->db->insert($this->table_name, $data);
    }

    public function get_orders()
    {
        $this->db->order_by('sn', "desc");
        return $this->db->get($this->table_name)->result();
    }
    public function get_approved_orders()
    {
        $opt = array('status' => 'Approved');
        $this->db->order_by('sn', "desc");
        return $this->db->get_where($this->table_name, $opt)->result();
    }
    public function get_cusapproved_orders($customer_id)
    {
        $opt = array('status' => 'Approved', 'customerId' => $customer_id);
        $this->db->order_by('sn', "desc");
        return $this->db->get_where($this->table_name, $opt)->result();
    }
    public function get_declined_orders()
    {
        $opt = array('status' => 'Declined');
        $this->db->order_by('sn', "desc");
        return $this->db->get_where($this->table_name, $opt)->result();
    }
    public function get_cusdeclined_orders($customer_id)
    {
        $opt = array('status' => 'Declined', 'customerId' => $customer_id);
        $this->db->order_by('sn', "desc");
        return $this->db->get_where($this->table_name, $opt)->result();
    }
    public function get_pending_orders()
    {
        $opt = array('status' => 'Pending');
        $this->db->order_by('sn', "desc");
        return $this->db->get_where($this->table_name, $opt)->result();
    }
    public function get_cuspending_orders($customer_id)
    {
        $opt = array('status' => 'Pending', 'customerId' => $customer_id);
        $this->db->order_by('sn', "desc");
        return $this->db->get_where($this->table_name, $opt)->result();
    }

    public function get_order_by_user($customer_id)
    {
        $opt = array('customerId' => $customer_id);
        $this->db->where($opt);
        $this->db->order_by('sn', "desc");
        return $this->db->get($this->table_name)->result();
    }

    public function get_one_by_id($id)
    {
        $opt = array('orderId' => $id);
        $this->db->where($opt);
        $order = $this->db->get($this->table_name)->row();
        if (count((array) $order) > 0) {
            return $order;
        } else {
            return null;
        }
    }

    public function update_order($data)
    {
        $opt = array('orderId' => $data["orderId"]);
        $this->db->where($opt);
        return $this->db->update($this->table_name, $data);
    }

    public function generate_orderid()
    {
        $last_row = $this->db->select('*')->order_by('sn', "desc")->limit(1)->get($this->table_name)->row();
        if ($last_row) {
            return 'REN-' . $last_row->sn++;
        } else {
            return 'REN-0';
        }
    }
}
