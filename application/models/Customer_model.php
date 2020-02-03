<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Customer_model extends CI_Model
{
    private $table_name = 'rental_customers';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function register_customer($data)
    {
        $this->db->insert($this->table_name, $data);
    }
    public function update_customer($data)
    {
        $this->db->where(array('id' => $this->session->rentalCustomer->id));
        $this->db->update($this->table_name, $data);
    }

    public function get_one($email)
    {
        $opt = array('email' => $email);
        $this->db->where($opt);
        $user = $this->db->get($this->table_name)->row();
        if (count((array) $user) > 0) {
            return $user;
        } else {
            return null;
        }
    }

    public function get_one_by_id($id)
    {
        $opt = array('id' => $id);
        $this->db->where($opt);
        $user = $this->db->get($this->table_name)->row();
        if (count((array) $user) > 0) {
            return $user;
        } else {
            return null;
        }
    }
    public function get_customers()
    {
        return $this->db->get($this->table_name)->result();
    }
}
