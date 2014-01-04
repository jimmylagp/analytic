<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Websites extends Users_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('clients_model', 'clients');
	}

	public function index(){
		if(!@$this->user) redirect('welcome/login');

		$data = array(
			'content' => 'my_websites'
		);

		$this->load->view('base', $data);
	}

	public function create_website(){
		if(!@$this->user) redirect('welcome/login');

		$data = array(
			'content' => 'create_website'
		);


		$this->load->view('base', $data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */