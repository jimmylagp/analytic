<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Websites extends Users_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('clients_model', 'clients');
		$this->load->model('users');
		$this->load->model('webs_model', 'webs');
	}

	public function index(){
		if(!@$this->user) redirect('welcome/login');

		$user = $this->users->get_profile_user($this->user->email);
		$webs = $this->webs->get_web_traffic($user->id);

		$CI =& get_instance();
		$CI->load->library('encrypt');

		$data = array(
			'content' => 'my_websites',
			'websites' => $webs,
			'encrypts' => $CI->encrypt
		);
		$this->load->view('base', $data);
	}

	public function create_website(){
		if(!@$this->user) redirect('welcome/login');

		/*$data = array(
			'content' => 'create_website'
		);


		$this->load->view('base', $data);*/
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */