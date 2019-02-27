<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{	
		$this->load->model('Exchange_rates');
		$currency = $this->Exchange_rates->get_current_exchange_rate();
		$data['usd'] = $currency['usd'];
		$data['eur'] = $currency['eur'];

		$this->output->cache(10);
		
		$data['latest_usd_rate'] = $this->Exchange_rates->get_latest_exchange_rate_from_db();
		if($data['usd'] != $data['latest_usd_rate']){
			$this->Exchange_rates->add_exchange_rate_to_db();
		}
		
		$this->load->view('welcome_message', $data);
		
		
	}
}
