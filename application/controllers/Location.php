<?php
class Location extends CI_Controller {

	public function index()
	{
		$client = new GuzzleHttp\Client();
		$response = $client->request('GET',"localhost:8080/lokasi");
		$data['locations'] = json_decode($response->getBody());


		$this->load->view('templates/header');
		$this->load->view('location/index', $data);
		$this->load->view('templates/footer');
	}

	public function form() {

		$this->form_validation->set_rules('namaLokasi', 'nama lokasi', 'required|max_length[100]');
		$this->form_validation->set_rules('kota', 'kota', 'required|max_length[100]');
		$this->form_validation->set_rules('provinsi', 'provinsi', 'required|max_length[100]');
		$this->form_validation->set_rules('negara', 'negara', 'required|max_length[100]');


		if($this->form_validation->run() == FALSE){
			$this->load->view('templates/header');
			$this->load->view('location/addLocationForm');
			$this->load->view('templates/footer');
		}else{
			$client = new GuzzleHttp\Client();
			$data = [
				'namaLokasi' => $this->input->post('namaLokasi', true),
				'kota'=> $this->input->post('kota', true),
				'provinsi' => $this->input->post('provinsi', true),
				'negara'=> $this->input->post('negara', true)
			];
			try {
				$response = $client->post("localhost:8080/lokasi", ['json' => $data]);
			} catch (exception $e) {
				if($e->getResponse()->getStatusCode() == 400){
					$this->session->set_flashdata('flash', 'gagal ditambahkan');
					redirect('location');
				}
			}
			var_dump($response->getStatusCode());
			var_dump($response->getBody());
			$this->session->set_flashdata('flash', 'berhasil ditambahkan');
			redirect('location');
		}
	}

	public function delete($id) {
		$client = new GuzzleHttp\Client();
		try {
			$response = $client->delete("localhost:8080/lokasi/".$id);
		} catch (exception $e) {
			if($e->getResponse()->getStatusCode() == 404){
				show_404();
			}
		}
		if($response->getStatusCode() != 200){
			$this->session->set_flashdata('flash', 'gagal Dihapus');
		}else{
			$this->session->set_flashdata('flash', 'berhasil Dihapus');
		}
		redirect('location');
	}

	public function update($id) {
		$client = new GuzzleHttp\Client();
		try{
			$response = $client->get("localhost:8080/lokasi/".$id);
		}catch(Exception $e){
			if($e->getResponse()->getStatusCode() == 404){
				show_404();
			}
		}
		$data['location'] = json_decode($response->getBody());

		$this->form_validation->set_rules('namaLokasi', 'nama lokasi', 'required|max_length[100]');
		$this->form_validation->set_rules('kota', 'kota', 'required|max_length[100]');
		$this->form_validation->set_rules('provinsi', 'provinsi', 'required|max_length[100]');
		$this->form_validation->set_rules('negara', 'negara', 'required|max_length[100]');


		if($this->form_validation->run() == FALSE){
			$this->load->view('templates/header');
			$this->load->view('location/updateLocationForm', $data);
			$this->load->view('templates/footer');
		}else{
			$client = new GuzzleHttp\Client();
			$data = [
				'namaLokasi' => $this->input->post('namaLokasi', true),
				'kota'=> $this->input->post('kota', true),
				'provinsi' => $this->input->post('provinsi', true),
				'negara'=> $this->input->post('negara', true)
			];
			try {
				$response = $client->put("localhost:8080/lokasi/".$id, ['json' => $data]);
			} catch (exception $e) {
				if($e->getResponse()->getStatusCode() == 404){
					show_404();
				}
			}
			var_dump($response->getStatusCode());
			var_dump($response->getBody());
			$this->session->set_flashdata('flash', 'berhasil diubah');
			redirect('location');
		}
	}
}