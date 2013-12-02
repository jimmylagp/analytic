<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_Controller extends CI_Controller {

	public $user;

	function __construct(){
		parent::__construct();

		$this->load->model('users');

		$this->load->helper('url');
		$this->load->helper('form');

		$this->load->library('form_validation');

		$this->user = @$this->session->userdata('logged_user');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */