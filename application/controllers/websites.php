<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Websites extends Users_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('clients_model', 'clients');
		$this->load->model('users');
		$this->load->model('webs_model', 'webs');
		$this->load->model('traffic_model', 'traffic');
		$this->load->library('simple_html_dom');
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

	public function show_website($id){
		if(!@$this->user) redirect('welcome/login');

		$user = $this->users->get_profile_user($this->user->email);
		$traffic = $this->traffic->get_traffic_per_moth($user->id, $id);

		$data = array(
			'content' => 'show_website',
			'traffic' => $traffic,
			'browsers' => $this->traffic->get_traffic_by($user->id, $id, 'browser'),
			'os' => $this->traffic->get_traffic_by($user->id, $id, 'operating_system'),
			'country' => $this->traffic->get_traffic_by($user->id, $id, 'country'),
			'language' => $this->traffic->get_traffic_by($user->id, $id, 'language')
		);


		$this->load->view('base', $data);
	}

	public function scraping(){
		$url  = 'http://www.google.com.mx/search?hl=en&safe=active&tbo=d&site=&source=hp&q=estructura+basica+de+un+documento+html5&oq=estructura+basica+de+un+documento+html5';
		$html = file_get_html($url);

		$linkObjs = $html->find('h3.r a');
		foreach ($linkObjs as $linkObj) {
		    $title = trim($linkObj->plaintext);
		    $link  = trim($linkObj->href);
		    
		    // if it is not a direct link but url reference found inside it, then extract
		    if (!preg_match('/^https?/', $link) && preg_match('/q=(.+)&amp;sa=/U', $link, $matches) && preg_match('/^https?/', $matches[1])) {
		        $link = $matches[1];
		    } else if (!preg_match('/^https?/', $link)) { // skip if it is not a valid link
		        continue;    
		    }
		    
		    echo '<p>Titulo: ' . $title . '<br />';
		    echo 'Enlace: ' . $link . '</p>';    
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */