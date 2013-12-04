<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campaigns extends Users_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('campaigns_model', 'campaigns');
		$this->load->model('clients_model', 'clients');
	}

	public function index(){
		if(!@$this->user) redirect('welcome/login');

		$id_user = $this->users->get_profile_user($this->user->email);

		$camp = $this->campaigns->get_campaigns_id($id_user->id);
		foreach ($camp as $key => $val) {
			$campaigns[] = array(
				'name' => $this->campaigns->get_campaigns_name($val->id)[0]->name,
				'client' => $this->clients->get_client_name($val->id_client)->name,
				'webs' => $this->campaigns->get_campaigns_web($val->id)
			);
		}
		$data = array(
			'content' => 'my_campaigns',
			'campaigns' => $campaigns
		);
		$this->load->view('base', $data);
	}


	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */