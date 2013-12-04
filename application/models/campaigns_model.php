<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campaigns_Model extends CI_Model{
	protected $table;
	protected $id;

	function __construct(){
		parent::__construct();

		$this->table = 'campaigns';
		$this->id = 'id';
	}

	function get_campaigns_id($id){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join($this->table, 'campaigns.id_user = users.id');
		$this->db->where('campaigns.id_user',$id);
		return $this->db->get()->result();
	}

	function get_campaigns_name($id){
		$this->db->select('name');
		return $this->db->get_where(
			$this->table,
			array(
				'id' => $id
			)
		)->result();
	}

	function get_campaigns_web($id){
		return $this->db->get_where(
			'camp_webs',
			array(
				'id_camp' => $id
			)
		)->num_rows();
	}

	function insert_campaign($name){
		$data = array(
			'name' => $name,
			'observations' => null,
			'create_id' => 1,
			'create_date' => date('Y-m-d H:i:s',now()),
			'update_id' => 1,
			'update_date' => date('Y-m-d H:i:s',now())
		);

		return $this->db->insert($this->table, $data);
	}

	function update_campaign($data){
		$this->db->where('id', $data['id']);
		return $this->db->update($this->table, $data);
	}

}