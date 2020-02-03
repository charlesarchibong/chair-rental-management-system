<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pin_Model extends CI_Model
{
    private $table_name = 'admin_pins';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert_pin($data)
    {
        return $this->db->insert($this->table_name, $data);
    }
    public function update_pin($data)
    {
        $opt['pin'] = $data['pin'];
        $this->db->where($opt);
        return $this->db->update($this->table_name, $data);
    }
    public function authenticated_pin($pin)
    {
        $opt['pin'] = $pin;
        $this->db->where($opt);
        $pin = $this->db->get($this->table_name)->row();
        return $pin;
    }

    public function get_pins()
    {
        $query = $this->db->get($this->table_name);
        return $query->result();
    }
}
