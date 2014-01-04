<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campaigns extends Users_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('campaigns_model', 'campaigns');
		$this->load->model('clients_model', 'clients');
		$this->load->model('webs_model', 'webs');
	}

	public function index(){
		if(!@$this->user) redirect('welcome/login');

		$id_user = $this->users->get_profile_user($this->user->email);

		$camp = $this->campaigns->get_campaigns_id($id_user->id);
		foreach ($camp as $key => $val) {
			$campaigns[] = array(
				'name' => $this->campaigns->get_campaigns_name($val->id)[0]->name,
				'client' => !empty($this->clients->get_client_name($val->id_client)->name) ? $this->clients->get_client_name($val->id_client)->name : '',
				'webs' => $this->campaigns->get_campaigns_web($val->id)
			);
		}
		$data = array(
			'content' => 'my_campaigns',
			'campaigns' => @$campaigns
		);

		$this->load->view('base', $data);
	}

	public function create_campaign(){
		if(!@$this->user) redirect('welcome/login');

		$id_user = $this->users->get_profile_user($this->user->email);
		$clients = $this->clients->get_clients($id_user->id);

		$data = array(
			'content' => 'create_campaign',
			'clients' => $clients
		);

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('website', 'Web Site', 'required');
		$this->form_validation->set_message('required', '<span class="alert label">The field %s is required</span>');

		if(!empty($_POST)){
			if($this->form_validation->run() == true){
				$idn_camp = $this->campaigns->insert_campaign($_POST['name'], $id_user->id, !empty($_POST['client']) ? $_POST['client'] : null );
				$idn_web = $this->webs->insert_web($_POST['website']);
				if($idn_camp and $idn_web){
					$this->campaigns->insert_rel_campweb($idn_camp, $idn_web);
					$data['success'] = '<span class="success label">The Campaign has been added</span>';
				}else{
					$data['success'] = '<span class="alert label">Error, try again</span>';
				}
				
			}
		}

		$this->load->view('base', $data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */