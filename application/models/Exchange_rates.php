<?php
class Exchange_rates extends CI_Model {

public function get_current_exchange_rate()
{
        $link = 'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5';
        $data = file_get_contents($link);
        $rates = json_decode($data, true);

        $currancy = array();
        foreach($rates as $exchange_rate){
                if($exchange_rate['ccy'] == 'USD'){
                        $currancy['usd'] = round($exchange_rate['buy'], 2);
                }
                if($exchange_rate['ccy'] == 'EUR'){
                        $currancy['eur'] = round($exchange_rate['buy'], 2);
                        break;
                }
        }
        return $currancy;
}

public function add_exchange_rate_to_db(){
        
        $currancy = $this->get_current_exchange_rate();
        $data = array(
                'USD' => $currancy['usd'],
                'EUR' => $currancy['eur'],
        );
        $this->db->insert('exchange_rates', $data);
}

public function get_exchange_rate_from_db(){
        $sql = 'SELECT * FROM `exchange_rates`';
        $query = $this->db->query($sql);
        return $query->result_array();
}
public function get_latest_exchange_rate_from_db(){
        $sql = 'SELECT * FROM `exchange_rates` order by `id` desc limit 1';
        $query = $this->db->query($sql);
        foreach($query->result_array() as $row) {
                $last_USD_rate = $row['USD'];
        }
        return $last_USD_rate;

}
}