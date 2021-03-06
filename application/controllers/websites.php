<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Websites extends Users_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('clients_model', 'clients');
		$this->load->model('users');
		$this->load->model('webs_model', 'webs');
		$this->load->model('traffic_model', 'traffic');
		$this->load->model('sarguments_model', 'sargument');
		$this->load->library('simple_html_dom');
	}

	public function index(){
		if(!@$this->user) redirect('welcome/login');

		$user = $this->users->get_profile_user($this->user->email);
		$webs = $this->webs->get_web_by_user($user->id);

		$CI =& get_instance();
		$CI->load->library('encrypt');

		$websites = array();

		foreach ($webs as $key => $value) {
			$websites[] = array(
				'domain' => $value->address,
				'visits' => $this->traffic->get_total_traffic($value->id),
				'id_web' => $value->id
  			);
		}

		$datas = array(
			'content' => 'my_websites',
			'websites' => $websites,
			'encrypts' => $CI->encrypt
		);

		$this->load->view('base', $datas);
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
			'language' => $this->traffic->get_traffic_by($user->id, $id, 'language'),
			'arguments' => $this->sargument->get_sarguments_web($id)
		);
		$this->load->view('base', $data);


		if(!empty($_POST['argument'])){
			$this->add_sargument($id, $_POST['argument']);
		}

		if(!empty($_POST['up_argument']) and !empty($_POST['id_argument'])){
			$this->update_sargument($id, $_POST['id_argument'], $_POST['up_argument']);
		}

		if(!empty($_POST['id_argument_delete'])){
			$this->delete_sargument($_POST['id_argument_delete']);
		}
	}

	public function delete_website($id){
		$this->webs->delete_web($id);
		redirect('/websites', 'refresh');
	}

	/*Functions*/
	private function add_sargument($id, $argument){
		
		$data = array(
			'argument' => $argument,
			'position' => $this->scraping($argument, $this->webs->get_web_url($id)),
			'id_web'   => $id
		);

		$this->sargument->insert_sargument($data);
	}

	private function update_sargument($id_web, $id_argument, $argument){
		$data = array(
			'id' 	   => $id_argument,
			'argument' => $argument,
			'position' => $this->scraping($argument, $this->webs->get_web_url($id_web))
		);

		$this->sargument->update_sargument($data);
	}

	private function delete_sargument($id_argument){
		$this->sargument->delete_sargument($id_argument);
	}

	private function scraping($argument, $domain){
		$position = 0;
		$i = 1;
		$page = 0;

		$argument = str_replace(" ","+",$argument);
		while($position == 0 && $i < 31){
			$url  = 'http://www.google.com.mx/search?hl=en&safe=active&tbo=d&site=&source=hp&q='.$argument.'&oq='.$argument.'&start='.$page;
			
			$html = file_get_html($url);

			$linkObjs = $html->find('h3.r a');

			foreach ($linkObjs as $linkObj) {
			    $link  = trim($linkObj->href);
			    
			    // if it is not a direct link but url reference found inside it, then extract
			    if (!preg_match('/^https?/', $link) && preg_match('/q=(.+)&amp;sa=/U', $link, $matches) && preg_match('/^https?/', $matches[1])) {
			        $link = $matches[1];
			    } else if (!preg_match('/^https?/', $link)) { // skip if it is not a valid link
			        continue;    
			    }

			    if(strpos($link, $domain) !== FALSE){
			    	$position = $i;
			    	break;
			    }
			    $i++;
			}

			$page = ($i-1);
			sleep(2);
		}

		return $position;
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */