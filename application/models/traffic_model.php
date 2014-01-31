<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Traffic_Model extends CI_Model{
	protected $table;
	protected $id;

	function __construct(){
		parent::__construct();

		$this->table = 'traffic';
		$this->id = 'id';
	}

	function get_traffic_id($id){
		return $this->db->get_where(
			$this->table,
			array(
				'id' => $id
			)
		)->row();
	}

	function get_traffics($id_website){
		return $this->db->get_where(
			$this->table,
			array(
				'id_website' => $id_website
			)
		)->result();
	}

	function get_total_traffic($id_website){
		$this->db->select('COUNT(id) as visits');
		$query = $this->db->get_where($this->table,array('id_website' => $id_website));
		return $query->row()->visits;
	}

	function get_traffic_date($date){
		return $this->db->get_where(
			$this->table,
			array(
				'date' => $date
			)
		)->row();
	}

	function get_traffic_hour($hour){
		return $this->db->get_where(
			$this->table,
			array(
				'hour' => $hour
			)
		)->row();
	}

	function get_traffic_per_moth($user, $id_web){
		$this->db->select('COUNT(traffic.id_website) as visits');
		$this->db->from('websites');
		$this->db->join('traffic', 'websites.id = traffic.id_website');
		$this->db->join('camp_webs', 'camp_webs.id_web = websites.id');
		$this->db->join('campaigns', 'campaigns.id = camp_webs.id_camp');
		$this->db->where(array('campaigns.id_user' => $user, 'traffic.id_website' => $id_web));
		$this->db->group_by('MONTH(traffic.date_visit)');
		$this->db->order_by("MONTH(traffic.date_visit)", "asc"); 
		$query = $this->db->get();
		return $query->result(); 
	}

	function get_traffic_by($user, $id_web, $group){
		$this->db->select($group.', COUNT(traffic.id_website) as visits');
		$this->db->from('websites');
		$this->db->join('traffic', 'websites.id = traffic.id_website');
		$this->db->join('camp_webs', 'camp_webs.id_web = websites.id');
		$this->db->join('campaigns', 'campaigns.id = camp_webs.id_camp');
		$this->db->where(array('campaigns.id_user' => $user, 'traffic.id_website' => $id_web));
		$this->db->group_by($group); 
		$query = $this->db->get();
		return $query->result();
	}

	function insert_traffic($data){
		return $this->db->insert($this->table, $data);
	}

	function update_traffic($data){
		$this->db->where('id', $data['id']);
		return $this->db->update($this->table, $data);
	}

}