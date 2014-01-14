<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webs_Model extends CI_Model{
	protected $table;
	protected $id;

	function __construct(){
		parent::__construct();

		$this->table = 'websites';
		$this->id = 'id';
	}

	function get_webs(){
		$query = $this->db->get($this->table);
		return $query->result();
	}

	function get_web($id){
		return $this->db->get_where(
			$this->table,
			array(
				'id' => $id
			)
		)->row();
	}

	function get_web_url($id){
		$this->db->select('address');
		return $this->db->get_where(
			$this->table,
			array(
				'id' => $id
			)
		)->row();
	}

	function get_web_traffic($user){
		$this->db->select('websites.address, websites.id, COUNT(traffic.id_website) as visits');
		$this->db->from('websites');
		$this->db->join('traffic', 'websites.id = traffic.id_website');
		$this->db->join('camp_webs', 'camp_webs.id_web = websites.id');
		$this->db->join('campaigns', 'campaigns.id = camp_webs.id_camp');
		$this->db->where('campaigns.id_user', $user);
		$this->db->group_by('websites.id');
		$query = $this->db->get();
		return $query->result(); 
	}

	function insert_web($url){
		$data = array(
			'address' => $url,
			'observations' => null,
			'create_id' => 1,
			'create_date' => date('Y-m-d H:i:s',now()),
			'update_id' => 1,
			'update_date' => date('Y-m-d H:i:s',now())
		);
		$this->db->insert($this->table, $data);

		return $this->db->insert_id();
	}

	function update_web($data){
		$this->db->where('id', $data['id']);
		return $this->db->update($this->table, $data);
	}

}