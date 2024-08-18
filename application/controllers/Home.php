<?php
class Home extends CI_Controller {

	public function index()
	{
		$client = new GuzzleHttp\Client();
		$response = $client->request('GET',"localhost:8080/proyek");
		$data['projects'] = json_decode($response->getBody());
		$lokasi = [
			"namaLokasi" => "Tidak Tersedia"
		];
		foreach($data['projects']->data as $row){
			if (is_null($row->lokasi)){
				$row->lokasi = json_decode(json_encode($lokasi));
			}
		}
		$this->load->view('templates/header');
		$this->load->view('home/index', $data);
		$this->load->view('templates/footer');
	}

	public function form() {
		$this->form_validation->set_rules('namaProyek', 'nama proyek', 'required|max_length[100]');
		$this->form_validation->set_rules('client', 'client', 'required|max_length[100]');
		$this->form_validation->set_rules('pimpinanProyek', 'pimpinan proyek', 'required|max_length[100]');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required');
		$this->form_validation->set_rules('tanggalMulai', 'tanggal mulai', 'required');
		$this->form_validation->set_rules('tanggalSelesai', 'tanggal selesai', 'required');
		$client = new GuzzleHttp\Client();
		if($this->form_validation->run() == FALSE){
			$response = $client->request('GET',"localhost:8080/lokasi");
			$data['locations'] = json_decode($response->getBody());
			$this->load->view('templates/header');
			$this->load->view('home/addProjectForm', $data);
			$this->load->view('templates/footer');
		}else{
			$tanggalMulai = new DateTime($this->input->post('tanggalMulai'));
			$tanggalSelesai = new DateTime($this->input->post('tanggalSelesai'));
			$data = [
				'namaProyek' => $this->input->post('namaProyek', true),
				'client'=> $this->input->post('client', true),
				'tanggalMulai' => $tanggalMulai->format('Y-m-d\TH:i:s\Z'),
				'tanggalSelesai'=> $tanggalSelesai->format('Y-m-d\TH:i:s\Z'),
				'pimpinanProyek' => $this->input->post('pimpinanProyek', true),
				'keterangan'=> $this->input->post('keterangan', true),
				'lokasiId' => $this->input->post('lokasiId', true),
			];
			try {
				$response = $client->post("localhost:8080/proyek", ['json' => $data]);
			} catch (exception $e) {
				var_dump($e->getResponse()->getBody()->getContents());
				if($e->getResponse()->getStatusCode() == 400){
					$this->session->set_flashdata('flash', 'gagal ditambahkan');
					redirect('home');
				}
			}
			$this->session->set_flashdata('flash', 'berhasil ditambahkan');
			redirect('home');
		}
	}

	public function delete($id) {
		$client = new GuzzleHttp\Client();
		try {
			$response = $client->delete("localhost:8080/proyek/".$id);
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
		redirect('home');
	}

	public function update($id) {
		$client = new GuzzleHttp\Client();
		try{
			$response = $client->get("localhost:8080/proyek/".$id);
		}catch(Exception $e){
			if($e->getResponse()->getStatusCode() == 404){
				show_404();
			}
		}
		$data['project'] = json_decode($response->getBody());
		try{
			$response = $client->get("localhost:8080/lokasi");
		}catch(Exception $e){
			if($e->getResponse()->getStatusCode() == 404){
				show_404();
			}
		}
		$data['locations'] = json_decode($response->getBody());

		$this->form_validation->set_rules('namaProyek', 'nama proyek', 'required|max_length[100]');
		$this->form_validation->set_rules('client', 'client', 'required|max_length[100]');
		$this->form_validation->set_rules('pimpinanProyek', 'pimpinan proyek', 'required|max_length[100]');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required');
		$this->form_validation->set_rules('tanggalMulai', 'tanggal mulai', 'required');
		$this->form_validation->set_rules('tanggalSelesai', 'tanggal selesai', 'required');


		if($this->form_validation->run() == FALSE){
			$this->load->view('templates/header');
			$this->load->view('home/updateProjectForm', $data);
			$this->load->view('templates/footer');
		}else{
			$tanggalMulai = new DateTime($this->input->post('tanggalMulai'));
			$tanggalSelesai = new DateTime($this->input->post('tanggalSelesai'));
			$data = [
				'namaProyek' => $this->input->post('namaProyek', true),
				'client'=> $this->input->post('client', true),
				'tanggalMulai' => $tanggalMulai->format('Y-m-d\TH:i:s\Z'),
				'tanggalSelesai'=> $tanggalSelesai->format('Y-m-d\TH:i:s\Z'),
				'pimpinanProyek' => $this->input->post('pimpinanProyek', true),
				'keterangan'=> $this->input->post('keterangan', true),
				'lokasiId' => $this->input->post('lokasiId', true),
			];
			try {
				$response = $client->put("localhost:8080/proyek/".$id, ['json' => $data]);
			} catch (exception $e) {
				if($e->getResponse()->getStatusCode() == 404){
					show_404();
				}
			}
			var_dump($response->getStatusCode());
			var_dump($response->getBody());
			$this->session->set_flashdata('flash', 'berhasil diubah');
			redirect('home');
		}
	}
}