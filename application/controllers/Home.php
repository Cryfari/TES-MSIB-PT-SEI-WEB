<?php
class Home extends CI_Controller {

	public function index()
	{
		$client = new GuzzleHttp\Client();
		$response = $client->request('GET',"localhost:8080/proyek");
		$data['projects'] = json_decode($response->getBody());
		// var_dump(date_format(date_create($data['projects']->data[0]->tanggalMulai),"Y/m/d H:i:s"));
		// $date = new DateTime($data['projects']->data[0]->tanggalMulai);
		// var_dump($date->modify('+7 hour'));

		$this->load->view('templates/header');
		$this->load->view('home/index', $data);
		$this->load->view('templates/footer');
	}

	public function form() {
		$this->load->view('templates/header');
		$this->load->view('home/addProjectForm');
		$this->load->view('templates/footer');
	}
}