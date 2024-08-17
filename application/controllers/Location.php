<?php
class Location extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('location/index');
		$this->load->view('templates/footer');
	}

	public function form() {
		$this->load->view('templates/header');
		$this->load->view('location/addLocationForm');
		$this->load->view('templates/footer');
	}
}