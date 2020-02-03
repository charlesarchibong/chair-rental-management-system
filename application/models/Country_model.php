<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Country_model extends CI_Model
{
    private $country_table = 'countries';
    private $state_table = 'states';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_countries()
    {
        $query = $this->db->get($this->country_table);
        return $query->result();
    }

    public function get_country($country_id)
    {
        return $this->db->get_where($this->country_table, array('country_id' => $country_id))->row();
    }

    public function get_state($country_id)
    {
        return $this->db->get_where($this->state_table, array('country_id' => $country_id))->result();
    }
}
