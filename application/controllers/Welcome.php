<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
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
		$data['title'] = "Rental - Home";
		$this->load->view('landing/home-page', $data);
	}
	public function about()
	{
		$data['title'] = "Rental - About";
		$this->load->view('landing/about', $data);
	}
	public function blog_home()
	{
		$data['title'] = "Rental - Blog Home";
		$this->load->view('landing/blog-home', $data);
	}
	public function single()
	{
		$data['title'] = "Rental - Blog Single";
		$this->load->view('landing/blog-single', $data);
	}
	public function cars()
	{
		$data['title'] = "Rental - Cars";
		$this->load->view('landing/cars', $data);
	}
	public function contact()
	{
		$data['title'] = "Rental - Contact";
		$this->load->view('landing/contact', $data);
	}
	public function elements()
	{
		$data['title'] = "Rental - Elements";
		$this->load->view('landing/elements', $data);
	}
	public function service()
	{
		$data['title'] = "Rental - Service";
		$this->load->view('landing/service', $data);
	}
	public function team()
	{
		$data['title'] = "Rental - Team";
		$this->load->view('landing/team', $data);
	}
}
