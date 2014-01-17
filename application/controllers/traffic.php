<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Traffic extends Users_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('traffic_model', 'traffic');

		$this->load->library('encrypt');
	}

	public function index(){
		//redirect('welcome/login');
		$response = null;

		$post = file_get_contents("php://input");

		print_r($post);

		if(!empty($post)){
			$tf = json_decode($post);

			$data = array(
				'url' => $tf->url,
				'browser' => $tf->browser,
				'operating_system' => $tf->os,
				'country' => $tf->country,
				'language' => $tf->language,
				'date_visit' => $tf->date,
				'hour_visit' => $tf->hour,
				'id_website' => $this->encrypt->decode($tf->website)
			);

			$this->traffic->insert_traffic($data);

			$response = array(
				'message' => 'Traffic has been added',
				'error_code' => 1
			);

			print(json_encode($response));
		}else {
			$response = array(
				'message' => 'Error method not found',
				'error_code' => 2
			);

			print(json_encode($response));
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */