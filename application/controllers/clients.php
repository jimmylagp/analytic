<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clients extends Users_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('clients_model', 'clients');
	}

	public function index(){
		if(!@$this->user) redirect('welcome/login');

		$id_user = $this->users->get_profile_user($this->user->email);
		$clients = $this->clients->get_clients($id_user->id);

		$data = array(
			'content' => 'my_clients',
			'clients' => $clients
		);

		$this->load->view('base', $data);
	}

	public function create_client(){
		if(!@$this->user) redirect('welcome/login');

		$id_user = $this->users->get_profile_user($this->user->email);
		$clients = $this->clients->get_clients($id_user->id);

		$data = array(
			'content' => 'create_client',
			'clients' => $clients
		);

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_message('required', '<span class="alert label">The field %s is required</span>');

		if(!empty($_POST)){
			if($this->form_validation->run() == true){

				$client = array(
					'name' => $_POST['name'],
					'last_name' => $_POST['last_name'],
					'email' => $_POST['email'],
					'address' => $_POST['address'],
					'phone' => $_POST['phone'],
					'city' => $_POST['city'],
					'create_id' => 1,
					'create_date' => date('Y-m-d H:i:s',now()),
					'update_id' => 1,
					'update_date' => date('Y-m-d H:i:s',now()),
					'id_user' => $id_user->id
				);

				if($this->clients->insert_client($client)){
					$data['success'] = '<span class="success label">The Client has been added</span>';
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