<?php
class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('home/index');
		$this->load->view('templates/footer');
	}

	public function form() {
		$this->load->view('templates/header');
		$this->load->view('home/addProjectForm');
		$this->load->view('templates/footer');
	}
}