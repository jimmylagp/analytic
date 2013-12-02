<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends Users_Controller {

	public function index(){
		if(!@$this->user) redirect('welcome/login');

		$data = array(
			'content' => 'home',
			'user' => $this->users->get_profile_user($this->user->email)
		);

		$config = array(
			'upload_path' => './pictures/',
			'allowed_types' => 'gif|jpg|jpeg|png',
			'max_size' => '5000',
			'max_width' => '200',
			'max_height' => '200'
		);
		$this->load->library('upload',$config);


		$this->form_validation->set_rules('email', 'E-mail', 'required');
		$this->form_validation->set_message('required', '<span class="alert label">The field %s is required</span>');

		if(!empty($_POST)){
			if($this->form_validation->run() == true){

				if(!$this->upload->do_upload('avatar')){
					//$this->upload->display_errors();
				}else {
					$picture = $this->upload->data();
				}

				$user = array(
					'name' => $_POST['name'],
					'last_name' => $_POST['last_name'],
					'email' => $_POST['email'],
					'picture' => isset($picture['file_name']) ? $picture['file_name'] : '',
					'birthday' => $_POST['birthday'],
					'gender' => isset($_POST['gender']) ? $_POST['gender'] : '' ,
					'city' => $_POST['city'],
					'occupation' => $_POST['occupation'],
					'phone' => $_POST['phone'],
					'address' => $_POST['address']
				);
				$this->users->update_user($user);
				
			}
		}

		$this->load->view('base', $data);
	}
	
	public function login(){

		$data = array();

		$this->form_validation->set_rules('email', 'E-mail', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_message('required', '<span class="alert label">The field %s is required</span>');

		if(!empty($_POST)){
			if($this->form_validation->run() == true){

				$logged_user = $this->users->validate_user($_POST['email'], $_POST['password']);

				if($logged_user){
					$this->session->set_userdata('logged_user', $logged_user);
					redirect('welcome/index');
				}else {
					$data['error_login'] = true;
				}

			}
		}
		$this->load->view('login', $data);
	}

	public function logout(){
		$this->session->unset_userdata('logged_user');
		redirect('welcome/index');
	}

	public function create_account(){
		if(@$this->user) redirect('welcome/login');
		$data = array();

		$this->form_validation->set_rules('email', 'E-mail', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('repassword', 'Re-Password', 'required');
		$this->form_validation->set_message('required', '<span class="alert label">The field %s is required</span>');

		if(!empty($_POST)){
			if($this->form_validation->run() == true){

				$exist_user = $this->users->user_exist($_POST['email']);

				if($exist_user){
					$data['error_exist'] = true;
				}else {
					$this->users->insert_user($_POST['email'], $_POST['password']);
					$data['regist_success'] = true;
				}

			}
		}
		$this->load->view('registration', $data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */