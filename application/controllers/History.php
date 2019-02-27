<?php
class History extends CI_Controller {

	public function index()
	{	
		$this->load->model('Exchange_rates');
		$data['previos_currency'] = $this->Exchange_rates->get_exchange_rate_from_db();

		$this->load->view('history', $data);

	}
}
