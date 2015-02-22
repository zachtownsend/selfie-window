<?php namespace controllers;
use core\view;

/*
 * Welcome controller
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class Instagram extends \core\controller {

	/**
	 * Call the parent construct
	 */
	public function __construct(){
		parent::__construct();

		//$this->language->load('welcome');

	}
	public $client = "4e4cf54581634f3a9e1d6c9a23fe53f9";  
	public $query = 'selfie';
	public $amount = 50;
	
	public function getTagsApi() {
		return 'https://api.instagram.com/v1/tags/'.$this->query.'/media/recent?client_id='.$this->client;
	}

	public function get_curl($url) {  
	    if(function_exists('curl_init')) {  
	        $ch = curl_init();  
	        curl_setopt($ch, CURLOPT_URL,$url);  
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
	        curl_setopt($ch, CURLOPT_HEADER, 0);  
	        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);  
	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);   
	        $output = curl_exec($ch);  
	        echo curl_error($ch);  
	        curl_close($ch);  
	        return $output;  
	    } else{  
	        return file_get_contents($url);  
	    }
	} 
	
	public function getTags($api) { 
		return $this->get_curl($api);
	}

	public function getImgArray() {
		$array = array();
		$data = json_decode($this->getTags($this->getTagsApi()));
		$image = $data->data;
		$next_url = $data->pagination->next_url;

		$count = 0;
		for($i = 0; $i < $this->amount; $i++) {
			
			$count++;
			if($count >= 20) {
				$count = 0;
				$data = json_decode($this->getTags($next_url));
				$image = $data->data;
				$next_url = $data->pagination->next_url;
			}
			array_push($array, $image[$count]->images->standard_resolution->url);
		}
		
		return($array);

	}

	public function getJSON() {
		
		header('Content-type: application/json');
		
		
		$json = json_encode($this->getImgArray());
		echo $json;
	}





}
